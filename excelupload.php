<?php
include 'connect.php';

?>

<!DOCTYPE html>
<html>

<head>
	<title>Upload an Excel </title>

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	</head>
</head>

<body>
	<div class="container mt-5">
		<center><table>
			<tr>
				<td>
					<form action="#" method="POST" enctype="multipart/form-data">
						<input type="file" name="excel">
						<input type="submit" name="submit">
					</form>
				</td>
			</tr>
			<tr>
				<td>
					<br/>
					<center><button class="btn btn-dark"><a href="exceldisplay.php" class="text-light">view table</a> </button></center>
				</td>
			</tr>
		</table></center>

		<br />


		<?php
		if (isset($_FILES['excel']['name'])) {
			$con = mysqli_connect("localhost", "root", "", "crudoperation");
			include "xlsx.php";
			if ($con) {
				$excel = SimpleXLSX::parse($_FILES['excel']['tmp_name']);
				//echo "<pre>";	
				// print_r($excel->rows(1));
				//print_r($excel->dimension(2));
				//print_r($excel->sheetNames());
				for ($sheet = 0; $sheet < sizeof($excel->sheetNames()); $sheet++) {
					$rowcol = $excel->dimension($sheet);
					$i = 0;
					if ($rowcol[0] != 1 && $rowcol[1] != 1) {
						foreach ($excel->rows($sheet) as $key => $row) {
							//print_r($row);
							$q = "";
							foreach ($row as $key => $cell) {
								//print_r($cell);echo "<br>";
								if ($i == 0) {
									$q .= $cell . " varchar(50),";
								} else {
									$q .= "'" . $cell . "',";
								}
							}
							if ($i == 0) {
								$query = "CREATE table " . $excel->sheetName($sheet) . " (" . rtrim($q, ",") . ");";
							} else {
								$query = "INSERT INTO " . $excel->sheetName($sheet) . " values (" . rtrim($q, ",") . ");";
							}
							//echo $query;
							$output = mysqli_query($con, $query);
							$i++;
						}
					}
				}
				if ($output) {
					echo "Insert Success";
				} else {
					echo "Insert Fail";
				}
			}
		}

		?>
	</div>
</body>

</html>