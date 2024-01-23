$('.step-status-btn').click(function() {
    let parent = $(this).closest('.steps-list')
    let oldStatus = parent.find('.active-status')
    oldStatus.removeClass('active-status')
    $(this).parent().addClass('active-status')

    text = $(this).text().trim()
    if (text == "Close") {
        $(".close-final-stage").show()
    } else {
        $(".close-final-stage").hide()
    }
})

$('.update-status-btn').click(function() {
    let selectedStatus = $('.steps-list').find('.active-status').find('.content').data('id')
    let opportunityId = $('#oppId').data('id')
    let oppStatusId = $('#oppStatusId').data('status-id')


    if (oppStatusId != selectedStatus ) {

        $.post("updateStatus", {
            id: opportunityId,
            status: selectedStatus
        }).done(function (data) {
            location.reload()
        });
    }
})

$(".add-note-btn").click(function(){
    $(".add-note-form").slideToggle();

    $(this).find('.down-icon').toggleClass('rotate')
});

$(".attach-file-btn").click(function(){
    $(".attach-file-form").slideToggle();

    $(this).find('.down-icon').toggleClass('rotate')
});

$(".add-task-btn").click(function(){
    $(".add-task-form").slideToggle();

    $(this).find('.down-icon').toggleClass('rotate')
});

$(".note-delete-button").click(function(){
    let noteId = $(this).data("id")
    let noteBox = $(this).closest(".single-note-item")

    $.post("deleteNote", {
        id: noteId,
    }).done(function (data) {
        if (data.status == 200) {
            noteBox.remove()
        }
    });
});

$(".file-delete-button").click(function(){
    let fileId = $(this).data("id")
    let fileBox = $(this).closest(".single-note-item")

    $.post("deleteFile", {
        id: fileId,
    }).done(function (data) {
        if (data.status == 200) {
            fileBox.remove()
        }
    });
});

$(".complete-task").change(function() {
    let taskId = $(this).closest('.task').data('task-id')
    let check = $(this).is(':checked')

    let taskUpdateTeg = $(this).closest('.task').find('.task-update-date')

    $.post("completeTask", {
        id: taskId,
        done: check,
    }).done(function (data) {
        console.log(data);

        if (data.status == 200) {

            console.log(taskUpdateTeg)
            if (check) {
                taskUpdateTeg.text("Just Now")
            } else {
                taskUpdateTeg.text("")
            }
        }
    });
})

$(".task-delete-button").click(function(){
    let taskId = $(this).data("id")
    let taskBox = $(this).closest(".single-task-item")

    $.post("deleteTask", {
        id: taskId,
    }).done(function (data) {
        if (data.status == 200) {
            taskBox.remove()
        }
    });
});

