<?php
	require_once 'conn.php';
	$upload_dir = 'uploads/';
	
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
    $destination = 'upload/' . $filename;

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
    $filepath = 'upload/' . $file['name'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('upload/' . $file['name']));
        readfile('upload/' . $file['name']);

        // Now update downloads count
        $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE files SET downloads=$newCount WHERE id=$id";
        mysqli_query($conn, $updateQuery);
        exit;
    }

}

	if(ISSET($_POST['save'])){
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
		$expertise=implode(", ", $_POST['expertise']);
		$interest=implode(", ", $_POST['interest']);
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

		// $imgName1 = $_FILES['image1']['name'];
		// $imgTmp1 = $_FILES['image1']['tmp_name'];
		// $imgSize1 = $_FILES['image1']['size'];

		// $imgName2 = $_FILES['image2']['name'];
		// $imgTmp2 = $_FILES['image2']['tmp_name'];
		// $imgSize2 = $_FILES['image2']['size'];

		// $imgName3 = $_FILES['image3']['name'];
		// $imgTmp3 = $_FILES['image3']['tmp_name'];
		// $imgSize3 = $_FILES['image3']['size'];


		if(empty($firstname)){
			$errorMsg = 'Please input First Name!';
		}elseif(empty($lastname)){
			$errorMsg = 'Please input Last Name!';
		}elseif(empty($id_no)){
			$errorMsg = 'Please input ID No. !';
		}elseif(empty($passport_no)){
			$errorMsg = 'Please input Passport No. !';
		}elseif(empty($tax_no)){
			$errorMsg = 'Please input Valid Tax Compliance No. !';
		}elseif(empty($kra_pin)){
			$errorMsg = 'Please input KRA PIN No. !';
		}elseif(empty($title)){
			$errorMsg = 'Please input Your Title!';
		}elseif(empty($contact)){
			$errorMsg = 'Please input contact!';
		}elseif(empty($email)){
			$errorMsg = 'Please input email!';
		}elseif(empty($phd)){
			$errorMsg = 'Please input PHD Qualifications!';
		}elseif(empty($masters)){
			$errorMsg = 'Please input Masters Qualifications!';
		}elseif(empty($bachelors)){
			$errorMsg = "Please input Bachelor's Qualifications!";
		}elseif(empty($post_grad_diploma)){
			$errorMsg = "Please input Post-graduate Diploma Qualifications!";
		}elseif(empty($diploma)){
			$errorMsg = "Please input Diploma Qualifications!";
		}elseif(empty($post_phd)){
			$errorMsg = "Please input this field!";
		}elseif(empty($post_masters)){
			$errorMsg = "Please input this field!";
		}elseif(empty($post_degree)){
			$errorMsg = "Please input this field!";
		}elseif(empty($post_diploma)){
			$errorMsg = "Please input this field!";
		}elseif(empty($other_train_cert_1)){
			$errorMsg = "Please input this field!";
		}elseif(empty($other_train_cert_2)){
			$errorMsg = "Please input this field!";
		}elseif(empty($other_train_cert_3)){
			$errorMsg = "Please input this field!";
		}elseif(empty($work_company_1)){
			$errorMsg = "Please input this field!";
		}elseif(empty($work_period_1)){
			$errorMsg = "Please input this field!";
		}elseif(empty($work_role_1)){
			$errorMsg = "Please input this field!";
		}elseif(empty($work_website_1)){
			$errorMsg = "Please input this field!";
		}elseif(empty($work_company_2)){
			$errorMsg = "Please input this field!";
		}elseif(empty($work_period_2)){
			$errorMsg = "Please input this field!";
		}elseif(empty($work_role_2)){
			$errorMsg = "Please input this field!";
		}elseif(empty($work_website_2)){
			$errorMsg = "Please input this field!";
		}elseif(empty($work_company_3)){
			$errorMsg = "Please input this field!";
		}elseif(empty($work_period_3)){
			$errorMsg = "Please input this field!";
		}elseif(empty($work_role_3)){
			$errorMsg = "Please input this field!";
		}elseif(empty($work_website_3)){
			$errorMsg = "Please input this field!";
		}elseif(empty($referr_name_1)){
			$errorMsg = "Please input this field!";
		}elseif(empty($referr_phone_1)){
			$errorMsg = "Please input this field!";
		}elseif(empty($referr_email_1)){
			$errorMsg = "Please input this field!";
		}elseif(empty($referr_name_2)){
			$errorMsg = "Please input this field!";
		}elseif(empty($referr_phone_2)){
			$errorMsg = "Please input this field!";
		}elseif(empty($referr_email_2)){
			$errorMsg = "Please input this field!";
		}else {
		//$imgExt = strtolower(pathinfo($imgName3, PATHINFO_EXTENSION));

			$allowExt  = array('jpeg', 'jpg', 'png', 'gif');

			//$image3 = time().'_'.rand(1000,9999).'.'.$imgExt;
		}

		//$imgExt = strtolower(pathinfo($imgName2, PATHINFO_EXTENSION));

			$allowExt  = array('jpeg', 'jpg', 'png', 'gif');

			//$image2 = time().'_'.rand(1000,9999).'.'.$imgExt;
		}

		//$imgExt = strtolower(pathinfo($imgName1, PATHINFO_EXTENSION));

			$allowExt  = array('jpeg', 'jpg', 'png', 'gif');

			//$image1 = time().'_'.rand(1000,9999).'.'.$imgExt;
		//}

		mysqli_query($conn, "INSERT INTO `nca_` VALUES(null, '$image1', '$image2', '$image3',
															'$firstname',
															'$lastname',
															'$id_no',
															'$passport_no',
															'$tax_no',
															'$kra_pin',
															'$title',
															'$contact',
															'$email',
													        '$phd',
													        '$masters',
													        '$bachelors',
													        '$post_grad_diploma',
													        '$diploma',
													        '$post_phd',
													        '$post_masters',
													        '$post_degree',
													        '$post_diploma',
													        '$other_train_cert_1',
													        '$other_train_cert_2',
													        '$other_train_cert_3',
											                '$work_company_1',
											                '$work_period_1',
											                '$work_role_1',
											                '$work_website_1',
											                '$work_company_2',
											                '$work_period_2',
											                '$work_role_2',
											                '$work_website_2',
											                '$work_company_3',
											                '$work_period_3',
											                '$work_role_3',
											                '$work_website_3',
											                '$referr_name_1',
											                '$referr_phone_1',
											                '$referr_email_1',
											                '$referr_name_2',
											                '$referr_phone_2',
											                '$referr_email_2',
											                '$expertise',
											                '$interest',
											                '$project_name',
											                '$host_company',
											                '$period_implementation',
											                '$contact_person',
											                '$project_name_1',
											                '$host_company_1',
											                '$period_implementation_1',
											                '$contact_person_1',
											                '$project_name_2',
											                '$host_company_2',
											                '$period_implementation_2',
											                '$contact_person_2',
											                '$prof_mem_1',
														    '$prof_mem_2',
														    '$prof_mem_3',
														    '$prof_mem_4',
														    '$prof_mem_5',
														    '$prof_mem_6',
														    '$prof_mem_7',
														    '$prof_mem_8',
	    													'$prof_mem_9'
											                
		)") or  die('Error: ' . mysqli_error($conn));
		
		header('location:thank-you/');
	//}
?>