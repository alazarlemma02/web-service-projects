<?php
$con = mysqli_connect("localhost", "root", "");

if (!$con) {
    die('could not connect:' . mysqli_error($con));
}
echo 'connected successfully';

// The die() function prints a message and exists the current script. This function is an alias of the exit()

$sql = 'CREATE Database user';
if (mysqli_query($con, $sql)) {
    echo "Database user Created successfully";

} else {
    echo "Sorry, database creation failed" . mysqli_error($con);
}

// I have commented the above code because the database is created only once.
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'user';

$con = mysqli_connect($host, $user, $pass, $dbname);
if (!$con) {
    die('Could not connect: ' . mysqli_connect_error());
}
// echo 'Connected successfully<br/>';
// $sql = "DROP table user";
// mysqli_query($con, $sql);
$sql = "CREATE TABLE user(id INT AUTO_INCREMENT, first_name VARCHAR(20) NOT NULL, last_name VARCHAR(20) NOT NULL, date_of_birth VARCHAR(20) NOT NULL, gender VARCHAR(20) NOT NULL, city VARCHAR(20) NOT NULL, nationality VARCHAR(20) NOT NULL,martial_status VARCHAR(20) NOT NULL, primary key (id))";
if (mysqli_query($con, $sql)) {
    echo "Table user created Successfully";
} else {
    echo "Could not create table: " . mysqli_error($con);
}
// I have commented the above code because the table is created only once.


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST["first-name"];
    $last_name = $_POST["last-name"];
    $date_of_birth = $_POST["date-of-birth"];
    $gender = $_POST["gender"];
    $city = $_POST["city"];
    $nationality = $_POST["nationality"];
    $martial_status = $_POST["martial-status"];
    $sql = "INSERT INTO user(first_name, last_name, date_of_birth, gender, city, nationality, martial_status) VALUES ('$first_name', '$last_name', '$date_of_birth', '$gender', '$city', '$nationality','$martial_status')";
    if (mysqli_query($con, $sql)) {
        echo "Record inserted successfully";
    } else {
        echo "Could not insert records" . mysqli_error($con);
    }

}

// update a user's specific data

$date_of_birth = "2002-08-16";
$sql = "UPDATE user set date_of_birth=\"$date_of_birth\" where id=1";
if (mysqli_query($con, $sql)) {
    echo "Record udpated successfully";
} else {
    echo "Could not update records" . mysqli_error($con);
}


// remove a specific user's data

$sql = 'DELETE FROM user where id=2';
if (mysqli_query($con, $sql)) {
    echo "Record Deleted successfully";
} else {
    echo "Could not delete records" . mysqli_error($con);
}


// select or read
$sql = 'SELECT * FROM user WHERE id=1';
$retval = mysqli_query($con, $sql);

if (mysqli_num_rows($retval) > 0) {
    while ($row = mysqli_fetch_assoc($retval)) {
        echo "user ID: " . $row['id'] . "<br/>";
        echo "user Full Name: " . $row['first_name'] . " " . $row['last_name'] . "<br/>";
        echo "user gender: " . $row['gender'] . "<br/>";
        echo "user Date of Birth: " . $row['date_of_birth'] . "<br/>";
        echo "user City: " . $row['city'] . "<br/>";
        echo "user Nationality: " . $row['nationality'] . "<br/>";
        echo "user Martial Status: " . $row['martial_status'] . "<br/>";

    }
} else {
    echo "0 Results";
}
mysqli_close($con);
// ?>
