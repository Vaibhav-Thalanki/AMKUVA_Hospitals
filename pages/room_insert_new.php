<?php
$insert = false;
if(isset($_POST['rno'])){
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
    $rno = $_POST['rno'];
    $lno = $_POST['lno'];
    $sta = $_POST['sta'];
    $rc = $_POST['rc'];

    $sql = "INSERT INTO `hci_da`.`room` (`rno`, `lno`, `r_status`, `room_charge`, `date`) VALUES ('$rno', '$lno', '$sta', '$rc', current_timestamp());";
    

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
        <h1 class="title text-uppercase"> ROOM.</h1>
        <div class="sub-title">we give you everything right here :)</div>
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
$query1 = "SELECT labno from `hci_da`.`labreport`;";
$result1 = mysqli_query($con,$query1);
if($con->query($query1) == true){
    echo "<h2><B>Lab Report Numbers : </h2></B>";
    //echo "<br>";
    while($row = mysqli_fetch_array($result1)){
        echo $row['labno'];
        echo"<br>"; 
    }
}

?>
      <form action="room_insert_new.php" method="post">
       <section class="timeliner timeline-container">
         <div class="timeline-block">
          <div class="timeline-icon">
           </div>
          <div class="timeline-content">
            <h2>
             <div class="text-center"><label for="rno" style="font-size:28px">Room No.:</label></div>
            </h2>
            <span class="cd-date"><div class="text-center"><input type="text" id="rno" name="rno"  placeholder="Enter Room No."></div></span>
          </div>
        </div>
        <div class="timeline-block clearfix">
          <div class="timeline-icon">
          </div>
          <div class="timeline-content">
            <h2>
             <div class="text-center"><label for="lno" style="font-size:28px">Lab No.:</label></div>
            </h2>
            <span class="cd-date"><div class="text-center"><input type="text" id="lno" name="lno"  placeholder="Enter Lab No."></div></span>
          </div>
        </div>
        <div class="timeline-block clearfix">
          <div class="timeline-icon">
          </div>
          <div class="timeline-content">
            <h2>
             <div class="text-center"><label for="sta" style="font-size:28px">Status:</label></div>
            </h2>
            <span class="cd-date"><div class="text-center"><input type="text" id="sta" name="sta" placeholder="Enter status of room"></div></span>
          </div>
        </div>
        <div class="timeline-block clearfix">
          <div class="timeline-icon">
          </div>
          <div class="timeline-content">
            <h2>
             <div class="text-center"><label for="rc" style="font-size:28px">Room Charge:</label></div>
            </h2>
            <span class="cd-date"><div class="text-center"><input type="text" id="rc" name="rc" placeholder="Enter room charge"></div></span>
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