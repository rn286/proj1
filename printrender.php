<html>
<!-- Version 4.1. header format added - Deployed to AFS server -->
<head>

<title>CSV File Upload/Print Project</title>
<style>
	      
	h1 {
		font-family: "Courier New", Courier, monospace;
		background-color: #E6E6FA;
		}

	h3 {
		font-family: "Courier New", Courier, monospace;
		}

	table, td {
		border: 1px solid black;
		border-collapse: collapse;
		padding: 10px;
		}
	th {
		background-color:#000;color:white;
		border: 1px solid black;
		border-color:#FFFFFF;
		padding: 10px;
	}
	tr {
		font-family: "Courier New", Courier, monospace;	
		}
</style>
</head>
<body>
<?php
$filename = $_REQUEST['filename'];
echo "<h1>CSV Print Results</h1>";

    $f = fopen("$filename", "r");  
    if ($f && ($line = fgetcsv ($f))) { 
        $dom = new DOMDocument(); 
        $table = $dom->appendChild ($dom->createElement ('table')); 
        $tr = $table->appendChild ($dom->createElement ('tr')); 
        
		foreach ($line as $value) $tr->appendChild ($dom->createElement ('th'))->appendChild ($dom->createTextNode ($value)); 
        while ($line = fgetcsv($f)) { 
            $tr = $table->appendChild ($dom->createElement ('tr')); 
            foreach ($line as $value) $tr->appendChild ($dom->createElement ('td'))->appendChild ($value == null ? $dom->createEntityReference ('nbsp') : $dom->createTextNode ($value)); 
        } 
        $dom->formatOutput = true; 
        echo $dom->saveHTML(); 
    } 
  echo "<h3>The end</h3>";   

?>
</body>
</html>