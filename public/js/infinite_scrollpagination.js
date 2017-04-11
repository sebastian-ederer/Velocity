$(function() {
    $('.scroll').jscroll({
        autoTrigger: true,
        nextSelector: '.pagination li.active + li a',
        contentSelector: 'div.scroll',
        loadingHtml: ('<img src="img/ellipsis.gif" class="bottom-loading-gif">'),
        callback: function() {
            $('ul.pagination:visible:first').hide();
        }
    });
});