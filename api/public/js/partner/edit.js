
$(".delete-image-btn").click(function () {
    let partnerId = $(this).data('partner-id')

    $.post( "/dashboard/partners/deleteImage/"+partnerId)
    .done(function( data ) {
        alert( data.message );
        $('.delete-image-btn[data-partner-id='+partnerId+']').closest('.image-box').remove()
        $('.add-image').removeClass('d-none')
    });
})

$(".manager-selector").change(function() {
    if ($(this).val()) {
        $(".to-opportunity-btn").removeClass("d-none")
    }
})
