<?php
$con = mysqli_connect("localhost", "root", "");

if (!$con) {
    die('could not connect:' . mysqli_error($con));
}
echo 'connected successfully';

// The die() function prints a message and exists the current script. This function is an alias of the exit()

$sql = 'CREATE Database auth';
if (mysqli_query($con, $sql)) {
    echo "Database auth Created successfully";

} else {
    echo "Sorry, database creation failed" . mysqli_error($con);
}

$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'auth';

$con = mysqli_connect($host, $user, $pass, $dbname);
if (!$con) {
    die('Could not connect: ' . mysqli_connect_error());
}
echo 'Connected successfully<br/>';

$sql = "CREATE TABLE auth(id INT AUTO_INCREMENT, full_name VARCHAR(20) NOT NULL, username VARCHAR(20) NOT NULL, password VARCHAR(20) NOT NULL, primary key (id))";
if (mysqli_query($con, $sql)) {
    echo "Table user created Successfully";
} else {
    echo "Could not create table: " . mysqli_error($con);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST["name"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $sql = "INSERT INTO auth(full_name, username, password) VALUES ('$full_name', '$username', '$password')";
    if (mysqli_query($con, $sql)) {
        // echo "Record inserted successfully";
        header("Location: ./login_form.html");
        exit;
    } else {
        echo "Could not insert records" . mysqli_error($con);
    }

}
mysqli_close($con);

?>

