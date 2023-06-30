<?php
session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Establish the database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "forex";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Retrieve the submitted form data
    $f_id = $_SESSION['f_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];

    // Prepare the update statement
    $query = "UPDATE f_clients SET fname = ?, lname = ?, gender = ?, email = ? WHERE f_id = ?";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        // Bind the parameters and execute the statement
        mysqli_stmt_bind_param($stmt, "sssss", $fname, $lname, $gender, $email, $f_id);
        mysqli_stmt_execute($stmt);

        // Check if any rows were affected
        if (mysqli_stmt_affected_rows($stmt) > 0) {
            echo "Profile updated successfully!";
        } else {
            echo "No changes were made to the profile.";
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        die("Statement preparation failed: " . mysqli_error($conn));
    }

    // Close the connection
    mysqli_close($conn);

    // Redirect after 3 seconds using JavaScript
    echo '<script>
        setTimeout(function() {
            window.top.location.href = "http://localhost/FinalTest/clients/edit_profile.php";
        }, 2000); // 3000 milliseconds = 3 seconds
    </script>';
}
?>
