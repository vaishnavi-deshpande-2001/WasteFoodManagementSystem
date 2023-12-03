<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="viewfoodtakeaway.css">
    <title>View Food Take Away</title>
  </head>
  <body>
      <div class="container">
      <div class="row">
        <div class="col-lg-12">
                    <div class="row mt-5">
                <div class="col-lg-12">
                    <h5 style="text-align: center;">View Food take away requests</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <table id="exampl" class="table cell-border " style="width:100%">
                        <thead class="TableHead">
                            <tr>
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
                
            </div>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script src="table.js"></script>
  </body>
</html>
