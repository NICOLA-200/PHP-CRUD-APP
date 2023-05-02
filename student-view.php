<?php 
session_start();
require "connection.php";
?>


<?php
  include('include/header.php');
?>

     <div class="container mt-5">

    

</div>

          <div class="row">
               <div class="col-md-12">
                    <div class="card">
                         <div class="card-header">
                              <h4>Student view
                                   <a href="index.php" class="btn btn-danger float-end">BACK</a>
                              </h4>
                         </div>
                         <div class="card-body">


                         <?php 
                         
                         if(isset($_GET['id'])) {

                              $student_id =mysqli_real_escape_string($conn,$_GET['id']);  
                              $query = "SELECT * FROM students WHERE id='$student_id'";
                              
                              $query_run = mysqli_query($conn, $query);
                              
                              if(mysqli_num_rows($query_run) > 0) {
                                   $student = mysqli_fetch_array($query_run);

                                   

                                   ?>
                                      
                                   
                              <form action="code.php" method="POST">

                                   
                                       
                                   <div class="mb-3">
                                        <label for="">Student Name</label>
                                        <p class="form-control"><?= $student['name'];?> </p>
                                   </div>

                                   <div class="mb-3">
                                        <label for="">Email</label>
                                        
                                        <p class="form-control"><?= $student['email'];?></p>
                                   </div>

                                   <div class="mb-3">
                                        <label for="">Phone</label>
                                        
                                        <p class="form-control"><?= $student['phone'];?></p>
                                   </div>

                                   <div class="mb-3">
                                        <label for="">Student course</label>
                                        
                                        <p class="form-control"><?= $student['course'];?></p>
                                   </div>

                                  
                              </form>

                                   <?php
                              } else {

                                   echo "<h4> No such id Found</h4>";
                              }
                         }
                         ?>

                         </div>
                    </div>
               </div>
          </div>
     </div>










    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>