<?php 
include 'config.php';
?>

<?php 
$res = array("error" => false , "success" => false , "username" => false , "uid" => false , "loggedIn" => false , "upla" => false , "email" => false);
if(!isset($_SESSION['uid'])){
        $data = file_get_contents("php://input");
        $logData = json_decode($data);  
        if(!empty($logData->username)){
            if(!empty($logData->password)){
                if(strlen($logData->password) >= 8){
                    $passwordhash = hash("gost",$logData->password);
                    $query = mysqli_query($dbconsel,"SELECT * FROM `users` WHERE `u_name` = '$logData->username' AND `u_password` = '$passwordhash' ");
                    if(mysqli_num_rows($query) == 1){
                    while($row = mysqli_fetch_assoc($query)){
                        $_SESSION['username'] = $row['u_name'];
                        $res["username"] = true;
                        $res["username"] = $_SESSION['username'];
                        $_SESSION['uid'] = $row['u_id'];
                        $res["uid"] = true;
                        $res["uid"] = $_SESSION['uid'];
                        $_SESSION['upla'] = $row['u_pla'];
                        $res["upla"] = true;
                        $res["upla"] = $_SESSION['uid'];
                        $_SESSION['email'] = $row['u_email'];
                        $res["email"] = true;
                        $res["email"] = $_SESSION['email'];
                    }
                    $res["success"] = true;
                    $res["success"] = "چوونە ژوورەوەت بەسەرکەوتوویی ئەنجامدرا";
                    }else{
                        $res["error"] = true;
                        $res["error"] = "تکایە زانیاری ڕاست داخڵکە پاشان دووبارە هەوڵ بدەوە";
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
            $res["error"] = "تکایە ناوی بەکارهێنەر بنووسە";
        }
    }else{
        $res["loggedIn"] = true;
        $res["loggedIn"] = hack($_SESSION['username']);
        $res["email"] = true;
        $res["email"] = hack($_SESSION['email']);
        $res["uid"] = true;
        $res["uid"] = hack($_SESSION['uid']);
        if(isset($_SESSION['uid']) && isset($_SESSION['upla']) == '1'){
            $res["upla"] = true;
            $res["upla"] = hack($_SESSION['upla']);
        }
    } 
    
    echo json_encode($res);
?>