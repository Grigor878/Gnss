
$(".delete-image-btn").click(function () {
    let subcategoryId = $(this).data('subcategory-id')
    let parent = $(this).closest('.image-box')

    $.post( "/dashboard/subcategories/deleteImage/"+subcategoryId+"/image")
    .done(function( data ) {
        alert( data.message );
        parent.remove()
        $('.add-image.subcat-image').removeClass('d-none')
    });
})

$(".delete-bg-image-btn").click(function () {
    let subcategoryId = $(this).data('subcategory-id')
    let parent = $(this).closest('.image-box')

    $.post( "/dashboard/subcategories/deleteImage/"+subcategoryId+"/bg-image")
    .done(function( data ) {
        alert( data.message );
        parent.remove()
        $('.add-image.bg-image').removeClass('d-none')
    });
})
