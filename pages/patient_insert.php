
<?php

$insert = false;
if(isset($_POST['pname'])){
    // Set connection variables
    $server = "localhost:3307";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    $pid = $_POST['pid'];
    $pname = $_POST['pname'];
    $age = $_POST['age'];
    $gen = $_POST['gen'];
    $wgt = $_POST['wgt'];
    $address = $_POST['address'];
    $pno = $_POST['pno'];
    $did = $_POST['did'];
    $disease = $_POST['disease'];
    $sql = "INSERT INTO `hci_da`.`patient` (`pid`, `pname`, `age`, `gender`, `weight`, `phone`, `did`, `date`, `disease`, `address`) VALUES ('$pid', '$pname', '$age', '$gen', '$wgt', '$pno', '$did', current_timestamp(),'$disease','$address');";

    // echo $sql;
    

    // Execute the query
    if($con->query($sql) == true){
        echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="icon" type="image/png" href="../images/amkuva_bg_image.jpeg" />
    <link rel="stylesheet" href="../styles/H.css">
  </head>
  <body>
    <header class="header">
      <div style="background-image:url('../images/black_bg_image.jpeg');">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
              <span class="sr-only">Toggle navigation</span>
            </button>
            <a class="navbar-brand" href="../index.php"><font color="grey">Amkuva Hospital</font><span class="visible-lg-inline"></span></a>
          </div>
         </div>
       </div>
    </header>
    <div class="section-wrapper" id="details">
      <div class="section-title m-top-100 text-center">
       <p>_</p>
        <h1 class="title text-uppercase"> PATIENTS.</h1>
        <div class="sub-title">get well soon :)</div>
        
      </div>
      <?php
$server = "localhost:3307";
$username = "root";
$password = "";

// Create a database connection
$con = mysqli_connect($server, $username, $password);

// Check for connection success
if(!$con){
    die("connection to this database failed due to" . mysqli_connect_error());
}
$query1 = "SELECT did,dname from `hci_da`.`doctor`;";
$result1 = mysqli_query($con,$query1);
if($con->query($query1) == true){
    echo "<h2><B>Doctors available: </h2></B>";
    //echo "<br>";
    while($row = mysqli_fetch_array($result1)){
        echo $row['did'];
        echo " - ".$row['dname'];
        echo"<br>"; 
    }
}

?>
      <form action="patient_insert.php" method="post">
       <section class="timeliner timeline-container">
         <div class="timeline-block">
          <div class="timeline-icon">
           </div>
          <div class="timeline-content">
            <h2>
             <div class="text-center"><label for="fname" style="font-size:28px">Patient ID:</label></div>
            </h2>
            <span class="cd-date"><div class="text-center"><input type="text" id="pid" name="pid"></div></span>
          </div>
        </div>
        <div class="timeline-block clearfix">
          <div class="timeline-icon">
          </div>
          <div class="timeline-content">
            <h2>
             <div class="text-center"><label for="pname" style="font-size:28px">Patient Name:</label></div>
            </h2>
            <span class="cd-date"><div class="text-center"><input type="text" id="pname" name="pname"></div></span>
          </div>
        </div>
        <div class="timeline-block clearfix">
          <div class="timeline-icon">
          </div>
          <div class="timeline-content">
            <h2>
             <div class="text-center"><label for="age" style="font-size:28px">Age:</label></div>
            </h2>
            <span class="cd-date"><div class="text-center"><input type="text" id="age" name="age"></div></span>
          </div>
        </div>
        <div class="timeline-block clearfix">
          <div class="timeline-icon">
          </div>
          <div class="timeline-content">
            <h2>
             <div class="text-center"><label for="gen" style="font-size:28px">Gender:</label></div>
            </h2>
            <span class="cd-date"><div class="text-center"><input type="text" id="gen" name="gen"></div></span>
          </div>
        </div>
        <div class="timeline-block clearfix">
          <div class="timeline-icon">
          </div>
          <div class="timeline-content">
            <h2>
             <div class="text-center"><label for="wgt" style="font-size:28px">Weight:</label></div>
            </h2>
            <span class="cd-date"><div class="text-center"><input type="text" id="wgt" name="wgt"></div></span>
          </div>
        </div>
        <div class="timeline-block clearfix">
          <div class="timeline-icon">
          </div>
          <div class="timeline-content">
            <h2>
             <div class="text-center"><label for="add" style="font-size:28px">Address:</label></div>
            </h2>
            <span class="cd-date"><div class="text-center"><input type="text" id="address" name="address"></div></span>
          </div>
        </div>
        <div class="timeline-block clearfix">
          <div class="timeline-icon">
          </div>
          <div class="timeline-content">
            <h2>
             <div class="text-center"><label for="pno" style="font-size:28px">Phone No.:</label></div>
            </h2>
            <span class="cd-date"><div class="text-center"><input type="phone" id="pno" name="pno"></div></span>
          </div>
        </div>
        <div class="timeline-block clearfix">
          <div class="timeline-icon">
          </div>
          <div class="timeline-content">
            <h2>
             <div class="text-center"><label for="did" style="font-size:28px">Doctor ID:</label></div>
            </h2>
            <span class="cd-date"><div class="text-center"><input type="text" id="did" name="did"></div></span>
          </div>
        </div>
        <div class="timeline-block clearfix">
          <div class="timeline-icon">
          </div>
          <div class="timeline-content">
            <h2>
             <div class="text-center"><label for="disease" style="font-size:28px">Disease:</label></div>
            </h2>
            <span class="cd-date"><div class="text-center"><input type="text" id="disease" name="disease"></div></span>
            <button class="btn">Submit</button>
          </div>
         </div>
       </section>
      
     </form>
    </div>
   </div>
 </div>
</body>
</html>

