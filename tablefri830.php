<?php
$connect=mysqli_connect("localhost","root","","iotproject");
$query="SELECT * from fri830 ORDER BY id desc";
$result=mysqli_query($connect,$query);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Search Student atendence</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
           <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">  


   <!-- exel open -->
   <script type="text/javascript">
function exportToExcel(exeltable, filename = ''){
    var downloadurl;
    var dataFileType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(exeltable);
    var tableHTMLData = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'export_excel_data.xls';
    
    // Create download link element
    downloadurl = document.createElement("a");
    
    document.body.appendChild(downloadurl);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTMLData], {
            type: dataFileType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadurl.href = 'data:' + dataFileType + ', ' + tableHTMLData;
    
        // Setting the file name
        downloadurl.download = filename;
        
        //triggering the function
        downloadurl.click();
    }
}
 
</script>
   <!-- exel closed -->
      
</head>
<body>
<br /><br />
<div class="container" style="width:900px;">
	<h2 align="center">Search Student atendence</h2>
	<h3 align="center">Enter date</h3><br />
	<div class="col-md-3">
		<input type="text" name="dates" id="dates" class="form-control" placeholder="date" />
	</div><!-- col-md-3 -->

	<!-- <div class="col-md-3">
		<input type="text" name="dates2" id="dates2" class="form-control" placeholder="date" />
	</div> --><!-- col-md-3 -->

	<div class="col-md-5">
		<input type="button" name="filter" id="filter" value="filter" class="btn " />
	</div><!-- col-md-5 -->
	<div style="clear: both;"></div>
	<br />
	<div id="ordered_table">
		<table class="table table-bordered" id="exeltable">
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
				<td><?php echo $row["date"]; ?></td>
			</tr>
		<?php	
		}
		?>	
		</table>
	</div><!-- ordered_table -->
	<button onclick="exportToExcel('exeltable')" class="btn btn-success">Export Table Data To Excel File</button>
</div><!-- container -->


</body>
</html>

<script>
	$(document).ready(function(){
		$.datepicker.setDefaults({
			dateFormat:'yy-mm-dd'
		});
		$(function(){
			$("#dates").datepicker();
			// $("#dates2").datepicker();
		});
		$('#filter').click(function(){
			var dates=$('#dates').val();
			// var dates2=$('#dates2').val();
			if(dates!= "" ){


                  $.ajax({
                  	url:"filterfri830.php",
                  	method:"POST",
                  	data:{dates:dates},
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
