<?php
    session_start();
    
    include "admin/config/database.php";

    if(!isset($_SESSION["uid"])){
        echo "<script>alert('You are not logged in.')</script>";
        echo "<script>window.location.href='login.php'</script>";
    }

    $oid = $_POST['oid'];
    $odate = $_POST['odate'];
    $tot = $_POST['tot'];
    $tot1 = $_POST['tot1'];
    $tot2 = $_POST['tot2'];
    $tot3 = $_POST['tot3'];
    $paymode = $_POST['paymode'];
    $uid = $_SESSION['uid'];

    if($paymode == 'COD')
    {
        mysqli_query($link, "insert into orders values($oid, '$odate', $tot, $uid, '$paymode', '', '', 'Pending','')");
        echo "<script>alert('Your order is placed successfully. Will be delivered within 7 working days.')</script>";
        echo "<script>window.location.href='index.php'</script>";
    }
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
                  <form method="post" action="order2.php">
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
                        <label for="tot3">Final Bill Amount:</label>
                        <input type="text" class="form-control" name="tot3" id="tot3" value="<?php echo $tot + $tot*0.036?>" readOnly>
                     </div>
                     <div class="form-group">
                        <label for="paymode">Pay Mode:</label>
                        <input type="text" class="form-control" name="paymode" id="paymode" value="<?php echo $paymode?>" readOnly>
                     </div>
                     <div class="form-group">
                        <label for="cardno">Card No:</label>
                        <input type="text" class="form-control" name="cardno" id="cardno" pattern="^\d{4}-\d{4}-\d{4}-\d{4}$" placeholder="xxxx-xxxx-xxxx-xxxx" required>
                     </div>
                     <div class="form-group">
                        <label for="bname">Bank Name:</label>
                        <input type="text" class="form-control" name="bname" id="bname">
                     </div>
                     <div style="padding:15px;">
                        <button type="submit" name="login" class="btn btn-primary">Pay Now</button>
                     </div>
                  </form>
               </div>
            </div>
         </section>
      </main>
   </body>
</html>