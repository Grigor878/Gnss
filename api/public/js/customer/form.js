let personCount = '1'

$("#add-person").click(function() {
    personCount += '1'
    let newPerson = $("#person-example").clone()
    newPerson.removeClass("d-none")
    newPerson.removeAttr("id")

    newPerson.find('.remove-person').on('click', function () {
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

$(".remove-person").click(function () {
    let personId = $(this).data("person-id")

    console.log(personId)   

    if (personId) {
        $.post("/dashboard/customers/deletePerson/"+personId)
        .done( function( data ) {
            alert( data.message );
            $('.remove-person[data-person-id='+personId+']').closest('.person').remove()
        })
    } else {
        $(this).closest('.person').remove()
    }
})
