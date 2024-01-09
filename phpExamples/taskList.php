<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
    </style>
</head>
<body>

<h2>Task Manager</h2>

<?php
// Include the database connection file
include('db.php');

// Fetch tasks from the database
$query = "SELECT * FROM tasks";
$result = mysqli_query($conn, $query);
?>

<!-- Display tasks -->
<ul>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <li>
            <?php echo $row['task_name']; ?>
            <?php if ($row['status'] == 0): ?>
                <a href="mark_complete.php?id=<?php echo $row['id']; ?>">Mark as Complete</a>
            <?php else: ?>
                <span style="color: green;">(Completed)</span>
            <?php endif; ?>
        </li>
    <?php endwhile; ?>
</ul>

<!-- Link to add a new task -->
<a href="add_task.php">Add New Task</a>

</body>
</html>
