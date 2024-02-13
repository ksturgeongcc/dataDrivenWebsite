<?php
$totalStudents = $conn->prepare("SELECT
count(student_num)
from student


");
$totalStudents->execute();
$totalStudents->store_result();
$totalStudents->bind_result($total);
$totalStudents->fetch();