<?php
    include("dbconnect.php");

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users where username = '$username' and password = '$password'";

        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array ($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        if($count == 1)
        {
            // Start session
            session_start();

            // Store user information in session variables
            $_SESSION['firstname'] = $row['firstname'];
            $_SESSION['lastname'] = $row['lastname'];
            $_SESSION['age'] = $row['age'];
            $_SESSION['address'] = $row['address'];

            // Redirect to home.php
            header("Location: home.php");
        }
        else{
            echo '<script>
            alert("Login Failed. Invalid username or password!!!");
            window.location.href = "index.php";
            </script>';
        }
    }
?>
