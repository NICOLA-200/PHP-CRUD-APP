<?php
  session_start();
require 'connection.php';

if(isset($_POST['save_student'])) {
   

     $name= mysqli_real_escape_string($conn, $_POST['name']);
     $email= mysqli_real_escape_string($conn, $_POST['email']);
     $phone= mysqli_real_escape_string($conn, $_POST['phone']);
     $course= mysqli_real_escape_string($conn, $_POST['course']);
     $password= mysqli_real_escape_string($conn, $_POST['password']);

     $query = "INSERT INTO students(name,email,phone,course,password) VALUES ('$name','$email','$phone','$course','$password')";

     $query_run = mysqli_query($conn, $query);

     if($query_run) {
          $_SESSION['message'] = "Student Created Successfully";
          header('Location: student-create.php');
          exit(0);
     } else {
          $_SESSION['message'] = "Student Not Created";
          header("Location: student create.php");
          exit(0);
     }
}
?>