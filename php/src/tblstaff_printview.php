<?php 
require('session.php');
include('header.php');

?>

  <title>Staff Table Print View</title>
       
<br>

<form action="tblstaff.php" method="post" style="margin-bottom: 50px">

  <div style="width: 90%;margin-left: 5%">
    <h1 style="color: black; text-align: center;">STAFFS</h1>
  <table>
  <tr>
    <thead>
        <th>ID Image</th>
        <th>Name</th>
        <th>Contact</th>
        <th>Email</th>
        <th>Sex</th>
        <th>Age</th>
        <th>Sitio/Sreet</th>
        <th>Barangay</th>
        <th>BRGY. Destination</th>
        <th>Position</th>
    </thead>
  
<?php
  $sql = "SELECT * FROM tblacc where user_type='staff' ";
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
    $brgy_destination  = $row["brgy_destination"];
    $status  = $row["status"];
    $user_type  = $row["user_type"];
 ?>
  <tr>
    <td><img style="width: 100px;height: 120px;" src="<?php echo $id_pic; ?>"></td>
    <td style='text-transform: uppercase;'><?php echo $fname.' '.$lname; ?></td>
    <td><?php echo $contact; ?></td>
    <td><?php echo $email; ?></td>
    <td><?php echo $sex; ?></td>
    <td><?php echo $age; ?></td>
    <td><?php echo $sto_strt; ?></td>
    <td><?php echo $brgy; ?></td>
    <td><?php echo $brgy_destination; ?></td>
    <td><?php echo $user_type; ?></td>
    
  </tr>
<?php
    }
  }

?>
  </tr>
 
 
  
</table>
</div>
</form>




