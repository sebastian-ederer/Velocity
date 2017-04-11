<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\About;
use Storage;
use Mews\Purifier\Facades\Purifier;
use Intervention\Image\ImageManagerStatic as Image;

class AboutController extends Controller
{
    public function __construct(){
        $this->middleware('auth', ['except' => 'index']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = About::orderBy('id', 'desc')->get();
        $counter = 1;

        return view('about.index') ->withEmployees($employees)->withCounter($counter);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('about.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validating

        $this->validate($request, array(

            'name' => 'required | max: 30',
            'job' => 'required | max: 1000',
            'employee_image' => 'nullable|image|max:500'

        ));

        $employee = new About;


        //Store Image

        if($request->hasFile('employee_image')){

            $image = $request->file('employee_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('img/about/' . $filename);
            Image::make($image)->resize(720, 720)->save($location);

            $employee->image = $filename;
        }

        //Store


        $employee->name = $request->input('name');
        $employee->job = Purifier::clean($request->input('job'));

        $employee->save();


        //Flash message
        $request->session()->flash('success', 'Employee was successfully added to the Database!');

        //Redirect
        return redirect()->route('about.index');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = About::find($id);
        return view('about.edit')->withEmployee($employee);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Validating

        $this->validate($request, array(

            'name' => 'required | max: 30',
            'job' => 'required | max: 1000',
            'employee_image' => 'nullable|image|max:500'

        ));

        //Store
        $employee = About::find($id);

        if($request->hasFile('employee_image')){
            //add new photo
            $image = $request->file('employee_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('img/about/' . $filename);
            Image::make($image)->resize(720, 720)->save($location);

            $oldFilename = $employee->image;
            //update DB
            $employee->image = $filename;
            //delete old photo
            Storage::delete($oldFilename);

        }


        $employee->name = $request->input('name');
        $employee->job = Purifier::clean($request->input('job'));

        $employee->save();


        //Flash message
        $request->session()->flash('success', 'Employee was successfully edited!');

        //Redirect
        return redirect()->route('about.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = About::find($id);
        Storage::delete($employee->image);

        $employee->delete();

        session()->flash('success', 'Employee was successfully removed from the Database!');
        return redirect()->route('about.index');
    }
}
