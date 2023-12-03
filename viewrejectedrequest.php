<!DOCTYPE html>
<html>
<head>
  <title>View Rejected Request</title>

</head>
<style type="text/css">
  * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: "Inter", sans-serif;
  color: #343a40;
  line-height: 1;
  display: flex;
  justify-content: center;
}

table {
  width:1000px;
  /* border: 1px solid #343a40; */
  border-collapse: collapse;
  font-size: 18px;
}

th,
td {
  /* border: 1px solid #343a40; */
  padding: 16px 24px;
  text-align: left;
}

thead th {
  background-color: #087f5b;
  color: #fff;
  width:45%;
}

tbody tr:nth-child(even) {
  background-color: #f8f9fa;
}

tbody tr:nth-child(odd) {
  background-color: #e9ecef;
}

</style>
<body>
<h1 style="text-align: center; margin-top: 1rem; font-size: 2rem; color: green">Rejected Request</h1>
  <table style="margin-top:10rem; display: block;">
    <thead>
      <tr>
        <th>Sr No</th>
        <th>Request Id</th>
        <th>Request By</th>
        <th>Mobile No</th>
        <th>Email</th>
        <th>Item</th>
        <th>Request Date</th>
        <th>Status</th>
        <th>Reason for reject request</th>
      </tr>
    </thead>
    <tbody>
      <tr>
       <?php
                 
                  include 'db_connection.php';



              $selectquery="select * from   rejectrequest";

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
                   <td><?php echo $res['reason'];?></td>
 
                 
                </tr>

                <?php

              }

               ?>
    </tbody>
  </table>

</body>
</html>