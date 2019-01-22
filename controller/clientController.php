<?php
/**
 * Created by IntelliJ IDEA.
 * User: Brice
 * Date: 21/01/2019
 * Time: 19:54
 */

class clientController extends Controller
{
    public function getAll()
    {
        $this->loadModel("client");
        $clients = $this->client->findALl();
        $this->set("clients", $clients);
        $this->render("table");
    }

    public function add()
    {
        if (!isset($_POST["nom"])) {
            $this->set("action", "add");
            $this->set("button", "Soumettres");
            $this->render("add");
        } else {
            $this->loadModel("client");
            $this->client->addValue([
                $_POST["nom"],
                $_POST["prenom"],
                $_POST["addresse"]
            ]);
            header('location:' . BASE_URL . "/client/getAll");
        }
    }

    public function update()
    {
        $this->loadModel('client');
        if (isset($_POST["nom"])) {
            $this->client->update($_POST);
            header('location:' . BASE_URL . "/client/getAll");
        } else {
            var_dump($_GET);
            $client = $this->client->findAll([
                "condition" => "id_client=" . $_GET["id_client"]
            ]);
            $this->set("action", "update");
            $this->set("name", $client[0]->nom);
            $this->set("surname", $client[0]->prenom);
            $this->set("id", $client[0]->id_client);
            $this->set("address", $client[0]->addresse);
            $this->set("button", "Modifier");
            $this->render("add");
        }
    }

    public function delete()
    {
        try {
            $this->loadModel("client");
            $this->client->removeValue($_GET["id_client"]);
        } catch (Exception $e) {
            ?>
            <div class="mt-4 alert alert-danger" role="alert">
                Une erreur interne est survenu.
            </div>
            <?php
        }
        header('location:' . BASE_URL . "/client/getAll");

    }
}