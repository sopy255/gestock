<div class="container col-xl-6">
    <h2>Selectioner le produit</h2>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">reference</th>
            <th scope="col">libele</th>
            <th scope="col">PU</th>
            <th scope="col">Qté</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <?php
        if(isset($produits)){
            foreach ($produits as $key => $produit){
                ?>
                <tr>
                    <th scope="row"><?=$key?></th>
                    <td> <?=$produit->refP?> </td>
                    <td> <?=$produit->libele?> </td>
                    <td> <?=$produit->prixU?> </td>
                    <td> <?=$produit->qte?> </td>
                    <td>
                        <a href="<?=BASE_URL."/commande/add?id_client=$id_client&id_produit=".$produit->id_produit?>">
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