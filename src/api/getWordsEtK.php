<?php include 'config.php'; ?>

<?php
$wordsData = array();
$res = array("error" => false);
if (isset($_GET['typee'])) {
    $typee = hack($_GET['typee']);
    if($typee == 'EtK'){
        $query = "SELECT * FROM `wordsetk` WHERE `status` = '1' ORDER BY `id` DESC LIMIT 12";
    }
    if($typee == 'KtE') {
        $query = "SELECT * FROM `wordskte` WHERE `status` = '1'  ORDER BY `id` DESC LIMIT 12";
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