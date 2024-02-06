<?php
session_start();
include_once "config.php";
$fname = mysqli_real_escape_string($conn, $_POST["fname"]);
$lname = mysqli_real_escape_string($conn, $_POST["lname"]);
$email = mysqli_real_escape_string($conn, $_POST["email"]);
$password = mysqli_real_escape_string($conn, $_POST["password"]);

if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {
    // checking if the user's email is valid or not
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) { //IF EMAIL IS VALID
        // Checking if the email already exist in the database or not
        $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");
        if (mysqli_num_rows($sql) > 0) { // if email already exists
            echo "$email - This email already exists!!";
        } else {
            //Checking if the user uploaded the file or not.
            if (isset($_FILES['image'])) { // If the user uploaded.
                $img_name = $_FILES['image']['name']; // Getting the user's uploaded image file. 
                $tmp_name = $_FILES['image']['tmp_name']; // Temporary name used to save/move the image in your folder.

                // Exploding the image and get the extension like jpg, png.
                $img_explode = explode('.', $img_name);
                $img_ext = end($img_explode); // here the user's selected image ext gotten.
                $extension = ['png', 'jpg', 'jpeg']; // These are valid extensions and we've to store them. 

                if (in_array($img_ext, $extension) === true) { // if the user selected the image ext within the array of ext.
                    $time = time(); // This will return to us the current time...
                    // We need this time because when uploading user img to our folder we rename user file with the current time
                    // so all the image file will have a unique name
                    // Moving the signed in user img to a particular folder
                    $new_img_name = $time . $img_name;
                    if (move_uploaded_file($tmp_name, "images/" . $new_img_name)) {
                        $status = "Active now"; // Once the user has signed in then the status becomes active
                        $random_id = rand(time(), 10000000); // Creating a random id for a user

                        // Inserting the user's data into a table
                        $sql2 = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status)
                                                VALUES ({$random_id}, '{$fname}', '{$lname}', '{$email}', '{$password}', '{$new_img_name}', '{$status}')");
                        if ($sql2) { // If the inserted data 
                            $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                            if (mysqli_num_rows($sql3) > 0) {
                                $row = mysqli_fetch_assoc($sql3);
                                $_SESSION['unique_id'] = $row['unique_id']; //using this session we used user unique_id in other php file
                                echo "Success";
                            }
                        } else {
                            echo "Something went wrong!";
                        }
                    }
                } else {
                    echo "Please select another image with ext of png, jpeg, jpg";
                }
            } else {
                echo "Please select your image file!";
            }
        }
    } else {
        echo "$email - This is not a valid email";
    }
} else {
    echo "All inputs must be filled!";
}
