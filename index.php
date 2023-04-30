<?php
  session_start();
  require 'connection.php';
?>

<?php
  include('include/header.php');
?>

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
                                                    <a href="student-view.php?id=<?=$student['id'];?>" class="btn btn-info btn-sm">view</a>
                                                       <a href="student-edit.php?id=<?=$student['id'];?>" class="btn btn-success btn-sm">Edit</a>
                                                       

                                                       <form action="code.php" method="POST" class="d-inline">
                                                            <button type="submit" name="delete-student" value="<?= $student['id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                                       </form>
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