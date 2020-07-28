<?php include 'config.php'; ?>

<?php
$wordsData = array();
$res = array("error" => false);
if (isset($_GET['typee'])) {
    $typee = hack($_GET['typee']);
    if($typee == 'KtE') {
        if(isset($_SESSION['uid'])){
            $uid = $_SESSION['uid'];
            $query = "SELECT * FROM `wordskte` WHERE `status` = '1' AND `uid` = '$uid' ORDER BY `id` DESC";
        }else{
            $res["error"] = true;
            $res["error"] = "هیچ ووشەیێک نەدۆزرایەوە";
        }
    }
}
$result = mysqli_query($dbconsel,$query);
if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_array($result))
    {
        $wordsData[]=$row;
    }
    echo json_encode($wordsData);
}else{
    $res["error"] = true;
    $res["error"] = "هیچ ووشەیێک نەدۆزرایەوە";
}
?>