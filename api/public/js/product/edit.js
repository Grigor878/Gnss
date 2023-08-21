
$(".delete-image-btn").click(function () {
    let imageId = $(this).data('image-id')

    $.post( "/dashboard/product/deleteImage/"+imageId)
    .done(function( data ) {
        alert( data.message );
        $('.delete-image-btn[data-image-id='+imageId+']').closest('.image-box').remove()
    });

})
