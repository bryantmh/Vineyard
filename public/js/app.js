$(document).ready(function() {
    $('#listview').text('Hide Comments');
    $('#leave-a-comment').text('Leave A Comment!');
	$('.pagination').hide();
    $(function () {
        $('.scroll').jscroll({
            autoTrigger: true,
            loadingHtml: '<img class="center-block" src="./img/loading.gif" alt="Loading..." />',
            padding: 0,
            nextSelector: '.pagination li.active + li a',
            contentSelector: 'div.scroll',
            callback: function() {
                $('.pagination').remove();
            }
        });
    });
    $('#listview').click(function(){
        $('#comments-list').toggle(400, function () {
            if($('#listview').text() == 'Hide Comments'){
                $('#listview').text('Show Comments');
            }
            else if($('#listview').text() == 'Show Comments'){
                $('#listview').text('Hide Comments');
            }
        });
    });

    $('#leave-a-comment').click(function () {
        $('#comments-form').toggle(400, function () {
            if($('#leave-a-comment').text() == 'Leave A Comment!'){
                $('#leave-a-comment').text('Don\'t Leave A Comment');
            }else if($('#leave-a-comment').text() =='Don\'t Leave A Comment'){
                $('#leave-a-comment').text('Leave A Comment!');
            }
        })
    })
});