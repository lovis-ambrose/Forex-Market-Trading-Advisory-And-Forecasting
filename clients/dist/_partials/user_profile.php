<?php
session_start();

// Establish the database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "forex";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Perform database operations
$query = "SELECT * FROM f_clients WHERE f_id = ?";
$stmt = mysqli_prepare($conn, $query);

if ($stmt) {
    $f_id = $_SESSION['f_id'];
    mysqli_stmt_bind_param($stmt, "s", $f_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Fetch the user profile information
    $userData = mysqli_fetch_assoc($result);

    // Close the statement
    mysqli_stmt_close($stmt);
} else {
    die("Statement preparation failed: " . mysqli_error($conn));
}

// Close the connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
    <!-- styling the pop up -->
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
        }
        
        html {
            box-sizing: border-box;
        }
        
        .head {
            text-align: center;
            margin-top: 70px;
        }

        .popup {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
        }

        .form-container {
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 20px;
        }

        .popup label {
            display: inline-block;
            width: 100px;
            margin-bottom: 10px;
        }

        .popup input select {
            margin-bottom: 10px;
        }

        .popup input[type="submit"] {
            margin-top: 10px;
        }
        .popup .btn {
            margin-left: 50px;
        }
        @media screen and (max-width: 650px) {
            .column {
            width: 100%;
            display: block;
            }
        }
    </style>


    <!-- script for confirmation -->
    <script>
        function confirmUpdate() {
            var confirmed = confirm("Are you sure you want to update your profile?");

            if (confirmed) {
                // User confirmed, submit the form
                return true;
            } else {
                // User canceled, prevent the form submission
                return false;
            }
        }
    </script>
</head>
<body>
    <h1 class="head">Update Your Profile</h1>
    <div class="popup">
        <div class="form-container">
            <form method="post" action="update_profile.php" onsubmit="return confirmUpdate();">
                <label>First Name:</label>
                <input type="text" name="fname" value="<?php echo $userData['fname']; ?>"><br>

                <label>Last Name:</label>
                <input type="text" name="lname" value="<?php echo $userData['lname']; ?>"><br>

                <label>Email:</label>
                <input type="email" name="email" value="<?php echo $userData['email']; ?>"><br>

                <label>Gender:</label>
                <select name="gender" id="gender">
                    <option value=""><?php echo $userData['gender']; ?></option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>

                <input class="btn" type="submit" value="Update">
            </form>
        </div>
    </div>
</body>
</html>
