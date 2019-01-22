<?php

/**
 * Created by PhpStorm.
 * User: Brice
 * Date: 21/05/2018
 * Time: 17:38
 */
class Controller
{
    public $request; // requette taper par l'utilisateur
    public $vars = array();  //variable passer a la vue

    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * @param $view string a rendre (chemin ver le fichier)
     */
    public function render($view)
    {
        if (strpos($view, "/") === 0) {
            $view = ROOT . DS . "view" . DS . $view . ".php";
        } else {
            $view = ROOT . DS . "view" . DS . $this->request->controller . DS . $view . ".php";
        }
        extract($this->vars);
        require($view);
    }

    public function renderGbl($view)
    {
        $view = ROOT . DS . "view" . DS . "global" . DS . $view . ".php";
        extract($this->vars);
        require($view);
    }

    /** permet d'ajouter des variable a passer a la vue
     * @param $key string de la valleur a passer ou tableau a passer
     * @param null $value valleur a ajouter a ' vars '
     */
    public function set($key, $value = null)
    {
        if (is_array($key)) {
            $this->vars += $key;
        } else {
            $this->vars[$key] = $value;
        }
    }

    public function loadModel($model)
    {
        $file = ROOT . DS . "model" . DS . $model . ".php";
        require_once $file;
        if (!isset($this->$model)) {
            $this->$model = new $model();
        }
    }

    /** permet de parser les parametre et de verifier leurs nombres
     * @param null $params
     * @param int $nbr limit de parametre autoriser
     * @return bool
     */
    public function checkParams($params = null, $nbr = 0)
    {
        if (!is_null($params)) {
            if (count($params) != $nbr + 1) {
                return false;
            }
        } else {
            return false;
        }
        return true;
    }

    public function error($errorCode = 0, $msg, $surround = "")
    {
        //$controlleur = new Controller($this->request);
        //$controlleur->set("message", $msg);
        //$controlleur->set("errorCode", $errorCode);
        //$controlleur->render("/error/404");
        $result = [
            "errorCode" => $errorCode,
            "msg" => ($surround == "") ? $msg : "<$surround>" . $msg . "</$surround>"
        ];
        $result = json_encode($result);
        echo $result;
    }

    public static function hash($data)
    {
        return hash("sha256", $data);
    }

    /**
     * @param $model string
     * @param $id
     * @return mixed
     */
    protected function getId($model, $id)
    {
        $parent = $this->getParamIdLabel($model);
        $this->loadModel($model);
        $result = $this->$model->findAll([
            "condition" => "id_" . $model . " = " . $id
        ]);
        if (count($result) != 0) {
            return $result[0]->$parent;
        } else {
            die("Erreur de ID");
        }
    }

    /** permet de recuperer le nom du parent d'une class
     * @param $model
     * @return string
     */
    protected function getParamIdLabel($model)
    {
        $parent = "";
        switch ($model) {
            case "city" :
                $parent = "id_concierge";
                break;
            case "concierge" :
                $parent = "id_admin";
                break;
            case "admin" :
                $parent = "id_sadmin";
                break;
            case "sadmin" :
                $parent = "root";
                break;
        }
        return $parent;

    }

    /**
     * Delete an element in array_assoc
     * @param $input array
     * @param $offset string
     * @param $length number
     * @param $replacement array or null
     */
    protected static function array_splice_assoc(&$input, $offset, $length, $replacement)
    {
        $replacement = (array)$replacement;
        $key_indices = array_flip(array_keys($input));
        if (isset($input[$offset]) && is_string($offset)) {
            $offset = $key_indices[$offset];
        }
        if (isset($input[$length]) && is_string($length)) {
            $length = $key_indices[$length] - $offset;
        }

        $input = array_slice($input, 0, $offset, TRUE)
            + $replacement
            + array_slice($input, $offset + $length, NULL, TRUE);
    }
}

;
