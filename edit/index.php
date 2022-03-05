<?php
  require_once('../conn.php');
  $upload_dir = '../uploads/';

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "select * from nca_ where id=".$id;
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
    }else {
      $errorMsg = 'Could not Find Any Record';
    }
  }

  if(isset($_POST['Submit'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $id_no = $_POST['id_no'];
    $passport_no = $_POST['passport_no'];
    $tax_no = $_POST['tax_no'];
    $kra_pin = $_POST['kra_pin'];
    $title = $_POST['title'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $phd = $_POST['phd'];
    $masters = $_POST['masters'];
    $bachelors = $_POST['bachelors'];
    $post_grad_diploma = $_POST['post_grad_diploma'];
    $diploma = $_POST['diploma'];
    $post_phd = $_POST['post_phd'];
    $post_masters = $_POST['post_masters'];
    $post_degree = $_POST['post_degree'];
    $post_diploma = $_POST['post_diploma'];
    $other_train_cert_1 = $_POST['other_train_cert_1'];
    $other_train_cert_2 = $_POST['other_train_cert_2'];
    $other_train_cert_3 = $_POST['other_train_cert_3'];
    $work_company_1 = $_POST['work_company_1'];
    $work_period_1 = $_POST['work_period_1'];
    $work_role_1 = $_POST['work_role_1'];
    $work_website_1 = $_POST['work_website_1'];
    $work_company_2 = $_POST['work_company_2'];
    $work_period_2 = $_POST['work_period_2'];
    $work_role_2 = $_POST['work_role_2'];
    $work_website_2 = $_POST['work_website_2'];
    $work_company_3 = $_POST['work_company_3'];
    $work_period_3 = $_POST['work_period_3'];
    $work_role_3 = $_POST['work_role_3'];
    $work_website_3 = $_POST['work_website_3'];
    $referr_name_1 = $_POST['referr_name_1'];
    $referr_phone_1 = $_POST['referr_phone_1'];
    $referr_email_1 = $_POST['referr_email_1'];
    $referr_name_2 = $_POST['referr_name_2'];
    $referr_phone_2 = $_POST['referr_phone_2'];
    $referr_email_2 = $_POST['referr_email_2'];
    $expertise = $_POST['expertise'];
    $project_name = $_POST['project_name'];
    $host_company = $_POST['host_company'];
    $period_implementation = $_POST['period_implementation'];
    $contact_person = $_POST['contact_person'];
    $project_name_1 = $_POST['project_name_1'];
    $host_company_1 = $_POST['host_company_1'];
    $period_implementation_1 = $_POST['period_implementation_1'];
    $contact_person_1 = $_POST['contact_person_1'];
    $project_name_2 = $_POST['project_name_2'];
    $host_company_2 = $_POST['host_company_2'];
    $period_implementation_2 = $_POST['period_implementation_2'];
    $contact_person_2 = $_POST['contact_person_2'];
    $prof_mem_1 = $_POST['prof_mem_1'];
    $prof_mem_2 = $_POST['prof_mem_2'];
    $prof_mem_3 = $_POST['prof_mem_3'];
    $prof_mem_4 = $_POST['prof_mem_4'];
    $prof_mem_5 = $_POST['prof_mem_5'];
    $prof_mem_6 = $_POST['prof_mem_6'];
    $prof_mem_7 = $_POST['prof_mem_7'];
    $prof_mem_8 = $_POST['prof_mem_8'];
    $prof_mem_9 = $_POST['prof_mem_9'];

    $imgName1 = $_FILES['image1']['name'];
    $imgTmp1 = $_FILES['image1']['tmp_name'];
    $imgSize1 = $_FILES['image1']['size'];

    $imgName2 = $_FILES['image2']['name'];
    $imgTmp2 = $_FILES['image2']['tmp_name'];
    $imgSize2 = $_FILES['image2']['size'];

    $imgName3 = $_FILES['image3']['name'];
    $imgTmp3 = $_FILES['image3']['tmp_name'];
    $imgSize3 = $_FILES['image3']['size'];

    if($imgName1){

      $imgExt = strtolower(pathinfo($imgName1, PATHINFO_EXTENSION));

      $allowExt  = array('jpeg', 'jpg', 'png', 'gif');

      $image1 = time().'_'.rand(1000,9999).'.'.$imgExt;

      if(in_array($imgExt, $allowExt)){

        if($imgSize1 < 5000000){
          unlink($upload_dir.$row['image1']);
          move_uploaded_file($imgTmp1 ,$upload_dir.$image1);
        }else{
          $errorMsg = 'Image too large';
        }
      }else{
        $errorMsg = 'Please select a valid image';
      }
    }else{

      $image1 = $row['image1'];
    }

    if($imgName2){

      $imgExt = strtolower(pathinfo($imgName2, PATHINFO_EXTENSION));

      $allowExt  = array('jpeg', 'jpg', 'png', 'gif');

      $image2 = time().'_'.rand(1000,9999).'.'.$imgExt;

      if(in_array($imgExt, $allowExt)){

        if($imgSize2 < 5000000){
          unlink($upload_dir.$row['image2']);
          move_uploaded_file($imgTmp2 ,$upload_dir.$image2);
        }else{
          $errorMsg = 'Image too large';
        }
      }else{
        $errorMsg = 'Please select a valid image';
      }
    }else{

      $image2 = $row['image2'];
    }

    if($imgName3){

      $imgExt = strtolower(pathinfo($imgName3, PATHINFO_EXTENSION));

      $allowExt  = array('jpeg', 'jpg', 'png', 'gif');

      $image3 = time().'_'.rand(1000,9999).'.'.$imgExt;

      if(in_array($imgExt, $allowExt)){

        if($imgSize3 < 5000000){
          unlink($upload_dir.$row['image3']);
          move_uploaded_file($imgTmp3 ,$upload_dir.$image3);
        }else{
          $errorMsg = 'Image too large';
        }
      }else{
        $errorMsg = 'Please select a valid image';
      }
    }else{

      $image3 = $row['image3'];
    }

    if(!isset($errorMsg)){
      $sql = "UPDATE nca_
                  SET 
                    firstname = '".$firstname."',
                    lastname = '".$lastname."',
                    id_no = '".$id_no."',
                    passport_no = '".$passport_no."',
                    tax_no = '".$tax_no."',
                    kra_pin = '".$kra_pin."',
                    title = '".$title."',
                    contact = '".$contact."',
                    email = '".$email."',
                    phd = '".$phd."',
                    masters = '".$masters."',
                    bachelors = '".$bachelors."',
                    post_grad_diploma = '".$post_grad_diploma."',
                    diploma = '".$diploma."',
                    post_phd = '".$post_phd."',
                    post_masters = '".$post_masters."',
                    post_degree = '".$post_degree."',
                    post_diploma = '".$post_diploma."',
                    other_train_cert_1 = '".$other_train_cert_1."',
                    other_train_cert_2 = '".$other_train_cert_2."',
                    other_train_cert_3 = '".$other_train_cert_3."',
                    work_company_1 = '".$work_company_1."',
                    work_period_1 = '".$work_period_1."',
                    work_role_1 = '".$work_role_1."',
                    work_website_1 = '".$work_website_1."',
                    work_company_2 = '".$work_company_2."',
                    work_period_2 = '".$work_period_2."',
                    work_role_2 = '".$work_role_2."',
                    work_website_2 = '".$work_website_2."',
                    referr_name_1 = '".$referr_name_1."',
                    referr_phone_1 = '".$referr_phone_1."',
                    referr_email_1 = '".$referr_email_1."',
                    referr_name_2 = '".$referr_name_2."',
                    referr_phone_2 = '".$referr_phone_2."',
                    referr_email_2 = '".$referr_email_2."',
                    expertise = '".$expertise."',
                    project_name = '".$project_name."',
                    host_company = '".$host_company."',
                    period_implementation = '".$period_implementation."',
                    contact_person = '".$contact_person."',
                    project_name_1 = '".$project_name_1."',
                    host_company_1 = '".$host_company_1."',
                    period_implementation_1 = '".$period_implementation_1."',
                    contact_person_1 = '".$contact_person_1."',
                    project_name_2 = '".$project_name_2."',
                    host_company_2 = '".$host_company_2."',
                    period_implementation_2 = '".$period_implementation_2."',
                    contact_person_2 = '".$contact_person_2."',
                    prof_mem_1 = '".$prof_mem_1."',
                    prof_mem_2 = '".$prof_mem_2."',
                    prof_mem_3 = '".$prof_mem_3."',
                    prof_mem_4 = '".$prof_mem_4."',
                    prof_mem_5 = '".$prof_mem_5."',
                    prof_mem_6 = '".$prof_mem_6."',
                    prof_mem_7 = '".$prof_mem_7."',
                    prof_mem_8 = '".$prof_mem_8."',
                    prof_mem_9 = '".$prof_mem_9."',

                    image1 = '".$image1."',
                    image2 = '".$image2."',
                    image3 = '".$image3."'
          WHERE id=".$id;
      $result = mysqli_query($conn, $sql);
      if($result){
        $successMsg = 'New record updated successfully';
        header('Location:#');
      }else{
        $errorMsg = 'Error '.mysqli_error($conn);
      }
    }

  }

?>

<!DOCTYPE html>
<html>
  <head>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#f4f5f7" />
    <title>Edit <?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?>'s Survey |NCA SURVEY</title>
    <!-- <link rel="stylesheet" href="../assets/css/bootstrap.min.css"> -->
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

      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <form class="" action="" method="post"enctype="multipart/form-data">
                 <div class="card">
                    <div class="card-header bg-warning">
                       <h1 class="text-center text-white">Edit <em><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?>'s</em> Survey</h1>
                    </div>
                    <div class="card-header">
                       <h1>1. Contact Info</h1>
                    </div>
                    <div class="card-body">
                       <div class="form-group">
                          <label for="firstname">First Name</label>
                          <input type="text" class="form-control" name="firstname"  placeholder="Enter First Name" value="<?php echo $row['firstname']; ?>">
                       </div>
                       <div class="form-group">
                          <label for="lastname">Last Name</label>
                          <input type="text" class="form-control" name="lastname"  placeholder="Enter Last Name" value="<?php echo $row['lastname']; ?>">
                       </div>
                       <div class="form-group">
                          <label for="id_no">ID No.</label>
                          <input type="text" class="form-control" name="id_no"  placeholder="Enter ID No." value="<?php echo $row['id_no']; ?>">
                       </div>
                       <div class="form-group">
                          <label for="passport_no">Passport No.</label>
                          <input type="text" class="form-control" name="passport_no"  placeholder="Enter Passport No." value="<?php echo $row['passport_no']; ?>">
                       </div>
                       <div class="form-group">
                          <label for="contact">Contact No:</label>
                          <input type="text" class="form-control" name="contact"  placeholder="Enter Contact No." value="<?php echo $row['contact']; ?>">
                       </div>
                       <!-- <div class="form-group" onclick="process(event)" >
                          <label for="contact">Contact No:</label>
                          <input class="form-control" id="phone" type="tel" name="contact" value="<?php //echo $row['contact']; ?>"/>
                          <button type="click" class="btn btn-primary" value="Verify">Verify</button>
                          </div> -->
                       <div class="alert alert-info" style="display: none;"></div>
                       <div class="form-group">
                          <label for="email">E-Mail</label>
                          <input type="email" class="form-control" name="email" placeholder="Enter Email" value="<?php echo $row['email']; ?>">
                       </div>
                    </div>
                    <div class="card-footer"></div>
                    <div class="card-header">
                       <h1>2. Title & Other Info</h1>
                    </div>
                    <div class="card-body">
                       <div class="form-group">
                          <label for="title">Title</label>
                          <select class="form-control" name="title">
                             <option value="<?php echo $row['title']; ?>"><?php echo $row['title']; ?></option>
                             <option value="Prof.">Prof.</option>
                             <option value="Dr.">Dr.</option>
                             <option value="Eng.">Eng.</option>
                             <option value="Arch.">Arch.</option>
                             <option value="Qs.">Qs.</option>
                             <option value="Mr.">Mr.</option>
                             <option value="Ms.">Ms.</option>
                             <option value="Mrs.">Mrs.</option>
                          </select>
                       </div>
                       <div class="form-group">
                          <label for="tax_no">Valid Tax Compliance No.</label>
                          <input type="text" class="form-control" name="tax_no"  placeholder="Enter Valid Tax Compliance No." value="<?php echo $row['tax_no']; ?>">
                       </div>
                       <div class="form-group">
                          <label for="kra_pin">KRA PIN No.</label>
                          <input type="text" class="form-control" name="kra_pin"  placeholder="Enter KRA PIN No." value="<?php echo $row['kra_pin']; ?>">
                       </div>
                    </div>
                    <div class="card-footer"></div>
                    <div class="card-header">
                       <h1>3. List Your Academic Qualifications</h1>
                    </div>
                    <div class="card-body">
                       <div class="form-group">
                          <label for="phd">PHD</label>
                          <input type="text" class="form-control" name="phd"  placeholder="Enter PHD Qualification" value="<?php echo $row['phd']; ?>">
                       </div>
                       <div class="form-group">
                          <label for="masters">Masters</label>
                          <input type="text" class="form-control" name="masters"  placeholder="Enter Masters Qualification" value="<?php echo $row['masters']; ?>">
                       </div>
                       <div class="form-group">
                          <label for="bachelors">Bachelor's Degree</label>
                          <input type="text" class="form-control" name="bachelors"  placeholder="Enter Bachelor's Degree Qualification" value="<?php echo $row['bachelors']; ?>">
                       </div>
                       <div class="form-group">
                          <label for="post_grad_diploma">Postgraduate Diploma</label>
                          <input type="text" class="form-control" name="post_grad_diploma"  placeholder="Enter Postgraduate Diploma Qualification" value="<?php echo $row['post_grad_diploma']; ?>">
                       </div>
                       <div class="form-group">
                          <label for="diploma">Diploma</label>
                          <input type="text" class="form-control" name="diploma"  placeholder="Enter Diploma Qualification" value="<?php echo $row['diploma']; ?>">
                       </div>
                    </div>
                    <div class="card-footer"></div>
                    <div class="card-header">
                       <h1>4. Academic Experience</h1>
                    </div>
                    <div class="card-body">
                       <div class="form-group">
                          <label for="post_phd">Post PHD Experience (Years)</label>
                          <input type="text" class="form-control" name="post_phd"  placeholder="Enter PHD Experience (Years)" value="<?php echo $row['post_phd']; ?>">
                       </div>
                       <div class="form-group">
                          <label for="post_masters">Post Masters Experience (Years)</label>
                          <input type="text" class="form-control" name="post_masters"  placeholder="Enter Masters Experience (Years)" value="<?php echo $row['post_masters']; ?>">
                       </div>
                       <div class="form-group">
                          <label for="post_degree">Post Degree Experience (Years)</label>
                          <input type="text" class="form-control" name="post_degree"  placeholder="Enter Degree Experience (Years)" value="<?php echo $row['post_degree']; ?>">
                       </div>
                       <div class="form-group">
                          <label for="post_diploma">Post Diploma Experience (Years)</label>
                          <input type="text" class="form-control" name="post_diploma"  placeholder="Enter Diploma Experience (Years)" value="<?php echo $row['post_diploma']; ?>">
                       </div>
                    </div>
                    <div class="card-footer"></div>
                    <div class="card-header">
                       <h1>5. Other Professional Training & Certifications</h1>
                    </div>
                    <div class="card-body">
                       <div class="form-group">
                          <label for="other_train_cert_1">1.</label>
                          <input type="text" class="form-control" name="other_train_cert_1"  placeholder="Enter this field" value="<?php echo $row['other_train_cert_1']; ?>">
                       </div>
                       <div class="form-group">
                          <label for="other_train_cert_2">2.</label>
                          <input type="text" class="form-control" name="other_train_cert_2"  placeholder="Enter this field" value="<?php echo $row['other_train_cert_2']; ?>">
                       </div>
                       <div class="form-group">
                          <label for="other_train_cert_3">3.</label>
                          <input type="text" class="form-control" name="other_train_cert_3"  placeholder="Enter this field" value="<?php echo $row['other_train_cert_3']; ?>">
                       </div>
                    </div>
                    <div class="card-footer"></div>
                    <div class="card-header">
                       <h1>6. Work Experience 1</h1>
                    </div>
                    <div class="card-body">
                       <div class="form-group">
                          <label for="work_company_1">Company</label>
                          <input type="text" class="form-control" name="work_company_1"  placeholder="Enter this field" value="<?php echo $row['work_company_1']; ?>">
                       </div>
                       <div class="form-group">
                          <label for="work_period_1">Period</label>
                          <input type="text" class="form-control" name="work_period_1"  placeholder="Enter this field" value="<?php echo $row['work_period_1']; ?>">
                       </div>
                       <div class="form-group">
                          <label for="work_role_1">Role</label>
                          <input type="text" class="form-control" name="work_role_1"  placeholder="Enter this field" value="<?php echo $row['work_role_1']; ?>">
                       </div>
                       <div class="form-group">
                          <label for="work_website_1">Website/Email</label>
                          <input type="text" class="form-control" name="work_website_1"  placeholder="Enter this field" value="<?php echo $row['work_website_1']; ?>">
                       </div>
                    </div>
                    <div class="card-footer"></div>
                    <div class="card-header">
                       <h1>7. Work Experience 2</h1>
                    </div>
                    <div class="card-body">
                       <div class="form-group">
                          <label for="work_company_2">Company</label>
                          <input type="text" class="form-control" name="work_company_2"  placeholder="Enter this field" value="<?php echo $row['work_company_2']; ?>">
                       </div>
                       <div class="form-group">
                          <label for="work_period_2">Period</label>
                          <input type="text" class="form-control" name="work_period_2"  placeholder="Enter this field" value="<?php echo $row['work_period_2']; ?>">
                       </div>
                       <div class="form-group">
                          <label for="work_role_2">Role</label>
                          <input type="text" class="form-control" name="work_role_2"  placeholder="Enter this field" value="<?php echo $row['work_role_2']; ?>">
                       </div>
                       <div class="form-group">
                          <label for="work_website_2">Website/Email</label>
                          <input type="text" class="form-control" name="work_website_2"  placeholder="Enter this field" value="<?php echo $row['work_website_2']; ?>">
                       </div>
                    </div>
                    <div class="card-footer"></div>
                    <div class="card-header">
                       <h1>8. Work Experience 3</h1>
                    </div>
                    <div class="card-body">
                       <div class="form-group">
                          <label for="work_company_3">Company</label>
                          <input type="text" class="form-control" name="work_company_3"  placeholder="Enter this field" value="<?php echo $row['work_company_3']; ?>">
                       </div>
                       <div class="form-group">
                          <label for="work_period_3">Period</label>
                          <input type="text" class="form-control" name="work_period_3"  placeholder="Enter this field" value="<?php echo $row['work_period_3']; ?>">
                       </div>
                       <div class="form-group">
                          <label for="work_role_3">Role</label>
                          <input type="text" class="form-control" name="work_role_3"  placeholder="Enter this field" value="<?php echo $row['work_role_3']; ?>">
                       </div>
                       <div class="form-group">
                          <label for="work_website_3">Website/Email</label>
                          <input type="text" class="form-control" name="work_website_3"  placeholder="Enter this field" value="<?php echo $row['work_website_3']; ?>">
                       </div>
                    </div>
                    <div class="card-header">
                       <h1>9. Referrals 1</h1>
                    </div>
                    <div class="card-body">
                       <div class="form-group">
                          <label for="referr_name_1">Name</label>
                          <input type="text" class="form-control" name="referr_name_1"  placeholder="Enter this field" value="<?php echo $row['referr_name_1']; ?>">
                       </div>
                       <div class="form-group">
                          <label for="referr_phone_1">Phone</label>
                          <input type="text" class="form-control" name="referr_phone_1"  placeholder="Enter this field" value="<?php echo $row['referr_phone_1']; ?>">
                       </div>
                       <div class="form-group">
                          <label for="referr_email_1">Email</label>
                          <input type="text" class="form-control" name="referr_email_1"  placeholder="Enter this field" value="<?php echo $row['referr_email_1']; ?>">
                       </div>
                    </div>
                    <div class="card-header">
                       <h1>10. Referrals 2</h1>
                    </div>
                    <div class="card-body">
                       <div class="form-group">
                          <label for="referr_name_2">Name</label>
                          <input type="text" class="form-control" name="referr_name_2"  placeholder="Enter this field" value="<?php echo $row['referr_name_2']; ?>">
                       </div>
                       <div class="form-group">
                          <label for="referr_phone_2">Phone</label>
                          <input type="text" class="form-control" name="referr_phone_2"  placeholder="Enter this field" value="<?php echo $row['referr_phone_2']; ?>">
                       </div>
                       <div class="form-group">
                          <label for="referr_email_2">Email</label>
                          <input type="text" class="form-control" name="referr_email_2"  placeholder="Enter this field" value="<?php echo $row['referr_email_2']; ?>">
                       </div>
                    </div>
                    <div class="card-header">
                       <h1>11. Area of Expertise</h1>
                    </div>
                    <div class="card-body">
                       <div class="form-group">
                          <label for="expertise">Answer:</label>
                          <input type="text" class="form-control" name="expertise"  placeholder="Enter this field" value="<?php echo $row['expertise']; ?>">
                       </div>
                    </div>
                    <div class="card-header">
                       <h1>12. Relevant Experience in past 5 years - 1</h1>
                    </div>
                    <div class="card-body">
                       <div class="form-group">
                          <label for="project_name">Project/Program Name</label>
                          <input type="text" class="form-control" name="project_name"  placeholder="Enter this field" value="<?php echo $row['project_name']; ?>">
                       </div>
                       <div class="form-group">
                          <label for="host_company">Host Company</label>
                          <input type="text" class="form-control" name="host_company"  placeholder="Enter this field" value="<?php echo $row['host_company']; ?>">
                       </div>
                       <div class="form-group">
                          <label for="period_implementation">Period of implementation</label>
                          <input type="text" class="form-control" name="period_implementation"  placeholder="Enter this field" value="<?php echo $row['period_implementation']; ?>">
                       </div>
                       <div class="form-group">
                          <label for="contact_person">Contact person</label>
                          <input type="text" class="form-control" name="contact_person"  placeholder="Enter this field" value="<?php echo $row['contact_person']; ?>">
                       </div>
                    </div>
                    <div class="card-header">
                       <h1>13. Relevant Experience in past 5 years - 2</h1>
                    </div>
                    <div class="card-body">
                       <div class="form-group">
                          <label for="project_name_1">Project/Program Name</label>
                          <input type="text" class="form-control" name="project_name_1"  placeholder="Enter this field" value="<?php echo $row['project_name_1']; ?>">
                       </div>
                       <div class="form-group">
                          <label for="host_company_1">Host Company</label>
                          <input type="text" class="form-control" name="host_company_1"  placeholder="Enter this field" value="<?php echo $row['host_company_1']; ?>">
                       </div>
                       <div class="form-group">
                          <label for="period_implementation_1">Period of implementation</label>
                          <input type="text" class="form-control" name="period_implementation_1"  placeholder="Enter this field" value="<?php echo $row['period_implementation_1']; ?>">
                       </div>
                       <div class="form-group">
                          <label for="contact_person_1">Contact person</label>
                          <input type="text" class="form-control" name="contact_person_1"  placeholder="Enter this field" value="<?php echo $row['contact_person_1']; ?>">
                       </div>
                    </div>
                    <div class="card-header">
                       <h1>14. Relevant Experience in past 5 years - 3</h1>
                    </div>
                    <div class="card-body">
                       <div class="form-group">
                          <label for="project_name_2">Project/Program Name</label>
                          <input type="text" class="form-control" name="project_name_2"  placeholder="Enter this field" value="<?php echo $row['project_name_2']; ?>">
                       </div>
                       <div class="form-group">
                          <label for="host_company_2">Host Company</label>
                          <input type="text" class="form-control" name="host_company_2"  placeholder="Enter this field" value="<?php echo $row['host_company_2']; ?>">
                       </div>
                       <div class="form-group">
                          <label for="period_implementation_2">Period of implementation</label>
                          <input type="text" class="form-control" name="period_implementation_2"  placeholder="Enter this field" value="<?php echo $row['period_implementation_2']; ?>">
                       </div>
                       <div class="form-group">
                          <label for="contact_person_2">Contact person</label>
                          <input type="text" class="form-control" name="contact_person_2"  placeholder="Enter this field" value="<?php echo $row['contact_person_2']; ?>">
                       </div>
                    </div>
                    <div class="card-header">
                       <h1>15. Professional Membership 1</h1>
                    </div>
                    <div class="card-body">
                       <div class="form-group">
                          <label for="prof_mem_1">Professional body</label>
                          <input type="text" class="form-control" name="prof_mem_1"  placeholder="Enter this field" value="<?php echo $row['prof_mem_1']; ?>">
                       </div>
                       <div class="form-group">
                          <label for="prof_mem_2">Membership No.</label>
                          <input type="text" class="form-control" name="prof_mem_2"  placeholder="Enter this field" value="<?php echo $row['prof_mem_2']; ?>">
                       </div>
                       <div class="form-group">
                          <label for="prof_mem_3">Level of membership</label>
                          <input type="text" class="form-control" name="prof_mem_3"  placeholder="Enter this field" value="<?php echo $row['prof_mem_3']; ?>">
                       </div>
                    </div>
                    <div class="card-header">
                       <h1>16. Professional Membership 2</h1>
                    </div>
                    <div class="card-body">
                       <div class="form-group">
                          <label for="prof_mem_4">Professional body</label>
                          <input type="text" class="form-control" name="prof_mem_4"  placeholder="Enter this field" value="<?php echo $row['prof_mem_4']; ?>">
                       </div>
                       <div class="form-group">
                          <label for="prof_mem_5">Membership No.</label>
                          <input type="text" class="form-control" name="prof_mem_5"  placeholder="Enter this field" value="<?php echo $row['prof_mem_5']; ?>">
                       </div>
                       <div class="form-group">
                          <label for="prof_mem_6">Level of membership</label>
                          <input type="text" class="form-control" name="prof_mem_6"  placeholder="Enter this field" value="<?php echo $row['prof_mem_6']; ?>">
                       </div>
                    </div>
                    <div class="card-header">
                       <h1>17. Professional Membership 3</h1>
                    </div>
                    <div class="card-body">
                       <div class="form-group">
                          <label for="prof_mem_7">Professional body</label>
                          <input type="text" class="form-control" name="prof_mem_7"  placeholder="Enter this field" value="<?php echo $row['prof_mem_7']; ?>">
                       </div>
                       <div class="form-group">
                          <label for="prof_mem_8">Membership No.</label>
                          <input type="text" class="form-control" name="prof_mem_8"  placeholder="Enter this field" value="<?php echo $row['prof_mem_8']; ?>">
                       </div>
                       <div class="form-group">
                          <label for="prof_mem_9">Level of membership</label>
                          <input type="text" class="form-control" name="prof_mem_9"  placeholder="Enter this field" value="<?php echo $row['prof_mem_9']; ?>">
                       </div>
                    </div>
                    <div class="card-footer">
                       <div class="form-group">
                          <button type="submit" name="Submit" class="btn btn-primary waves">Submit</button>
                       </div>
                    </div>
                 </div>
              </form>
          </div>
        </div>
      </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" charset="utf-8"></script>
  </body>
</html>
