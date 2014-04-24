<?php
  $someContent = $_POST['toFile'];
  $filename = $_POST['functionType'].'_'.$_POST['moduleName'].'_'.$_POST['methodType'];
  !$handle = fopen($filename, 'w');
  fwrite($handle, $someConent);
  fclose($handle);
  
  header("Cache-Control: public");
  header("Content-Description: File Transfer");
  header("Content-Length: ". filesize("$filename").";");
  header('Content-Disposition: attachment; filename="'.$filename.'_RESTv10.php"');
  header("Content-Type: application/octet-stream; "); 
  header("Content-Transfer-Encoding: binary");
  
  echo $_POST['toFile'];

?>