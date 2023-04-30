<?php
  session_start();
  require 'connection.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
       <div class="container mt-4">

         <?php include('message.php'); ?>

          <div class="row">
               <div class="col-sm-12">
                    <div class="card">
                         <div class="card-header">
                              <h4>Student Details
                                   <a href="student-create.php" class="btn btn-primary float-end">Add student</a>
                              </h4>
                         </div>

                         <div class="card-body">

                         <table class="table table-bordered table-striped">
                              <thead>
                                   <tr>
                                        <th>ID</th>
                                        <th>Student Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Course</th>
                                        <th>action</th>

                                   </tr>
                              </thead>

                              <tbody>
                                   <?php 
                                   $query = "SELECT * FROM students";
                                   $query_run = mysqli_query($conn, $query);

                                   if ( mysqli_num_rows($query_run) > 0) {
                                         foreach($query_run as $student) {
                                            
                                               
                                             ?>
                                              <tr>
                                                    <td><?= $student['id'];?></td>
                                                    <td><?= $student['name'];?></td>
                                                    <td><?= $student['email'];?></td>
                                                    <td><?= $student['phone'];?></td>
                                                    <td><?= $student['course'];?></td>

                                                    <td>
                                                    <a href="" class="btn btn-info btn-sm">view</a>
                                                       <a href="student-edit.php?id=<?=$student['id'];?>" class="btn btn-success btn-sm">Edit</a>
                                                       <a href="" class="btn btn-danger btn-sm">Delete</a>
                                                    </td>
                                              </tr>
                                           <?php

                                         }
                                   } else {
                                        echo "<h5> No Record Found </h5>";
                                   }
                                   ?>
                                  
                              </tbody>
                         </table>

                         </div>
                    </div>

               </div>
          </div>
       </div>
</body>
</html>