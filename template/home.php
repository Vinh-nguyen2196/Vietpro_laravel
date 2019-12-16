<div id="body">
	<div class="container">
    	<div class="row">
        	<div class="col-lg-12 col-md-12 col-sm-12">
            	<?php include_once('header/menu.php'); ?>
            </div>
        </div>
        <div class="row">
        	<div id="main" class="col-lg-8 col-md-12 col-sm-12">
            	<!--	Slider	-->
                <?php include_once('slider/slider.php');

                    if(isset($_GET['template'])){
                        switch ($_GET['template']) {
                            case 'category':
                                # code...
                                include_once('category/category.php');break;
                            case 'product':
                                # code...
                                include_once('products/product.php');break;
                            case 'cart':
                                # code...
                                include_once('cart/cart.php');break;
                            case 'success':
                                # code...
                                include_once('cart/success.php');break;
                            case 'search':
                                    # code...
                                include_once('search/search.php');break;
                        }
                    }
                    else{
                        include_once('sub.php');
                    }

                 ?>
                <!--	End Slider	-->
                
                <!--	Feature Product	-->
                
                <!--	End Feature Product	-->
                
                
                <!--	Latest Product	-->
                
                <!--	End Latest Product	-->
                
            </div>
            
            <?php include_once('banner/banner.php'); ?>
        </div>
    </div>
</div>