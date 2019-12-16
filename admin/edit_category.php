

 
<!DOCTYPE html>
<html>
<head>

  <?php
  include_once('../config/connect.php');
  $cat_id=$_GET['cat_id'];
  $query=mysqli_query($connect,"SELECT* FROM category
    WHERE cat_id = '$cat_id'");
 $row_cat = mysqli_fetch_array($query);

                                            # code...


   ?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li><a href="">Quản lý danh mục</a></li>
				<li class="active"><?php echo $row_cat['cat_name'] ?></li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh mục:<?php echo $row_cat['cat_name'] ?></h1>
			</div>
		</div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-8">
                            <?php




                            if (isset($_POST['sbm'])) {
                                $cat_name=$_POST['cat_name'];
                                 $query=mysqli_query($connect,"SELECT* FROM category
                                WHERE cat_name = '$cat_name'");
                            $row_cat = mysqli_fetch_array($query);
                            if($row_cat>0){
                                $error='<div class="alert alert-danger">Danh mục đã tồn tại !</div>';
                            }
                            else{
                                 # code...
                             
                            
                            $quer=mysqli_query($connect,"UPDATE category
                            SET cat_name = '$cat_name' WHERE cat_id='$cat_id'"); 
                             header('location: index.php?template=category');
                             }
                             
                        }
                            ?>

                            <?php if(isset($error)){
                                echo $error;
                            } ?>
                        <form role="form" method="post">
                            <div class="form-group">
                                <label>Tên danh mục:</label>
                                <input type="text" name="cat_name" required value="<?php echo $row_cat['cat_name'] ?>" class="form-control" placeholder="Tên danh mục...">
                            </div>
                            <button type="submit" name="sbm" class="btn btn-primary">Cập nhật</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div><!-- /.col-->
	</div>	<!--/.main-->	
