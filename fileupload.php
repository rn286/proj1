
<?php
// Version 3
//Project 1 part 2: 
//This will perform multiple actions after the submit button is pushed
//on index.php. Once the 3 checks are verified it will forward to the render.php
//page based on the header info. If any of the checks fail it will return back to
//index.php with an error in the heading. 

ini_set('display_errors','1');  // Ask the Prof if this should be 1
error_reporting(E_ALL);

//Function called to send user back to try again 
function send_user_back() {
	echo 'There was an error uploading your file. <a href="https://web.njit.edu/~rn286/proj1/">Click here to try again</a>';
    exit;
}

$target_dir = "./UPLOADS/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

// Check #1 does a file with the same name already exists
if (file_exists($target_file)) {
   send_user_back();
}

// Check #2 Only allow CSV files to be uploaded
$file_type = pathinfo($target_file, PATHINFO_EXTENSION);
if($file_type != "csv" ) {
   send_user_back();
}

// Check #3 If move is ok then move from temp > UPLOADS
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		  header('location: printrender.php');
	} else {
        send_user_back();
 }	
	
?>

