<div class="container col-xl-6">
    <h2>Selectionner le client</h2>
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
                        <a href="<?=BASE_URL."/commande/add?id_client=".$client->id_client?>">
                            <button class="btn btn-sm btn-primary">Selectionner</button>
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