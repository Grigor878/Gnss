
$(".delete-image-btn").click(function () {
    let categoryId = $(this).data('category-id')
    let parent = $(this).closest('.image-box')

    $.post( "/dashboard/categories/deleteImage/"+categoryId+'/image')
    .done(function( data ) {
        alert( data.message );
        parent.remove()
        $('.add-image.cat-image').removeClass('d-none')
    });
})

$(".delete-bg-image-btn").click(function () {
    let categoryId = $(this).data('category-id')
    let parent = $(this).closest('.image-box')

    $.post( "/dashboard/categories/deleteImage/"+categoryId+"/bg-image")
    .done(function( data ) {
        alert( data.message );
        parent.remove()
        $('.add-image.bg-image').removeClass('d-none')
    });
})
