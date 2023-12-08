<!DOCTYPE html>
<html lang="en">
    <head>
       <?php
        session_start();
        
include("../Assets/Connection/Connection.php");
       ?>
        <meta charset="utf-8">
        <title>DropShipping</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free Website Template" name="keywords">
        <meta content="Free Website Template" name="description">

        <!-- Favicon -->
        <link href="../Assets/Template/Main/img/favicon.ico" rel="icon">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Nunito:600,700" rel="stylesheet"> 
        
        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="../Assets/Template/Main/lib/animate/animate.min.css" rel="stylesheet">
        <link href="../Assets/Template/Main/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="../Assets/Template/Main/lib/flaticon/font/flaticon.css" rel="stylesheet">
        <link href="../Assets/Template/Main/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

        <!-- Template Stylesheet -->
        <link href="../Assets/Template/Main/css/style.css" rel="stylesheet">
    </head>

    <body>
        <!-- Nav Bar Start -->
        <div class="navbar navbar-expand-lg bg-light navbar-light">
            <div class="container-fluid">
                <a href="HomePage.php" class="navbar-brand">Drop <span>Shipping</span></a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav ml-auto">
                    <a href="HomePage.php" class="nav-item nav-link active">Home</a>
                       
                      
                       <a href="SearchProduct.php" class="nav-item nav-link ">Search</a>
                       
                       <a href="MYCart.php" class="nav-item nav-link ">Cart</a>
                       <a href="MyBooking.php" class="nav-item nav-link ">Booking Details</a>
                       <a href="Complaint.php" class="nav-item nav-link ">Complaint</a>
                       
                       <div class="nav-item dropdown">
                           <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Profile</a>
                           <div class="dropdown-menu">
                               <a href="MyProfile.php" class="dropdown-item">Profile</a>
                               <a href="EditProfile.php" class="dropdown-item">Edit Profile</a>
                               <a href="ChangePassword.php" class="dropdown-item">Change Password</a>
                               
                           </div>
                       </div>
                       <a href="../Guest/Login.php" class="nav-item nav-link">Logout</a>
                   </div>
                </div>
            </div>
        </div>
        <!-- Nav Bar End -->


        <!-- Carousel Start -->
        <div class="carousel">
            <div class="container-fluid">
                <div class="owl-carousel">
                    <div class="carousel-item">
                        <div class="carousel-img">
                            <img src="../Assets/Template/Main/img/userh1.jpg" alt="Image">
                        </div>
                        <div class="carousel-text">
                            <h1>Welcome <span><?php echo $_SESSION["uname"];?></span> </h1>
                            <p>
                                Lorem ipsum dolor sit amet elit. Phasellus ut mollis mauris. Vivamus egestas eleifend dui ac consequat at lectus in malesuada
                            </p>
                            <div class="carousel-btn">
                            <a class="btn custom-btn" href="SearchProduct.php">Search</a>
                                <a class="btn custom-btn" href="MyBooking.php">View Booking</a>
                         </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="carousel-img">
                            <img src="../Assets/Template/Main/img/userh2.jpg" alt="Image">
                        </div>
                        <div class="carousel-text">
                        <h1>Welcome <span><?php echo $_SESSION["uname"];?></span> </h1>
                            <p>
                                Morbi sagittis turpis id suscipit feugiat. Suspendisse eu augue urna. Morbi sagittis, orci sodales varius fermentum, tortor
                            </p>
                            <div class="carousel-btn">
                            <a class="btn custom-btn" href="SearchProduct.php">Search</a>
                                <a class="btn custom-btn" href="MyBooking.php">View Booking</a>
                         </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="carousel-img">
                            <img src="../Assets/Template/Main/img/userh3.jpg" alt="Image">
                        </div>
                        <div class="carousel-text">
                        <h1>Welcome <span><?php echo $_SESSION["uname"];?></span> </h1>
                            <p>
                                Sed ultrices, est eget feugiat accumsan, dui nibh egestas tortor, ut rhoncus nibh ligula euismod quam. Proin pellentesque odio
                            </p>
                            <div class="carousel-btn">
                                <a class="btn custom-btn" href="SearchProduct.php">Search</a>
                                <a class="btn custom-btn" href="MyBooking.php">View Booking</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Carousel End -->
         <!-- Most Saled -->
         <div class="team">
            <div class="container">
                <div class="section-header text-center">
                    <p>Products</p>
                    <h2>Most Selled</h2>
                </div>
                <div class="row">
                    <?php
  $sqlQry = "SELECT *  from  tbl_cart ct inner join  tbl_product p on ct.product_id = p.product_id inner join tbl_subcategory sc on sc.subcategory_id=p.subcategory_id inner join tbl_category c on c.category_id=sc.category_id inner join tbl_seller s on s.seller_id=ct.seller_id  where true and  ct.cart_status='10' ";
