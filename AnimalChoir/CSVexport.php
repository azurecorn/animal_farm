<?php

/**
 *@author Milan Nikolic linkedin.com/in/milan1nikolic
 */

namespace AnimalChoir;

class CSVexport{

    public static function createCsv($data, $file = NULL){
        if( !$file) {
            $file = "choirsong".mt_rand(100,10000). '.csv';
        }

        file_put_contents($file, $data);
        chmod($file, 0777);

        echo "<div style='margin: 50px 0 0 50px;font-family: \"Trebuchet MS\", Helvetica, sans-serif;'>Click <a href='{$file}'>here</a> to download a song!";
    }
}
