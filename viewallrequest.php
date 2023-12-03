<!DOCTYPE html>
<html>
<head>
  <title>View All Request</title>

</head>
<style type="text/css">
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@200&family=Patrick+Hand&display=swap');

* {
    padding: 2rem;
    margin: 0;
    box-sizing: border-box;
    font-family: 'Patrick Hand', cursive;
    color: rgb(238, 236, 236);
}

body {
    width: 100%;
    height: 100vh;
    background-image: linear-gradient(to right bottom, #828282, #839fb5, #5fc5d0, #73e7b8, #d6fb84);
    display: flex;
    align-items: center;
    justify-content: space-around;
    flex-direction: column;
}

#table{
    text-align: center;
    border-collapse: collapse;
    margin-top: -10rem;
}

.table-rows {
    transition: all 0.3s ease;
    cursor: pointer;
    padding: 2rem;
}

.items {
    padding: 20px 40px;
    font-size: 19px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.7);
}

.icons {
    width: 15px;
    height: 15px;
    display: inline-block;

}

.dec {
    fill: rgba(239, 49, 49, 0.56);
    opacity: 0;
    transition: all 0.5s ease;
}

.inc {
    fill: rgba(110, 227, 89, 0.56);
    opacity: 0;
    transition: all 0.5s ease;
}

.table-rows:nth-child(even) {
    background-color: rgba(95, 197, 208, 0.21);
}

.table-rows:nth-child(odd) {
    background-color: rgba(55, 131, 138, 0.17);
}

.header-row {
    background-color: rgba(255, 255, 255, 0.31);
}

.table-rows:hover {
    background-color: #652479;
    transform: scale(1.1);
}

.table-rows:hover svg {
    opacity: 1;
    transform: scale(1.2);
}

</style>
<body>
<h2 style="margin-top: -20rem;">View All Request</h2>
<div class="table-section" style="margin-top: -20rem;">
    <table id="table">
        <tr class="header-row" style="margin-top: -2rem">
            <th class="header-item items">Sr No</th>
            <th class="header-item items">Request Id</th>
            <th class="header-item items">Request By</th>
            <th class="header-item items">Mobile No</th>
            <th class="header-item items">Email</th>
            <th class="header-item items">Item</th>
            <th class="header-item items">Request Date</th>
            <th class="header-item items">Status</th>

        <tr class="table-rows">
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
    </table>
</div>
</body>
</html>