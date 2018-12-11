$(document).ready(function() {
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
                $('.hideCommentsBtn').text('Hide Comments');
                $('.leaveAComment').text('Leave A Comment!');
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
    var win = $('#comments-form'+id);
    if(win.is(':visible')){
        closeComments(id);
    } else {
        openComments(id);
    }
    $('#comments-form'+id).toggle(400, function () {
        if($('#leave-a-comment'+id).text() == 'Leave A Comment!'){
            $('#leave-a-comment'+id).text('Don\'t Leave A Comment');
        }else if($('#leave-a-comment'+id).text() =='Don\'t Leave A Comment'){
            $('#leave-a-comment'+id).text('Leave A Comment!');
        }
    });
}

function openComments(id) {
    var request = jQuery.ajax({
        url: './commentsForm'
    });
    request.done (function (msg) {
        var cmntObj = $('#comments-form'+id);
        cmntObj.html(msg).show();
        $('input[name=post_id]').val(id);
    });
}

function submitCommentJS() {
    jQuery.ajaxSetup({
        headers : {
            'X-CSRF-TOKEN' : $('input[name="_token"').attr('content')
        }
    });

    jQuery.ajax({
        url: './storeComment',
        method: 'POST',
        data: {
            comment: $('input[name=comment]').val(),
            post_id: $('input[name=post_id]').val(),
            user_id: $('input[name=user_id]').val()
        }
    }).fail(function (data) {
        console.log(data);
    }).done(function (data){
        console.log(data);
        closeComments($('input[name=post_id]').val());
    });
}

function closeComments(id = ''){
    $('#comment-form'+id).innerHTML = '';
}

function modifyPost(id){
    $('#meme'+id).toggle(400);
    $('#updateMeme'+id).toggle(400);
}