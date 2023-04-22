<?php
    session_start();
    $_SESSION = array();
    session_destroy();
?>
<script>
    alert("You are logged out successfully.");
    window.location.href = "index.php";
</script>