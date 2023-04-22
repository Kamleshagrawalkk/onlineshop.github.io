<?php   
    include "admin/config/database.php";

    $oid = $_POST['oid'];

    $rs = mysqli_query($link, "select datediff(order_date+3, current_date) from orders where order_id=$oid");
    $row = mysqli_fetch_row($rs);

    if($row[0]<=0){
        echo "<script>alert('Order cannot be canceled. Order can be canceled within 3 working days from date of booking');</script>";
    }
    else{
        mysqli_query($link, "update orders set status='Cancel' where order_id=$oid");
        echo "<script>alert('Your order is canceled successfully. Refund will be done to your account within 7 working days.');</script>";
    }
?>
<script>
    window.location.href = "index.php";
</script>