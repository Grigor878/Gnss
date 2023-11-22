$('.more-info-btn').click(function () {
    let info = $(this).closest('.order-box').find('.order-more-info')

    let name = info.find('input[name="name"]').val()
    let count = info.find('input[name="count"]').val()
    let price = info.find('input[name="price"]').val()
    let note = info.find('input[name="note"]').val()
    let fullname = info.find('input[name="fullname"]').val()
    let company = info.find('input[name="company"]').val()
    let email = info.find('input[name="email"]').val()
    let phone = info.find('input[name="phone"]').val()
    let description = info.find('input[name="description"]').val()
    let image = info.find('input[name="image"]').val()

    let modal = $('#orderModal').find('.modal-body')
    modal.find('.product-name').text(name)
    modal.find('.order-count').text(count)
    modal.find('.product-price').text(price)
    modal.find('.order-note').text(note)
    modal.find('.product-description').text(description)
    modal.find('.customer-name').text(fullname)
    modal.find('.customer-email').text(email)
    modal.find('.customer-phone').text(phone)
    modal.find('.customer-company').text(company)
    modal.find('.product-image').attr("src", image)
})


$('.move-right-btn').click(function () {
    let parent = $(this).closest('.card-box')
    let classlist = parent.attr("class").split(/\s+/);
    thisParent = classlist[1]
    let order = $(this).closest('.order-box').detach();

    let nextColumn = ''
    if (thisParent == 'opened-box') {
        order.removeClass('bg-info')
        order.addClass('bg-warning')
        nextColumn = '.released-box'
    } else if (thisParent == 'released-box') {
        order.removeClass('bg-warning')
        order.addClass('bg-success')
        nextColumn = '.progress-box'
    } else if (thisParent == 'progress-box') {
        order.removeClass('bg-success')
        order.addClass('bg-primary')
        nextColumn = '.closed-box'
    }
    $(nextColumn).append(order);

    let orderId = order.find('.orderId').val()
    let newStatus = nextColumn.split(".").pop().replace("-box", "")

    $.post("orders/updateStatus", {
        id: orderId,
        status: newStatus
    }).done(function (data) {

    });



})

$('.move-left-btn').click(function () {
    let parent = $(this).closest('.card-box')
    let classlist = parent.attr("class").split(/\s+/);
    thisParent = classlist[1]
    let order = $(this).closest('.order-box').detach();

    let prevColumn = ''
    if (thisParent == 'released-box') {
        prevColumn = '.opened-box'
        order.removeClass('bg-warning')
        order.addClass('bg-info')
    } else if (thisParent == 'progress-box') {
        order.removeClass('bg-success')
        order.addClass('bg-warning')
        prevColumn = '.released-box'
    } else if (thisParent == 'closed-box') {
        prevColumn = '.progress-box'
        order.removeClass('bg-primary')
        order.addClass('bg-success')
    }
    $(prevColumn).append(order);

    let orderId = order.find('.orderId').val()
    let newStatus = prevColumn.split(".").pop().replace("-box", "")

    $.post("orders/updateStatus", {
        id: orderId,
        status: newStatus
    }).done(function (data) {

    });

})



