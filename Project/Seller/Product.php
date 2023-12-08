<?php
ob_start();
include("Head.php");
session_start();
include("../Assets/Connection/Connection.php");
if(isset($_GET["id"]))
{
    $id=$_GET["id"];	
    $delQry="delete from tbl_cart where cart_id='".$_GET["id"]."'";
    if($Conn->query($delQry))
	{
	   ?>
        <script>
		alert('deleted!!');
		location.href='Product.php';
		</script>
		<?php
	}
else
	{
		?>
        <script>
		alert('failed!!');
		location.href='Product.php';
		</script>
		<?php
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LuckysMart::Product</title>
</head>

<body>
<br><br><br><br><br>
  <div id="tab" align="center">
  <?php
  $i=0;
  $selQry="select * from  tbl_cart ct inner join  tbl_product p on ct.product_id= p.product_id inner join tbl_subcategory s on p.subcategory_id=s.subcategory_id inner join tbl_category c on s.category_id=c.category_id where ct.cart_status=10";
 
  $rel=$Conn->query($selQry);
  if($rel->num_rows>0)
  {
?>
  <table align="center"  border="1">
    <tr>
      <td>Sl no</td>
      <td>Product name</td>
      <td>Price</td>
      <td>Category</td>
      <td>Subcategory</td>
      <td colspan="2" align="center">Action</td>
    </tr>
       <?php
	$i=0;
	
	while($row=$rel->fetch_assoc())
	{
		$i++;
?>
   <tr>
	<td><?php echo $i?></td> 
    <td><?php echo $row["product_name"]?></td>
    <td><?php echo $row["product_price"]?></td>
    <td><?php echo $row["category_name"]?></td> 
    <td><?php echo $row["subcategory_name"]?></td> 
	<td><a href="Product.php?id=<?php echo $row["cart_id"];?>">Delete</a></td>
</tr>
<br>
<?php
	}
   }
   else
   {
	   echo "<h1 align='center'>No Data Found<h1>";
   }

?>   
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
  </div>
</body>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
 	function getSubcategory(did)
	{

		$.ajax({url:"../Assets/AjaxPages/AjaxSubcategory.php?did="+ did,
		success:function(result)
		{
			//alert(result)
			$("#sel_subcategory").html(result);
		}});
	}
	</script>
  <?php
include("Foot.php");
ob_flush();
?>
</html>