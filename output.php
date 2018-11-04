<?php
include'koneksi.php';
$id = ''; 
if( isset( $_GET['id'])) {
    $id = $_GET['id']; 
} 
$message = '';
$code = '';
$cek = mysqli_query($db,"SELECT * FROM kk4 WHERE id='$id'");
$cek2 = mysqli_query($db,"SELECT * FROM kk4");
// Evaluates as true because $var is set
if (!empty($id))
{
  $query = mysqli_query($db,"SELECT * FROM kk4 WHERE id='$id'");
  if (mysqli_num_rows($cek) > 0) {
    $code = 200;
    $message = "Show kk4 data success";
    }else{
      $code = 204;
      $message = "User data not found"; 
    }
}else
{
  $query = mysqli_query($db,"SELECT * FROM kk4");
  if (mysqli_num_rows($cek2) > 0) {
    $code = 200;
    $msg = "Show kk4 data success";
    }else{
      $code = 204;
      $message = "User data not found"; 
    }
};
//untuk menjalankan perintah sql
  $respon = array();
  $respon["success"] = true;
  $respon["data"] = array();
  $respon["message"] = $message;
  $respon["code"] = $code;
      while ($row = mysqli_fetch_assoc($query)) {
        # kerangka format penampilan data json
        $data['id'] = $row["id"];
        $data['username'] = $row["username"];
        $data['password'] = $row["password"];
        $data['level'] = $row["level"];
        $data['fullname'] = $row["fullname"];
        array_push($respon["data"], $data);
      }
  echo json_encode($respon);
?>