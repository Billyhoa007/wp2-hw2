

<?php
//Begin session
session_start();

//open the connection
$user="whoag1";
$pass="IofQ58sg";
$dbname="whoag1";
$host = "webdev.cs.kent.edu"; // db host

$link = mysqli_connect($host, $user, $pass, $dbname);

echo "<center> 1. Introduction </center> ";
echo "<center> This Survey closes on April 16, 2014.</center>";
echo "<center> The Kent State University will respond as soon as they can to your responses.</center>";
echo "<center> In the case of technical problems contact whoag1@kent.edu </center>";

echo "<hr> <br> <br>";
echo "<center> 2. Your Information: </center>";
echo "<hr> <br>";

echo "<form name='response' method='post' action='submission.php'> <br>
	 <table align='center' style='font-color:black; padding:3px;'>
		<tr style= 'text-align:center; padding:2px; border: 1px solid black; border-collapse:collapse;'>
				<th> College or Affiliation </th>
		</tr>";
		
		//BEGINNING RADIO BUTTONS FOR COMMITTEE / RESPONSE 			
			if ($result = mysqli_query($link, "SELECT * FROM college")) 
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
echo "<table align='center' style='font-color:black; padding:25px;'>";
	echo "<tr >";
		echo "<td style='background-color:lightgreen; text-align:center; padding:75px;'>";
			echo "Enter your Kent Email";
			//Begin form for page 1
			echo " <form name='faculty' method='post' action='surveyP2.php'>
						<input type='text' name='kemail_in' placeholder='@kent.edu' required=''>";
	
		echo "</td>";
	echo "</tr>";

//End form for page 1
echo "<tr style= 'text-align:center'>";
	echo "<td>";
		//echo "<input type='button' value='Submit' onclick='document.faculty.submit()'>";
		echo "<button type='submit' formaction='surveyP2.php'> Submit </button>";
		echo "</form>";
	echo "</td>";
echo "</tr>";	
echo "</table>";
 
//Does this need to be done?
//close the connection
//mysqli_close($link);

//$link = null;
?>

