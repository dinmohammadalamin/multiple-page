<?php
if (isset($_GET['country'])){
    $selectedCountry = $_GET['country'];
    
    
    $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "multipages";
          $conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
          if (mysqli_connect_errno()) {
              printf("Connect failed: %s\n", mysqli_connect_error());
              exit();
          }
          $sqldistrict = "SELECT district FROM country WHERE country_name='$selectedCountry'";

          $result = $conn->query($sqldistrict);

          $district = [];

        if ($result->num_rows > 0){
            while ($rows =  $result->fetch_assoc() ){
                $district[] = trim($rows['district']);
            }
        }
        $conn->close();

        header('Content-type: application/json');
        echo json_encode($district);

}


?>