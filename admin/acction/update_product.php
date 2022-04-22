<?php
require_once("../php/getData.php");
$id=$_GET['id'];
$sql_up = "select * from tbl_product where id = '$id'";
$query_up =$conn ->query($sql_up);
$row_up = mysqli_fetch_assoc($query_up);

if(isset($_POST['add'])){
    $prd_name =$_POST['prd_name'];

    if($_FILES['image']['tmp_name']=''){
        $Image =$row_up['image'];
    }
    else{
        $Image = $_FILES['image']['name'];
        $prd_image =$_FILES['image']['tmp_name'];
        move_uploaded_file($prd_image,'../images/'.$Image);
    }

    $prd_price =$_POST['prd_price'];
    $Image_prd = "images/".$Image;

    $sql= "update  tbl_product set name='$prd_name',image='$Image_prd',price ='$prd_price' where id = '$id'";
    $result= $conn->query($sql);
    //move_uploaded_file($prd_image,'../images/'.$Image);
    header('location: index.php?page_layout=list_product');

}
?>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2> Update Product</h2>
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="prd_name" required value=" <?php echo $row_up['name']?>">
                </div>
                <div class="form-group">
                    <label for="">Images</label>
                    <input type="file"  name="image" required value=" <?php echo ''.$row_up['image']?> >
                </div>
                <div class="form-group">
                    <label for="">Price</label>
                    <input type="number" class="from-control" name="prd_price" required value=" <?php echo ''.$row_up['price']?>">
                </div>
                <button  class="btn btn-success"  type="submit" name="add" >update</button>
            </form>

        </div>
    </div>
</div>

