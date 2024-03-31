let personCount = '1'

$("#add-person").click(function() {
    personCount += '1'
    let newPerson = $("#person-example").clone()
    newPerson.removeClass("d-none")
    newPerson.removeAttr("id")

    newPerson.find('.remove-partner').on('click', function () {
        let parent = $(this).closest('.person')
        parent.remove()
    })

    let inputs = newPerson.find('input')
    inputs.each(function() {
        let newAttrVal = $(this).attr('name').replace('personNumber', personCount)
        $(this).attr('name', newAttrVal)
    })

    $(".persons").append(newPerson)
})

$(".delete-image-btn").click(function () {
    let partnerId = $(this).data('partner-id')

    $.post( "/dashboard/partners/deleteImage/"+partnerId)
    .done(function( data ) {
        alert( data.message );
        $('.delete-image-btn[data-partner-id='+partnerId+']').closest('.image-box').remove()
        $('.add-image').removeClass('d-none')
    });
})

$(".remove-partner").click(function () {
    let personId = $(this).data("person-id")

    if (personId) {
        $.post("/dashboard/partners/deletePerson/"+personId)
        .done( function( data ) {
            alert( data.message );
            $('.remove-partner[data-person-id='+personId+']').closest('.person').remove()
        })
    } else {
        $(this).closest('.person').remove()
    }
})

$(".manager-selector").change(function() {
    if ($(this).val()) {
        $(".to-opportunity-btn").removeClass("d-none")
    }
})
