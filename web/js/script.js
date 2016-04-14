'use strict';
$(document).ready(function(event) {

	/* disable pagination link */
	$('.disabled > a').on('click', function(event) {
		event.preventDefault();
	});

	/* active datepicker */
	$( ".datepicker" ).datepicker();

	/* add/remove user skill */
	if ( $('.user-skill').length < 2 ) $('.remove-skill').hide();
	
	$('.add-skill').on('click', function(event) {
		event.preventDefault();

		var form_group = document.createElement('div');
		form_group.className = 'form-group row';

		var label = document.createElement('label');
		label.className = 'col-sm-3 form-control-label';
		label.textContent = 'Навык';

		var div = document.createElement('div');
		div.className = 'col-sm-9';

		var input = document.createElement('input');
		input.className = 'form-control user-skill';
		input.setAttribute('placeholder', 'Навык');

		div.appendChild(input);
		form_group.appendChild(label);
		form_group.appendChild(div);

		$('.user-skill').last().parent().parent().after(form_group);

		if ( $('.user-skill').length > 0 ) $('.remove-skill').show();

	});

	$('.remove-skill').on('click', function(event) {
		event.preventDefault();

		var input_length = $('.user-skill').length;
		if (input_length < 2 ) return false;

		$('.user-skill').last().parent().parent().remove();

		console.log(input_length);

		if( $('.user-skill').length < 2) $(this).hide();
	});

	$('#add-user-form').on('submit', function(event) {
		if ( $('.user-skill').length < 2) return true;

		event.preventDefault();

		var user_skills = '';
		for (var i=0; i<$('.user-skill').length; i++) {
			user_skills += $('.user-skill').eq(i).val() + ',';
			if (i > 0) $('.user-skill').eq(i).parent().parent().remove();
		}
		user_skills = user_skills.substr(0, user_skills.length-1);
		$('.user-skill').eq(0).val(user_skills);

		$(this).submit();
	});

	$('form').on('keydown', function(event){		
		if (event.which == 13) {
			event.preventDefault();
			$('input[type=submit]').click();
		}
	});

	/* update user */
	$('a[href="#update"]').on('click', function(event) {
		event.preventDefault();
		$('.user-page').addClass('hidden');
		$('.update-user').removeClass('hidden');
	});

	$('a[href="#show"]').on('click', function(event) {
		event.preventDefault();
		$('.user-page').removeClass('hidden');
		$('.update-user').addClass('hidden');
	});

	/* ajax users load */

	$('select[name=search_field]').on('change', function(event) {
		if ( $(this).val()  == 'experience' ) {
			$('input[name=search]').hide();
			$.ajax({
				url: '/template/experience.html',
				dataType: 'html',
			}).done(function(data){
				$('input[name=search]').after(data);				
			});

		} else {
			$('#experience').remove();
			$('input[name=search]').show();
		}
	});

	$('.filter').on('click', function(event) {
		event.preventDefault();

		getFilteredUsers();
	});

	// DELETE
	//$('input').removeAttr('required');




}); // end ready

var filter = {};
function getFilteredUsers() {
	var order = window.location.hash.substr(1);
	var date_from = $('input[name=date_from]').val();
	var date_until = $('input[name=date_until]').val();
	var search_field = $('select[name=search_field]').val();
	var search = $('input[name=search]').val();
	if (search_field == 'experience') search = $('#experience').val();

	var buffer_filter = {
		order: order,
		date_from: date_from,
		date_until: date_until,
		search: search,
		search_field: search_field,
	};

	if ( isEqual(filter, buffer_filter) == true ) return false;

	filter = buffer_filter;

	for(var k in filter){
		if ( filter[k] == '' ) delete filter[k];
	}

	$.ajax({
		type: "GET",
		url: '/users/get_users',
		data: filter,
		dataType: 'json',
		success: function(data) {
			console.log(data);
		},
	});
}

function isEqual(obj_1, obj_2) {
	for ( var k in obj_1 ) {
		if ( obj_1[k] != obj_2[k] ) return false;
	}
	if (arguments.length > 2) return true;
	return isEqual(obj_2, obj_1);
}