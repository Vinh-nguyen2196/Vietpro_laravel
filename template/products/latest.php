<div class="products">
    <h3>Sản phẩm mới</h3>

    <div class="product-list row">
        <?php 
        $query = mysqli_query($connect,"SELECT * FROM product ORDER BY prd_id DESC LIMIT 6");
        while ($row_prd_latest = mysqli_fetch_array($query)) {
                                            # code...


           ?>
           <div class="col-md-4">
            <div class="product-item text-center">
                <a href="index.php?template=product&prd_id=<?php echo $row_prd_latest['prd_id']; ?>"><img src="admin/img/products/<?php echo $row_prd_latest['prd_image']; ?>"></a>
                <h4><a href="index.php?template=product&prd_id=<?php echo $row_prd_latest['prd_id']; ?>"><?php echo $row_prd_latest['prd_name']; ?></a></h4>
                <p>Giá Bán: <span><?php echo $row_prd_latest['prd_price'] ?></span></p>
            </div>
        </div>
    <?php } ?>

</div>
</div>