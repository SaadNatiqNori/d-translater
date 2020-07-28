<?php include 'config.php'; ?>

<?php 
    $res = array("error" => false , "success" => false);

    if(isset($_SESSION['uid'])){
        $data = file_get_contents("php://input");
        $wData = json_decode($data);
    
        if(!empty($wData->typee)){
            $joryWaregran = $wData->typee;

            if(strlen($wData->wordO) >= 2 && strlen($wData->wordT) >= 2){
                
                if($joryWaregran === 'EtK'){
                    $queryUser = mysqli_query($dbconsel,"SELECT `English`,`Kurdish` FROM `wordsetk` WHERE `English` = '$wData->wordO' AND `Kurdish` = '$wData->wordT' ");
                    if(mysqli_num_rows($queryUser) > 0){
                        $res["error"] = true;
                        $res["error"] = "ئەو ووشانە پێشووتر داخڵ کراون";
                    }else{
                        $query = mysqli_query($dbconsel,"INSERT INTO `wordsetk`( `uid` , `addedby` , `English`, `Kurdish` , `status` ) VALUES ( '$wData->uid', '$wData->username' , '$wData->wordO','$wData->wordT' , '2' )");
                        if($query){
                            $res["success"] = true;
                            $res["success"] = "داواکارییەکەت بەسەرکەوتوویی جێبەجێ کرا";
                        }else{
                            $res["error"] = true;
                            $res["error"] = "تکایە دووبارە هەوڵ بدەوە";
                        }
                    }
                }else if($joryWaregran === 'KtE'){
                    $queryUser = mysqli_query($dbconsel,"SELECT `Kurdish`,`English` FROM `wordskte` WHERE `Kurdish` = '$wData->wordO' AND `English` = '$wData->wordT' ");
                    if(mysqli_num_rows($queryUser) == 1){
                        $res["error"] = true;
                        $res["error"] = "ئەو ووشانە پێشووتر داخڵ کراون";
                    }else{
                        $query = mysqli_query($dbconsel,"INSERT INTO `wordskte`( `uid` , `addedby` , `Kurdish`, `English` , `status` ) VALUES ( '$wData->uid', '$wData->username' , '$wData->wordO','$wData->wordT' , '2' )");
                        if($query){
                            $res["success"] = true;
                            $res["success"] = "داواکارییەکەت بەسەرکەوتوویی جێبەجێ کرا";
                        }else{
                            $res["error"] = true;
                            $res["error"] = "تکایە دووبارە هەوڵ بدەوە";
                        }
                    }
                }  
            }else{
                $res["error"] = true;
                $res["error"] = "ووشە نابێ لە دوو دیجیت کەمتربێ";
            }
        }else{
            $res["error"] = true;
            $res["error"] = "تکایە جۆری گەڕان هەڵبژێرە وە هەوڵ بدەوە";
        }
        
    }else{
        $res["error"] = true;
        $res["error"] = "تکایە پێویستە سەرەتا خۆت تۆمار بکەی پاشان بچیتە ژوورەوە";
    }
    echo json_encode($res);
    
?>