<?php
$nameP = $_GET['name'];
$password = $_GET['password'];
$content = $_GET['content'];
$type = $_GET['type'];
$servername = "";
$username = "";
$dbpassword = "";
$dbname = "";
$result4 = '';

$conn = new mysqli($servername, $username, $dbpassword, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($type == 'write') {
    $sql2 = "SELECT * FROM ChatDB WHERE `Name`='" . $nameP . "'";
    $result = $conn->query($sql2);
    if ($result->num_rows > 0) {
    $sql = "UPDATE ChatDB SET `LiveChat` = '". $content ."' WHERE `Name`='" . $nameP . "' AND `Password`='" . $password . "'";
      if($conn->query($sql)) {
         $result4 = 'Success';
} else {
      $result4 = 'Error: ' . $sql . ' ' . $conn->error;
}
} else {
      $sql = "INSERT INTO ChatDB (`Name`, `Password`, `LiveChat`) VALUES ('".$nameP."','".$password."','".$content."')";
      if($conn->query($sql)) {
      $result4 = 'Success';
} else {
       $result4 = 'Error: ' . $sql . ' ' . $conn->error;
}
}
} else if ($type == 'read'){
    $result = $conn->prepare("SELECT LiveChat FROM ChatDB WHERE `Name` = ?");
    $result->bind_param("s", $nameP);
    $result->execute();
    $result->store_result();
    $result->bind_result($cont);
    $result->fetch();
    $result->close();
    $result4 = $cont;
} else if ($type == 'name') {
    $result = $conn->query("SELECT `Name` FROM ChatDB");
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $result4 .= (" " . $row['Name']);
}
}
}
echo $result4;
$conn->close();