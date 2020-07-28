<?php include 'config.php'; ?>

<?php 
    $res = array("success" => false);
    if(isset($_GET['logout'])){
        session_unset();
        session_destroy();
        unset($_SESSION['uid']);
        unset($_SESSION['username']);
        $res["success"] = true;
        $res["success"] = "داواکارییەکەت بەسەرکەوتوویی جێبەجێ کرا";
    }
    echo json_encode($res);
?>