<?php
$connect=mysqli_connect("localhost","root","","iotproject");
$query="SELECT * from mon830 ORDER BY id desc";
$result=mysqli_query($connect,$query);
?>
<!DOCTYPE html>
<html>
<head>
	  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">  

	<title>Search Student atendence</title>
	
</head>
<body>
<br /><br />
<div class="container" style="width:900px;">
	<h2 align="center">Search Student atendence</h2>
	<h3 align="center">Enter date</h3><br />
	<div class="col-md-3">
		<input type="text" name="dates" id="dates" class="form-control" placeholder="date" />
	</div><!-- col-md-3 -->

	<div class="col-md-3">
		<input type="text" name="dates2" id="dates2" class="form-control" placeholder="date" />
	</div><!-- col-md-3 -->

	<div class="col-md-5">
		<input type="button" name="filter" id="filter" value="filter" />
	</div><!-- col-md-5 -->
	<div style="clear: both;"></div>
	<br />
	<div class="ordered_table">
		<table class="table table-bordered">
			<tr>
				<th width="30%">ID</th>
				<th width="30%">NAME</th>
				<th width="30%">DATE</th>
			</tr>
		<?php 
		while ($row = mysqli_fetch_array($result)) {
			?>
			<tr>
				<td><?php echo $row["id"]; ?></td>
				<td><?php echo $row["name"]; ?></td>
				<td><?php echo $row["datess"]; ?></td>
			</tr>
		<?php	
		}
		?>	
		</table>
	</div><!-- ordered_table -->
</div><!-- container -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
<script>
	$(document).ready(function(){
		$.datepicker.setDefaults({
			dateFormat:'yy-mm-dd'
		});
		$(function(){
			$("#dates").datepicker();
			$("#dates2").datepicker();
		});
		$('#filter').click(function(){
			var dates=$('#dates').val();
			var dates2=$('#dates2').val();

			if(dates!= "" && dates2!= ""){
                  $.ajax({
                  	url:"filter.php",
                  	method:"POST",
                  	data:{dates:dates, dates2:dates2},
                  	success:function(data){
                  		$('#ordered_table').html(data);
                  	}
                  });
			}
			else{
				alert("Please Select Date");
			}
		});
	});
</script>
</body>
</html>
