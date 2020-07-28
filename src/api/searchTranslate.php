<?php include 'config.php'; ?>

<?php
$searchData = json_decode(file_get_contents("php://input"));

$res = array("error" => false , "success" => false , "noData" => false , "default" => false);
if (!empty($searchData->typee)){
    if ($searchData->typee == 'EtK') {
        if ($searchData->inpt !== '') {
            $query = mysqli_query($dbconsel,"SELECT * FROM `wordsetk` WHERE `English` LIKE '%".$searchData->inpt."%' ");
            if(mysqli_num_rows($query) == 1){
                while ($row = mysqli_fetch_assoc($query)){
                    // $dataFetch = $row['Kurdish'];
                    $res["success"] = true;
                    $res["success"] = $row['Kurdish'];
                }
            }else{
                $res["error"] = true;
                $res["error"] = 'هیچ زانیاریێک نەدۆزرایەوە';
            }
        }else{
            $res["default"] = true;
            $res["default"] = 'مانای ووشەکە';
        }
    }
    if($searchData->typee == 'KtE'){
        if ($searchData->inpt !== '') {
            $query = mysqli_query($dbconsel,"SELECT * FROM `wordskte` WHERE `Kurdish` LIKE '%".$searchData->inpt."%' ");
            if(mysqli_num_rows($query) == 1){
                while ($row = mysqli_fetch_assoc($query)) {
                    // $dataFetch = $row['English'];
                    $res["success"] = true;
                    $res["success"] = $row['English'];
                }
            }else{
                $res["error"] = true;
                $res["error"] = 'No Data Found';
            }
        }else{
            $res["default"] = true;
            $res["default"] = 'مانای ووشەکە';
        }
    }
}else{
    $res["error"] = true;
    $res["error"] = "تکایە جۆری گەڕان هەڵبژێرە وە هەوڵ بدەوە";
}

    echo json_encode($res);
?>