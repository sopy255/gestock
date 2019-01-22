<div class="container col-xl-6">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">Prenom</th>
            <th scope="col">Addresse</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <?php
        if(isset($clients)){
            foreach ($clients as $key => $client){
                ?>
                <tr>
                    <th scope="row"><?=$key?></th>
                    <td> <?=$client->nom?> </td>
                    <td> <?=$client->nom?> </td>
                    <td> <?=$client->addresse?> </td>
                    <td>
                        <a href="<?=BASE_URL."/client/update?id_client=".$client->id_client?>">
                            <button class="btn btn-sm btn-primary">Modifier</button>
                        </a>
                        <a class="deleteItem" href="<?=BASE_URL."/client/delete?id_client=".$client->id_client?>">
                            <button class="btn btn-sm btn-danger">Supprimer</button>
                        </a>
                    </td>
                </tr>
                <?php
            }
        }
        ?>
    </table>
    <script src="<?=BASE_URL.'/'?>script/delete.js"></script>

</div>