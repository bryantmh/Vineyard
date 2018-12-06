$(document).ready(function() {
    $('#listview').text('Hide Comments');
    $('#leave-a-comment').text('Leave A Comment!');
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
function listviewfunc(id) {
        
        $('#comments-list'+id).toggle(400, function () {
            if($('#listview'+id).text() == 'Hide Comments'){
                $('#listview'+id).text('Show Comments');
            }
            else if($('#listview'+id).text() == 'Show Comments'){
                $('#listview'+id).text('Hide Comments');
            }
        });
    }
    function formview(id) {
            $('#comments-form'+id).toggle(400, function () {
                if($('#leave-a-comment'+id).text() == 'Leave A Comment!'){
                    $('#leave-a-comment'+id).text('Don\'t Leave A Comment');
                }else if($('#leave-a-comment'+id).text() =='Don\'t Leave A Comment'){
                    $('#leave-a-comment'+id).text('Leave A Comment!');
                }
            })

    }