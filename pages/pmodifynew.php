<?php
$conn = mysqli_connect("localhost:3307", "root", "", "hci_da");
if($conn-> connect_error) {
    die("connection failed:".$conn->connect_error);
}
if(isset($_POST['pid'])) {
    $pid = $_POST['pid'];
    $pname = $_POST['pname'];
    $pno = $_POST['pno'];
    $age = $_POST['age'];
    $gen = $_POST['gen'];
    $disease = $_POST['disease'];
    $address = $_POST['address'];
    echo "<br><br>";
    


$query = "UPDATE patient SET `pname` = '$pname', `phone`='$pno', `age`='$age',`disease`='$disease',`address`='$address',`gender`='$gen', `date`=current_timestamp() where pid=$pid";
$result = mysqli_query($conn,$query);
if($conn->query($query) == true){
    echo "Successfully modified";
    
}
else{
    echo "ERROR: $query <br> $con->error";
}
$conn->close();
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
      <form action="pmodifynew.php" method="post">
       <section class="timeliner timeline-container">
         <div class="timeline-block">
          <div class="timeline-icon">
           </div>
          <div class="timeline-content">
            <h2>
             <div class="text-center"><label for="fname" style="font-size:28px">Old Patient ID:</label></div>
            </h2>
            <span class="cd-date"><div class="text-center"><input type="text" id="pid" name="pid"></div></span>
          </div>
        </div>
        <div class="timeline-block clearfix">
          <div class="timeline-icon">
          </div>
          <div class="timeline-content">
            <h2>
             <div class="text-center"><label for="pname" style="font-size:28px">New Patient Name:</label></div>
            </h2>
            <span class="cd-date"><div class="text-center"><input type="text" id="pname" name="pname"></div></span>
          </div>
        </div>
        <div class="timeline-block clearfix">
          <div class="timeline-icon">
          </div>
          <div class="timeline-content">
            <h2>
             <div class="text-center"><label for="age" style="font-size:28px">New Age:</label></div>
            </h2>
            <span class="cd-date"><div class="text-center"><input type="text" id="age" name="age"></div></span>
          </div>
        </div>
        <div class="timeline-block clearfix">
          <div class="timeline-icon">
          </div>
          <div class="timeline-content">
            <h2>
             <div class="text-center"><label for="gen" style="font-size:28px">New Gender:</label></div>
            </h2>
            <span class="cd-date"><div class="text-center"><input type="text" id="gen" name="gen"></div></span>
          </div>
        </div>
        <div class="timeline-block clearfix">
          <div class="timeline-icon">
          </div>
          <div class="timeline-content">
            <h2>
             <div class="text-center"><label for="add" style="font-size:28px">New Address:</label></div>
            </h2>
            <span class="cd-date"><div class="text-center"><input type="text" id="address" name="address"></div></span>
          </div>
        </div>
        <div class="timeline-block clearfix">
          <div class="timeline-icon">
          </div>
          <div class="timeline-content">
            <h2>
             <div class="text-center"><label for="pno" style="font-size:28px">New Phone No.:</label></div>
            </h2>
            <span class="cd-date"><div class="text-center"><input type="phone" id="pno" name="pno"></div></span>
          </div>
        </div>
        <div class="timeline-block clearfix">
          <div class="timeline-icon">
          </div>
          <div class="timeline-content">
            <h2>
             <div class="text-center"><label for="disease" style="font-size:28px">New Disease:</label></div>
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