$datas=$Conn->query($sqlQry);
while($rowS=$datas->fetch_assoc())
{
    $selQ="select COALESCE(SUM(cart_quantity),0) as num from tbl_cart where product_id='".$rowS["product_id"]."'and cart_status=1";
    $rowN=$Conn->query($selQ);
 $data=$rowN->fetch_assoc();


?><?php
if($data["num"]>=10)
{
    ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="team-item">
                            <div class="team-img">
                                <img src="../Assets/Files/Photo/<?php echo $rowS["product_photo"]; ?>" alt="Image">
                                
                            </div>
                            <div class="team-text">
                                <h2><?php echo $rowS["product_name"]; ?></h2>
                                <p><b><?php echo $rowS["cart_price"]; ?></b></p>
                                <p><?php echo $rowS["seller_name"]; ?></p>
                            </div>
                        </div>
                    </div>
                 <?php
}
}
                 ?>
                    
                </div>
            </div>
        </div>
        <!-- Most Saled -->
       
        
        
        

        
        
        
        
        
        
        
        
       
        <!-- Footer Start -->
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="footer-contact">
                                    <h2>Our Address</h2>
                                    <p><i class="fa fa-map-marker-alt"></i>123 Street, New York, USA</p>
                                    <p><i class="fa fa-phone-alt"></i>+012 345 67890</p>
                                    <p><i class="fa fa-envelope"></i>info@example.com</p>
                                    <div class="footer-social">
                                        <a href=""><i class="fab fa-twitter"></i></a>
                                        <a href=""><i class="fab fa-facebook-f"></i></a>
                                        <a href=""><i class="fab fa-youtube"></i></a>
                                        <a href=""><i class="fab fa-instagram"></i></a>
                                        <a href=""><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                            </div>
                          
                    <div class="col-lg-5">
                        <div class="footer-newsletter">
                            <h2>Newsletter</h2>
                            <p>
                                Lorem ipsum dolor sit amet elit. Quisque eu lectus a leo dictum nec non quam. Tortor eu placerat rhoncus, lorem quam iaculis felis, sed lacus neque id eros.
                            </p>
                            <div class="form">
                                <input class="form-control" placeholder="Email goes here">
                                <button class="btn custom-btn">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <div class="container">
                    <p>Copyright &copy; <a href="#">Your Site Name</a>, All Right Reserved.</p>
                    <p>Designed By <a href="https://htmlcodex.com">HTML Codex</a></p>
                </div>
            </div>
        </div>
        <!-- Footer End -->

        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="../Assets/Template/Main/lib/easing/easing.min.js"></script>
        <script src="../Assets/Template/Main/lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="../Assets/Template/Main/lib/tempusdominus/js/moment.min.js"></script>
        <script src="../Assets/Template/Main/lib/tempusdominus/js/moment-timezone.min.js"></script>
        <script src="../Assets/Template/Main/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
        
        <!-- Contact Javascript File -->
        <script src="../Assets/Template/Main/mail/jqBootstrapValidation.min.js"></script>
        <script src="../Assets/Template/Main/mail/contact.js"></script>

        <!-- Template Javascript -->
        <script src="../Assets/Template/Main/js/main.js"></script>
    </body>
</html>
