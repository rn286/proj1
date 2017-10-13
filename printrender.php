<html>
<!-- Version 4. Deployed to AFS server -->
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

	tr {
		font-family: "Courier New", Courier, monospace;	
		}
</style>
</head>
<body>
<?php
$filename = $_REQUEST['filename'];
echo "<h1>CSV Print Results</h1>";
echo "<html><body><table>\n\n";
$f = fopen("$filename", "r");
while (($line = fgetcsv($f)) !== false) {
        echo "<tr>";
        foreach ($line as $cell) {
                echo "<td>" . htmlspecialchars($cell) . "</td>";
        }
        echo "</tr>";
}
fclose($f);
echo "\n</table></body></html>";
echo "<h3>The end</h3>";

?>
</body>
</html>