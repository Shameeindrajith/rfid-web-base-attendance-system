


<!DOCTYPE html>
<html>
<head>
	<title>Lecture_free_form</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
           <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">  
</head>
<body><div class="container">
<div class="row col-md-6 col-md-offset-3">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h1>Lecture Free Form</h1>
		</div>
		<div class="panel-body">
			<form action="connection.php" method="post">
				<div class="form-group">
					<label for="Name">Name</label>
					<input type="text" placeholder="Name" class="form-control" id="name" name="name">
				</div>

				<div class="form-group">
					<label for="Id">Id</label>
					<input type="text"  class="form-control" id="idno" placeholder="ID no" name="idno">
				</div>

				<div class="form-group">
					<label for="date">Date</label>
					<input type="text" name="date" class="form-control" id="date" placeholder="yyyy-mm-dd" name="date">
				</div>
				<div class="form-group">
					<label for="time">time</label>

					<div><label for="fullday" class="radio-inline" >
					<input type="radio"  name="time" id="fullday" value="fulday">Full day</label></div>
		
					<div><label for="830" class="radio-inline" >
					<input type="radio"  name="time" id="830" value="08.30-10.30">08.30-10.30</label></div>

					<div><label for="1030" class="radio-inline" >
					<input type="radio"  name="time" id="1030" value="10.30-12.30">10.30-12.30</label></div>

					<div><label for="130" class="radio-inline" >
					<input type="radio"  name="time" id="130" value="01.30-03.30">01.30-03.30</label></div>

					<div><label for="330" class="radio-inline" >
					<input type="radio"  name="time" id="330" value="03.30-05.30">03.30-05.30</label></div>
				</div>
				<div class="form-group">
					<label>Reason</label><br>
					<input type="text-area" class="form-control" id="reason" name="reason">
				</div>
				<button name="but" class="btn btn-primary" type="submit">SUBMIT</button>
				</div>
				</div>
				</div>
			</form>

		</div>

		<div class="panel-footer text-right">
			<small>&copy; shamee_project_WUSL</small>
		</div>
	</div>
	
</div>
</div><!-- container-->
</body>
</html>

<script>
	$(document).ready(function(){
		$.datepicker.setDefaults({
			dateFormat:'yy-mm-dd'
		});
		$(function(){
			$("#date").datepicker();
			
		});
		});
	</script>