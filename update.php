<?php 

session_start();

//open the connection
$user="whoag1";
$pass="IofQ58sg";
$dbname="whoag1";
$host = "webdev.cs.kent.edu"; // db host

$link = mysqli_connect($host, $user, $pass, $dbname);


$SESSION['last_name']  = $last_name; 
$SESSION['first_name']  = $first_name; 
$SESSION['middle_i']  = $middle_i; 
$SESSION['email']  = $email_; 
$SESSION['phone']  = $phone; 
$SESSION['rank']  = $rank; 
$SESSION['status']  = $status; 
$SESSION['campus']  = $campus; 
$SESSION['dept']  = $dept;
$SESSION['college'] = $college1;
$SESSION['years'] = $years; 

echo "<center> College or Affiliation \n";


if ($result = mysqli_query($link, "SELECT * FROM college")) 
	{
	  
	    if ($result->num_rows > 0) 
	    {
		    // output data of each row
		    while($row = $result->fetch_assoc()) 
		    {
		    	echo "<table align='center' style='font-color:black; padding:3px;'>";
		    	echo "<tr>";
					echo "<td>";
						if ($row['state'] === 'a'){
														
							echo $row["name"];
							echo "<input type='radio' name='college_in' value='" .  $college1  . "'>";	
			        	}
		        	echo "</td>";
	        	echo "</tr>";	    
        	}
		} 
		else 
		{
		    echo "0 results";
		}

	    /* free result set */
	    mysqli_free_result($result);
	    
	}
echo "<br>";

"<table align='center' style='font-color:black; padding:3px;'>";
		echo "<tr>";
			echo "<td style='background-color:lightgreen; text-align:left; padding:2px;'>";
				
				//Begin form for page 1
				echo "<form name='faculty' method='post' action='surveyP3.php'> <br>";
					echo "Last Name <br> ";
						echo "<input type='text' name='last_name' value ='" . $last_name . "' required ='' ><br>";
					echo "First Name <br> ";			
						echo "<input type='text' name='first_name' value ='" . $first_name . "' required = '' ><br>";
					echo "Middle Initial <br>";			
						echo "<input type='text' name='middle_i' value ='" . $middle_i . "' ><br>";
					echo "Kent Email Address <br>";			
						echo "<input type='text' name='kemail' value ='" . $kemail1 . "' required = ''><br>";
					echo "Preferred Email Address <br>";			
						echo "<input type='text' name='email' value ='" . $email . "' > <br>";
					echo "Phone <br>";			
						echo "<input type='text' name='phone' value ='" . $phone . "'> <br>";
					echo "Total Years Taught <br>";			
						echo "<input type='text' name='years' alue ='" . $years . "'> <br>";


					echo "<br><br>";
					//BEGINNING RADIO BUTTONS FOR RANK			
					if ($result = mysqli_query($link, "SELECT * FROM rank")) 
					{
				    	//printf("Select returned %d rows.\n", mysqli_num_rows($result));
				    	//echo "<br>";
					    	if ($result->num_rows > 0) 
					    	{
						    	echo "<tr>";

					    		
						    		echo "<td style='background-color:lightgreen; text-align:left; padding:2px;'>";
						    			echo "Rank <br>";
									    // output data of each row
									    while($row = $result->fetch_assoc()) 
									    {												
											if ($row['state'] === 'a'){
												echo "<input type='radio' name='rank' value='" .  $rank  . "'>";
								        		echo $row["name"] . "<br>"; 
								        	}				        		    
					        		}
					        		echo "</td>";
				        		echo "</tr>";
							}
						} 

					echo "<br><br>";
					//BEGINNING RADIO BUTTONS FOR Status			
					if ($result = mysqli_query($link, "SELECT * FROM status")) 
					{
				    	//printf("Select returned %d rows.\n", mysqli_num_rows($result));
				    	//echo "<br>";
					    	if ($result->num_rows > 0) 
					    	{
						    	echo "<tr>";

					    		
						    		echo "<td style='background-color:lightgreen; text-align:left; padding:2px;'>";
						    			echo "Status <br>";
									    // output data of each row
									    while($row = $result->fetch_assoc()) 
									    {												
											if ($row['state'] === 'a'){
												echo "<input type='radio' name='status' value='" .  $status  . "'>";
								        		echo $row["name"] . "<br>"; 
								        	}				        		    
					        		}
					        		echo "</td>";
				        		echo "</tr>";
							}
						} 

						echo "<br><br>";
					//BEGINNING RADIO BUTTONS FOR Campus			
					if ($result = mysqli_query($link, "SELECT * FROM campus")) 
					{
				    	//printf("Select returned %d rows.\n", mysqli_num_rows($result));
				    	//echo "<br>";
					    	if ($result->num_rows > 0) 
					    	{
						    	echo "<tr>";

					    		
						    		echo "<td style='background-color:lightgreen; text-align:left; padding:2px;'>";
						    			echo "Campus <br>";
									    // output data of each row
									    while($row = $result->fetch_assoc()) 
									    {												
											if ($row['state'] === 'a'){
												echo "<input type='radio' name='campus' value='" .  $campus  . "'>";
								        		echo $row["name"] . "<br>"; 
								        	}				        		    
					        		}
					        		echo "</td>";
				        		echo "</tr>";
							}
						} 

					//BEGINNING RADIO BUTTONS FOR Dept			
					if ($result = mysqli_query($link, "SELECT * FROM dept")) 
					{
				    	//printf("Select returned %d rows.\n", mysqli_num_rows($result));
				    	//echo "<br>";
					    	if ($result->num_rows > 0) 
					    	{
						    	echo "<tr>";

					    		
						    		echo "<td style='background-color:lightgreen; text-align:left; padding:2px;'>";
						    			echo "Department <br>";
									    // output data of each row
									    while($row = $result->fetch_assoc()) 
									    {												
											if ($row['state'] === 'a'){
												echo "<input type='radio' name='dept' value='" .  $dept  . "'>";
								        		echo $row["name"] . "<br>"; 
								        	}				        		    
					        		}
					        		echo "</td>";
				        		echo "</tr>";
							}
						} 




?>