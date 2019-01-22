<?php
/**
 * Created by IntelliJ IDEA.
 * User: Brice
 * Date: 21/01/2019
 * Time: 19:57
 */

class agentController extends Controller
{
    public function connect(){

    }
    public function disconnect(){
        session_start();
        $_SESSION = array();
        session_destroy();
        var_dump($_SESSION);
        header("location:../Auth/interface.php");
    }
}