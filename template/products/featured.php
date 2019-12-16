<div class="products">
    <h3>Sản phẩm nổi bật</h3>
    <div class="product-list row">
        <?php 

        $query = mysqli_query($connect,"SELECT * FROM product WHERE prd_featured = 1 LIMIT 6");
        while ($row_prd_featured = mysqli_fetch_array($query)) {
                                            # code...




            ?>
           <div class="col-md-4">
            <div class="product-item text-center">
                <a href="index.php?template=product&prd_id=<?php echo $row_prd_featured['prd_id']; ?>"><img src="admin/img/products/<?php echo $row_prd_featured['prd_image']; ?>"></a>
                <h4><a href="index.php?template=product&prd_id=<?php echo $row_prd_featured['prd_id']; ?>"><?php echo $row_prd_featured['prd_name']; ?></a></h4>
                <p>Giá Bán: <span><?php echo $row_prd_featured['prd_price'] ?></span></p>
            </div>
        </div>
            <?php } ?>
    </div>
</div>