var editing_ticket = 0;

$('#tickets-search-btn').click(function() {
    do_search();
});
$('#tickets-search-content').bind('keypress', function (event) {
    if (event.keyCode == "13") {
        do_search();
    }
});

function do_search(all,uid) {
    key = $('#tickets-search-key').val();
    txt = $('#tickets-search-content').val().trim();
    if (all) key = 'name',txt = '';
    if (uid) key = 'uid',txt = uid;
    if(key == 'id') txt = parseInt(txt);

    $.ajax({
        type: "POST",
        url: "/admin/api_search_tickets",
        data: {
            'key': key,
            'value': txt,
            '_SECSRF-T': $("input[name='_SECSRF-T']").val()
        },
        dataType: "json",
        success: function (response) {
            console.log(response.length);
            if (response.length == 0) {
                $('#tickets-tbody').html('<p>未找到相关门票</p>');
            } else {
                text = '';
                for(var i=0;i<response.length;i++) {
                    text += '<tr id="'+ response[i].id +'"> <td>'+ addZero(response[i].id, 4) +'</td> <td>'+ response[i].name +'</td> <td><button class="btn btn-outline-primary btn-xs tickets-edit">修改信息</button> <a href="/admin/users/'+ response[i].uid +'" class="btn btn-outline-primary btn-xs users-find-ticket">查该用户</a> </tr>';
                }
                $('#tickets-tbody').html(text);
                bind_all();
            }
        }
    });
}

function bind_all() {
    //bind list action btn
    $('.tickets-edit').click(function() {
        id = $(this).parents('tr').attr('id');
        console.log(id);
        ticket_edit(id);
    });

}

function ticket_edit(id) {
    $.ajax({
        type: "GET",
        url: "/admin/api_ticket_info",
        data: {
            'id': id
        },
        dataType: "json",
        success: function (response) {
            editing_ticket = response.id;
            $('#edit-tid').val(addZero(response.id, 4));
            $('#edit-user').html(response.uid);
            $('#edit-user').attr('href', '/admin/users/'+response.uid);
            $('#edit-name').val(response.name);
            $('#edit-phone').val(response.phone);

            // $('#edit-type').val(response.type);
            $("#edit-type").get(0).selectedIndex = response.type - 1;
            $("#edit-type").trigger('changed.selected.amui');
            // $('#edit-class').val(response.class);
            $("#edit-class").get(0).selectedIndex = response.class - 1;
            $("#edit-class").trigger('changed.selected.amui');
            // $('#edit-status').val(response.status);
            if (response.status == 1) $("#edit-status").get(0).selectedIndex = 0;
            if (response.status == 2) $("#edit-status").get(0).selectedIndex = 1;
            if (response.status == -1) $("#edit-status").get(0).selectedIndex = 2;
            $("#edit-status").trigger('changed.selected.amui');

            $('#edit-modal').modal();

            $('#confirmTED').click(function (e) {
                $.ajax({
                    type: "POST",
                    url: "/admin/api_ticket_update",
                    data: {
                        'id': editing_ticket,
                        'name': $('#edit-name').val().trim(),
                        'phone': $('#edit-phone').val().trim(),
                        'type': $('#edit-type').val().trim(),
                        'class': $('#edit-class').val().trim(),
                        'status': $('#edit-status').val().trim(),
                        '_SECSRF-T': $("input[name='_SECSRF-T']").val()
                    },
                    dataType: "json",
                    success: function (response) {
                        alert(response.msg);
                    },
                    error: function() {
                        alert('修改失败，请检查数据是否填写错误');
                    }
                });
            });
        }
    });
}

if(uid != 0) {
    do_search(false,uid);
} else {
    //do_search(true)
}

$('#sendTicket').click(function() {
    $('#add-modal').modal();
    $('#confirmADT').click(function (e) {
        $.ajax({
            type: "POST",
            url: "/admin/api_ticket_add",
            data: {
                'email': $('#add-email').val().trim(),
                'name': $('#add-name').val().trim(),
                'phone': $('#add-phone').val().trim(),
                'type': $('#add-type').val().trim(),
                'class': $('#add-class').val().trim(),
                '_SECSRF-T': $("input[name='_SECSRF-T']").val()
            },
            dataType: "json",
            success: function (response) {
                alert(response.msg);
            },
            error: function() {
                alert('添加失败，请检查数据是否填写错误');
            }
        });
    });
});


function addZero(num,length){
    var numstr = num.toString();
    var l=numstr.length;
    if (numstr.length>=length) {return numstr;}

    for(var  i = 0 ;i<length - l;i++){
      numstr = "0" + numstr;
     }
    return numstr;
}
