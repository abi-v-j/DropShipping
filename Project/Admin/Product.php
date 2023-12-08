<?php
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");
if (isset($_POST["btnsave"])) {
  $name = $_POST["txtname"];
  $details = $_POST["txtdetails"];
  $price = $_POST["txtprice"];
  $maxprice = $_POST["txtmaxprice"];
  $subcategory_id = $_POST["sel_subcategory"];

  $photo = $_FILES["filephoto"]["name"];
  $path = $_FILES["filephoto"]["tmp_name"];
  move_uploaded_file($path, "../Assets/Files/Photo/" . $photo);


  $insQry = "insert into tbl_product(subcategory_id,product_name,product_photo,product_details,product_price,product_maxprice) values('" . $subcategory_id . "','" . $name . "','" . $photo . "','" . $details . "','" . $price . "','".$maxprice."')";
  if ($Conn->query($insQry)) {
    ?>
    <script>
      alert('inserted');
      location.href = 'Product.php';
    </script>
    <?php
  } else {
    ?>
    <script>
      alert('failed');
      location.href = 'Product.php';
    </script>
    <?php
  }
}
if (isset($_GET["id"])) {
  $id = $_GET["id"];
  $delQry = "delete from tbl_product where product_id='" . $_GET["id"] . "'";
  if ($Conn->query($delQry)) {
    ?>
    <script>
      alert('deleted!!');
      location.href = 'Product.php';
    </script>
    <?php
  } else {
    ?>
    <script>
      alert('failed!!');
      location.href = 'Product.php';
    </script>
    <?php
  }
}
$pid = "";
$pname = "";
$sname = "";

if (isset($_GET["pid"])) {
  $selQry = "select * from tbl_product where product_id='" . $_GET["pid"] . "'";
  $rel = $Conn->query($selQry);
  if ($row = $rel->fetch_assoc()) {
    $pid = $row["product_id"];
    $pname = $row["product_name"];
    $sname = $row["subcategory_id"];
  }

}

?>
<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>LuckysMart::Product</title>
</head>





?>

<body>
  <section class="main_content dashboard_part">
    <div class="main_content_iner ">
      <div class="container-fluid p-0">
        <div class="row justify-content-center">
          <div class="col-12">
            <div class="QA_section">
              <!--Form-->
              <div class="white_box_tittle list_header">
                <div class="col-lg-12">
                  <div class="white_box mb_30">
                    <div class="box_header ">
                      <div class="main-title">
                        <h3 class="mb-0">Table Product</h3>
                      </div>
                    </div>
                    <form method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="txt_district"> Name</label>
                        <input required="" type="text" class="form-control" id="txtname" name="txtname"
                          autocomplete="off" required>
                      </div>
                      <div class="form-group">
                        <label for="txt_district"> Photo</label>
                        <input required="" type="file" class="form-control" id="filephoto" name="filephoto"
                          autocomplete="off" required>
                      </div>
                      <div class="form-group">
                        <label for="txt_district">Details</label>
                        <input required="" type="text" class="form-control" id="txtdetails" name="txtdetails"
                          autocomplete="off" required>
                      </div>
                      <div class="form-group">
                        <label for="txt_district">Price</label>
                        <input required="" type="number" class="form-control" id="txtprice" name="txtprice"
                          autocomplete="off" required>
                      </div>
                      <div class="form-group">
                        <label for="txt_district">Max Price</label>
                        <input required="" type="number" class="form-control" id="txtmaxprice" name="txtmaxprice"
                          autocomplete="off" required>
                      </div>

                      <div class="form-group">
                        <label for="txt_district">Category</label>
                        <select class="form-control" name="sel_category" id="sel_category" autocomplete="off" required
                          onchange="getSubcategory(this.value)">
                          <option value="">-----Select-----</option>
                          <?php
                          $sel = "select * from tbl_category";
                          $row = $Conn->query($sel);
                          while ($data = $row->fetch_assoc()) {
                            ?>
                            <option value="<?php echo $data['category_id']; ?> ">
                              <?php echo $data['category_name']; ?>
                            </option>

                            <?php
                          }
                          ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="txt_district">SubCategory</label>
                        <select class="form-control" name="sel_subcategory" id="sel_subcategory" autocomplete="off"
                          required onchange="getpanchayath(this.value)">
                          <option value="">-----Select-----</option>
                          ?>
                        </select>
                      </div>
                      <div class="form-group" align="center">
                        <input type="submit" class="btn-dark" style="width:100px; border-radius: 10px 5px "
                          name="btnsave" value="Save">
                      </div>
                    </form>
                  </div>
                </div>
              </div>

              <div class="QA_table mb_30">
                <!-- table-responsive -->
                <table class="table lms_table_active">
                  <thead>



                    <tr style="background-color: #74CBF9">
                      <td align="center" scope="col">Sl.No</td>
                      <td align="center" scope="col">Name</td>
                      <td align="center" scope="col">Price</td>
                      <td align="center" scope="col">Category</td>
                      <td align="center" scope="col">Subcategory</td>
                      <td align="center" scope="col">Action</td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = 0;
                    $selQry = "select * from tbl_product p inner join tbl_subcategory s on p.subcategory_id=s.subcategory_id inner join tbl_category c on s.category_id=c.category_id";

                    $rel = $Conn->query($selQry);
                    if ($rel->num_rows > 0) {
                      while ($row = $rel->fetch_assoc()) {
                        $i++;

                        ?>
                        <tr>
                          <td align="center">
                            <?php echo $i; ?>
                          </td>
                          <td align="center">
                            <?php echo $row["product_name"]; ?>
                          </td>
                          <td align="center">
                            <?php echo $row["product_price"]; ?>
                          </td>
                          <td align="center">
                            <?php echo $row["category_name"]; ?>
                          </td>
                          <td align="center">
                            <?php echo $row["subcategory_name"]; ?>
                          </td>

                          <td align="center"><a href="Product.php?id=<?php echo $row["product_id"]; ?>"
                              class="status_btn">Delete</a> &nbsp;&nbsp;&nbsp;&nbsp;

                          </td>
                        </tr>
                        <?php
                      }


                     
                    }
                   
                      ?>


                    </tbody>
                    
                </table>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


  </section>
 
</body>

<script src="../Assets/JQ/jQuery.js"></script>
<script>
  function getSubcategory(did) {

    $.ajax({
      url: "../Assets/AjaxPages/AjaxSubcategory.php?did=" + did,
      success: function (result) {
        //alert(result)
        $("#sel_subcategory").html(result);
      }
    });
  }
</script>
<?php
include("Foot.php");
ob_flush();
?>

</html>