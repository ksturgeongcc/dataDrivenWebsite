<?php
$studentNum = $_SESSION['student_num'];
$admin = $conn->prepare("SELECT
firstname,
surname
from student
WHERE student_num = $studentNum

");
$admin->execute();
$admin->store_result();
$admin->bind_result($firstname, $surname);
$admin->fetch();