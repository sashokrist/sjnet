
$(".post").find(".interaction").find(".edit").on('click', function(event){
    event.preventDefault();
    var postBody = event.target.parentNode.parentNode.childNodes[1].textContent;

    $('#post-body').val(postBody);
    $('#edit-modal').modal();
    console.log(postBody);
});

$('#modal-save').on('click', function () {
    $.ajax({
        method: 'POST',
        url: url,
        data: {body: $('#post-body').val(), postId: '', _token: token}
    })
        .done(function (msg) {
           console.log(msg['message']);
        });
});
