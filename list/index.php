<?php
  require '../conn.php';
  $upload_dir = '../uploads/';
  
  if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   // sql to delete a record
   $sql = "DELETE FROM nca_ WHERE id = $id";
   
   if (mysqli_query($conn, $sql)) {
     echo "Record deleted successfully";
     header('location:../list/');
   } else {
     echo "Error deleting record: " . mysqli_error($conn);
   }
  }
  
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#f4f5f7" />
    <title>Survey Records | NCA SURVEY</title>
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- Icons -->
    <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="../assets/vendor/@fortawesome/css/all.min.css" type="text/css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" type="text/css"/>
    <!-- Argon CSS -->
    <link rel="stylesheet" href="../assets/css/argon.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" charset="utf-8"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
      <div class="container">
        <a class="navbar-brand" href="../">
        <img src="../assets/img/nca_2.png" width="200">
        </a>
        <div>
            <ul class="navbar-nav mr-auto"></ul>
               <ul class="navbar-nav ml-auto">
                  <li class="nav-item"><a class="btn btn-outline-primary" href="../"><i class="fas fa-user-plus"></i></a></li>
            </ul>
        </div>
      </div>
    </nav>
    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>Survey List</h1>
                    <div class="text-right">
                      <a class="btn btn-warning" href="../downloads/">File Uploads</a>
                    </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                      <thead class="alert-warning">
                        <tr>
                          <!-- <th>Image</th>
                          <th>Image</th>
                          <th>Image</th> -->
                          <th>#</th>
                          <th>Firstname</th>
                          <th>Lastname</th>
                          <th>Contact</th>
                          <th>Email</th>
                          <th>ID No.</th>
                          <th>Tax No.</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          require'../conn.php';
                          $query=mysqli_query($conn, "SELECT * FROM `nca_`") or die(mysqli_error());
                          while($row=mysqli_fetch_array($query)){
                          ?>
                        <tr>
                          <!-- <td><img src="<?php// echo '../uploads/'.$row['image1'] ?>" height="100"></td>
                          <td><img src="<?php// echo '../uploads/'.$row['image2'] ?>" height="100"></td>
                          <td><img src="<?php// echo '../uploads/'.$row['image3'] ?>" height="100"></td> -->
                          <td><?php echo $row['id']?></td>
                          <td><?php echo $row['firstname']?></td>
                          <td><?php echo $row['lastname']?></td>
                          <td>0<?php echo $row['contact'] ?></td>
                          <td><?php echo $row['email'] ?></td>
                          <td><?php echo $row['id_no'] ?></td>
                          <td><?php echo $row['tax_no'] ?></td>
                          <td>
                            <a href="../show/?id=<?php echo $row['id'] ?>" class="btn btn-primary" data-toggle="tooltip" title="View Entire Survey"><i class="fa fa-eye"></i></a>
                            <a href="../edit/?id=<?php echo $row['id'] ?>" class="btn btn-success" data-toggle="tooltip" title="Edit Survey"><i class="fas fa-pencil-alt"></i></a>
                            <a href="index.php?delete=<?php echo $row['id'] ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Survey" onclick="return confirm('Are you sure you want to delete this survey?')"><i class="fa fa-trash-alt"></i></a>
                          </td>
                        </tr>
                        <?php
                          }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" charset="utf-8"></script>
    <!-- Scripts -->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/bootstrap-notify/bootstrap-notify.min.js"></script>
    <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
    <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="../assets/vendor/jquery-scroll-lock/jquery-scrollLock.min.js"></script>
    <!-- Argon JS -->
    <script src="../assets/js/argon.min.js"></script>
    <script src="../assets/js/argon.js"></script>
    <!-- Argon JS -->
    <script src="../assets/js/argon.js"></script>
    <script src="../assets/js/aos.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" charset="utf-8"></script>
  </body>
</html>