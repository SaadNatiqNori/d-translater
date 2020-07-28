<?php include 'config.php'; ?>

<?php
$searchData = json_decode(file_get_contents("php://input"));
$NewWordsData = array();
$res = array("error" => false , "success" => false);
if (!empty($searchData->typee)){
    if ($searchData->typee == 'EtK') {
        if(isset($_GET['approve'])){
            $query = mysqli_query($dbconsel,"UPDATE `wordsetk` SET `status` = '1' WHERE `id` = '$searchData->id' ");
        }else if(isset($_GET['ignore'])){
            $query = mysqli_query($dbconsel,"UPDATE `wordsetk` SET `status` = '3' WHERE `id` = '$searchData->id' ");
        }
        if(mysqli_num_rows($query) > 0){
            while ($row = mysqli_fetch_array($query)){
                $res["success"] = true;
                $res["success"] = " داواکارییەکەت سەرکەوتووبوو ";
                $NewWordsData[] = $row;
            }
            echo json_encode(hack($NewWordsData));
        }else{
            $res["error"] = true;
            $res["error"] = " داواکارییەکەت سەرکەوتوو نەبوو ";
        }
    }
    if($searchData->typee == 'KtE'){
        if(isset($_GET['approve'])){
            $query = mysqli_query($dbconsel,"UPDATE `wordskte` SET `status` = '1' WHERE `id` = '$searchData->id' ");
        }else if(isset($_GET['ignore'])){
            $query = mysqli_query($dbconsel,"UPDATE `wordskte` SET `status` = '3' WHERE `id` = '$searchData->id' ");
        }
        if(mysqli_num_rows($query) > 0){
            while ($row = mysqli_fetch_array($query)){
                $res["success"] = true;
                $res["error"] = " داواکارییەکەت سەرکەوتووبوو ";
                $NewWordsData[] = hack($row);
            }
            echo json_encode($NewWordsData);
        }else{
            $res["error"] = true;
            $res["error"] = " داواکارییەکەت سەرکەوتوو نەبوو ";
        }
    }
}else{
    $res["error"] = true;
    $res["error"] = "تکایە جۆری گەڕان هەڵبژێرە وە هەوڵ بدەوە";
}

?>