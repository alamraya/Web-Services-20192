
    <?php
session_start();
include("../db.php");
$product_id=$_REQUEST['product_id'];

$result=mysqli_query($con,"select product_id,product_title,product_price, product_cat, product_brand from  products where product_id='$product_id'")or die ("query 1 incorrect.......");

list($product_id,$product_title,$product_price,$product_cat,$product_brand)=mysqli_fetch_array($result);

if(isset($_POST['btn_save'])) 
{

$product_title=$_POST['product_title'];
$product_price=$_POST['product_price'];
$product_cat=$_POST['product_cat'];
$product_brand=$_POST['product_brand'];

mysqli_query($con,"update products set product_title='$product_title', product_price='$product_price', product_cat='$product_cat', product_brand='$product_brand' where product_id='$product_id'")or die("Query 2 is inncorrect..........");

header("location: productlist.php");
mysqli_close($con);
}
include "sidenav.php";
include "topheader.php";
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
        <div class="col-md-5 mx-auto">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Edit</h5>
              </div>
              <form action="editproduct.php" name="form" method="post" enctype="multipart/form-data">
              <div class="card-body">
                
                  <input type="hidden" name="product_id" id="product_id" value="<?php echo $product_id;?>" />
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label>nama produk</label>
                        <input type="text" id="product_title" name="product_title"  class="form-control" value="<?php echo $product_title; ?>" >
                      </div>
                    </div>
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label>Harga</label>
                        <input type="text" id="product_price" name="product_price" class="form-control" value="<?php echo $product_price; ?>" >
                      </div>
                    </div>
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label for="exampleInputproduct_cat1">Kategori</label>
                        <input type="product_cat"  id="product_cat" name="product_cat" class="form-control" value="<?php echo $product_cat; ?>">
                      </div>
                    </div>
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label >brand</label>
                        <input type="text" name="product_brand" id="product_brand" class="form-control" value="<?php echo $product_brand; ?>">
                      </div>
                    </div>
                  
                  
                  
                
              </div>
              <div class="card-footer">
                <button type="submit" id="btn_save" name="btn_save" class="btn btn-fill btn-primary">Update</button>
              </div>
              </form>    
            </div>
          </div>
         
          
        </div>
      </div>
