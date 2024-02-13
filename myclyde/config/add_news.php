<?php
session_start();

    include 'dbConfig.php';
    
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $targetDir = "../assets/images/news/";
        $uploadedFile = $targetDir . basename($_FILES["img_path"]["name"]);
        $uploadedDir = basename($_FILES["img_path"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($uploadedFile, PATHINFO_EXTENSION));
        $msg = '';
        // Check if file already exists
        if (file_exists($uploadedFile)) {
            $msg = "Sorry, file already exists.";
            $uploadOk = 0;
            header("Location: ../addNews?msg=$msg"); // Redirect back to the accpunt page
            exit();
        }
    
        // Check file size (limit to 2MB)
        if ($_FILES["img_path"]["size"] > 2 * 1024 * 1024) {
            $msg = "Sorry, your file is too large.";
            $uploadOk = 0;
            header("Location: ../addNews?msg=$msg"); // Redirect back to the accpunt page
            exit();

        }
    
        // Allow only certain file formats
        $allowedFormats = array("jpg", "jpeg", "png", "gif", "pdf");
        if (!in_array($imageFileType, $allowedFormats)) {
            $msg = "Sorry, only JPG, JPEG, PNG, GIF, and PDF files are allowed.";
            $uploadOk = 0;
            header("Location: ../addNews?msg=$msg"); // Redirect back to the accpunt page
            exit();

        }
    
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $msg = "Sorry, your file was not uploaded.";
            header("Location: ../addNews?msg=$msg"); // Redirect back to the accpunt page
            exit();

        } else {
            // Move the file to the target directory
            if (move_uploaded_file($_FILES["img_path"]["tmp_name"], $uploadedFile)) {
                // Save file path in the database
                include 'dbConfig.php'; // Include your database configuration file
    
                $uid = $_SESSION['student_num'];
                $imgPath = $uploadedDir;
    
                // Update the 'img_path' column in the 'users' table for the specific user
              
                $updateQuery = $conn->prepare("INSERT INTO news (title, description, img_path, added_by, added_on) VALUES(?, ?, ?, ?, NOW() );");
                $updateQuery->bind_param('ssss', $_POST['title'], $_POST['description'], $imgPath, $_POST['added_by']);
   
    


                if ($updateQuery->execute()) {
                    $msg = "Your profile picture has been successfully uploaded";
                    header("Location: ../news?msg=$msg"); // Redirect back to the accpunt page
                    exit();

                } else {
                    $msg =  "Sorry, there was an error updating the database.";
                    header("Location: ../addNews?msg=$msg "); // Redirect back to the accpunt page
                    exit();

                }
    
                $updateQuery->close();
                $conn->close();
            } else {
                $msg = "Sorry, there was an error uploading your file.";
                header("Location: ../addNews?msg=$msg"); // Redirect back to the accpunt page
                exit();

            }

        }

    }

