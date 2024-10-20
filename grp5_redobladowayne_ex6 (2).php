<?php
  header("Access-Control-Allow-Origin: *");
  
  $db_host = '127.0.0.1';
  $db_username = 'root';
  $db_password = 'root';
  $db_name = 'db_admin';

  
  $conn = new mysqli($db_host, $db_username, $db_password, $db_name);

  
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }


  $username = $_POST['username'];
  $password = $_POST['password'];

  
  $query = "SELECT * FROM tbl_admin WHERE username = '$username' AND password = '$password'";
  $result = $conn->query($query);

  if ($result->num_rows > 0) {
    setcookie('logged_in', 'true', time() + 3600);
    echo "Login successful!";

    echo "<script>setTimeout(function(){ window.location.href = 'Main.htm'; }, 2000);</script>";
    exit;
  } else {
    echo "Invalid username or password";
  }

  $conn->close();
?>