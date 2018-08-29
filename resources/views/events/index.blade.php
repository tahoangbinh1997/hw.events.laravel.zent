
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

	<meta name="csrf-token" content="{{ csrf_token() }}">​
</head>
<body>
	<div class="container-fluid">
		<h1>{{$name}}</h1>
		<a href="#" class="btn btn-success btn-add" data-target="#modal-add" data-toggle="modal">Add</a>
		<div class="table responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Title</th>
						<th>Content</th>
						<th>Time</th>
						<th>Location</th>
						<th>Created_at</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($danhsach as $ds)
					<tr>
						<td>{{$ds->id}}</td>
						<td>{{$ds->title}}</td>
						<td>{{$ds->content}}</td>
						<td>{{$ds->time}}</td>
						<td>{{$ds->location}}</td>
						<td>{{$ds->created_at}}</td>
						<td>
							<button data-url="{{ route('events-ajax.show',$ds->id) }}"​ type="button" data-target="#show" data-toggle="modal" class="btn btn-info btn-show">Details</button>
							<button data-url="{{ route('events-ajax.update',$ds->id) }}"​ type="button" class="btn btn-warning btn-edit">Edit</button>
							<button data-url="{{ route('events-ajax.destroy',$ds->id) }}"​ type="button" class="btn btn-danger btn-delete">Delete</button>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

	{{-- Modal show chi tiết todo --}}
	<div class="modal fade" id="show">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Detail</h4>
				</div>
				<div class="modal-body" style="text-align: left;">
					<h2>Event:</h2>
					<h4 id="id"></h4>
					<h4 id="title"></h4>
					<h4 id="content"></h1>
					<h4 id="time"></h4>
					<h4 id="location"></h4>
					<h4 id="created_at"></h4>
					<h4 id="updated_at"></h4>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

	{{-- Modal thêm mới todo --}}
	<div class="modal fade" id="modal-add">
			<div class="modal-dialog">
				<div class="modal-content">

					<form data-url="{{ route('events-ajax.store') }}" id="form-add" method="POST" role="form">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Add todo</h4>
						</div>
						<div class="modal-body">

							<div class="form-group">
								<label for="">Title</label>
								{{csrf_field()}}
								<input type="text" class="form-control" name="title" id="title_add" placeholder="Title">
							</div>
							<div class="form-group">
								<label for="">Content</label>
								<input type="text" class="form-control" name="content" id="content_add" placeholder="Content">
							</div>
							<div class="form-group"> <!-- Date input -->
								<label for="">Time</label>
								<input class="form-control" id="time_add" name="time" placeholder="YYYY/MM/DD" type="text"/ readonly>
							</div>
							<div class="form-group">
								<label for="">Location</label>
								<input type="text" class="form-control" name="location" id="location_add" placeholder="Location">
							</div>



						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Add</button>
						</div>
					</form>
				</div>
			</div>
	</div>

	{{-- Modal sửa todo --}}
		<div class="modal fade" id="modal-edit">
			<div class="modal-dialog">
				<div class="modal-content">

					<form action="" id="form-edit" method="POST" role="form">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Add todo</h4>
						</div>
						<div class="modal-body">

							<div class="form-group">
								<label for="">Title</label>
								{{csrf_field()}}
								<input type="text" class="form-control" name="title" id="title_edit" placeholder="Title">
							</div>
							<div class="form-group">
								<label for="">Content</label>
								<input type="text" class="form-control" name="content" id="content_edit" placeholder="Content">
							</div>
							<div class="form-group"> <!-- Date input -->
								<label for="">Time</label>
								<input class="form-control" id="time_edit" name="time" placeholder="YYYY/MM/DD" type="text"/ readonly>
							</div>
							<div class="form-group">
								<label for="">Location</label>
								<input type="text" class="form-control" name="location" id="location_edit" placeholder="Location">
							</div>



						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Edit</button>
						</div>
					</form>
				</div>
			</div>
		</div>

	<script src="https://code.jquery.com/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" type="text/javascript" charset="utf-8" async defer></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/locale/vi.js"></script>

	<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript">
				$(document).ready(function(){
			      var date_input=$('input[name="time"]'); //our date input has the name "date"
			      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
			      var options={
			      	format: 'yyyy/mm/dd',
			      	container: container,
			      	todayHighlight: true,
			      	autoclose: true,
			      };
			      date_input.datepicker(options);
			  })
			</script>
	<script type="text/javascript" charset="utf-8">
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$(document).ready(function () {
            $('.btn-show').click(function() {

            	var url = $(this).attr('data-url');

            	$.ajax({
            		type: 'get',
            		url: url,
            		success: function(response) {
            			console.log(response)

            			$('h4#id').text("ID: "+response.data.id);
            			$('h4#title').text("TITLE: "+response.data.title);
            			$('h4#content').text("CONTENT: "+response.data.content);
            			$('h4#time').text("TIME: "+response.data.time);
            			$('h4#location').text("LOCATION: "+response.data.location);
            			$('h4#created_at').text("CREATED_AT: "+response.data.created_at);
            			$('h4#update_at').text("UPDATED_AT: "+response.data.update_at);
            		}
            	})
            });

            $('#form-add').submit(function(e) {
            	
            	e.preventDefault();

            	var url = $(this).attr('data-url');

            	$.ajax({
            		type: 'post',
            		url: url,
            		data: {
            			title: $('#title_add').val(),
            			content: $('#content_add').val(),
            			time: $('#time_add').val(),
            			location: $('#location_add').val(),
            		},
            		success: function(response) {
            			console.log(response)
            			window.location.reload()
            		},
            		error: function (jqXHR, textStatus, errorThrown) {
            			//xử lý lỗi tại đây
            		}
            	})
            });

            $('.btn-edit').click(function(e) {

            	var url = $(this).attr('data-url');

            	$('#modal-edit').modal('show');

            	e.preventDefault();

            	$.ajax({
            		type: 'get',
            		url: url,
            		success: function(response) {

            			$('#title_edit').val(response.data.title);
            			$('#content_edit').val(response.data.content);
            			$('#time_edit').val(response.data.time);
            			$('#location_edit').val(response.data.location);

            			$('#form-edit').attr('data-url', '{{ asset('events-ajax/')}}/'+response.data.id)
            		}
            	})
            });

            $('#form-edit').submit(function(e){
            	e.preventDefault();

            	var url = $(this).attr('data-url');

            	$.ajax({
            		type: 'put',
            		url: url,
            		data: {
            			title: $('#title_edit').val(),
            			content: $('#content_edit').val(),
            			time: $('#time_edit').val(),
            			location: $('#location_edit').val(),
            		},
            		success: function(response) {
            			window.location.reload()
            		},
            		error: function(jqXHR, textStatus, errorThrown) {
            			//xử lý lỗi tại đây
            		}
            	})
            });

            $('.btn-delete').click(function(){

            	var url = $(this).attr('data-url');

            	if (confirm('Bạn có chắc là muốn xóa không?')) {
            		$.ajax({
	            		type: 'delete',
	            		url: url,
	            		success: function(response) {
	            			window.location.reload()
	            		},
	            		error: function(jqXHR, textStatus, errorThrown) {
	            			//xử lý lỗi tại đây
	            		}
	            	})
            	}
            });
        })
    </script>
    </body>
</html>