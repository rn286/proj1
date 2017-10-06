<?php
//Debugging - this part isn't working
//ini_set(varname:'diplay_errors', newvalue:'0');
//error_reporting(level:E_ALL);

$target_dir = "UPLOADS/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$CSVFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check if a file with the same name already exists
if (file_exists($target_file)) {
    echo "Failed, a file with the similar name already exists.";
    $uploadOk = 0;
}

// Added a constraint to allow only CSV files to be uploaded
if($CSVFileType != "csv" ) {
    echo "Only CSV files are permitted in this excercise. ";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Your file was not uploaded. Please try again.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>