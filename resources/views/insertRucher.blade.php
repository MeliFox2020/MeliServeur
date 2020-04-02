<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "mdpsnir", "Melifox2020");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Escape user inputs for security
$nom = mysqli_real_escape_string($link, $_REQUEST['nom']);
$longitude = mysqli_real_escape_string($link, $_REQUEST['lon']);
$lattitude = mysqli_real_escape_string($link, $_REQUEST['lat']);

// Attempt insert query execution
$sql = "INSERT INTO Ruchers (nom, longitude, lattitude) VALUES ('$nom', '$longitude', '$lattitude')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
?>
<html>
<head>
<title>Redirection en HTML</title>

<meta http-equiv="refresh" content="5; URL=carte">
</head>

<body>
</body>

</html>
