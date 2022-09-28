<?php
$id = $_GET['id'];
$sql_brand = "SELECT * FROM brands";
$query_brand = mysqli_query($connect, $sql_brand);
$sql_up = "SELECT * FROM products where prd_id = $id";
$query_up = mysqli_query($connect, $sql_up);
$row_up = mysqli_fetch_assoc($query_up);
?>
<?php
if (isset($_POST['fix'])) {
	$prd_name = $_POST['prd_name'];
	if ($_FILES['image']['name'] == '') {
		$image = $row_up['image'];
	} else {
		$image = $_FILES['image']['name'];
		$image_tmp = $_FILES['image']['tmp_name'];
		move_uploaded_file($image_tmp, 'img/' . $image);
	}
	$price = $_POST['price'];
	$quantity = $_POST['quantity'];
	$description = $_POST['description'];
	$brand_id = $_POST['brand_id'];

	$sql = "UPDATE products SET prd_name = '$prd_name', image = '$image', price = $price, quantity = '$quantity',description = '$description', brand_id = $brand_id where prd_id = $id";
	$query = mysqli_query($connect, $sql);
	move_uploaded_file($image_tmp, 'image/' . $image);
	header('location: main.php?page_layout=danhsach');
}
?>
<div class="container-fluid">
    <div class="table">
        <div class="card-header">
            <h2>Sửa sản phẩm</h2>
        </div>
        <div class="panel-body table-hover">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                    <input type="text" name="prd_name" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" value="<?php echo $row_up['prd_name']; ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Ảnh sản phẩm</label>
                    <input type="file" name="image" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Giá</label>
                    <input type="number" name="price" class="form-control" id="exampleInputPassword1"
                        value="<?php echo $row_up['price']; ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Số lượng</label>
                    <input type="number" name="quantity" class="form-control" id="exampleInputPassword1"
                        value="<?php echo $row_up['quantity']; ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mô tả</label>
                    <input type="text" name="description" class="form-control" id="exampleInputPassword1"
                        value="<?php echo $row_up['description']; ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Thương hiệu</label>
                    <select class="form-control" name="brand_id">
                        <?php
						while ($row_brand = mysqli_fetch_assoc($query_brand)) {
						?>
                        <option value="<?php echo $row_brand['brand_id']; ?>"><?php echo $row_brand['brand_name']; ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" name="fix">Sửa</button>
            </form>
        </div>
    </div>
</div>