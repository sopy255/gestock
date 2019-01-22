<?php
/**
 * Created by IntelliJ IDEA.
 * User: Brice
 * Date: 21/01/2019
 * Time: 19:56
 */

class produitController extends Controller
{
    public function getAll()
    {
        $this->loadModel("produit");
        $produits = $this->produit->findALl();
        $this->set("produits", $produits);
        $this->render("table");
    }

    public function add()
    {
        if (!isset($_POST["refP"])) {
            $this->set("action", "add");
            $this->set("button", "Soumettres");
            $this->render("add");
        } else {
            $this->loadModel("produit");
            $this->produit->addValue([
                $_POST["refP"],
                $_POST["libele"],
                $_POST["prixU"],
                $_POST["qte"]
            ]);
            header('location:' . BASE_URL . "/produit/getAll");
        }
    }

    public function update()
    {
        $this->loadModel('produit');
        if (isset($_POST["refP"])) {
            $this->produit->update($_POST);
            header('location:' . BASE_URL . "/produit/getAll");
        } else {
            $produit = $this->produit->findAll([
                "condition" => "id_produit=" . $_GET["id_produit"]
            ]);
            $this->set("action", "update");
            $this->set("id", $produit[0]->id_produit);
            $this->set("refP", $produit[0]->refP);
            $this->set("libele", $produit[0]->libele);
            $this->set("prixU", $produit[0]->prixU);
            $this->set("qte", $produit[0]->qte);
            $this->set("button", "Modifier");
            $this->render("add");
        }
    }
    public function delete()
    {
        try {
            $this->loadModel("produit");
            $this->produit->removeValue($_GET["id_produit"]);
        } catch (Exception $e) {
            ?>
            <div class="mt-4 alert alert-danger" role="alert">
                Une erreur interne est survenu.
            </div>
            <?php
        }
        header('location:' . BASE_URL . "/produit/getAll");

    }
}