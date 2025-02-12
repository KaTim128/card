<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'card';
session_start();

// Create connection (without specifying database)
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);

// Check connection
if (!$conn) {
    die('Could not connect to MySQL: ' . mysqli_connect_error());
}

// Create the database 'bookstore_db' if it doesn't exist
$sql_create_db = "CREATE DATABASE IF NOT EXISTS $dbname";
$result = mysqli_query($conn, $sql_create_db);

if (!$result) {
    die("Error creating database: " . mysqli_error($conn));
}

// Close the connection without selecting database
mysqli_close($conn);

// Reconnect to MySQL with the specified database
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Check connection again
if (!$conn) {
    die('Could not connect to MySQL: ' . mysqli_connect_error());
}

// Create the database 'bookstore_db' if it doesn't exist
$sql_create_db = "CREATE DATABASE IF NOT EXISTS $dbname";
$result = mysqli_query($conn, $sql_create_db);

if (!$result) {
    die("Error creating database: " . mysqli_error($conn));
}
mysqli_close($conn);

// Reconnect to MySQL with the specified database
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$conn) {
    die('Could not connect to MySQL: ' . mysqli_connect_error());
}

$sql_morning = "CREATE TABLE IF NOT EXISTS morning (
    morning_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    morning_name TEXT,
    morning_image TEXT
)";

$retval = mysqli_query($conn, $sql_morning);
if (!$retval) {
    die('Could not create table morning: ' . mysqli_error($conn));
}

$sql_afternoon = "CREATE TABLE IF NOT EXISTS afternoon (
    afternoon_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    afternoon_name TEXT,
    afternoon_image TEXT
)";

$retval = mysqli_query($conn, $sql_afternoon);
if (!$retval) {
    die('Could not create table afternoon: ' . mysqli_error($conn));
}

$sql_night = "CREATE TABLE IF NOT EXISTS night (
    night_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    night_name TEXT,
    night_image TEXT
)";

$retval = mysqli_query($conn, $sql_night);
if (!$retval) {
    die('Could not create table night: ' . mysqli_error($conn));
}


$sql_plans = "CREATE TABLE IF NOT EXISTS plans (
    plan_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    morning_id INT,
    afternoon_id INT,
    night_id INT,
    morning_start_time TIME NULL,
    morning_end_time TIME NULL,
    afternoon_start_time TIME NULL,
    afternoon_end_time TIME NULL,
    night_start_time TIME NULL,
    night_end_time TIME NULL
)";


$retval = mysqli_query($conn, $sql_plans);
if (!$retval) {
    die('Could not create table plans: ' . mysqli_error($conn));
}


// INSERT INTO morning (morning_name, morning_image) VALUES
// ('Badminton', '222.jpg'),
// ('Shopping Mall', 'sunway.jpg'),
// ('Dessert', 'meal.jpg'),
// ('Karaoke', 'karaoke.jpg'),
// ('Breakfast', 'breakfast.jpg'),
// ('Picnic', 'picnic.jpg'),
// ('Hiking', 'hiking.jpg'),
// ('Cafe hopping', 'cafe.jpg'),
// ('Gaming','game.jpg'),
// ('Bowling', 'bowling.jpg');

// INSERT INTO afternoon (afternoon_name, afternoon_image) VALUES
// ('Badminton', '222.jpg'),
// ('Shopping Mall', 'sunway.jpg'),
// ('Dinner', 'dinner.jpg'),
// ('Dessert', 'meal.jpg'),
// ('Gaming','game.jpg'),
// ('Lunch', 'lunch.jpg'),
// ('Movie', 'cinema.jpg'),
// ('Karaoke', 'karaoke.jpg'),
// ('Bowling', 'bowling.jpg');

// INSERT INTO night (night_name, night_image) VALUES
// ('Badminton', '222.jpg'),
// ('Shopping Mall', 'sunway.jpg'),
// ('Gaming','game.jpg'),
// ('Dinner', 'dinner.jpg'),
// ('Dessert', 'meal.jpg'),
// ('Karaoke', 'karaoke.jpg'),
// ('Movie', 'cinema.jpg'),
// ('Bowling', 'bowling.jpg');


?>