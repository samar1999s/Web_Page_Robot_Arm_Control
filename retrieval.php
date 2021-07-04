<?php

ini_set ('display_errors', 1);
error_reporting (E_ALL & ~E_NOTICE);

$dbc=mysqli_connect('localhost', 'root', '');
@mysqli_select_db($dbc, 'task1');

$query = "SELECT * FROM Motor ORDER BY ID DESC LIMIT 1;";
$result = mysqli_query($dbc, $query);

echo "<br>";

echo "<table border='1'>";
while($row = mysqli_fetch_row($result)) {
    echo "<tr><td>ID</td><td>motor1</td><td>motor2</td><td>motor3</td><td>motor4</td><td>motor5</td><td>motor6</td></tr> 
    <tr><td> $row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td></tr>";  

}
echo "</table>";

echo "<br>";

$query = "SELECT * FROM Motor_on ORDER BY ID DESC LIMIT 1;";
$result = mysqli_query($dbc, $query);


echo "<br>";

echo "<table border='1'>";
while($row = mysqli_fetch_row($result)) {
    echo "<tr><td>ID</td><td>motor on</td></tr>
    <tr><td>$row[0]</td><td>$row[1]</td></tr>";  

}
echo "</table>";

?>