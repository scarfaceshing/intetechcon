<?php require('dbcon/dbconnection.php');
?>
<!DOCTYPE html>
<html>
<head>
  <style>
    .img_item{
      width: 100px;
      height: 100px;
    }
    .lab_input{
      width: 100%;
      padding: 3px;
      margin-bottom: 10px
    }
    #lab_wrap{
      padding: 10%;
    }
    .input_container{
      margin: 15px;
      width: 95%;
      text-align: left;
    }
    form{
    }
    .img_lab{
      width: 300px;
      border-radius: 5px;
      box-shadow: 0 2px 8px 0 rgba(0, 0, 0, 0.3), 0 5px 15px 0 rgba(0, 0, 0, 0.4);
    }
    #update_img_lab{
      margin-top: -30px;
    }
     table {
      border-radius: 5px;
      border-collapse: collapse;
      border: 2px solid lightgray; 
      width: 100%;
      color: black;
      font-size: 12px;
      text-align:center;
      font-family: Calibri;
      border: 1px solid black; 
       box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      }
      th {
        background: darkgray;
        border-left: 1px solid black;
        border-bottom: 2px solid black;
        padding: 5px;
        font-size: 15px;
     
      }
      tr:nth-child(odd) {
    
      }
        tr:nth-child(even) {
        background-color: white;
      }
      td{
        text-align: left;
        border-left: 1px solid black;
        border-bottom: 1px solid black;
        padding: 5px;
        font-size: 12px;
      }
    ul li{
      text-decoration: none;  
    } 
    .sear{
    padding: 5px;
    font-size: 15px;
    width: 200px;
    height: 35px;
    box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.1), 0 5px 10px 0 rgba(0, 0, 0, 0.1);
    border: 1px solid lightgray
    }
    .sear:focus {
    transition: 1s ease;
    width: 75%;
    }
    #btnsearch{
      border-top-left-radius: 5px; border-bottom-left-radius: 5px; color: white; background: blue; padding: 7px; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.1), 0 5px 10px 0 rgba(0, 0, 0, 0.1);
    }
    .editbh{
      border-radius: 5px;
      margin: 5px;
      color: white;
      padding: 3px;
      background: orange;
      box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.1), 0 5px 10px 0 rgba(0, 0, 0, 0.5);
    }
    .editbh:hover{
      text-decoration: none;
      background: darkorange;
      color: white;
    }
   .addboarders{
    margin: 5px;
      color: white;
      padding: 3px;
      background: green;
      box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.1), 0 5px 10px 0 rgba(0, 0, 0, 0.5);
    }
    .addboarders:hover{
      text-decoration: none;
      background: darkgreen;
      color: white;

    }
    .deletebh{
       border-radius: 5px;
      margin: 5px;
       color: white;
      padding: 3px;
      background: red;
      box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.1), 0 5px 10px 0 rgba(0, 0, 0, 0.5);
    }
     .deletebh:hover{
      text-decoration: none;
      background: darkred;
      color: white;
    }
    .searchbh{
      color: white;
      background: blue;
      padding: 6.5px;
      border-top-left-radius: 5px;
      border-bottom-left-radius: 5px;
    }
    .Refresh{
         color: white;
      background: blue;
      padding: 6.5px;
      border-radius: 5px;
       margin-right: 5px;
    }
     .Refresh:hover{
      text-decoration: none;
      color: white;
      background: darkblue;
    }
      
    .info_labs{
        padding: 10px;
        width: 80%;
        text-align: center;
        background-image:linear-gradient(rgba(0,0,0,0.8),rgba(0,0,0,0.8));
        border-bottom-right-radius: 5px;
        border-bottom-left-radius: 5px;
        box-shadow: 0 6px 10px 0 rgba(0, 0, 0, 0.3), 0 10px 22px 0 rgba(0, 0, 0, 0.3);
      }
           .inputs{
    font-size: 15px;
    padding: 3px;
    width: 100%;
    margin-bottom: 15px;
  }
  #container{
    width: 100%;
    padding: 20px;
    margin: 3%;
    color: black
  }
  </style>
	<meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
	<link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="admin/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="admin/css/costumized.css" rel="stylesheet">

  <link rel="icon" href="admin/img/core-img/favicon.ico">
    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="admin/style.css">
</head>
 
<?php
  confirm_logged_in();
?>
<div class="preloader d-flex align-items-center justify-content-center">
        <div class="cssload-container">
            <div class="cssload-loading"><i></i><i></i><i></i><i></i></div>
        </div>
    </div> 