  <?php require('session.php'); 
require('dbcon/dbconnection.php');
require('dbcon/includes.php');
?>

</head>
<?php
 if (logged_in()) {
  if (  $_SESSION['user_type'] == "admin") {
     ?>
       <script type="text/javascript">
                window.location = "index.php";
        </script>
    <?php
  }else{
     ?>
       <script type="text/javascript">
                window.location = "login.php";
        </script>
    <?php
  }
}
            $sql = "SELECT * FROM tblannounce";
            $result = $conn-> query($sql);
            
            if ($result-> num_rows > 0) {
              while($row = $result-> fetch_assoc()){
                $id  = $row["id"];
                $announce  = $row["announce"];
              }
            }

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <style>
    .sear{
      padding: 5px;
      font-size: 15px;
      width: 250px;
      height: 36px;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 5px 15px 0 rgba(0, 0, 0, 0.3);
      border: 1px solid lightgray;
      border-top-right-radius: 5px;
    border-bottom-right-radius: 5px;
      }
      .sear:focus {
      transition: 1s ease;
        width: 90%;
      }
      .img_labs{
        height: 200px; 
        width: 300px;
        background-size: cover; 
        background-position: center;
        box-shadow: 0 6px 10px 0 rgba(0, 0, 0, 0.5), 0 10px 22px 0 rgba(0, 0, 0, 0.4);
        border-top-right-radius: 5px;
        border-top-left-radius: 5px;
      }
      .info_labs{
        padding: 10px;
        width: 300px;
        text-align: center;
        background-image:linear-gradient(rgba(0,0,0,0.8),rgba(0,0,0,0.8));
        border-bottom-right-radius: 5px;
        border-bottom-left-radius: 5px;
        box-shadow: 0 6px 10px 0 rgba(0, 0, 0, 0.3), 0 10px 22px 0 rgba(0, 0, 0, 0.3);
      }
    
  </style>
  <title>Department of Agriculture</title>
</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav" style="background: white;box-shadow: 0 6px 10px 0 rgba(0, 0, 0, 0.3), 0 10px 22px 0 rgba(0, 0, 0, 0.3);">
    <div class="container">
      <a style="margin-top: -20px;margin-bottom: -20px" class="navbar-brand js-scroll-trigger" href="#page-top">
         <img src="img/logo.png" style="height: 100px">
      </a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <script>
          $(document).ready(function(){
            $('button').click(function(){
              $('#navbarResponsive').slideToggle();
            });
          });
        </script>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto my-2 my-lg-0">
          
          
          <li class="nav-item"  >
            <a class="nav-link js-scroll-trigger" href="#Mandate" style="color: #404555">Mandate</a>
          </li>
         <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#Vision" style="color: #404555">Vision</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#Mission" style="color: #404555">Mission</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="signin.php" id="signin" style="color: #404555">Sign in</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
<!-- sign in Section -->

  <!-- Masthead -->
  <header class="masthead"  style="background-image:url(img/dsds.jpg);background-size: cover;background-position: center;margin-top: 100px">
    <div class="container h-100">
      <div class="row">
        <div class="col-lg-6"><br><br><br><br><br><br>
          <div style="color: white; background-image:linear-gradient(rgba(0,0,0,0.8),rgba(0,0,0,0.8));padding: 20px;border-radius: 5px;box-shadow: 0 6px 10px 0 rgba(0, 0, 0, 0.3), 0 10px 22px 0 rgba(0, 0, 0, 0.3);">
          <h2>Announcement</h2>
          <p><?php echo $announce; ?></p>
           </div>
        </div>
         <div class="col-lg-6"><br><br><br><br><br>
          <div class="row h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-10 align-self-center">
              <h1 class="text-uppercase font-weight-bold" style="margin-top: -85px; color: white; background-image:linear-gradient(rgba(0,0,0,0.8),rgba(0,0,0,0.8));padding: 20px;;box-shadow: 0 6px 10px 0 rgba(0, 0, 0, 0.3), 0 10px 22px 0 rgba(0, 0, 0, 0.3);border-radius: 5px;"><label> Department <br> of<br> Agriculture</label></h1>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </header>

  <!-- Vision Section -->
  <section class="page-section" id="Mandate" style="border-bottom: 1px solid black">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center" style="font-size: 20px; color: black;">
          <h2 class="text-black mt-0">Mandate</h2>
          <hr class="divider">
          <p>
          The Department is the government agency responsible for the promotion of agricultural development by providing the policy framework, public investments, and support services needed for domestic and export oriented business enterprises. 
          </p>
          <p>
            In the fulfillment of this mandate, it shall be the primary concern of the Department to improve farm income and generate work opportunities for farmers, fisherman and other rural workers. It shall encourage people's participation in agricultutal development through sectoral representation in agricultural policy-making bodies is that the policies, plans and programs of the Department are formulated and executed to satisfy their needs.
          </p>
          <p>
            It shall also use a bottom-up self-reliant farm system approach that will emphasize social justice, equity, productivity and sustainability in the use of agricultural resources. 
          </p>
        </div>
      </div>
    </div>
  </section>
   <!-- Vision Section -->
  <section class="page-section" id="Vision" style="border-bottom: 1px solid black">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center"  style="font-size: 20px; color: black;">
          <h2 class="text-black mt-0">Vision</h2>
          <hr class="divider">
          <p>
            The Department's vision is a competitive sustainable, and technology-based agriculture and fishery sector, driven by productive and progressive farmers and fisherfolk, supported by efficient value chains and well integrated in the domestic and international markets contributing to inclusive growth and poverty reduction.
          </p>
        </div>
      </div>
    </div>
  </section>
    <!-- Vision Section -->
  <section class="page-section" id="Mission">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center" style="font-size: 20px; color: black;">
          <h2 class="text-black mt-0">Mission</h2>
          <hr class="divider">
          <p>
            To help and empower the farming and fishing communities and the private sector to produce enough, accessible and affordable food for every Filipino and a decent income for all.
          </p>
        </div>
      </div>
    </div>
  </section>


  
<footer style="background: darkgreen; color: darkgray;">
    <section class="page-section"> 
    <div class="container">
      
      <div class="row">
        <div class="col-lg-6 mr-auto text-left">
          <i class="fas fa-phone fa-2x mb-3"></i>
         09123456789 <br><br>
          <i class="fas fa-envelope fa-2x mb-3"></i>
          <a href="#" style="color: darkgray">himamaylanCityDABranch@gmail.ph.com</a>
        </div>
        <div class="col-lg-6 mr-auto text-left">
         <ul style="list-style: none;">Members:
            <li style="margin-left: 50px">Marilou Albito</li>
            <li style="margin-left: 50px">Michelle Linco</li>
            <li style="margin-left: 50px">Antonette Anig-ig</li>
         </ul>
        </div>
      </div>
    </div>
  </section>
</footer>
  <!-- Footer 
  <footer class="bg-light py-5">
    <div class="container">
      <div class="small text-center text-muted">Copyright &copy; 2019 - Start Bootstrap</div>
    </div>
  </footer>-->
</body>
</html>
