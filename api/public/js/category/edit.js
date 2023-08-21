
$(".delete-image-btn").click(function () {
    let categoryId = $(this).data('category-id')

    $.post( "/dashboard/categories/deleteImage/"+categoryId)
    .done(function( data ) {
        alert( data.message );
        $('.delete-image-btn[data-category-id='+categoryId+']').closest('.image-box').remove()
        $('.add-image').removeClass('d-none')
    });
})
