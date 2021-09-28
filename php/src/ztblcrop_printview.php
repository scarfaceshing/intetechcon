<?php 
require('session.php');
include('header.php');
$sql = "SELECT * FROM tblacc where id=".$_SESSION['MEMBER_ID'];
$result = $con-> query($sql);
if ($result-> num_rows > 0) {
  while($row = $result-> fetch_assoc()){
    $id  = $row["id"];
    $fname  = $row["fname"];
    $lname  = $row["lname"];
    $contact  = $row["contact"];
    $email  = $row["email"];
    $id_pic  = $row["id_pic"];
    $sex  = $row["sex"];
    $age  = $row["age"];
    $sto_strt  = $row["sto_strt"];
    $brgy  = $row["brgy"];
    $brgy_destination_staff  = $row["brgy_destination"];
    $status  = $row["status"];
    $user_type  = $row["user_type"];
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <br>
  <title>Crop Production Print View</title>


<div style="width: 90%;margin-left: 5%">
  <h1 style="color: black">CROP PRODUCTION TABLE</h1>
<form action="ztblcrop_printview.php" method="post" style="margin-bottom: 50px">
  <!--input class="sear" type="text" name="search" placeholder="Search . . ." -->
  <br/>
  
  <table>
  <tr>
    <thead>
        <th>Farmer name</th>
        <th>Rice Type</th>
        <th>Variety</th>
        <th>Watersource</th>
        <th>Yield</th>
        <th>Barangay</th>
        <th>Crop income</th>
        <th>Date</th>
        <th>Gain/Loss</th>
        <th>Feedback</th>
    </thead>
<?php
require('dbcon/dbconnection.php');
$output = '';
if (isset($_POST['search'])) {
  $searchq = $_POST['search'];
  $searchq = preg_replace("#[^0-9a-z]#i","",$searchq);
  $query = mysqli_query($con, "SELECT * FROM tblcrop WHERE
    farmer_name LIKE '%$searchq%' OR 
    clasirice LIKE '%$searchq' OR
    variety LIKE '%$searchq%' OR
    watersource LIKE '%$searchq' OR
    yield LIKE '%$searchq%' OR
    brgy LIKE '%$searchq%' OR
    income LIKE '%$searchq%' OR 
    day LIKE '%$searchq%' OR
    month LIKE '%$searchq%' OR
    year LIKE '%$searchq%' OR
    gain_loss LIKE '%$searchq%'
    ");
  $count = mysqli_num_rows($query);
  if ($count == 0) {
    echo '<script type="text/javascript"> alert("Farmer is not in the List!") </script>';  
     $sql = "SELECT * FROM tblcrop";
$result = $con-> query($sql);
if ($result-> num_rows > 0) {
  while($row = $result-> fetch_assoc()){
    $id  = $row["id"];
    $farmer_id  = $row["farmer_id"];
    $farmer_name  = $row["farmer_name"];
    $clasirice = $row["clasirice"];
    $variety = $row["variety"];
    $watersource = $row["watersource"];
    $yield = $row["yield"];
    $brgy  = $row["brgy"];
    $income  = $row["income"];
    $day  = $row["day"];
    $month  = $row["month"];
    $year  = $row["year"];
    $gain_loss  = $row["gain_loss"];
    $feedback  = $row["feedback"];
 ?>
  <tr>
    <td style='text-transform: uppercase;'><?php echo $farmer_name; ?></td>
    <td><?php echo $clasirice; ?></td>
    <td><?php echo $variety; ?></td>
    <td><?php echo $watersource; ?></td>
    <td><?php echo $yield; ?></td>
    <td><?php echo $brgy; ?></td>
    <td><?php echo $income; ?></td>
    <td><?php echo $month.' '.$day.', '.$year; ?></td>
    <td><?php echo $gain_loss; ?></td>
    <td><?php echo $feedback; ?></td>
  </tr>
<?php
}
}
  }else{
    while($row = mysqli_fetch_array($query)){
    $id  = $row["id"];
    $farmer_id  = $row["farmer_id"];
    $farmer_name  = $row["farmer_name"];
    $clasirice = $row["clasirice"];
    $variety = $row["variety"];
    $watersource = $row["watersource"];
    $yield = $row["yield"];
    $brgy  = $row["brgy"];
    $income  = $row["income"];
    $day  = $row["day"];
    $month  = $row["month"];
    $year  = $row["year"];
    $gain_loss  = $row["gain_loss"];
    $feedback  = $row["feedback"];
 ?>
  <tr>
    <td style='text-transform: uppercase;'><?php echo $farmer_name; ?></td>
    <td><?php echo $clasirice; ?></td>
    <td><?php echo $variety; ?></td>
    <td><?php echo $watersource; ?></td>
    <td><?php echo $yield; ?></td>
    <td><?php echo $brgy; ?></td>
    <td><?php echo $income; ?></td>
    <td><?php echo $month.' '.$day.', '.$year; ?></td>
    <td><?php echo $gain_loss; ?></td>
    <td><?php echo $feedback; ?></td>
  </tr>
<?php
    }
  }
}else{
  $sql = "SELECT * FROM tblcrop order by id desc";
$result = $con-> query($sql);
if ($result-> num_rows > 0) {
  while($row = $result-> fetch_assoc()){
    $id  = $row["id"];
    $farmer_id  = $row["farmer_id"];
    $farmer_name  = $row["farmer_name"];
    $clasirice = $row["clasirice"];
    $variety = $row["variety"];
    $watersource = $row["watersource"];
    $yield = $row["yield"];
    $brgy  = $row["brgy"];
    $income  = $row["income"];
    $day  = $row["day"];
    $month  = $row["month"];
    $year  = $row["year"];
    $gain_loss  = $row["gain_loss"];
    $feedback  = $row["feedback"];
 ?>
  <tr>
    <td style='text-transform: uppercase;'><?php echo $farmer_name; ?></td>
    <td><?php echo $clasirice; ?></td>
    <td><?php echo $variety; ?></td>
    <td><?php echo $watersource; ?></td>
    <td><?php echo $yield; ?></td>
    <td><?php echo $brgy; ?></td>
    <td><?php echo $income; ?></td>
    <td><?php echo $month.' '.$day.', '.$year; ?></td>
    <td><?php echo $gain_loss; ?></td>
    <td><?php echo $feedback; ?></td>
  </tr>
<?php
    }
  }
}
?>
  </tr>
 
 
  
</table>
</div>
</form>
