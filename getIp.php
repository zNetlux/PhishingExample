<?php
addIp("files/ips.txt", $_SERVER['REMOTE_ADDR'] . "\n");

function writeFile($file, $data) {
    $fp = fopen($file, "a");
    fwrite($fp, $data);
    fclose($fp);
}

function addIp($file, $ip) {
    if(file_exists($file)) {
        $f = fopen($file, "r");
        $cont = 0;
        while(!feof($f)){
            $line = fgets($f);
            if($line == $ip) {
                $cont++;
            }
        }
        fclose($f);

        if($cont == 0) {
            writeFile($file, $ip);
        }
    } else {
        writeFile($file, $ip);
    }
}