<?php

/**
 * Created by PhpStorm.
 * User: Brice
 * Date: 21/05/2018
 * Time: 17:26
 */

/**
 * Class Router permet d'avoir les partie de la requette( contrlleur, action, params)
 */
class Router
{
    public static function Parse($url, $request)
    {
        $url = trim($url, "/");
        $param = explode("/", $url);
        foreach ($param as $key => $item) {
            $param[$key] = htmlspecialchars($param[$key]);
        }
        if (isset($param[0])) {
            $request->controller = $param[0];
        } else {
            die("Une erreur est survenue.");
        }
        $request->action = (isset($param[1])) ? $param[1] : "index";
        if (isset($_GET) && count($_GET) != 0) {
            $request->params = array_chunk($_GET, count($_GET), false)[0];
        }else{
            $request->params = array();
        }

    }
}