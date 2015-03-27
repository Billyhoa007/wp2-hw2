<?php



//require_once("test.php");
session_start();

$activationkey = 0;
$user_exists = 0;
$ex_email = 0;

$user="whoag1";
$pass="IofQ58sg";
$dbname="whoag1";
$host = "webdev.cs.kent.edu"; // db host 

$kemail1 = $_POST['kemail_in'];
$_SESSION['kemail'] = $kemail1;
$college1 = $_POST['college_in'];
$_SESSION['college'] = $college1;

//Create connection
$link = mysqli_connect($host, $user, $pass, $dbname);
// Check connection
if (!$link) 
{
    die("Connection failed: " . mysqli_connect_error());
    echo mysqli_connect_error();
}

try {
	$dbh = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

	$STH = $dbh->prepare("SELECT kemail FROM faculty"); 
	$STH->execute();

	while ($row = $STH->fetch()) {
		

		if ($kemail1 === $row['kemail']) {
			$user_exists = 1;
		}
		
	}

	if ($user_exists === 1) {
		echo "Record already exists for " . $kemail1 . "<br>";
		echo "An e-mail has been sent to your Kent e-mail address above with a link to update your record, if you wish.";

		//email the user
		//get their activation key
		$STH = $dbh->prepare("SELECT * FROM faculty WHERE kemail = :kemail1"); 
		$STH->execute(array('kemail1'=>$kemail1));
		while ($row = $STH->fetch()) {
			//echo $row['activationkey'];
			$activationkey = $row['activationkey'];
			echo "<br>";
		}

		$msg = "Thank you for submitting your Faculty Senate Survey on Committee Interests. <br>
If you need to change your information you can access it by clicking the following link:
<a href='https://webdev.cs.kent.edu/whoag1/wp2/hw2/surveyP1.php'>http:/webdev.cs.kent.edu/whoag1/wp2/hw2/update.php?" . $kemail1 . "&act=" . $activationkey . "</a>";
		$header = 'Content-type: text/html; charset=utf-8' . "\r\n";
		mail($kemail1, "Your Survey", $msg, $header);	
		
	}
		else {

echo "<center> 1. Your Information (continued) </center> ";
		echo "<center> We need to know to contact you and a little bit about you.</center>";

		echo "<hr> <br>";
		
echo "<form name='response' method='post' action='submission.php'> <br>
	 <table align='center' style='font-color:black; padding:3px;'>
		<tr style= 'text-align:center; padding:2px; border: 1px solid black; border-collapse:collapse;'>
				<th> Rank </th>
		</tr>";
		
		//BEGINNING RADIO BUTTONS FOR COMMITTEE / RESPONSE 			
			if ($result = mysqli_query($link, "SELECT * FROM rank")) 
			{
		    	if ($result->num_rows > 0) 
		    	{
						    // output committee first
						    while($row = $result->fetch_assoc()) 
						    {												
								if ($row['state'] === 'a'){
									//echo "<input type='radio' name='rank' value='" .  $row["name"]  . "'>";
									echo "<tr style='text-align:left; padding:2px; border: 1px solid black; border-collapse:collapse;'>
											<td style='text-align:center; background-color:lightgreen; padding:2px; border: 1px solid black; border-collapse:collapse;'>";
					        			echo $row["name"] . "<br> 
					        				</td>
											<td style='text-align:center; background-color:lightgreen; padding:2px; border: 1px solid black; border-collapse:collapse;'>
					        				<input type='radio' name='" . $row["name"] . "'>
					        				</td>";
					        			echo "</td>";
					        		echo "</tr>";
					        	}				        		    
		        			}
				}
			} 

echo "<form name='response' method='post' action='submission.php'> <br>
	 <table align='center' style='font-color:black; padding:3px;'>
		<tr style= 'text-align:center; padding:2px; border: 1px solid black; border-collapse:collapse;'>
				<th> Status </th>
		</tr>";
		
		//BEGINNING RADIO BUTTONS FOR COMMITTEE / RESPONSE 			
			if ($result = mysqli_query($link, "SELECT * FROM status")) 
			{
		    	if ($result->num_rows > 0) 
		    	{
						    // output committee first
						    while($row = $result->fetch_assoc()) 
						    {												
								if ($row['state'] === 'a'){
									//echo "<input type='radio' name='rank' value='" .  $row["name"]  . "'>";
									echo "<tr style='text-align:left; padding:2px; border: 1px solid black; border-collapse:collapse;'>
											<td style='text-align:center; background-color:lightgreen; padding:2px; border: 1px solid black; border-collapse:collapse;'>";
					        			echo $row["name"] . "<br> 
					        				</td>
											<td style='text-align:center; background-color:lightgreen; padding:2px; border: 1px solid black; border-collapse:collapse;'>
					        				<input type='radio' name='" . $row["name"] . "'>
					        				</td>";
					        			echo "</td>";
					        		echo "</tr>";
					        	}				        		    
		        			}
				}
			} 

echo "<form name='response' method='post' action='submission.php'> <br>
	 <table align='center' style='font-color:black; padding:3px;'>
		<tr style= 'text-align:center; padding:2px; border: 1px solid black; border-collapse:collapse;'>
				<th> Campus </th>
		</tr>";
		
		//BEGINNING RADIO BUTTONS FOR COMMITTEE / RESPONSE 			
			if ($result = mysqli_query($link, "SELECT * FROM campus")) 
			{
		    	if ($result->num_rows > 0) 
		    	{
						    // output committee first
						    while($row = $result->fetch_assoc()) 
						    {												
								if ($row['state'] === 'a'){
									//echo "<input type='radio' name='rank' value='" .  $row["name"]  . "'>";
									echo "<tr style='text-align:left; padding:2px; border: 1px solid black; border-collapse:collapse;'>
											<td style='text-align:center; background-color:lightgreen; padding:2px; border: 1px solid black; border-collapse:collapse;'>";
					        			echo $row["name"] . "<br> 
					        				</td>
											<td style='text-align:center; background-color:lightgreen; padding:2px; border: 1px solid black; border-collapse:collapse;'>
					        				<input type='radio' name='" . $row["name"] . "'>
					        				</td>";
					        			echo "</td>";
					        		echo "</tr>";
					        	}				        		    
		        			}
				}
			} 

echo "<form name='response' method='post' action='submission.php'> <br>
	 <table align='center' style='font-color:black; padding:3px;'>
		<tr style= 'text-align:center; padding:2px; border: 1px solid black; border-collapse:collapse;'>
				<th> Department </th>
		</tr>";
		
		//BEGINNING RADIO BUTTONS FOR COMMITTEE / RESPONSE 			
			if ($result = mysqli_query($link, "SELECT * FROM dept")) 
			{
		    	if ($result->num_rows > 0) 
		    	{
						    // output committee first
						    while($row = $result->fetch_assoc()) 
						    {												
								if ($row['state'] === 'a'){
									//echo "<input type='radio' name='rank' value='" .  $row["name"]  . "'>";
									echo "<tr style='text-align:left; padding:2px; border: 1px solid black; border-collapse:collapse;'>
											<td style='text-align:center; background-color:lightgreen; padding:2px; border: 1px solid black; border-collapse:collapse;'>";
					        			echo $row["name"] . "<br> 
					        				</td>
											<td style='text-align:center; background-color:lightgreen; padding:2px; border: 1px solid black; border-collapse:collapse;'>
					        				<input type='radio' name='" . $row["name"] . "'>
					        				</td>";
					        			echo "</td>";
					        		echo "</tr>";
					        	}				        		    
		        			}
				}
			} 


			//START THE FORM
			/* Select queries return a resultset */
			echo "<table align='center' style='font-color:black; padding:px;'>";
				echo "<tr>";
					echo "<td style='background-color:lightgreen; text-align:center padding:100px;'>";
						
						//Begin form for page 1
						echo "<form name='faculty' method='post' action='surveyP3.php'> <br>";
							echo "Last Name <br> ";
								echo "<input type='text' name='last_name' placeholder='Your last name' required ='' ><br>";
							echo "First Name <br> ";			
								echo "<input type='text' name='first_name' placeholder='Your first name' required = '' ><br>";
							echo "Middle Initial <br>";			
								echo "<input type='text' name='middle_i' placeholder='Your middle initial'><br>";
							echo "Kent Email Address <br>";			
								echo "<input type='text' name='kemail' value ='" . $kemail1 . "' required = ''><br>";
							echo "Preferred Email Address <br>";			
								echo "<input type='text' name='email' placeholder='Preferred email'> <br>";
							echo "Phone <br>";			
								echo "<input type='text' name='phone' placeholder='Your phone number'> <br>";
							echo "Total Years Taught <br>";			
								echo "<input type='text' name='years' placeholder='Number of years'> <br>";

							
			echo "<tr>";
				echo "<td>";
					//echo "<input type='button' value='Submit' onclick='document.faculty.submit()'>";
					echo "<button type='submit' formaction='surveyP3.php'> Submit </button>";
					echo "</form>";
				echo "</td>";
			echo "</tr>";
		echo "</table>";
	}
		
	
}

catch (PDOException $e) {
	echo $e->etMessage();

}

	

//}

?>

