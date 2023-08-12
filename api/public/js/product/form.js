
$("#categories").on('change', function () {
    let selectedCategory = this.value

    $("#subCategories > option").each(function(index) {
        let cat = $( this ).data('category')
        if ( cat == selectedCategory ) {
            $(this).show()
        } else {
            $(this).hide()
        }
    })
})
