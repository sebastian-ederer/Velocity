$(document).ready(function() {
    (function(){
        var showChar = 600;
        var ellipsestext = "...";

        $('.truncate').each(function() {
            var content = $(this).html();
            if(content.length > showChar) {

                var c = content.replace(/(<([^>]+)>)/ig,"").substr(0, showChar);
                var h = content;
                var html = '<div class="truncate-text">' + c + '<span class="moreellipses">' + ellipsestext + '</span></div><div class="complete-text" style = "display: none;" >'+ h +'</div>';

               $(this).html(html);
            }

        });


        $(".moreless").click(function(){


            if( $(this).hasClass("less")) {

                $(this).closest("div").children(".truncate").children(".complete-text").toggle();
                $(this).text('Read More');
                $(this).closest("div").children(".truncate").children(".truncate-text").toggle();
                $(this).removeClass('less').addClass('more');

            } else if($(this).hasClass("more")){

                $(this).removeClass('more').addClass('less');
                $(this).closest("div").children(".truncate").children(".truncate-text").toggle();
                $(this).closest("div").children(".truncate").children(".complete-text").toggle();
                $(this).text('Read Less');

            }
            return false;

        });
        /* end iffe */
    }());

    /* end ready */
});