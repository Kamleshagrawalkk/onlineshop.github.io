<?php
    session_start();
    $sidd=session_id();

    include("config/database.php");

    if(isset($_POST['cid']))
    {
        $cid=$_POST['cid'];
        $imm=$_POST['imm'];
        if(mysqli_query($link,"delete from category where id=$cid"))
        {
            unlink('images/'.$imm);
            echo "Do you want to delete category?";
        }
        else
        {
            echo "Unable to delete category";
        }
    }

    if(isset($_POST['sumit']))
    {
        $rs = mysqli_query($link, "SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'flower_db' AND TABLE_NAME = 'orders';");
        $row = mysqli_fetch_row($rs);
        $oid = $row[0];
    
        $pid=$_POST['sumit'];
        $quan=$_POST['rahul'];
        if(mysqli_query($link,"insert into cart values($oid,$pid,$quan)"))
        {
            echo "Do you want to add product?";
        }
        else
        {
            echo "Unable to add product";
        }
    }

    if(isset($_GET['iiid']))
    {
        $iid=$_GET['iiid'];
        $pid=$_GET['ppid'];
        if(mysqli_query($link,"delete from cart where order_id=$iid and product_id=$pid"))
        {
            echo "Do you want to delete product?";
        }
    }

    if(isset($_POST['cidd']))
    {
        $cid=$_POST['cidd'];
        $imm=$_POST['imm'];
        if(mysqli_query($link,"delete from product where id=$cid"))
        {
            unlink('images/'.$imm);
            echo "Do you want to delete product?";
        }
        else
        {
            echo "Unable to delete product";
        }
    }
?>