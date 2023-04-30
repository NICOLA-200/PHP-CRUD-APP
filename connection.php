<?php
  

  $conn = mysqli_connect("localhost","root","","blog");

  if(!$conn) {
     die ('connection failed'. mysqli_connect_error());
  }  
?>