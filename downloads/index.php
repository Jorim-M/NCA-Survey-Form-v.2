<?php
// connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'ncasurvey_');

$sql = "SELECT * FROM files";
$result = mysqli_query($conn, $sql);

$files = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file
    $filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = '../upload/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        echo "You file extension must be .zip, .pdf or .docx";
    } elseif ($_FILES['myfile']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO files (name, size, downloads) VALUES ('$filename', $size, 0)";
            if (mysqli_query($conn, $sql)) {
                echo "File uploaded successfully";
            }
        } else {
            echo "Failed to upload file.";
        }
    }
}

// Downloads files
if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * FROM files WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = '../upload/' . $file['name'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('../uploads/' . $file['name']));
        readfile('../upload/' . $file['name']);

        // Now update downloads count
        $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE files SET downloads=$newCount WHERE id=$id";
        mysqli_query($conn, $updateQuery);
        exit;
    }

}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="style.css">
  <title>Download files</title>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="theme-color" content="#f4f5f7" />
      <title>NCA SURVEY</title>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
      <!-- Tel -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
      <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
      <!-- Icons -->
      <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
      <link rel="stylesheet" href="../assets/vendor/@fortawesome/css/all.min.css" type="text/css">
      <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" type="text/css"/>
      <!-- Argon CSS -->
      <link rel="stylesheet" href="../assets/css/argon.css" type="text/css">
      <link rel="stylesheet" href="../assets/css/aos.css" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
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
                  <li class="nav-item"><a class="btn btn-outline-danger" href="../list/"><i class="fa fa-sign-out-alt"></i></a></li>
            </ul>
        </div>
      </div>
    </nav>
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
                <div class="card-header">
                    <h1>File Uploads</h1>
                </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class=" table table-striped table-bordered">
              <thead class="alert-warning">
                  <th>#</th>
                  <th>Filename</th>
                  <th>Size (in mb)</th>
                  <th>No. of Downloads</th>
                  <th>Action</th>
              </thead>
              <tbody>
                <?php foreach ($files as $file): ?>
                  <tr>
                    <td><?php echo $file['id']; ?></td>
                    <td><?php echo $file['name']; ?></td>
                    <td><?php echo floor($file['size'] / 1000) . ' KB'; ?></td>
                    <td><?php echo $file['downloads']; ?></td>
                    <td><a class="btn btn-outline btn-primary" href="?file_id=<?php echo $file['id'] ?>">Download</a></td>
                  </tr>
                <?php endforeach;?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
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
</body>
</html>