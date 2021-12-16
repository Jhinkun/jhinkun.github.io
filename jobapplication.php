<?php
include 'dbConn.php';
if(count($_POST)>0){
  $jobdate = date('Y-m-d');
  $name = $_POST['name'];
  $age = $_POST['age'];
  $gender = $_POST['gender'];
  $education = $_POST['education']; 
  $phoneNum = $_POST['phoneNum'];
  $email = $_POST['email'];
  $filename = $_FILES['fileToUpload']['name'];

    // destination of the file on the server
    $destination = 'uploads/resume_pdf/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['fileToUpload']['tmp_name'];

    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        echo "You file extension must be .zip, .pdf or .docx";
    } elseif ($_FILES['fileToUpload']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        $remarks = 'Unchecked';
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO job_app VALUES ('$jobdate','$name','$age', '$gender', '$education','$phoneNum','$email', '$filename', '$remarks')";
            if (mysqli_query($conn, $sql)) {
              echo "<script>alert('Your application has been received')</script>";
              echo "<script> location.href='index.html'; </script>";
            }
        } else {
            echo "Failed to upload file.";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset = "utf-8">
</head>
	<title>Welcome to KaFerry Sdn. Bhd. Page!</title>
	<link rel="stylesheet" href="jobapplication.css">
	<link rel="stylesheet" href="css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Bangers&family=Lemon&family=Lemonada:wght@300&family=Viga&display=swap" rel="stylesheet">
<body>
<div class="banner">
		<nav class="navbar">
			<img class="logo" src="images/logo.png">
			<ul>
					<li><a href="index.html">Home</a></li>
					<li><a href="aboutus.html">About Us</a></li>
					<li><a href="gallery.html">Gallery</a></li>
					<li><a href="product.html">Products</a></li>
					<li><a href="jobapplication.php">Intern/Job Application</a></li>
					<li><a href="#socialmediacontact">Contact Us</a></li>
			</ul>
		</nav>
        <div class="container">
            <h1>Job Application</h1>
            <div class="table">
                <br><br><br><br>
                <!--PHP codes-->
                <form name="job_application" method="post" action="" autocomplete="off" enctype="multipart/form-data">
                <table id="form" cellspacing="5px" align="center">
                    <tr>
                      <td>Name</td>
                      <td><input type="text" name="name" autocomplete="off" placeholder="Enter your name"></td>
                    </tr>
                    <tr>
                      <td>Age</td>
                      <td><input type="text" name="age" autocomplete="off"  placeholder="Enter your age"></td>
                    </tr>
                    <tr>
                      <td>Gender</td>
                      <td><input type="radio" name="gender" value="F">Female &nbsp;&nbsp;&nbsp;<input type="radio" name="gender" value="M">Male</td>
                    </tr>
                    <tr>
                      <td>Education</td>
                      <td><input type="text" name="education" autocomplete="off" placeholder="Enter your education level"></td>
                    </tr>
                    <tr>
                      <td>Phone Number</td>
                      <td><input type="textbox" name="phoneNum" autocomplete="off" placeholder="Enter your phone number"></td>
                    </tr>
                    <tr>
                      <td>Email</td>
                      <td><input type="text" name="email" autocomplete="off" placeholder="Enter your email"></td>
                    </tr>
                    <tr>
                      <td>Select your resume files to upload:</td>
                      <td><input type="file" name="fileToUpload" id="fileToUpload"></td>
                    </tr>
                    <tr>
                      <td colspan="5" align="center"><input type="submit" name="submit" value="SUBMIT" class="btn_submit"></td>
                    </tr>
                  </table>
                </form>
            </div>
        </div>	
	</div>
	<section id="socialmediacontact">
		<div class="socialmediacontact">
			<br>
			<h2>Social Media</h2>
			<div class="yt"><a class="youtube" href="https://www.youtube.com/c/CadarGebusKakFerryOfficial"><i class="fab fa-youtube"></i></a></div>
			<div class="fb"><a class="facebook" href="https://www.facebook.com/search/top?q=cadar%20gebus%20kak%20ferry"><i class="fab fa-facebook"></i></a></div>
			<div class="ig"><a class="instagram" href="https://www.instagram.com/cadargebuskakferry/"><i class="fab fa-instagram"></i></a></div>
		</div>
	</section>
	<section id="contact">
		<div class="contact">
			<br>
			<h2>Contact</h2><br>
			<div class="email"><i class="fab fa-whatsapp"></i><a class ="whatsapp"> 010-3124216</a></div>
		</div>
	</section>
	<section id="location">
		<div class="location">
			<br>
			<h2>Location</h2><br>
			<div class="location"><i class="fab fa-location"></i><a class ="address"> No 36 Jalan Tasik Utama 63 Kawasan Perindustrian, 75450, Malacca</a></div>
		</div>
	</section>
</body>
</html>