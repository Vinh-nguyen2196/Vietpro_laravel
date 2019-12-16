

<!--	Header	-->

<!--	End Header	-->

<!--	Body	-->
<?php
include_once('PHPMailer-master/src/PHPMailer.php');
include_once('PHPMailer-master/src/Exception.php');
include_once('PHPMailer-master/src/OAuth.php');
include_once('PHPMailer-master/src/POP3.php');
include_once('PHPMailer-master/src/SMTP.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 if(isset($_SESSION['cart'])){
    if(isset($_POST['sbm'])){
        foreach ($_POST['so_luong'] as $key => $value) {
            $_SESSION['cart'][$key]=$value;
            # code...
        }

    }
    $array_id= array();
    //lấy key từ mảng session và lưu lại vào mảng array_id(key là các id đã lưu vào session)
    foreach ($_SESSION['cart'] as $key => $value) {
        # code...
        $array_id[]=$key;
    }
    print_r($array_id);
    $string_id = implode(',',$array_id);
    print_r($string_id);
    $sql_cart="SELECT * FROM product WHERE prd_id IN($string_id)";
    $data_cart= mysqli_query($connect,$sql_cart);
    print_r($_SESSION['cart']);
   // var_dump( $data_cart);


} ?>

<div id="body">
	<div class="container">
    	
        <div class="row">
        	<div id="main" class="col-lg-8 col-md-12 col-sm-12">
            	<!--	Slider	-->
                
                <!--	End Slider	-->
                <?php if(isset($_SESSION['cart'])){


                   ?>
                 <div id="my-cart">
                    <div class="row">
                        <div class="cart-nav-item col-lg-7 col-md-7 col-sm-12">Thông tin sản phẩm</div> 
                        <div class="cart-nav-item col-lg-2 col-md-2 col-sm-12">Tùy chọn</div> 
                        <div class="cart-nav-item col-lg-3 col-md-3 col-sm-12">Giá</div>    
                    </div>  
                    <form method="post">
                        <?php 
                        
                        $total_price=0;
                        $total_price_all=0;
                        

                        while($row_prd = mysqli_fetch_array($data_cart)) 
                            {

                            $total_price=$_SESSION['cart'][$row_prd['prd_id']]*$row_prd['prd_price'];
                                 $total_price_all+=$total_price
                                ?>
                    <div class="cart-item row">
                        <div class="cart-thumb col-lg-7 col-md-7 col-sm-12">
                            <img src="images/product-1.png">
                            <h4><?php echo $row_prd['prd_name']; ?></h4>
                        </div> 
                        
                        <div class="cart-quantity col-lg-2 col-md-2 col-sm-12">
                            <input type="number" id="quantity" class="form-control form-blue quantity" value="<?php echo $_SESSION['cart'][$row_prd['prd_id']]; ?>" min="1" name="so_luong[<?php echo $row_prd['prd_id']; ?>]">
                        </div> 
                        <div class="cart-price col-lg-3 col-md-3 col-sm-12"><b><?php echo $total_price; ?></b><a href="template/cart/del_cart.php?prd_id=<?php echo $row_prd['prd_id']; ?>">Xóa</a></div>    
                    </div>  
                <?php } ?>

                    <div class="row">
                        <div class="cart-thumb col-lg-7 col-md-7 col-sm-12">
                            <button id="update-cart" class="btn btn-success" type="submit" name="sbm">Cập nhật giỏ hàng</button>    
                        </div> 
                        <div class="cart-total col-lg-2 col-md-2 col-sm-12"><b>Tổng cộng:</b></div> 
                        <div class="cart-price col-lg-3 col-md-3 col-sm-12"><b><?php echo $total_price_all;  ?></b></div>
                    </div>
                    </form>
                               
                </div>  

               <?php }  
               else{
               echo '<div class="alert alert-danger">giỏ hàng của bạn đang trống</div>';

           }  ?>   
                <!--	Cart	-->
                
                <!--	End Cart	-->
                
                <!--	Customer Info	-->
                <div id="customer">
                    <?php 
                        if(isset($_POST['sbm_bill'])){
                            $customer_name=$_POST['name'];
                            $customer_phone=$_POST['phone'];
                            $customer_mail=$_POST['mail'];
                            $customer_add=$_POST['add'];
                          
                            $customer_bill='<p> Xin chào anh chị '.$customer_name.',số điện thoại '.$customer_phone.',địa chỉ '.$customer_add.'</p>';
                            $customer_bill.='
                            <table border="1">
                        
                            <tr>
                            <th>sản phẩm</th>
                            <th>số lượng</th>
                            <th> Tổng giá</th>
                            </tr>';
                             $total_price=0;
                            
                            $sql_cart="SELECT * FROM product WHERE prd_id IN($string_id)";
    $data_cart= mysqli_query($connect,$sql_cart);

                        while($row_prd = mysqli_fetch_array($data_cart)) 
                            {

                            $total_price=$_SESSION['cart'][$row_prd['prd_id']]*$row_prd['prd_price'];
                             $customer_bill.='
                           
         

                            <tr>
                            <td>'.$row_prd['prd_name'].'</td>


                            <td>'.$_SESSION['cart'][$row_prd['prd_id']].'</td>


                            <td>'.$total_price.'</td>
                            </tr>';
                        }
                            $customer_bill.='
                           
                         
                            </table>
                             <p> cảm ơn quý khách,hẹn gặp lại!!!!!!</p>';
                             $mail = new PHPMailer(true);                              // Passing 'true' enables exceptions
                             try {
        //Server settings
        $mail->SMTPDebug = 2;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'quantri.vietproshop@gmail.com';                 // SMTP username
        $mail->Password = 'vietpr0sh0p';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, 'ssl' also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        //Recipients
        $mail->CharSet = 'UTF-8';
        $mail->setFrom('quantri.vietproshop@gmail.com', 'Vietpro Mobile Shop');             // Gửi mail tới Mail Server
        $mail->addAddress('xuanvinhnguyen2196@gmail.com');               // Gửi mail tới mail người nhận
        //$mail->addReplyTo('ceo.vietpro@gmail.com', 'Information');
        $mail->addCC('quantri.vietproshop@gmail.com');
        //$mail->addBCC('bcc@example.com');

        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Xác nhận đơn hàng từ Vietpro Mobile Shop';
        $mail->Body    = $customer_bill;
        $mail->AltBody = 'Mô tả đơn hàng';

        $mail->send();
        header('location:index.php?template=success');
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }



   


                        } ?>
                	<form method="post">
                    <div class="row">

                    	
                    	<div id="customer-name" class="col-lg-4 col-md-4 col-sm-12">
                        	<input placeholder="Họ và tên (bắt buộc)" type="text" name="name" class="form-control" required>
                        </div>
                        <div id="customer-phone" class="col-lg-4 col-md-4 col-sm-12">
                        	<input placeholder="Số điện thoại (bắt buộc)" type="text" name="phone" class="form-control" required>
                        </div>
                        <div id="customer-mail" class="col-lg-4 col-md-4 col-sm-12">
                        	<input placeholder="Email (bắt buộc)" type="text" name="mail" class="form-control" required>
                        </div>
                        <div id="customer-add" class="col-lg-12 col-md-12 col-sm-12">
                        	<input placeholder="Địa chỉ nhà riêng hoặc cơ quan (bắt buộc)" type="text" name="add" class="form-control" required>
                        </div>
                        
                    </div>
                     <div class="row">
                        <div class="by-now col-lg-6 col-md-6 col-sm-12">
                            <button name="sbm_bill" id="mua-ngay" type="submit">
                                <b>Mua ngay</b>
                                <span>Giao hàng tận nơi siêu tốc</span>
                            </button>
                        </div>
                        <div class="by-now col-lg-6 col-md-6 col-sm-12">
                            <a href="#">
                                <b>Trả góp Online</b>
                                <span>Vui lòng call (+84) 0982171667</span>
                            </a>
                        </div>
                    </div>
                    </form>
                   
                </div>
                <!--	End Customer Info	-->
                
            </div>
            
           
        </div>
    </div>
</div>
<!--	End Body	-->



<!--	Footer	-->

<!--	End Footer	-->










