var editing_user = 0;

$('#users-search-btn').click(function() {
	do_search();
});
$('#users-search-content').bind('keypress', function(event) {
	if (event.keyCode == "13") {
		do_search();
	}
});

function do_search(all, uid) {
	key = $('#users-search-key').val();
	txt = $('#users-search-content').val().trim();
	if (all) key = 'username', txt = '';
	if (uid) key = 'id', txt = uid;

	$.ajax({
		type: "POST",
		url: "/admin/api_search_users",
		data: {
			'key': key,
			'value': txt,
			'_SECSRF-T': $("input[name='_SECSRF-T']").val()
		},
		dataType: "json",
		success: function(response) {
			console.log(response.length);
			if (response.length == 0) {
				$('#users-tbody').html('<p>未找到相关用户</p>');
			} else {
				text = '';
				for (var i = 0; i < response.length; i++) {
					text += '<tr uid="' + response[i].id + '"> <td>' + response[i].username + '</td> <td>' + response[i].email + '</td> <td><button class="btn btn-outline-primary btn-xs users-edit">修改资料</button> <a href="/admin/tickets/' + response[i].id + '" class="btn btn-outline-primary btn-xs users-find-ticket">查名下票</a></td> </tr>';
				}
				$('#users-tbody').html(text);
				bind_all();
			}
		}
	});
}

function bind_all() {
	//bind list action btn
	$('.users-edit').click(function() {
		id = $(this).parents('tr').attr('uid');
		console.log(id);
		user_edit(id);
	});


}

function user_edit(id) {
	$.ajax({
		type: "GET",
		url: "/admin/api_user_info",
		data: {
			'id': id
		},
		dataType: "json",
		success: function(response) {
			editing_user = response.id;
			$('#edit-email').val(response.email);
			$('#edit-username').val(response.username);
			$('#edit-phone').val(response.phone);

			$('#edit-modal').modal();

			$('#confirmUED').click(function(e) {
				$.ajax({
					type: "POST",
					url: "/admin/api_user_update",
					data: {
						'id': editing_user,
						'email': $('#edit-email').val().trim(),
						'username': $('#edit-username').val().trim(),
						'phone': $('#edit-phone').val().trim(),
						'_SECSRF-T': $("input[name='_SECSRF-T']").val()
					},
					dataType: "json",
					success: function(response) {
						alert(response.msg);
					}
				});

				if ($('#edit-newpw').val().trim() != '') {
					$.ajax({
						type: "POST",
						url: "/admin/api_user_changepw",
						data: {
							'id': editing_user,
							'new_pw': $('#edit-newpw').val().trim(),
							'_SECSRF-T': $("input[name='_SECSRF-T']").val()
						},
						dataType: "json",
						success: function(response) {
							alert(response.msg);
						}
					});
				}
			});
		}
	});
}

if (uid != 0) {
	do_search(false, uid);
} else {
	//do_search(true)
}
