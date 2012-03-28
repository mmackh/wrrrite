<?php
function alphaID($in, $to_num = false, $pad_up = 3, $passKey = null)
{
  $index = "bcdfghjklmnpqrstvwxyz0123456789BCDFGHJKLMNPQRSTVWXYZ";
  if ($passKey !== null) {
    // Although this function's purpose is to just make the
    // ID short - and not so much secure,
    // with this patch by Simon Franz (http://blog.snaky.org/)
    // you can optionally supply a password to make it harder
    // to calculate the corresponding numeric ID
 
    for ($n = 0; $n<strlen($index); $n++) {
      $i[] = substr( $index,$n ,1);
    }
 
    $passhash = hash('sha256',$passKey);
    $passhash = (strlen($passhash) < strlen($index))
      ? hash('sha512',$passKey)
      : $passhash;
 
    for ($n=0; $n < strlen($index); $n++) {
      $p[] =  substr($passhash, $n ,1);
    }
 
    array_multisort($p,  SORT_DESC, $i);
    $index = implode($i);
  }
 
  $base  = strlen($index);
 
  if ($to_num) {
    // Digital number  <<--  alphabet letter code
    $in  = strrev($in);
    $out = 0;
    $len = strlen($in) - 1;
    for ($t = 0; $t <= $len; $t++) {
      $bcpow = bcpow($base, $len - $t);
      $out   = $out + strpos($index, substr($in, $t, 1)) * $bcpow;
    }
 
    if (is_numeric($pad_up)) {
      $pad_up--;
      if ($pad_up > 0) {
        $out -= pow($base, $pad_up);
      }
    }
    $out = sprintf('%F', $out);
    $out = substr($out, 0, strpos($out, '.'));
  } else {
    // Digital number  -->>  alphabet letter code
    if (is_numeric($pad_up)) {
      $pad_up--;
      if ($pad_up > 0) {
        $in += pow($base, $pad_up);
      }
    }
 
    $out = "";
    for ($t = floor(log($in, $base)); $t >= 0; $t--) {
      $bcp = bcpow($base, $t);
      $a   = floor($in / $bcp) % $base;
      $out = $out . substr($index, $a, 1);
      $in  = $in - ($a * $bcp);
    }
    $out = strrev($out); // reverse
  }
 
  return $out;
}

if (!empty($_POST["cloudheadertext"]) || !empty($_POST["cloudheadertext"])) {

$link = mysql_connect("xxxxxxxx", "xxxxxx", "xxxxxxx");
mysql_select_db("wrrrite_db", $link);
mysql_query("SET NAMES 'utf8'");

$id = mysql_query("SELECT * FROM test", $link);
$num_rows = mysql_num_rows($id);
$udid = alphaID($num_rows);
$header = mysql_real_escape_string($_POST["cloudheadertext"]);
$body = mysql_real_escape_string($_POST["cloudbodytext"]);

$sql="INSERT INTO test (udid, header, body)
VALUES
('$udid','$header','$body')";

if (!mysql_query($sql,$link))
  {
  die(header( 'Location: http://wrrrite.com/?error=true' ));
  }
header( 'Location: http://wrrrite.com/'.$udid.'?m=y' );

} else {

header( 'Location: http://wrrrite.com/?m=e');

}

?>