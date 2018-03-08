function getData() {
    $.ajax({
        type: "GET",
        url: "/admin/api_get_data",
        dataType: "json",
        success: function (response) {
            $('#user-num').html(response.user_num);
            $('#active-user-num').html(response.active_user_num);
            $('#normal-ticket-num').html(response.normal_ticket_num);
            $('#staff-ticket-num').html(response.staff_ticket_num);
        }
    });
}

setInterval(function() {
    getData();
}, 5000)