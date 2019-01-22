<?php

/**
 * Created by PhpStorm.
 * User: Brice
 * Date: 21/05/2018
 * Time: 17:14
 */
class request
{
    public $url;
    public function __construct()
    {
        if(isset($_SERVER["PATH_INFO"])){
            $this->url = $_SERVER["PATH_INFO"];
        }else{
            $this->url = "default";
        }
    }

}