<?php
include("../Connection/Connection.php");

if (isset($_GET["action"])) {

    $sqlQry = "SELECT *  from  tbl_cart ct inner join  tbl_product p on ct.product_id = p.product_id inner join tbl_subcategory sc on sc.subcategory_id=p.subcategory_id inner join tbl_category c on c.category_id=sc.category_id inner join tbl_seller s on s.seller_id=ct.seller_id  where true and  ct.cart_status='10' ";

    if ($_GET["category"] != null) {

        $category = $_GET["category"];

        $sqlQry = $sqlQry . " AND c.category_id IN(" . $category . ")";
    }
    if ($_GET["subcategory"] != null) {

        $subcategory = $_GET["subcategory"];

        $sqlQry = $sqlQry . " AND sc.subcategory_id IN(" . $subcategory . ")";
    }

    if ($_GET["name"] != null) {

        $name = $_GET["name"];

        $sqlQry = $sqlQry . " AND subcategory_name LIKE '" . $name . "%'";
    }
    $resultS = $Conn->query($sqlQry);



    if ($resultS->num_rows > 0) {
        while ($rowS = $resultS->fetch_assoc()) {
            ?>

            <div class="col-md-3 mb-2">
                <div class="card-deck">
                    <div class="card border-secondary">
                        <?php
                          $selQ="select COALESCE(SUM(cart_quantity),0) as num from tbl_cart where product_id='".$rowS["product_id"]."'and cart_status=1";
                            $rowN=$Conn->query($selQ);
                            $data=$rowN->fetch_assoc();
                       
                       ?>
                       <?php
                            if($data["num"]>=10)
                            {
                               ?>
                                <span  class="card-title text-danger"><b>Most Saled</b></span>
                               <?php
                            }
                        ?>
                        <img src="../Assets/Files/Photo/<?php echo $rowS["product_photo"]; ?>" class="card-img-top" height="250">
                        
                        <div class="card-img-secondary">
                            <h6 class="text-light bg-info text-center rounded p-1">
                                <?php echo $rowS["product_name"]; ?>
                            </h6>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title text-danger" align="center">
                                Price :
                                <?php echo $rowS["cart_price"]; ?>/-
                            </h4>
                            <p align="center">
                                
                                <?php echo $rowS["category_name"]; ?><br>
                                <?php echo $rowS["subcategory_name"]; ?><br>
                                <b><?php echo $rowS["seller_name"]  ?></b>

                            </p>
                            <?php


                            $average_rating = 0;
                            $total_review = 0;
                            $five_star_review = 0;
                            $four_star_review = 0;
                            $three_star_review = 0;
                            $two_star_review = 0;
                            $one_star_review = 0;
                            $total_user_rating = 0;
                            $review_content = array();

                            $query = "SELECT * FROM tbl_review where product_id = '" . $rowS["product_id"] . "' ORDER BY review_id DESC";

                            $result = $Conn->query($query);

                            while ($row = $result->fetch_assoc()) {


                                if ($row["user_rating"] == '5') {
                                    $five_star_review++;
                                }

                                if ($row["user_rating"] == '4') {
                                    $four_star_review++;
                                }

                                if ($row["user_rating"] == '3') {
                                    $three_star_review++;
                                }

                                if ($row["user_rating"] == '2') {
                                    $two_star_review++;
                                }

                                if ($row["user_rating"] == '1') {
                                    $one_star_review++;
                                }

                                $total_review++;

                                $total_user_rating = $total_user_rating + $row["user_rating"];

                            }


                            if ($total_review == 0 || $total_user_rating == 0) {
                                $average_rating = 0;
                            } else {
                                $average_rating = $total_user_rating / $total_review;
                            }

                            ?>
                            <p align="center" style="color:#F96;font-size:20px">
                                <?php
                                if ($average_rating == 5 || $average_rating == 4.5) {
                                    ?>
                                    <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                    <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                    <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                    <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                    <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                    <?php
                                }
                                if ($average_rating == 4 || $average_rating == 3.5) {
                                    ?>
                                    <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                    <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                    <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                    <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                    <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                    <?php
                                }
                                if ($average_rating == 3 || $average_rating == 2.5) {
                                    ?>
                                    <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                    <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                    <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                    <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                    <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                    <?php
                                }
                                if ($average_rating == 2 || $average_rating == 1.5) {
                                    ?>
                                    <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                    <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                    <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                    <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                    <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                    <?php
                                }
                                if ($average_rating == 1) {
                                    ?>
                                    <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                    <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                    <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                    <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                    <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                    <?php
                                }
                                if ($average_rating == 0) {
                                    ?>
                                    <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                    <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                    <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                    <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                    <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                    <?php
                                }
                                ?>

                            </p>
                            <?php

                            $output = array(
                                'average_rating' => number_format($average_rating, 1),
                                'total_review' => $total_review,
                                'five_star_review' => $five_star_review,
                                'four_star_review' => $four_star_review,
                                'three_star_review' => $three_star_review,
                                'two_star_review' => $two_star_review,
                                'one_star_review' => $one_star_review,
                                'review_data' => $review_content
                            );


                            ?>

                            <a href="javascript:void(0)"
                                onclick="addCart(<?php echo $rowS['product_id']; ?>,<?php echo $rowS['cart_price']; ?>,<?php echo $rowS['seller_id']; ?>)"
                                class="btn btn-success btn-block">Add to Cart</a>


                        </div>
                    </div>
                </div>
            </div>

            <?php
        }
    } else {
        echo "<h4 align='center'>Products Not Found!!!!</h4>";
    }
}

?>