<?php
/**
 * Created by IntelliJ IDEA.
 * User: Brice
 * Date: 22/01/2019
 * Time: 22:12
 */

class factureController extends Controller
{
    public function newF()
    {
        $this->loadModel("commande");
        $this->loadModel("client");
        $this->loadModel("produit");
        $cmds = $this->commande->findAll();
        foreach ($cmds as $key => $cmd) {
            $client = $this->client->findAll([
                "condition" => "id_client=" . $cmd->id_client
            ]);
            $produit = $this->produit->findAll([
                "condition" => "id_produit=" . $cmd->id_produit
            ]);
            $cmds[$key]->clientName = $client[0]->nom;
            $cmds[$key]->libele = $produit[0]->libele;
        }
        $this->set("cmds", $cmds);
        $this->render("list");
    }

    public function confirm()
    {
        $this->loadModel("commande");
        $this->loadModel("client");
        $this->loadModel("produit");
        $cmd = $this->commande->findAll([
            "condition" => "id_commande=" . $_GET["id_cmd"]
        ])[0];
        $client = $this->client->findAll([
            "condition" => "id_client=" . $cmd->id_client
        ])[0];
        $produit = $this->produit->findAll([
            "condition" => "id_produit=" . $cmd->id_produit
        ])[0];
        $this->set("cmd", $cmd);
        $this->set("produit", $produit);
        $this->set("client", $client);
        $this->render("facture");
    }
}

