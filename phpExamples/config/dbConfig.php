<?php
$hn = 'localhost';
$un = 'student_admin';
$pw = 'xzg0ht-XQp!iWlty';
$db = 'my_clyde';

$conn = mysqli_connect($hn, $un, $pw, $db);
if (!$conn){
    die('Connection Failed: ' . mysqli_connect_error());
}