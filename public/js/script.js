// $(document).ready(function () {
//     $("abbr.timeago").timeago();
// });


  $(()=>{

    $.ajaxSetup({
        headers: { 'X-CSRF-Token': $('meta[name=csrf-token]').attr('content') }
    });

    
    $(document).on('click', '.like-button', function () {
        var self=this;
        var postId = $(this).closest( ".post-box" ).data('post-id');
        console.log(postId);
        
        $.post("/posts/" + postId+'/like', {
            _method: 'PATCH',
            action :'like'
        },
            function (data, status) {
                var likeResult = data.likeResult;
                var likeCounObject = $(self).next('.like-count');
                var likeCount = parseInt($(likeCounObject).text());
                $(likeCounObject).text(likeResult ? likeCount + 1 : likeCount - 1);
            }).fail(function(xhr){
                if(xhr.status==401){
                    window.location = "/login";
                }
                
            });
    });

    // $(document).on('click', '.reply-button', function () {
    //     var postId = $(this).closest( ".post-box" ).data('post-id');
    //     var self=this;

    //     $.post("/posts/" + postId, {
    //         _method: 'PATCH',
    //         action :'reply',
    //     },
    //         function (data, status) {
    //             var replyCount = data.replyCount;
    //             $(self).next('.reply-count').text(replyCount);
    //         }).fail(function(xhr){
    //             if(xhr.status==401){
    //                 window.location = "/login";
    //             }
                
    //         });
    // });




    
});


var $j = jQuery.noConflict();
$j(document).ready(function () {
    $j("time.timeago").timeago();
});

