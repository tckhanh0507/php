<?php
require_once("../php/getData.php");
?>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>Product</h2>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Price</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $result = getData();
                while ($row = mysqli_fetch_assoc($result)){?>
                    <tr>
                      <td><?php echo $row['id']?></td>
                      <td><?php echo $row['name']?></td>
                      <td>
                        <img style="width: 100px" src="../<?php echo $row['image']?>">
                      </td>
                        <td><?php echo $row['price']?></td>
                        <td >
                            <a  class="btn btn-primary"  href="index.php?page_layout=update_product&id=<?php echo $row['id'];?>" ><i class="fa-solid fa-pen-to-square"></i></a>

                        </td>
                        <td >
                            <a onclick="return Del('<?php echo $row['name']?>')" class="btn btn-primary"  href="index.php?page_layout=delete_product&id=<?php echo $row['id'];?>" ><i class="fa-solid fa-trash-can"></i></a>
                        </td>
                    </tr>
               <?php }
                ?>
                </tbody>
            </table>
            <a  class="btn btn-primary"  href="index.php?page_layout=insert_product" >Insert</a>
        </div>
    </div>
</div>
<script>
    function Del(name){
        return confirm("Are you sure you want to delete : "+name+" ?");
    }
</script>