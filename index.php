
<!DOCTYPE html>
<html>
<head>

<title>CSV File Upload/Print Project</title>
<style>

    body { 

          background-color: #E6E6FA
    }
	div.error {
		  background-color: pink;
		  color: red;
		  padding: 20px;

	}
    div.heading {
		  height:150px;
		  padding: 20px;
		  width: 33.58%;
		  background-color: DarkCyan;
    }

	h1 {
		font-family: "Courier New", Courier, monospace;
    }
	
	h2 {
		font-family: "Courier New", Courier, monospace;
	}	
	
	h3 {
		font-family: "Courier New", Courier, monospace;
	}
	
	tr.box {
			width: 400px;
			background-color: white;
    }

	
</style>
</head>
v2
<?php
If (isset($_GET[“error”])) {
	echo '<div class=”error”>There was an error. Please try again.</div>'; //reminder - I need to test this still 10.9.2017
	//echo "There was an error"; //plan b if above div class doesn't work. 
	}
?>

<body>

<div class=”heading”>
    <h1>Project #1: File Upload and Print</h1>
    <h2>Task #1: File Upload</h2>
</div>

<table>
<tr class="box">
    <td>
		<img src="csvimage.png" height="100" width="100"/>
	</td>
    <td>
		<form action="fileupload.php" method="post" enctype="multipart/form-data">
        <b>Select your <u>CSV</u> file to upload:</b>
        <input type="file" name="fileToUpload" />
        <input type="submit" value="Upload file"/>
		</form>
	</td>
</tr>
</table>

<br>
<h3>Only CSV files are permitted</h3>
<hr>
</body>
</html>