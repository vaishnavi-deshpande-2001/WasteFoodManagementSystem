<!DOCTYPE html>
<html>
<head>
  <title>View new Request</title>
<link rel="stylesheet" type="text/css" href="viewnewrequest.css">
</head>
<body>
<table>
  <caption>View New Request</caption>
  <thead>
    <tr class="thead">
      <th scope="col">Sr No</th>
      <th scope="col">Request Id</th>
      <th scope="col">Request By</th>
      <th scope="col">Mobile No</th>
      <th scope="col">Email</th>
      <th scope="col">Item</th>
      <th scope="col">Request Date</th>
      <th scope="col">Status</th>

    </tr>
  </thead>
  <tbody>
  
               <?php
                 
                  include 'db_connection.php';



              $selectquery="select * from   newrequest";

              $query=mysqli_query($con,$selectquery);

              $nums=mysqli_num_rows($query);

              while ($res=mysqli_fetch_array($query)) {

                ?>
                <tr>
                  <td><?php echo $res['srno'];?></td>
                  <td><?php echo $res['rid'];?></td>
                  <td><?php echo $res['request'];?></td>
                  <td><?php echo $res['mobile'];?></td>
                  <td><?php echo $res['email'];?></td>
                  <td><?php echo $res['item'];?></td>
                  <td><?php echo $res['date'];?></td>
                  <td><?php echo $res['status'];?></td>

                 
                </tr>

                <?php

              }

               ?>
                

  </tbody>
</table>
</body>
</html>