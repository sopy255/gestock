<?php
/**
 * Created by IntelliJ IDEA.
 * User: Brice
 * Date: 22/01/2019
 * Time: 14:02
 */

class commandeController extends Controller
{
    public function add(){
        $this->loadModel("produit");
        if(empty($_GET) && !isset($_POST["qte"])){
            $this->loadModel("client");
            $clients = $this->client->findAll();
            $this->set("clients", $clients);
            $this->render("client");
        }elseif (isset($_GET["id_client"]) && !isset($_GET["id_produit"])){
            $produits = $this->produit->findAll();
            $this->set("id_client", $_GET["id_client"]);
            $this->set("produits", $produits);
            $this->render("produit");

        }elseif (isset($_GET["id_produit"])){
            $this->set("id_client", $_GET["id_client"]);
            $this->set("id_produit", $_GET["id_produit"]);
            $this->render("qte");
        }else{
            $this->loadModel("commande");

            $ip = $_POST["id_produit"];
            $ic = $_POST["id_client"];
            $c = $_POST["qte"];
            // verificatio de la quantite*
            $prod = $this->produit->findAll([
                "condition" => "id_produit=".$ip
            ]);
            if($prod[0]->qte >= $c){
                $this->commande->addValue([
                    $_POST["id_produit"],
                    date("Y-m-d"),
                    $_POST["id_client"],
                    $_POST["qte"],
                    '1970-01-01'
                ]);
                $this->commande->request("UPDATE produit SET qte = qte - $c WHERE id_produit = $ip", false);
                header('location:' . BASE_URL . "/commande/getAll");
            }else{
                $z = $prod[0]->qte;
                header("location:". BASE_URL . "/commande/add?id_client=$ic&id_produit=$ip&error=$z");
            }
        }
    }
    public function delete(){
        $this->loadModel("commande");
        $this->commande->removeValue($_GET["id_cmd"]);
        header('location:' . BASE_URL . "/commande/getAll");

    }
    public function update(){

    }
    public function getAll(){
        $this->loadModel("commande");
        $this->loadModel("client");
        $this->loadModel("produit");
        $cmds = $this->commande->findAll();
        foreach ($cmds as $key  => $cmd){
            $client = $this->client->findAll([
                "condition" => "id_client=".$cmd->id_client
            ]);
            $produit = $this->produit->findAll([
                "condition" => "id_produit=".$cmd->id_produit
            ]);
            $cmds[$key]->clientName = $client[0]->nom;
            $cmds[$key]->libele = $produit[0]->libele;
        }
        $this->set("cmds", $cmds);
        $this->render("table");
    }
}