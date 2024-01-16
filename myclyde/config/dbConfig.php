<?php
$hn = 'localhost';
$un = 'student_admin';
$pw = 'fAy(zy@[td14*-1!';
$db = 'my_clyde';

$conn = mysqli_connect($hn, $un, $pw, $db);
if (!$conn){
    die('Connection Failed: ' . mysqli_connect_error());
}