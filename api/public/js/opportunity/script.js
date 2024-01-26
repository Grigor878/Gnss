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
    let task = $(this).closest('.task')

    let taskUpdateTeg = $(this).closest('.task').find('.task-update-date')

    $.post("completeTask", {
        id: taskId,
        done: check,
    }).done(function (data) {
        if (data.status == 200) {
            if (check) {
                let date = new Date();
                let day = date.getDate() < 10 ? '0' + date.getDate() : date.getDate()
                let month = (date.getMonth()+1) < 10 ? '0' + (date.getMonth()+1) : (date.getMonth()+1)
                let year = date.getFullYear()
                let dateTime = day + '-' + month + '-' + year

                taskUpdateTeg.text(dateTime)
                taskUpdateTeg.removeClass('d-none')
            } else {
                console.log(task);
                task.find('.text').removeClass('unseted')
                taskUpdateTeg.addClass('d-none')
                taskUpdateTeg.text("")
            }
        }
    });
})

$(".task-delete-button").click(function(){
    let taskId = $(this).data("id")
    let taskBox = $(this).closest("li")

    $.post("deleteTask", {
        id: taskId,
    }).done(function (data) {
        if (data.status == 200) {
            taskBox.remove()
        }
    });
});

