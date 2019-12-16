<?php 
    $cat_id=$_GET['cat_id'];
    $quer = mysqli_query($connect, "SELECT * FROM category WHERE cat_id = '$cat_id'");
    $row_cat = mysqli_fetch_array($quer);
    if(isset($_GET['page'])){
        $page= $_GET['page'];
    }
    else{
        $page=1;
    }
    $row_per_page=3;
    $first_key = $row_per_page * $page - $row_per_page;
    $query_e = mysqli_query($connect, "SELECT * FROM product  WHERE cat_id='$cat_id'");
    $total_row=mysqli_num_rows($query_e);
    $total_page=ceil($total_row/$row_per_page);//hafm ceil lưu được 2 giá trị số nguyên và dư của phép chia
    $page_navigation='';

    $pre_page=$page-1;
     if ($pre_page <=0){
       $pre_page =1;
    }
 $page_navigation.='<li class="page-item"><a class="page-link" href="index.php?template=category&cat_id='.$cat_id.'&page='.$pre_page.'">&laquo;</a></li>';
for($i=1;$i<= $total_page;$i++){
    $page_navigation.='<li class="page-item"><a class="page-link" href="index.php?template=category&cat_id='.$cat_id.'&page='.$i.'">'.$i.'</a></li>';

}

                             
    $nex_page=$page + 1;
    if($nex_page>=$total_page){
        $nex_page= $total_page;
    }                            
                               
$page_navigation.='<li class="page-item"><a class="page-link" href="index.php?template=category&cat_id='.$cat_id.'&page='.$nex_page.'">&raquo;</a></li>';

$sql = "SELECT * FROM product WHERE cat_id = '$cat_id' LIMIT $first_key, $row_per_page";
$query = mysqli_query($connect, $sql);
$row=mysqli_num_rows($query);


 ?>



<!--	End Slider	-->

<!--	List Product	-->
<div class="products">
 
    <h3><?php echo $row_cat['cat_name']  ?> (hiện có <?php echo $total_row;  ?> sản phẩm)</h3>
    <div class="product-list row">
     <?php


     while ($row_pro = mysqli_fetch_array($query)) {

         ?>
         <div class="col-md-4">
            <div class="product-item text-center">
                <a href="index.php?template=product&prd_id=<?php echo $row_pro['prd_id']; ?>"><img src="admin/img/products/<?php echo $row_pro['prd_image']; ?>"></a>
                <h4><a href="index.php?template=product&prd_id=<?php echo $row_pro['prd_id']; ?>"><?php echo $row_pro['prd_name']; ?></a></h4>
                <p>Giá Bán: <span><?php echo $row_pro['prd_price'] ?></span></p>
            </div>
        </div>
    <?php } ?>

</div>
<div class="panel-footer">
    <nav aria-label="Page navigation example">
        <ul class="pagination">
          <?php echo $page_navigation;  ?>
      </ul>
  </nav>
</div>
</div>
<!--	End List Product	-->

