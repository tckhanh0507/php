<?php
require_once("../php/getData.php");
if(isset($_POST['add'])){
    $prd_name =$_POST['prd_name'];
    $Image =$_FILES['image']['name'];
    $prd_image =$_FILES['image']['tmp_name'];
    $prd_price =$_POST['prd_price'];
    $Image_prd = "images/".$Image;

    $sql= "Insert into tbl_product(name,image,price) values ('$prd_name','$Image_prd','$prd_price')";
    $result= $conn->query($sql);
    move_uploaded_file($prd_image,'../images/'.$Image);
    header('location: index.php?page_layout=list_product');

}
?>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>Insert Product</h2>
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="prd_name" required>
                </div>
                <div class="form-group">
                    <label for="">Images</label>
                    <input type="file"  name="image" required>
                </div>
                <div class="form-group">
                    <label for="">Price</label>
                    <input type="number" class="from-control" name="prd_price" required>
                </div>
                <button  class="btn btn-success"  type="submit" name="add" >Insert</button>
            </form>

        </div>
    </div>
</div>
