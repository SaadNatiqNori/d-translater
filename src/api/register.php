<?php include 'config.php'; ?>

<?php 
    $res = array("error" => false , "success" => false , "loggedIn" => false);
    if(!isset($_SESSION['uid'])){
    $data = file_get_contents("php://input");
    $userData = json_decode($data);

    
    $queryUser = mysqli_query($dbconsel,"SELECT `u_name` FROM `users` WHERE `u_name` = '$userData->username' ");
    if(mysqli_num_rows($queryUser) == 1){
        $res["error"] = true;
        $res["error"] = "ئەم ناوی بەکارهێنەرە بەکارهاتووە";
    }
    
    if(!empty($userData->username)){
        if(!empty($userData->email)){
            if(!empty($userData->password)){
                if(strlen($userData->password) >= 8){
                    if(!empty($userData->gender)){
                        $passwordhash = hash("gost",$userData->password);
                        $query = mysqli_query($dbconsel,"INSERT INTO `users`( `u_name`, `u_email`, `u_password` , `u_gender` , `u_pla` ) VALUES ( '$userData->username','$userData->email','$passwordhash','$userData->gender' , '2' )");
                        if($query){
                            $res["success"] = true;
                            $res["success"] = "داواکارییەکەت بەسەرکەوتوویی جێبەجێ کرا";
                        }else{
                            $res["error"] = true;
                            $res["error"] = "تکایە دووبارە هەوڵ بدەوە";
                        }
                    }else{
                        $res["error"] = true;
                        $res["error"] = "تکایە ڕەگەز هەڵبژێرە ";
                    }
                }else{
                    $res["error"] = true;
                    $res["error"] = " تێپەڕە ووشە نابێ لە هەشت دیجیت کەمتربێ";
                }
            }else{
                $res["error"] = true;
                $res["error"] = "تکایە تێپەڕە ووشە بنووسە";
            }
        }else{
            $res["error"] = true;
            $res["error"] = "تکایە ئیمەیڵ بنووسە";
        }
    }else{
        $res["error"] = true;
        $res["error"] = "تکایە ناوی بەکارهێنەر بنووسە";
    }
}else{
    $res["loggedIn"] = true;
    $res["loggedIn"] = "/";
}
    echo json_encode($res);
?>