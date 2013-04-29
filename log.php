<?php 
$infos = $_POST;
$savingString = date("YmdHis")."##";
$count = count($infos) - 1;
$i = 0;
foreach ($infos as $param => $value) {
    if($i < $count) {
        $savingString.= $param."=".$value."##";
    }else{
        $savingString.= $param."=".$value.PHP_EOL;
    }
    $i++;
}

if(is_writable(str_replace("log.php", "", $_SERVER["DOCUMENT_ROOT"].$_SERVER["SCRIPT_NAME"]))){
    $logfile = fopen(str_replace("log.php", "log.txt", $_SERVER["DOCUMENT_ROOT"].$_SERVER["SCRIPT_NAME"]), "a");
    fwrite($logfile, $savingString);
    fclose($logfile);
}
else{
    die("Directory is not writeable.");
}