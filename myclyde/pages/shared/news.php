<?php
include '../../config/dbConfig.php';
include '../../partials/header.php';
include '../../partials/navigation.php';
$admin = $_SESSION['admin'];
$news = $conn->prepare("SELECT
news_id,
title,
description,
added_on

from news
");
$news->execute();
$news->store_result();
$news->bind_result($news_id, $title, $description, $added);

        



?>
<h1 class="w-full flex justify-center mt-5">News</h1>
<!-- component -->
<link rel="stylesheet" href="https://cdn.tailgrids.com/tailgrids-fallback.css" />



<?php
    include '../../partials/footer.php';
?>