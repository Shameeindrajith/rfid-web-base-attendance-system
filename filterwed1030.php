<?php 
if (isset($_POST["dates"])) {
	$connect=mysqli_connect("localhost","root","","iotproject");
	$output='';
	$query="
	SELECT * FROM wed1030 where date = '".$_POST["dates"]."'";
	$result = mysqli_query($connect,$query);
	$output.=
	"<table class='table table-bordered' id='exeltable'>
			<tr>
				<th width='30%'>ID</th>
				<th width='30%'>NAME</th>
				<th width='30%'>DATE</th>
			</tr>"
	;
	if (mysqli_num_rows($result)>0) {
		while ($row = mysqli_fetch_array($result)) {
			$output .= 
			"<tr>
			  <td>". $row["id"] ."</td>
			  <td>". $row["name"] ."</td>
			  <td>". $row["date"] ."</td>
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