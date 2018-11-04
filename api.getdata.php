<?php
//
// if (isset($_GET['q']))
// {
if (!isset($_POST['q']))
{ echo'<html><title>API xử lí toán - Liêu Tuấn Vũ</title></html>';
  $_POST['q']='khongxacdinh';
}
else {
$codeurl= urlencode($_POST['q']);
$url="https://coccoc.com/composer/math?q=".$codeurl; // tạo biến url cần lấy
// $ch = curl_init();
ini_set("allow_url_fopen", 1);
// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)');
// curl_setopt($ch, CURLOPT_URL, $urlr);
// $result = curl_exec($ch);
// echo $result;
// $loisaidinhdang = '{"math":{"error":"Truy vấn của bạn không phải là toán học. Vui lòng nhập đúng truy vấn toán học!","result":false}}';
// $khongtruyxuatduoc ='{"math":{"error":"Cốc Cốc không tìm thấy kết quả nào cho truy vấn này.\u003cbr\/\u003eVui lòng thử lại với câu truy vấn rõ nghĩa hơn hoặc nghĩa rộng hơn."}}';
$json = file_get_contents($url);
$pos_saitruyvan=strpos($json,"Truy vấn của bạn không phải là toán học");
$pos_khongcoketqua=strpos($json,"Cốc Cốc không tìm thấy kết quả nào cho truy vấn này");
// if (strlen($loisaidinhdang) == strlen($json))
// {
// echo 'loisaidinhdang';
// } else if (strlen($khongtruyxuatduoc) == strlen($json)) {
// echo 'khongtruyxuatduoc';
// }
// else
//   echo $json;
if ($pos_saitruyvan != false)
{
echo 'loisaidinhdang';
} else if ($pos_khongcoketqua != false) {
echo 'khongtruyxuatduoc';
}
else
  echo $json;
// } else
//   if (!isset($_GET['q']))
//   {
//     $_GET['q']='khongxacdinh';
//     echo 'sai';
//   }
};
?>
