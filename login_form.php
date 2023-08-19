<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'auth';

$con = mysqli_connect($host, $user, $pass, $dbname);
if (!$con) {
    die('Could not connect: ' . mysqli_connect_error());
}
// echo 'Connected successfully<br/>';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM auth WHERE username='$username'";
    $retval = mysqli_query($con, $sql);

    if (mysqli_num_rows($retval) > 0) {
        while ($row = mysqli_fetch_assoc($retval)) {
            if ($row['username'] == $username && $row['password'] == $password) {
                // echo "The user exists in the database";
                header("Location: ./home.php");
                exit;
            } else {
                echo "!!User not found in the system, Incorrect username or password.";

            }
        }
    } else {
        echo "0 Results";
    }
}
mysqli_close($con);


?>
