//<?php require('session.php'); 
require('dbcon/dbconnection.php');
require('dbcon/includes.php');
?>//
<title>Sign in</title>
  <section class="page-section" id="signin">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <h2 style="color: black;font-family: times new roman">Sign in</h2>
          <form class="myform" action="processlogin.php" method="post">
            <i class="fa fa-user" style="font-size: 20px; color: #504E45"></i>
              <input  type="text" class="inputvalues" name="us" placeholder="Username" required="a"/><h1></h1>
              <i class="fa fa-lock" style="font-size: 20px; color: #504E45"></i>
              <input type="password" class="inputvalues"  name="pw" placeholder="Password" required="a"/><h1></h1>
              <input name="login" class="btn btn-primary" type="submit" id="login_btn" value="Sign in"/><br/>
          </form>
        </div>
      </div>
    </div>
  </section>
