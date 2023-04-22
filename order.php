<?php
    session_start();
    
    include "admin/config/database.php";

    if(!isset($_SESSION["uid"])){
        echo "<script>alert('You are not logged in.')</script>";
        echo "<script>window.location.href='login.php'</script>";
    }

    $tot = $_POST['tot'];
    $rs = mysqli_query($link, "SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'flower_db' AND TABLE_NAME = 'orders';");
    $row = mysqli_fetch_row($rs);
    $oid = $row[0];
    $odate = date('Y-m-d');
?>

<!doctype html>
<html>
   <head>
      <link rel="stylesheet" href="css/bootstrap.css"/>
      <link rel="stylesheet" href="admin/css/style.css"/>
      <script src="js/bootstrap.js"></script>
      <title>Checkout</title>
   </head>
   
   <body style="background-color: lightpink;">
      <main>
         <header class="my-5">
            <h3 class="text-center" style="color: black;text-shadow: 2px 2px orangered;">Pay Bill</h3>
         </header>
         <section class="container">
            <div class="row justify-content-center">
               <div class="order-2 order-lg-1 border">
                  <form method="post" action="order1.php">
                     <div class="form-group">
                        <label for="oid">Order ID:</label>
                        <input type="text" class="form-control" name="oid" id="oid" value="<?php echo $oid?>" readOnly>
                     </div>                     
                     <div class="form-group">
                        <label for="odate">Order Date:</label>
                        <input type="text" class="form-control" name="odate" id="odate" value="<?php echo $odate?>" readOnly>
                     </div>                     
                     <div class="form-group">
                        <label for="tot">Bill Amount:</label>
                        <input type="text" class="form-control" name="tot" id="tot" value="<?php echo $tot?>" readOnly>
                     </div>
                     <div class="form-group">
                        <label for="tot1">CST (1.8%):</label>
                        <input type="text" class="form-control" name="tot1" id="tot1" value="<?php echo $tot*0.018?>" readOnly>
                     </div>
                     <div class="form-group">
                        <label for="tot2">GST (1.8%):</label>
                        <input type="text" class="form-control" name="tot2" id="tot2" value="<?php echo $tot*0.018?>" readOnly>
                     </div>
                     <div class="form-group">
                        <label for="tot3">Final Bill Amount:</label>
                        <input type="text" class="form-control" name="tot3" id="tot3" value="<?php echo $tot + $tot*0.036?>" readOnly>
                     </div>
                     <div class="form-group">
                        <label for="mode">Payment Mode:</label>
                        <select name="paymode" class="form-control" id="mode" required>
                        <option value="COD">COD</option>
                        <option value="Card">Card</option>
                        </select>
                     </div>
                     <div class="form-group" style="padding:15px;">
                        <button type="submit" name="submit" class="btn btn-primary">Confirm Order</button>
                     </div>
                  </form>
               </div>
            </div>
         </section>
      </main>
   </body>
</html>