<?php

/**
 * Created by PhpStorm.
 * User: Brice
 * Date: 21/05/2018
 * Time: 17:11
 */
class Dispatcher
{
    var $request;
    public $controlleur;
    public function __construct()
    {
        $this->request = new Request();
        if($this->request->url == "default"){
            return "default";
        }
        Router::Parse($this->request->url, $this->request);
        $this->controller = $this->loadController();
        if(!in_array($this->request->action, get_class_methods($this->controller))){
            //msg a modifier avant le deploiment
            $this->error("le controlleur ' ".$this->request->controller." ' ne possede de methode ' ".$this->request->action." '");
        }else{
            call_user_func_array(array($this->controller, $this->request->action), $this->request->params);
        }
    }

    /** fonction a appeller dans le cas ou le controlleur ou l'action n'existe pas
     * @param $msg message a envoyer a la vue error
     */
    public function error($msg){
        header("HTTP/1.0 404 Not Found");
        $controlleur = new Controller($this->request);
        $controlleur->set("message", $msg);
        $controlleur->render("/error".DS."404");
        die();
    }

    /** fonction permettant de charger la classe Controlleur correspodans a une url donner
     * @return classeController
     */
    public function loadController(){
        $name = ucfirst($this->request->controller)."Controller";
        $file = ROOT.DS."controller".DS.$name.".php";
        if(file_exists($file)){
            require $file;
            return new $name($this->request);
        }else{
            $this->error("Le controlleur '".$this->request->controller."' n'existe pas");
        }
;    }
}