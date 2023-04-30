<?php
  session_start();
require 'connection.php';

if(isset($_POST['delete-student'])) {
     $student_id =  mysqli_real_escape_string($conn, $_POST['delete-student']);
     $query = "DELETE FROM students WHERE id='$student_id'";

     $query_run = mysqli_query($conn,$query);

     if($query_run) {
          $_SESSION['message'] = "Student delete Successfully";
          header('Location: index.php');
          exit(0);
     } else {
          $_SESSION['message'] = "Student Not delete";
          header("Location: index.php");
          exit(0);
     }
}

if(isset($_POST['update_student'])){

     $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);

     $name= mysqli_real_escape_string($conn, $_POST['name']);
     $email= mysqli_real_escape_string($conn, $_POST['email']);
     $phone= mysqli_real_escape_string($conn, $_POST['phone']);
     $course= mysqli_real_escape_string($conn, $_POST['course']); 

     $query = "UPDATE students SET  name='$name' , email='$email' , phone='$phone', course='$course' WHERE id='$student_id'";

     $query_run = mysqli_query($conn,$query);
     if($query_run) {

          $_SESSION['message'] = "Student updated Successfully";
          header('Location: index.php');
          exit(0);
     } else {
          $_SESSION['message'] = "Student Not updated";
          header("Location: index.php");
          exit(0);
     }
}
    
if(isset($_POST['save_student'])) {
   

     $name= mysqli_real_escape_string($conn, $_POST['name']);
     $email= mysqli_real_escape_string($conn, $_POST['email']);
     $phone= mysqli_real_escape_string($conn, $_POST['phone']);
     $course= mysqli_real_escape_string($conn, $_POST['course']);


     $query = "INSERT INTO students(name,email,phone,course) VALUES ('$name','$email','$phone','$course')";

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