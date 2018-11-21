$(document).ready(function() {

	$('.pagination').hide();
    $(function () {
        $('.scroll').jscroll({
            autoTrigger: true,
            loadingHtml: '<img class="center-block" src="/img/loading.gif" alt="Loading..." />',
            padding: 0,
            nextSelector: '.pagination li.active + li a',
            contentSelector: 'div.scroll',
            callback: function() {
                $('.pagination').remove();
            }
        });
    });


});