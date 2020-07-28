<?php include 'config.php'; ?>

<?php
$wordsData = array();
$res = array("error" => false);
$data = file_get_contents("php://input");
$proData = json_decode($data);  
$uid = $_SESSION['uid'];
if($proData->typee == 'EtK') {
    $query = "SELECT * FROM `wordsetk` WHERE `status` = '2' AND `uid` = '$uid' ORDER BY `id` DESC";
}else if($proData->typee == 'KtE'){
    $query = "SELECT * FROM `wordskte` WHERE `status` = '2' AND `uid` = '$uid' ORDER BY `id` DESC";
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