$('.step-status-btn').click(function() {
    let parent = $(this).closest('.steps-list')
    let oldStatus = parent.find('.active-status')
    oldStatus.removeClass('active-status')
    $(this).parent().addClass('active-status')
})


$('.update-status-btn').click(function() {

    let selectedStatus = $('.steps-list').find('.active-status').find('.content').data('id')
    let opportunityId = $('#oppId').data('id')
    let oppStatusId = $('#oppStatusId').data('status-id')


    console.log(oppStatusId, selectedStatus);

    if (oppStatusId != selectedStatus ) {

        $.post("updateStatus", {
            id: opportunityId,
            status: selectedStatus
        }).done(function (data) {
            location.reload()
        });

    }


})
