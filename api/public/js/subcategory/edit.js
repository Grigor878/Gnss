
$(".delete-image-btn").click(function () {
    let subcategoryId = $(this).data('subcategory-id')

    $.post( "/dashboard/subcategories/deleteImage/"+subcategoryId)
    .done(function( data ) {
        alert( data.message );
        $('.delete-image-btn[data-subcategory-id='+subcategoryId+']').closest('.image-box').remove()
        $('.add-image').removeClass('d-none')
    });
})
