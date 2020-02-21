<?php
         $active ='Account';
        include("includes/header.php");
?>
</nav>
</header>

<div id="content"><!-- content Begin -->
    <div class="container"><!-- container-fluid Begin -->
        <div class="row">
            <div class="col-md-12"><!-- col-md-12 Begin -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb"><!-- breadcrumb Begin -->
                        <li class="breadcrumb-item">
                            <a href="index.php">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Login
                        </li>
                    </ol><!-- breadcrumb Finish -->
                </nav>
            </div><!-- col-md-12 Finish -->
        </div>
    </div>
    <div class="container">
          <div class="text-center"><!-- Center Begin -->
               <h4 class="contact-title"> Login</h4>
          </div><!-- Center Finish  -->
          <form action="checkout.php" method="post" class="contact-form"><!--form Begin -->
                <div class="row">
                    <div class="form-group col-md-6"><!--form-group Begin -->
                      <label for="email"> Email </label>
                      <input type="email" name="c_email" id="c_email" class="form-control" placeholder="yourname@email.com" required>
                    </div>
                    <div class="form-group col-md-6"><!--form-group Begin -->
                      <label for="subject"> Password </label>
                      <input type="password" name="c_pass" id="c_pass" class="form-control" placeholder="your password" required>
                    </div>
                </div>
                    <div class="form-group text-center"><!--text-center Begin -->
                        <button  value="Login" name="login" class="site-btn">
                            Login
                        </button>
                     </div><!--text-center Finish -->
                     <div class="text-center">
                     <p> If you haven't created an account <a href="customer_register.php"> Register Now</a> </p>
                     </div>
          </form><!-- Form  Finish -->
          </div><!-- container-fluid Finish -->
</div><!-- content Finish -->
    <?php

        include("includes/footer.php");

    ?>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 

   </body>
</html>
            
<?php

if(isset($_POST['login'])){

    $customer_email = $_POST['c_email'];

    $customer_password = $_POST['c_pass'];

    $select_customer = "select * from customers where customer_email='$customer_email' AND customer_pword = '$customer_password'";

    $run_customer = mysqli_query($con, $select_customer);

    $get_ip = getRealIpUser();

    $check_customer = mysqli_num_rows($run_customer);

    $select_cart = "select * from cart where ip_add='$get_ip'";

    $run_cart = mysqli_query($con, $select_cart);

    $check_cart = mysqli_num_rows($run_cart);

    if($check_customer==0){

        echo "<script>alert('Your email or password is wrong')</script>";

        exit();



    }
    if($check_customer==1 AND $check_cart==0){

        $_SESSION['customer_email'] = $customer_email;

        echo "<script>alert('You are Logged in')</script>";

        echo "<script>window.open('customer/my_account.php?my_orders', '_self')</script>";

    }else{

        $_SESSION['customer_email'] = $customer_email;

        $update_msg = mysqli_query($con,"update chat_users set log_in = 'Online' where user_email='$customer_email'");

        $user =  $_SESSION['customer_email'];

        $get_user = "select * from chat_users where user_email='$user'";

        $run_user = mysqli_query($con, $get_user);

        $row = mysqli_fetch_array($run_user);
        
        $user_name = $row['user_name'];

        echo "<script>alert('You are Logged in')</script>";

        echo "<script>window.open('checkout.php', '_self')</script>";
        }

    }


?>

