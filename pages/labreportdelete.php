<?php
$conn = mysqli_connect("localhost:3307", "root", "", "hci_da");
if($conn-> connect_error) {
    die("connection failed:".$conn->connect_error);
}
if(isset($_POST['lno'])) {
    $lno = $_POST['lno'];
    echo "<br><br>";
    


$query = "DELETE from labreport where labno=$lno";
$result = mysqli_query($conn,$query);
if($conn->query($query) == true){
    echo "Successfully deleted";
    
}
else{
    echo "ERROR: $query <br> $conn->error";
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
        <h1 class="title text-uppercase"> LAB REPORTS.</h1>
        <div class="sub-title">Enter Lab No. to delete records!!</div>  
      </div>
      <form action="labreportdelete.php" method="post">
       <section class="timeliner timeline-container">
         <div class="timeline-block">
          <div class="timeline-icon">
           </div>
          <div class="timeline-content">
            <h2>
             <div class="text-center"><label for="lno" style="font-size:28px">Lab No.:</label></div>
            </h2>
            <span class="cd-date"><div class="text-center"><input type="text" id="lno" name="lno" placeholder="Enter Lab No."></div></span>
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