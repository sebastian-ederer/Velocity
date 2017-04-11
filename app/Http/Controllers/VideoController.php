<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;
use Mews\Purifier\Facades\Purifier;

class VideoController extends Controller
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
        $videos = Video::orderBy('id', 'desc')->paginate(5);

        return view('videos.index') ->withVideos($videos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('videos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $pattern = '/^(<iframe width="560" height="315" src=")'.'((https?\:\/\/)?(www\.)?(youtube\.com|youtu\.?be)\/.+)'.'(" frameborder="0" allowfullscreen><\/iframe>)$/';
        $rule = preg_match($pattern, $request->input('link_to_video'));

        //validate data
        $this->validate($request, array(

            'title' => 'max:255',
            'text'  => 'max:255',
            'link_to_video'  => 'required'

        ));

        if ($rule == false){

            $request->session()->flash('youtube-fail', 'Link to embed YouTube video is incorrect!');
            return redirect()->route('videos.create');
        }


        //store into database
        $video = new Video;

        $video->title            = $request->input('title');
        $video->text             = Purifier::clean($request->input('text'));
        $video->link_to_video    = Purifier::clean($request->input('link_to_video'), 'youtube');

        //save + session message
        $video->save();

        $request->session()->flash('success', 'Video was successfully added to the Database!');
        //redirect ro another page
        return redirect()->route('videos.show', $video->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $video = Video::find($id);
        return view('videos.show')->withVideo($video);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = Video::find($id);
        return view('videos.edit')->withVideo($video);
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
        //validate data
        $this->validate($request, array(

            'title' => 'max:255',
            'text'  => 'max:255',
            'link_to_video'  => 'required'
        ));

        //update database
        $video = Video::find($id);

        $video->title            = $request->input('title');
        $video->text             = Purifier::clean($request->input('text'));
        $video->link_to_video    = Purifier::clean($request->input('link_to_video'), 'youtube');

        //update
        $video->save();

        //flash message
        $request->session()->flash('success', 'Video was successfully edited!');

        return redirect()->route('videos.show', $video->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Video::find($id);
        $video->delete();

        session()->flash('success', 'Video was successfully deleted!');
        return redirect()->route('videos.index');
    }
}
