<?php
include("../Connection/Connection.php");
session_start();
$selqry = "select * from tbl_booking   where seller_id='" . $_SESSION["sid"] . "' and booking_status='0'";

$result = $Conn->query($selqry);
if ($result->num_rows > 0) {

	if ($row = $result->fetch_assoc()) {
		$bid = $row["booking_id"];



		$selqry = "select * from tbl_cart where booking_id='" . $bid . "' and product_id='" . $_GET["id"] . "'";
		//echo $selqry;
		$result = $Conn->query($selqry);
		if ($result->num_rows > 0) {
			echo "Already Added to Cart";

		} else {

			$insQry1 = "insert into tbl_cart(product_id,booking_id,cart_price,seller_id)values('" . $_GET["id"] . "','" . $bid . "','" . $_GET["mprice"] . "','" . $_SESSION["sid"] . "')";
			if ($Conn->query($insQry1)) {
				echo "Added to Cart";
			} else {
				echo "Failed";
			}
		}

	}

} else {


	$insQry = " insert into tbl_booking(booking_date,seller_id)values(curdate(),'" . $_SESSION["sid"] . "')";
	if ($Conn->query($insQry)) {
		$selqry1 = "select MAX(booking_id) as id from tbl_booking";
		$result = $Conn->query($selqry1);
		if ($row = $result->fetch_assoc()) {
			$bid = $row["id"];


			$selqry = "select * from tbl_cart where booking_id='" . $bid . "'and product_id='" . $_GET["id"] . "'";
			$result = $Conn->query($selqry);
			if ($result->num_rows > 0) {
				echo "Already Added to Cart";

			} else {


				$insQry1 = "insert into tbl_cart(product_id,booking_id,cart_price,seller_id)values('" . $_GET["id"] . "','" . $bid . "','" . $_GET["mprice"] . "','" . $_SESSION["sid"] . "')";
				if ($Conn->query($insQry1)) {
					echo "Added to Cart";
				} else {
					echo "Failed";
				}

			}

		}
	}
}
?>