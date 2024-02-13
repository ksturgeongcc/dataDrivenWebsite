<?php
$emptyCourse = $conn->prepare("SELECT
count(student_num)
from student
where fk_course IS NULL


");
$emptyCourse->execute();
$emptyCourse->store_result();
$emptyCourse->bind_result($noCourse);
$emptyCourse->fetch();