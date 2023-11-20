<?php
$insert = false;
if(isset($_POST['bno'])){
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
    $bno = $_POST['bno'];
    $pid = $_POST['pid'];
    $query1 = "SELECT did FROM `hci_da`.`patient` WHERE pid='$pid';";
    $query2 = "SELECT labno FROM `hci_da`.`labreport` WHERE pid='$pid';";
    
    $pid = $_POST['pid'];
    //$rc = $_POST['rc'];
    $mc = $_POST['mc'];
    $bs = $_POST['bs'];
    $result1 = mysqli_query($con,$query1);
    $row = mysqli_fetch_array($result1);
    $did = $row['did'];

    $result2 = mysqli_query($con,$query2);
    $row2 = mysqli_fetch_array($result2);
    $labno = $row2['labno'];
    $query3 = "SELECT room_charge FROM `hci_da`.`room` WHERE lno='$labno';";

    $result3 = mysqli_query($con,$query3);
    $row3 = mysqli_fetch_array($result3);
    $rc = $row3['room_charge'];


    $sql = "INSERT INTO `hci_da`.`bill` (`bno`, `did`, `pid`, `room_charge`, `medicine_charge`, `bill_status`, `date`) VALUES ('$bno', '$did', '$pid', '$rc', '$mc', '$bs', current_timestamp());";
    

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
        <h1 class="title text-uppercase"> BILL.</h1>
        <div class="sub-title">billing a better future :)</div>
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
$query1 = "SELECT pid,pname from `hci_da`.`patient`;";
$result1 = mysqli_query($con,$query1);
if($con->query($query1) == true ){
    echo "<h2><B>Patients : </h2></B>";
    //echo "<br>";
    while($row = mysqli_fetch_array($result1)){
        echo $row['pid'];
        echo " - ".$row['pname'];
        echo"<br>"; 
    }
}

?>
      <form action="bill_insert_new.php" method="post">
       <section class="timeliner timeline-container">
         <div class="timeline-block">
          <div class="timeline-icon">
           </div>
          <div class="timeline-content">
            <h2>
             <div class="text-center"><label for="bno" style="font-size:28px">Bill No.:</label></div>
            </h2>
            <span class="cd-date"><div class="text-center"><input type="text" id="bno" name="bno"  placeholder="Enter Bill No."></div></span>
          </div>
        </div>
<div class="timeline-block clearfix">
          <div class="timeline-icon">
          </div>
          <div class="timeline-content">
            <h2>
             <div class="text-center"><label for="pid" style="font-size:28px">Patient ID:</label></div>
            </h2>
            <span class="cd-date"><div class="text-center"><input type="text" id="pid" name="pid" placeholder="Enter Patient's ID"></div></span>
          </div>
        </div>
        <div class="timeline-block clearfix">
          <div class="timeline-icon">
          </div>
          <div class="timeline-content">
            <h2>
             <div class="text-center"><label for="mc" style="font-size:28px">Medicine Charge:</label></div>
            </h2>
            <span class="cd-date"><div class="text-center"><input type="text" id="mc" name="mc" placeholder="Enter Medicine Charge"></div></span>
          </div>
        </div>
        <div class="timeline-block clearfix">
          <div class="timeline-icon">
          </div>
          <div class="timeline-content">
            <h2>
             <div class="text-center"><label for="bs" style="font-size:28px">Bill Status:</label></div>
            </h2>
            <span class="cd-date"><div class="text-center"><input type="text" id="bs" name="bs" placeholder="Enter Bill Status"></div></span>
          </div>
        </div>
        </section>
       <div class="text-center">
        <a class="btn line-btn-dark btn-icon btn-radius"><button class="btn">Submit</button></a>
        <p>_</p>
      </div>
     </form>
    </div>
   </div>
 </div>
</body>
</html>