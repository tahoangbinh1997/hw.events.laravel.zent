<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQ	P6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>

	<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/locale/vi.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
</head>
<body>
	<div class="container-fluid">
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<form action="{{asset('')}}events" method="POST" role="form">
				<legend>Form title</legend>
				
				<div class="form-group">
					<label for="">Title</label>
					{{csrf_field()}}
					<input type="text" class="form-control" name="title" id="title" placeholder="Title">
				</div>
				<div class="form-group">
					<label for="">Content</label>
					<input type="text" class="form-control" name="content" id="content" placeholder="Content">
				</div>
				<div class="form-group"> <!-- Date input -->
					<label for="">Time</label>
					<input class="form-control" id="time" name="time" placeholder="MM/DD/YYY" type="text"/>
				</div>
				<div class="form-group">
					<label for="">Location</label>
					<input type="text" class="form-control" name="location" id="location" placeholder="Location">
				</div>
				

				
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
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
		</div>
	</div>
</body>
</html>