<?php include 'config.php'; ?>

<?php
$searchData = json_decode(file_get_contents("php://input"));
$Datas = array();
$res = array("error" => false , "success" => false);
if (!empty($searchData->typee)){
    if ($searchData->typee == 'EtK') {
        $query = mysqli_query($dbconsel,"SELECT * FROM `wordsetk` ");
        if(mysqli_num_rows($query) > 0){
            while ($row = mysqli_fetch_array($query)){
                $res["success"] = true;
                $Datas[] = $row;
            }
            echo json_encode($Datas);
        }else{
            $res["error"] = true;
            $res["error"] = 'هیچ زانیاریێک نەدۆزرایەوە';
        }
    }
    if($searchData->typee == 'KtE'){
        $query = mysqli_query($dbconsel,"SELECT * FROM `wordskte` ");
        if(mysqli_num_rows($query) > 0){
            while ($row = mysqli_fetch_array($query)){
                $res["success"] = true;
                $Datas[] = hack($row);
            }
            echo json_encode($Datas);
        }else{
            $res["error"] = true;
            $res["error"] = 'No Data Found';
        }
    }
}else{
    $res["error"] = true;
    $res["error"] = "تکایە جۆری گەڕان هەڵبژێرە وە هەوڵ بدەوە";
}

?>