<?php

/**
 * Created by PhpStorm.
 * User: Brice
 * Date: 21/05/2018
 * Time: 21:05
 */
class Model
{
    static $connection;
    public $table = true;
    public $db;

    public function __construct()
    {
        //initialisation du nom de la table
        $this->table = get_called_class();

        //connection a la base de donner
        $conf = conf::$database;
        if (isset(self::$connection)) {
            $this->db = self::$connection;
            return true;
        }
        try {
            $pdo = new PDO("mysql:host=" . $conf["host"] . ";dbname=" . $conf["dbname"],
                $conf["user"],
                $conf["mdp"],
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES  utf8")
            );

            $this->db = $pdo;
            self::$connection = $pdo;
        } catch (PDOException $e) {
            if (conf::$debug >= 1) {
                die($e->getMessage());
            } else {
                die("impossible de se conencter a la base de donner");
            }
        }


    }

    /** permet d'executer une reqette et de retourner le resultat
     * @param $statement request to execute
     * @param $return bool
     * @return array affected by request
     */
    public function request($statement, $return = true)
    {
        $pre = $this->db->prepare($statement);
        $pre->execute();
        if ($return) {
            return $pre->fetchAll(PDO::FETCH_OBJ);
        }
    }

    /** permet de selectionner des elements dans une table
     * @param $req array pour la selection
     * @return array champs correspondant
     */
    public function findALl($req = null)
    {
        $sql = "select * from " . $this->table;
        if (isset($req["condition"])) {
            $sql .= " where " . $req["condition"];
        }
        return $this->request($sql);
    }

    public function addValue($values)
    {
        $data = [null];
        array_push($data, $values);
        $point = "null ";
        for ($i = 0; $i < count($values); $i++) {
            $point .= ", ? ";
        }
        //a supprimer au deploiment
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $req = $this->db->prepare("insert into " . $this->table . " values ( $point ) ");
        $req->execute($values);
        //$this->request($sql, false);
        $sql2 = "select MAX(id_$this->table) as id from $this->table";
        return $this->request($sql2)[0];
    }

    public function removeValue($id)
    {
        $sql = "delete from " . $this->table . " where id_" . $this->table . " = '$id'";
        $this->request($sql);
    }

    public function getUser($number, $mdp)
    {
        $sql = "SELECT number.*, " . $this->table . ".* from number, number_" . $this->table . ", " . $this->table . " WHERE
  mdp = '" . $mdp . "' and " . $this->table . ".id_" . $this->table . " = number_" . $this->table . ".id_" . $this->table . " and
  number.id_number = number_" . $this->table . ".id_number AND number_" . $this->table . ".id_" . $this->table . " =
(SELECT " . $this->table . ".id_" . $this->table . " from " . $this->table . ", number, number_" . $this->table . " WHERE
  " . $this->table . ".id_" . $this->table . " = number_" . $this->table . ".id_" . $this->table . " AND  number_" . $this->table . ".id_number = number.id_number
  AND number.number = " . $number . ")";
        return $this->request($sql);
    }

    public function update($data)
    {
        $sql = "UPDATE $this->table set ";
        $firsLine = 0;
        $keyId = "";
        foreach ($data as $key => $value) {
            if (!$firsLine == 0) {
                $sql .= ($firsLine >= 2) ? " , $key = '$value'" : " $key = '$value'";
            }else{
                $keyId = $key;
            }
            $firsLine++;
        }
        $sql .= " where $keyId = ".$data[$keyId];
        $this->request($sql, false);
    }
}