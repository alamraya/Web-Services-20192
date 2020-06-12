<?php
include "../db.php";
$query = mysqli_query($con,"SELECT * FROM orders_info");
include "sidenav.php";
include "topheader.php";
$order_id=$_GET['order_id'];
?>
   <div class="content">
        <div class="container-fluid">
          <!-- your content here -->
          <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Add Users</h4>
                  <p class="card-category"></p>
                </div>
                <div class="card-body">
                  <form action="" method="post" name="form" enctype="multipart/form-data">
                    <div class="row">

<form action="" method="post">
    <table border="2" cellpadding="2" cellspacing="3">
        <tr>
            <th>No</th>
            <th>Costumer Name</th>
            <th>no order</th>
            <th>Detail</th>
            <th>Address</th>
            <th>City</th>
            <th>State</th>
            <th>Zip</th>
            <th>CardName</th>
            <th>Cardnumber</th>
            <th>exdate</th>
            <th>prod_count</th>
            <th>total_amount</th>
            <th>Cvv</th>
            
        </tr>
        <?php if(mysqli_num_rows($query)>0){ ?>
        <?php
            $no = 1;
            while($data = mysqli_fetch_array($query)){
        ?>
        <tr>
            <td><?php echo $no ?></td>
            <td><?php echo $data["f_name"];?></td>
            <td><?php echo $data["order_id"];?></td>
            <td><?php echo $data["email"];?></td>
            <td><?php echo $data["address"];?></td>
            <td><?php echo $data["city"];?></td>
            <td><?php echo $data["state"];?></td>
            <td><?php echo $data["zip"];?></td>
            <td><?php echo $data["cardname"];?></td>
            <td><?php echo $data["cardnumber"];?></td>
            <td><?php echo $data["expdate"];?></td>
            <td><?php echo $data["prod_count"];?></td>
            <td><?php echo $data["total_amt"];?></td>
            <td><?php echo $data["cvv"];?></td>

        </tr>
        <?php $no++; } 
        ?><tr><td></td></tr>  <td><a href="cetak.php?order_id=$order_id" type="button" align="centre">CETAK</a></td>

        <?php } 

        echo $data?>
    </table>
</form>
<div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
        </div>
      </div>