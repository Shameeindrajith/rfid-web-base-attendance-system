<?php 
if (isset($_POST["dates"],$_POST["dates2"],$_POST["idnum"])) {
	$connect=mysqli_connect("localhost","root","","iotproject");
	$output='';
	
	$query="SELECT * FROM main WHERE datess BETWEEN '" . $_POST["dates"] . "' AND  '" . $_POST["dates2"] . "' AND id='".$_POST["idnum"]."'";
	$result = mysqli_query($connect,$query);
	$output.=
	"<table class='table table-bordered' id='exeltable'>
			<tr>
				<th width='25%'>ID</th>
				<th width='25%'>NAME</th>
				<th width='25%'>DATE</th>
				<th width='25%'>TIME</th>
			</tr>"
	;
	if (mysqli_num_rows($result)>0) {
		while ($row = mysqli_fetch_array($result)) {
			$output .= 
			"<tr>
			  <td>". $row["id"] ."</td>
			  <td>". $row["name"] ."</td>
			  <td>". $row["datess"] ."</td>
			  <td>". $row["time"] ."</td>
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