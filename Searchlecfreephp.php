<?php 
if (isset($_POST["dates"],$_POST["dates2"])) {
	$connect=mysqli_connect("localhost","root","","iotproject");
	$output='';
	
	$query="SELECT * FROM lecfree WHERE date BETWEEN '" . $_POST["dates"] . "' AND  '" . $_POST["dates2"] . "' ";
	$result = mysqli_query($connect,$query);
	$output.=
	"<table class='table table-bordered' id='exeltable'>
			<tr>
				<th width='20%'>NAME</th>
				<th width='20%'>ID</th>
				<th width='20%'>DATE</th>
				<th width='20%'>TIME</th>
				<th width='20%'>REASON</th>
			</tr>"
	;
	if (mysqli_num_rows($result)>0) {
		while ($row = mysqli_fetch_array($result)) {
			$output .= 
			"<tr>
			  <td>". $row["name"] ."</td>
			  <td>". $row["id"] ."</td>
			  <td>". $row["date"] ."</td>
			  <td>". $row["time"] ."</td>
			  <td>". $row["reason"] ."</td>
			</tr>"
			;
		}
		
	}
	else{
		$output .='
             <tr>
                <td colspan="3">No Date Found</td>
             </tr>
		';
	}

	$output .='</table>';
	echo $output;

}

?>