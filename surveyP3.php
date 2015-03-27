<?php
session_start();

$user="whoag1";
$pass="IofQ58sg";
$dbname="whoag1";
$host = "webdev.cs.kent.edu"; // db host

//REPLACE THESE WITH NEW VARIABLES FROM surveyP2
//$kemail1 = $_POST['kemail_in'];
//$_SESSION['kemail'] = $kemail1;
//$college1 = $_POST['college_in'];
//$_SESSION['college'] = $college1;
//enter rest of SESSION variables into local variables

$last_name = $_POST['last_name'];
$_SESSION['last_name'] = $last_name;
$first_name = $_POST['first_name'];
$_SESSION['first_name'] = $first_name;
$middle_i = $_POST['middle_i'];
$_SESSION['middle_i'] = $middle_i;
//$kemail = $_SESSION['kemail'];
$email = $_POST['email'];
$_SESSION['email'] = $email;
$phone = $_POST['phone'];
$_SESSION['phone'] = $phone;
$years = $_POST['years'];
$_SESSION['years'] = $years;
$rank = $_POST['rank'];
$_SESSION['rank'] = $rank;
$status = $_POST['status'];
$_SESSION['status'] = $status;
$campus = $_POST['campus'];
$_SESSION['campus'] = $campus;
$dept = $_POST['dept'];
$_SESSION['dept'] = $dept;

//Create connection
$link = mysqli_connect($host, $user, $pass, $dbname);
// Check connection
if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
    echo mysqli_connect_error();
}

echo "<center> 3. Committee Preferences </center> 
	  <center> Pick the option you like the best.</center> 
	  <center> Make sure you fill out both the Interest and Membership Hitsory.</center>";

echo "<hr> <br>";

echo " <center> Committee Nominated by the Committee on Committees: </center> \n";

// the form begins

echo "<form name='com' method='post' action='submission.php'> <br>
	 <table align='center' style='font-color:black; padding:3px;'>
		<tr style= 'text-align:center; padding:2px; border: 1px solid black; border-collapse:collapse;'>
				<th> Committee </th>
				<th colspan = '3'> Interest </th>
				<th colspan = '4'> Membership Hitsory </th>
		</tr>";
		
		echo "<tr style= 'text-align:center; padding:2px; border: 1px solid black; border-collapse:collapse;'>
				<th style= 'text-align:center; background-color:lightgreen; padding:2px; border: 1px solid black; border-collapse:collapse;'> </th>
				<th style= 'text-align:center; background-color:lightgreen; padding:2px; border: 1px solid black; border-collapse:collapse;'>Intrested</th>
				<th style= 'text-align:center; background-color:lightgreen; padding:2px; border: 1px solid black; border-collapse:collapse;'>Very Intresed</th>
			    <th style= 'text-align:center; background-color:lightgreen; padding:2px; border: 1px solid black; border-collapse:collapse;'>Not Intrested</th>
				<th style= 'text-align:center; background-color:lightgreen; padding:2px; border: 1px solid black; border-collapse:collapse;'>Current</th>
				<th style= 'text-align:center; background-color:lightgreen; padding:2px; border: 1px solid black; border-collapse:collapse;'>Expiring</th>
				<th style= 'text-align:center; background-color:lightgreen; padding:2px; border: 1px solid black; border-collapse:collapse;'>Previous</th>
			    <th style= 'text-align:center; background-color:lightgreen; padding:2px; border: 1px solid black; border-collapse:collapse;'>Never</th>";
		echo"</tr>";

		//BEGINNING RADIO BUTTONS FOR COMMITTEE / RESPONSE 			
			if ($result = mysqli_query($link, "SELECT * FROM committee")) 
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
					        				<input type='radio' name='" . $row["name"] . "_interest' value='IN'>
					        				</td>
					        				<td style='text-align:center; background-color:lightgreen; padding:2px; border: 1px solid black; border-collapse:collapse;'>
					        				<input type='radio' name='" . $row["name"] . "_interest' value='VI'>
					        				</td>
					        				<td style='text-align:center; background-color:lightgreen; padding:2px; border: 1px solid black; border-collapse:collapse;'>
					        				<input type='radio' name='" . $row["name"] . "_interest' value='NI'>
					        				</td>
					        				<td style='text-align:center; background-color:lightgreen; padding:2px; border: 1px solid black; border-collapse:collapse;'>
					        				<input type='radio' name='" . $row["name"] . "_hist' value='C'>
					        				</td>
					        				<td style='text-align:center; background-color:lightgreen; padding:2px; border: 1px solid black; border-collapse:collapse;'>
					        				<input type='radio' name='" . $row["name"] . "_hist' value='E'>
					        				</td>
					        				<td style='text-align:center; background-color:lightgreen; padding:2px; border: 1px solid black; border-collapse:collapse;'>
					        				<input type='radio' name='" . $row["name"] . "_hist' value='P'>
					        				</td>
					        				<td style='text-align:center; background-color:lightgreen; padding:2px; border: 1px solid black; border-collapse:collapse;'>
					        				<input type='radio' name='" . $row["name"] . "_hist' value='N'>";
					        			echo "</td>";
					        		echo "</tr>";
					        	}				        		    
		        			}
				}
			} 
echo "</table>";
			echo "</form>";					

echo "<form align='center' name='com' method='post' action='submission.php'>
	 <table style='font-color:black; padding:3px;'>";

echo "<br><br><br>";
echo "<button type='submit' formaction='submission.php'> Submit </button>";

echo "</table>";
			echo "</form>";

?>


