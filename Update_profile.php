<?php
session_start();

// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reefood_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle profile image upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["profile_image"])) {
    $target_dir = "profile_images/";
    $target_file = $target_dir . basename($_FILES["profile_image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["profile_image"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["profile_image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($_FILES["profile_image"]["error"] !== UPLOAD_ERR_OK) {
        echo "File upload failed with error code: " . $_FILES["profile_image"]["error"];
    }
    
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file)) {
            // File uploaded successfully, update database with image path
            $profile_image_path = $target_file;

            // Update user's profile image path in the database
            $sql = "UPDATE signup SET profile_image_path='$profile_image_path' WHERE id=" . $_SESSION['id'];

            if ($conn->query($sql) === TRUE) {
                echo "Profile image uploaded and updated successfully";
            } else {
                echo "Error updating profile image: " . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

$conn->close();
?>
