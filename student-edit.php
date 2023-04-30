<?php 

session_start();
require "connection.php";
?>

<?php
  include('include/header.php');
?>
    

     <div class="container mt-5">

      <?php 
         include('message.php')
      ?>

</div>

          <div class="row">
               <div class="col-md-12">
                    <div class="card">
                         <div class="card-header">
                              <h4>Student Edit
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

                                   <input type="hidden" name="student_id" value="<?= $student['id'];  ?>">

                                   <div class="mb-3">
                                        <label for="">Student Name</label>
                                        <input type="text" name="name" value="<?= $student['name'];?>" class="form-control">
                                   </div>

                                   <div class="mb-3">
                                        <label for="">Email</label>
                                        <input type="email" name="email" value="<?= $student['email'];?>" class="form-control">
                                   </div>

                                   <div class="mb-3">
                                        <label for="">Phone</label>
                                        <input type="text" name="phone" value="<?= $student['phone'];?>" class="form-control">
                                   </div>

                                   <div class="mb-3">
                                        <label for="">Student course</label>
                                        <input type="text" name="course" value="<?= $student['course'];?>" class="form-control">
                                   </div>

                                   <div class="mb-3">
                                        
                                        <button type="submit" name="update_student" class="btn btn-primary ">update Student</button>
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