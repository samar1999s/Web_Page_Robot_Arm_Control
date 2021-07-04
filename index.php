<?php

ini_set ('display_errors', 1);
error_reporting (E_ALL & ~E_NOTICE);

$dbc=mysqli_connect('localhost', 'root', '');

mysqli_query($dbc,'CREATE DATABASE task;');
mysqli_select_db($dbc, 'task');

$query = 'CREATE TABLE IF NOT EXISTS Motor(ID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, motor1 INT, motor2 INT , motor3 INT , motor4 INT , motor5 INT , motor6 INT );';
mysqli_query($dbc, $query);

	$n1 = $_POST['n1'];
	$n2 = $_POST['n2'];
	$n3 = $_POST['n3'];
	$n4 = $_POST['n4'];
	$n5 = $_POST['n5'];
	$n6 = $_POST['n6'];
	
	if (isset($_POST['save'])) {
		$query = "INSERT INTO Motor(motor1, motor2, motor3, motor4,motor5,motor6) VALUES ('$n1','$n2','$n3','$n4','$n5','$n6');";
		if (mysqli_query($dbc, $query)) {
			echo "Updated";
		} else {
			echo "<br>" . mysqli_error($dbc);
		}
		header('location: index.html');
	}
	
	//mysqli_close($dbc);

/////////////////////////////////////////
$query1 = 'CREATE TABLE IF NOT EXISTS Motor_on(ID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,M_on VARCHAR(10));';
mysqli_query($dbc, $query1);

      if (isset($_POST['on'])) {

		$query = "INSERT INTO Motor_on(M_on) VALUES ('on');";
		if (mysqli_query($dbc, $query)) {
			echo "Updated";
		} else {
			echo "<br>" . mysqli_error($dbc);
		}
		header('location: index.html');
	}
	mysqli_close($dbc);
?>

<?php
session_start();
ini_set ('display_errors', 1);
error_reporting (E_ALL & ~E_NOTICE);

$dbc=mysqli_connect('localhost', 'root', '');
@mysqli_select_db($dbc, 'task');

$query = 'CREATE TABLE IF NOT EXISTS DirectioneB (ID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,forwardB VARCHAR(10), leftB VARCHAR(10) , stopB VARCHAR(10) , rightB VARCHAR(10), backwardB VARCHAR(10) );';
mysqli_query($dbc, $query);


$sql = "SELECT * FROM DirectioneB;";
$result = mysqli_query($dbc, $sql);

if (mysqli_num_rows($result) != 0) {

	if (isset($_POST['left'])) {
		$query = "UPDATE DirectioneB SET leftB = 'l';";
		if (mysqli_query($dbc, $query)) {
			echo "Updated";
		} else {
			echo "<br>" . mysqli_error($dbc);
		}
        
        $query = "SELECT * FROM DirectioneB ;";
        $result = mysqli_query($dbc, $query);

    while($row = mysqli_fetch_row($result)) {
    
        $_SESSION['D']= $row[2];
}
		header('location: display.php');
	}

	else if (isset($_POST['stop'])) {
		$query = "UPDATE DirectioneB SET stopB= 's';";
		if (mysqli_query($dbc, $query)) {
			echo "Updated";
		} else {
			echo "<br>" . mysqli_error($dbc);
		}

        $query = "SELECT * FROM DirectioneB ;";
        $result = mysqli_query($dbc, $query);

    while($row = mysqli_fetch_row($result)) {
    
        $_SESSION['D']= $row[3];
}
		header('location: display.php');
	
	}

	else if (isset($_POST['right'])) {
		$query = "UPDATE DirectioneB SET rightB= 'r';";
		if (mysqli_query($dbc, $query)) {
			echo "Updated";
		} else {
			echo "<br>" . mysqli_error($dbc);
		}
		
        $query = "SELECT * FROM DirectioneB ;";
        $result = mysqli_query($dbc, $query);

    while($row = mysqli_fetch_row($result)) {
    
        $_SESSION['D']= $row[4];
}
		header('location: display.php');
		
	}

	else if (isset($_POST['forward'])) {
		$query = "UPDATE DirectioneB SET forwardB= 'f';";
		if (mysqli_query($dbc, $query)) {
			echo "Updated";
		} else {
			echo "<br>" . mysqli_error($dbc);
		}  
		
        $query = "SELECT * FROM DirectioneB ;";
        $result = mysqli_query($dbc, $query);

    while($row = mysqli_fetch_row($result)) {
    
        $_SESSION['D']= $row[1];
}
		header('location: display.php');
		
	}

	else if (isset($_POST['backward'])) {
		$query = "UPDATE DirectioneB SET backwardB= 'b';";
		if (mysqli_query($dbc, $query)) {
			echo "Updated";
		} else {
			echo "<br>" . mysqli_error($dbc);
		}
		
        $query = "SELECT * FROM DirectioneB ;";
        $result = mysqli_query($dbc, $query);

    while($row = mysqli_fetch_row($result)) {
    
        $_SESSION['D']= $row[5];
}
		header('location: display.php');
		
	}
}

	else{

		$query = "INSERT INTO directioneb(forwardB, leftB, stopB, rightB,backwardB) VALUES ( '0', '0', '0','0', '0');";
	mysqli_query($dbc, $query);

	}
	
	//mysqli_close($dbc);
?>