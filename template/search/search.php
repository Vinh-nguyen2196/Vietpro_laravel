



    <?php 

if(isset($_POST['keyword'])){
    $keyword=$_POST['keyword'];
   
    }
    else{
    $keyword=$_GET['keyword'];
    }
   $key= explode(' ',$keyword);
   $key_search='%'.implode('%',$key).'%';
   echo $key_search;
   $sql_keyword="SELECT * FROM product WHERE prd_name LIKE '$key_search'";
   $data_keyword=mysqli_query($connect,$sql_keyword);
   $num_row=mysqli_num_rows($data_keyword);
   $row_keyword=mysqli_fetch_array($data_keyword)

   

 ?>

<!--	Header	-->
                <!--	End Slider	-->
                
                <!--	List Product	-->
                <div class="products">
                    <div id="search-result">Kết quả tìm kiếm với sản phẩm <span><?php echo $keyword; ?></span></div>
                    <div class="product-list row">
                        <?php
                        if($num_row>0){
                            while ($row_keyword=mysqli_fetch_array($data_keyword)) {
                                # code...
                            
                        

                         ?>
                        <div class="col-md-4">
                            <div class="product-item text-center">
                                <a href="index.php?template=product&prd_id=<?php echo $row_keyword['prd_id']; ?>"><img src="admin/img/products/<?php echo $row_keyword['prd_image']; ?>"></a>
                                <h4><a href="index.php?template=product&prd_id=<?php echo $row_keyword['prd_id']; ?>"><?php echo $row_keyword['prd_name']; ?></a></h4>
                                <p>Giá Bán: <span><?php echo $row_keyword['prd_price']; ?></span></p>
                            </div>
                        </div>
                    <?php } } ?>

                    </div>
                </div>
                <!--	End List Product	-->
                
                <div id="pagination">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#">Trang trước</a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Trang sau</a></li>
                    </ul> 
                </div>
                
    
<!--	End Footer	-->













