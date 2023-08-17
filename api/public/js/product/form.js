
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

$(".lang-tab").click(function() {
    let lang = $(this).attr("id") == 'armenian-tab' ? 'am' : 'en'

    $("#categories > option").each(function(index) {
        let amName = $(this).data('am-name')
        let enName = $(this).data('en-name')
        if ( lang == 'am' ) {
            $(this).text(amName)
        } else {
            $(this).text(enName)
        }
    })

    $("#subCategories > option").each(function(index) {
        let amName = $(this).data('am-name')
        let enName = $(this).data('en-name')
        if ( lang == 'am' ) {
            $(this).text(amName)
        } else {
            $(this).text(enName)
        }
    })

})
