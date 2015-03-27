<?php
session_start();

$user="whoag1";
$pass="IofQ58sg";
$dbname="whoag1";
$host = "webdev.cs.kent.edu"; // db host

$college1 = $_SESSION['college'];

$last_name = $_SESSION['last_name'];
$first_name = $_SESSION['first_name'];
$middle_i = $_SESSION['middle_i'];
$email = $_SESSION['email'];
$kemail1 = $_SESSION['kemail'];
$phone = $_SESSION['phone'];
$years = $_SESSION['years'];
$rank = $_SESSION['rank'];
$status = $_SESSION['status'];
$campus = $_SESSION['campus'];
$dept = $_SESSION['dept'];

$EPC_interest = $_POST['EPC_interest'];
$FPDC_interest = $_POST['FPDC_interest'];
$UTC_interest = $_POST['UTC_interest'];
$CAO_interest = $_POST['CAO_interest'];
$FEC_interest = $_POST['FEC_interest'];
$FS_interest = $_POST['FS_interest'];
$IAC_interest = $_POST['IAC_interest'];

$EPC_history = $_POST['EPC_history'];
$FPDC_history = $_POST['FPDC_history'];
$UTC_history = $_POST['UTC_history'];
$CAO_history = $_POST['CAO_history'];
$FEC_history = $_POST['FEC_history'];
$FS_history = $_POST['FS_history'];
$IAC_history = $_POST['IAC_history'];

$activationkey = md5(uniqid(rand(), true));
//echo $activationkey;
try {
$dbh = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
	//echo "test";
//FACULTY
	$STH = $dbh->prepare("INSERT INTO faculty (last_name, first_name, middle_init, email, kemail, phone, rank, status, years, campus, college, dept, year_recorded, activationkey) 
		VALUES ('$last_name', '$first_name', '$middle_i', '$email', '$kemail1', '$phone', '$rank', '$status', '$years', '$campus', '$college1', '$dept', '2015', '$activationkey')");
	$STH->execute();

//BEGIN EACH COMMITTEE
	$STH = $dbh->prepare("INSERT INTO com (kemail, comm, level, memb)
		VALUES ('$kemail1', 'EPC', '$EPC_interest', '$EPC_history')");
	$STH->execute();

	$STH = $dbh->prepare("INSERT INTO com (kemail, comm, level, memb)
		VALUES ('$kemail1', 'FPDC', '$FPDC_interest', '$FPDC_history')");
	$STH->execute();

	$STH = $dbh->prepare("INSERT INTO com (kemail, comm, level, memb)
		VALUES ('$kemail1', 'UTC', '$UTC_interest', '$UTC_history')");
	$STH->execute();

	$STH = $dbh->prepare("INSERT INTO com (kemail, comm, level, memb)
		VALUES ('$kemail1', 'CAO', '$CAO_interest', '$CAO_history')");
	$STH->execute();

	$STH = $dbh->prepare("INSERT INTO com (kemail, comm, level, memb)
		VALUES ('$kemail1', 'FEC', '$FEC_interest', '$FEC_history')");
	$STH->execute();

	$STH = $dbh->prepare("INSERT INTO com (kemail, comm, level, memb)
		VALUES ('$kemail1', 'FS', '$FS_interest', '$FS_history')");
	$STH->execute();

	$STH = $dbh->prepare("INSERT INTO com (kemail, comm, level, memb)
		VALUES ('$kemail1', 'IAC', '$IAC_interest', '$IAC_history')");
	$STH->execute();

	echo "Thank you for submitting your Faculty Senate Survey on Committee Interests. <br>
If you need to change your information you can access it by clicking the following link:
<a href='https://webdev.cs.kent.edu/whoag1/wp2/hw2/surveyP1.php'> http:/webdev.cs.kent.edu/your_login/wp2/hw2/update.php?kent=" . $kemail1 . "&act=" . $activationkey .  "</a>";

	$msg = "Thank you for submitting your Faculty Senate Survey on Committee Interests. <br>
If you need to change your information you can access it by clicking the following link:
<a href='https://webdev.cs.kent.edu/whoag1/wp2/hw2/surveyP1.php'> http:/webdev.cs.kent.edu/your_login/wp2/hw2/update.php?kent=" . $kemail1 . "&act=" . $activationkey .  "</a>";

	$header = 'Content-type: text/html; charset=utf-8' . "\r\n";

		mail($kemail1, "An e-mail has been sent to your Kent e-mail address", $msg, $header);

}
catch (PDOException $e) {
	echo $e->getMessage();
}

?>