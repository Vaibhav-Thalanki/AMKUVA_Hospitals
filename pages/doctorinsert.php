<?php
$insert = false;
if(isset($_POST['did'])){
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
    $did = $_POST['did'];
    $dname = $_POST['dname'];
    $dept = $_POST['dept'];
    $deg = $_POST['deg'];

    $sql = "INSERT INTO `hci_da`.`doctor` (`did`, `dname`, `department`, `degree`, `date`) VALUES ('$did', '$dname', '$dept', '$deg', current_timestamp());";
    

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
        <h1 class="title text-uppercase"> DOCTORS.</h1>
        <div class="sub-title">healing hands :)</div>
      </div>
      <form action="doctorinsert.php" method="post">
       <section class="timeliner timeline-container">
         <div class="timeline-block">
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
             <div class="text-center"><label for="dname" style="font-size:28px">Doctor Name:</label></div>
            </h2>
            <span class="cd-date"><div class="text-center"><input type="text" id="dname" name="dname"></div></span>
          </div>
        </div>
        <div class="timeline-block clearfix">
          <div class="timeline-icon">
          </div>
          <div class="timeline-content">
            <h2>
             <div class="text-center"><label for="dept" style="font-size:28px">Department:</label></div>
            </h2>
            <span class="cd-date"><div class="text-center"><input type="text" id="dept" name="dept"></div></span>
          </div>
        </div>
        <div class="timeline-block clearfix">
          <div class="timeline-icon">
          </div>
          <div class="timeline-content">
            <h2>
             <div class="text-center"><label for="deg" style="font-size:28px">Degree:</label></div>
            </h2>
            <span class="cd-date"><div class="text-center"><input type="text" id="deg" name="deg"></div></span>
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
