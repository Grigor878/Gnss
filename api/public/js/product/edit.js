$(".delete-file-btn").click(function () {
    let fileId = $(this).data('file-id')
    let type = $(this).data('file-type')

    $.post( "/dashboard/product/deleteFile/"+fileId+"/"+type)
    .done(function( data ) {
        alert( data.message );
        $('.delete-file-btn[data-file-id='+fileId+']').closest('.image-box').remove()
    });
})
