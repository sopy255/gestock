<div class="container col-xl-6">*
    <h2>Selectioner la commande dont on doit générer la facture</h2>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">libele</th>
            <th scope="col">date comande</th>
            <th scope="col">client</th>
            <th scope="col">Quantite</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <?php
        if(isset($cmds)){
            foreach ($cmds as $key => $cmd){
                ?>
                <tr>
                    <th scope="row"><?=$key?></th>
                    <td> <?=$cmd->libele?> </td>
                    <td> <?=$cmd->dateCmt?> </td>
                    <td> <?=$cmd->clientName?> </td>
                    <td> <?=$cmd->qte?> </td>
                    <td>
                        <a href="<?=BASE_URL."/facture/confirm?id_cmd=".$cmd->id_commande?>">
                            <button class="btn btn-sm btn-primary">Selectioner</button>
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