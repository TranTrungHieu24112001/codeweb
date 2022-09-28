<?php
$sql = "select *from products inner join brands on products.brand_id = brands.brand_id";
$query = mysqli_query($connect, $sql);
?>
<div class="container-fluid">
    <div class="table">
        <div class="card-header">
            <h2>Danh sách sản phẩm</h2>
        </div>
        <div class="panel-body table-hover ">
            <table>
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Tên sản phẩm</th>
                        <th>Ảnh sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Mô tả</th>
                        <th>Thương hiệu</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($query)) { ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $row['prd_name'] ?></td>
                        <td>
                            <img width="100px" src="image/<?php echo $row['image'] ?>">
                        </td>
                        <td><?php echo $row['price'] ?></td>
                        <td><?php echo $row['quantity'] ?></td>
                        <td><?php echo $row['description'] ?></td>
                        <td><?php echo $row['brand_name'] ?></td>
                        <td>
                            <a href="main.php?page_layout=sua&id=<?php echo $row['prd_id'] ?>">Sửa</a>
                        </td>
                        <td>
                            <a href="main.php?page_layout=xoa&id=<?php echo $row['prd_id'] ?>"
                                onclick="return window.confirm('Bạn có muốn xóa sản phẩm <?php echo $row['prd_name'] ?>');">Xóa</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <a class="btn btn-primary" href="main.php?page_layout=them">Thêm</a>
        </div>
    </div>
</div>