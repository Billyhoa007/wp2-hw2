<?php

//open the connection
$user="whoag1";
$pass="IofQ58sg";
$dbname="whoag1";
$host = "webdev.cs.kent.edu"; // db host
$link = mysqli_connect($host, $user, $pass, $dbname);

?>

<?php
//START THE FORM
/* Select queries return a resultset */
if ($result = mysqli_query($link, "SELECT * FROM campus")) 
{
    printf("Select returned %d rows.\n", mysqli_num_rows($result));
    if ($result->num_rows > 0) 
    {
      // output data of each row
      while($row = $result->fetch_assoc()) 
      {
          echo "id: " . $row["row"]. " - Name: " . $row["name"]. " " . $row["abbr"]. "<br>";
      }
  } 
  else 
  {
      echo "0 results";
  }
    /* free result set */
    mysqli_free_result($result);
}
?>
</div>
<?php 
//close the connection
mysqli_close($link); 
//$link = null;
?>