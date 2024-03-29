
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="">Quản lý sản phẩm</a></li>
				<li class="active">Thêm sản phẩm</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Thêm sản phẩm</h1>
			</div>
        </div><!--/.row-->
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-6">
                                <?php 
                                if(isset($_POST['sbm'])){
                                    $prd_name=$_POST['prd_name'];
                                    $prd_price=$_POST['prd_price'];
                                    $prd_warranty=$_POST['prd_warranty'];
                                    $prd_accessories=$_POST['prd_accessories'];
                                    $prd_promotion=$_POST['prd_promotion'];
                                    $prd_new=$_POST['prd_new'];
                                    $prd_status=$_POST['prd_status'];
                                    $prd_details=$_POST['prd_details'];
                                    $cat_id=$_POST['cat_id'];
                                    if(isset($_POST['prd_featured'])){
                                        $prd_featured=$_POST['prd_featured'];
                                    }
                                    else{
                                        $prd_featured=0;
                                    }
                                    $prd_image=$_FILES['prd_image']['name'];
                                     $prd_tmp_name=$_FILES['prd_image']['tmp_name'];
                                     $sql="INSERT INTO product(prd_name,prd_price,prd_warranty,prd_accessories,prd_promotion,prd_new,prd_status,prd_details,cat_id,prd_featured,prd_image) VALUES('$prd_name','$prd_price','$prd_warranty','$prd_accessories','$prd_promotion','prd_new','$prd_status','$prd_details','$cat_id','$prd_featured','$prd_image')";
                                     mysqli_query($connect,$sql);
                                     move_uploaded_file($prd_tmp_name,'img/products/'.$prd_image);
                                     header('location: index.php?template=product');
                                }

                                 ?>
                                <form role="form" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Tên sản phẩm</label>
                                    <input required name="prd_name" class="form-control" placeholder="">
                                </div>
                                                                
                                <div class="form-group">
                                    <label>Giá sản phẩm</label>
                                    <input required name="prd_price" type="number" min="0" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Bảo hành</label>
                                    <input required name="prd_warranty" type="text" class="form-control">
                                </div>    
                                <div class="form-group">
                                    <label>Phụ kiện</label>
                                    <input required name="prd_accessories" type="text" class="form-control">
                                </div>                  
                                <div class="form-group">
                                    <label>Khuyến mãi</label>
                                    <input required name="prd_promotion" type="text" class="form-control">
                                </div>  
                                <div class="form-group">
                                    <label>Tình trạng</label>
                                    <input required name="prd_new" type="text" class="form-control">
                                </div>  
                                
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ảnh sản phẩm</label>
                                    
                                    <input required name="prd_image" type="file">
                                    <br>
                                    <div>
                                        <img src="img/download.jpeg">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Danh mục</label>
                                    <select name="cat_id" class="form-control">
                                        <?php
                                        $query= mysqli_query($connect,"SELECT * FROM category");
                                        while($row_cat=mysqli_fetch_array($query)){
                                         ?>
                                        }
                                        <option value=<?php echo $row_cat['cat_id'];?>
                                        ><?php echo $row_cat['cat_name']; ?></option>
                                         <?php } ?>
                                        
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <select name="prd_status" class="form-control">
                                        <option value=1 selected>Còn hàng</option>
                                        <option value=0>Hết hàng</option>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label>Sản phẩm nổi bật</label>
                                    <div class="checkbox">
                                        <label>
                                            <input name="prd_featured" type="checkbox" value=1>Nổi bật
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                        <label>Mô tả sản phẩm</label>
                                        <textarea required name="prd_details" class="form-control" rows="3"></textarea>
                                    </div>
                                <button name="sbm" type="submit" class="btn btn-success">Thêm mới</button>
                                <button type="reset" class="btn btn-default">Làm mới</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div><!-- /.col-->
            </div><!-- /.row -->
		
	</div>	<!--/.main-->	
