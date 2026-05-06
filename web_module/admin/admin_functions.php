<?php
require_once($function_url??'../../assets/php/functions.php');

//for checking the user
function checkAdminUser($login_data){
global $db;
 $email = $login_data['email'];
 $password=md5($login_data['password']);

 $query = "SELECT * FROM admin WHERE email='$email' && password='$password'";
 $run = mysqli_query($db,$query);
 $data['user'] = mysqli_fetch_assoc($run)??array();
 if(count($data['user'])>0){
     $data['status']=true;
     $data['user_id']=$data['user']['id'];
 }else{
    $data['status']=false;

 }

 return $data;
}


function getAdmin($user_id){
    global $db;
 $query = "SELECT * FROM admin WHERE id=$user_id";
 $run = mysqli_query($db,$query);
 return mysqli_fetch_assoc($run);

}






/////////////////////////Cac ham lay gia tri cua cam bien//////////////////////////////////////////////////

function getLatestValueFromTable($tableName, $columnName,$some_timestamp_column) {
    global $db;
    $query = "SELECT $columnName FROM $tableName ORDER BY $some_timestamp_column DESC LIMIT 1";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row[$columnName];
}
function calculateAverageValueFromTable($tableName, $columnName) {
    global $db;
    $query = "SELECT ROUND(AVG($columnName), 2) AS average_value FROM $tableName";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row['average_value'];
}





// // Các chức năng thêm
// function printAllPost(){
//     global $db;
//     $query="SELECT * FROM posts ORDER BY id DESC";
//     $run = mysqli_query($db,$query);
//     return mysqli_fetch_all($run,true);
// }

// function userownPost($id_user){
//     global $db;
//     $query="SELECT username, profile_pic FROM users WHERE id='$id_user'";
//     $run = mysqli_query($db,$query);
//     return mysqli_fetch_all($run,true);
// }

// function printAllComment(){
//     global $db;
//     $query="SELECT * FROM comments ORDER BY id DESC";
//     $run = mysqli_query($db,$query);
//     return mysqli_fetch_all($run,true);
// }

// function userownComment($id_user){
//     global $db;
    
//     $query="SELECT username , profile_pic FROM users WHERE id='$id_user'";
//     $run = mysqli_query($db,$query);
    
//     return mysqli_fetch_all($run,true);
// }

// function totalLikesCountForEach($id_user){
//     global $db;
//     $query="SELECT count(*) as row FROM likes WHERE user_id='$id_user'";
//     $run = mysqli_query($db,$query);
//     return mysqli_fetch_assoc($run)['row'];
// }
// // Các chức năng thêm









function totalUsersCount(){
    global $db;
    $query="SELECT count(*) as row FROM users";
    $run = mysqli_query($db,$query);
    return mysqli_fetch_assoc($run)['row'];

}

function totalLikesCount(){
    global $db;
    $query="SELECT count(*) as row FROM likes";
    $run = mysqli_query($db,$query);
    return mysqli_fetch_assoc($run)['row'];

}

function getUsersList(){
    global $db;
    $query="SELECT * FROM users ORDER BY id DESC";
    $run = mysqli_query($db,$query);
    return mysqli_fetch_all($run,true);
}

function loginUserByAdmin($email){
    global $db;

   
    $query = "SELECT * FROM users WHERE email='$email'";
    $run = mysqli_query($db,$query);
    $data['user'] = mysqli_fetch_assoc($run)??array();
    if(count($data['user'])>0){
        $data['status']=true;
    }else{
       $data['status']=false;
   
    }
   
    return $data; 
}

function blockUserByAdmin($user_id){
    global $db;
    $query="UPDATE users SET ac_status=2 WHERE id=$user_id";
    return mysqli_query($db,$query);
}
function unblockUserByAdmin($user_id){
    global $db;
    $query="UPDATE users SET ac_status=1 WHERE id=$user_id";
    return mysqli_query($db,$query);
}
function updateAdmin($data){
    global $db;
    $password = md5($data['password']);
    $password_text = $data['password'];
    $full_name = $data['full_name'];
    $email = $data['email'];
$user_id = $data['user_id'];


    $query="UPDATE admin SET full_name='$full_name',email='$email',password='$password',password_text='$password_text' WHERE id=$user_id";
    return mysqli_query($db,$query);
}
?>