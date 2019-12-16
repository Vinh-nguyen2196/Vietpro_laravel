<?php 
if(isset($_GET['page'])){
    $page= $_GET['page'];
    }
    else{
        $page=1;
    }
    $row_per_page=5;
    $first_key = $row_per_page * $page - $row_per_page;
    $query_e = mysqli_query($connect, "SELECT * FROM product");
    $total_row=mysqli_num_rows($query_e);
    $total_page=ceil($total_row/$row_per_page);//hafm ceil lưu được 2 giá trị số nguyên và dư của phép chia
    $page_navigation='';

    $pre_page=$page-1;
     if ($pre_page <=0){
       $pre_page =1;
    }
 $page_navigation.='<li class="page-item"><a class="page-link" href="index.php?template=product&page='.$pre_page.'">&laquo;</a></li>';
for($i=1;$i<= $total_page;$i++){
    $page_navigation.='<li class="page-item"><a class="page-link" href="index.php?template=product&page='.$i.'">'.$i.'</a></li>';

}

                             
    $nex_page=$page + 1;
    if($nex_page>=$total_page){
        $nex_page= $total_page;
    }                            
                               
$page_navigation.='<li class="page-item"><a class="page-link" href="index.php?template=product&page='.$nex_page.'">&raquo;</a></li>';

 ?>

<script type="text/javascript">
    function delRow() {
        var delRows=confirm("bạn có muốn xóa");
        return delRows;
        // body...
    }
 </script>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Danh sách sản phẩm</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh sách sản phẩm</h1>
			</div>
		</div><!--/.row-->
		<div id="toolbar" class="btn-group">
            <a href="index.php?template=add_product" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i> Thêm sản phẩm
            </a>
        </div>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
                        <table 
                            data-toolbar="#toolbar"
                            data-toggle="table">

						    <thead>
						    <tr>
						        <th data-field="id" data-sortable="true">ID</th>
						        <th data-field="name"  data-sortable="true">Tên sản phẩm</th>
                                <th data-field="price" data-sortable="true">Giá</th>
                                <th>Ảnh sản phẩm</th>
                                <th>Trạng thái</th>
                                <th>Danh mục</th>
                                <th>Hành động</th>
						    </tr>
                            </thead>
                            <tbody>
                                 <?php
     $sql = "SELECT * FROM product INNER JOIN category ON product.cat_id = category.cat_id ORDER BY prd_id DESC LIMIT $first_key, $row_per_page";
                                        $query = mysqli_query($connect, $sql);

                                        while ($row_pro = mysqli_fetch_array($query)) {
                                    
                                         ?>
                                    <tr>
                                        <td style=""><?php echo $row_pro['prd_id'] ?></td>
                                        <td style=""><?php echo $row_pro['prd_name'] ?></td>
                                        <td style=""><?php echo $row_pro['prd_price'] ?></td>
                                        <td style="text-align: center"><img width="130" height="180" src="img/products/<?php echo $row_pro['prd_image']; ?>" /></td>
                                        <?php if($row_pro['prd_status']==1) 
                                        echo '<td><span class="label label-success">Còn hàng</span></td>';
                                        else{
                                            echo '<td><span class="label label-danger">Hết hàng</span></td>';
                                        }
                                        ?>
                                        <td><?php echo $row_pro['cat_name'] ?></td>
                                        <td class="form-group">
                                            <a href="index.php?template=edit_product&prd_id=<?php echo $row_pro['prd_id'] ?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                            <a onclick="return delRow()" href="del_product.php?pro_id=<?php echo $row_pro['prd_id'] ;?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                    
                                 </tbody>
						</table>
                    </div>
                    <div class="panel-footer">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                              <?php echo $page_navigation;  ?>
                            </ul>
                        </nav>
                    </div>
				</div>
			</div>
		</div><!--/.row-->	
	</div>	<!--/.main-->
