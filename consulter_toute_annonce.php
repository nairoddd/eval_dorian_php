<?php
    require_once './inc/init.php';
    


        $r = $pdo->query("SELECT * FROM advert");
        while($data = $r->fetch(PDO::FETCH_ASSOC))
        {
            $content .= '<div class="card" style="width: 90rem;">
            <div class="card-body">
                <h5 class="card-title" style="text-transform:uppercase;">'.$data['title'].'</h5>
                <p class="card-text text-truncate">'.$data['description'].'</p>
                <h6 class="card-text">'.$data['city'].'</h6>
                <h6 class="card-text">'.$data['postal_code'].'</h6>
                <h6 class="card-text">'.$data['type'].'</h6>
                <h6 class="card-text">'.$data['price'].'€</h6>
                <a href="consulter_une_annonce.php?action='.$data['id'].'">Consulter une annonce</a>
            </div>
            </div>';
        }
    



    // $req = $pdo->query("SELECT * FROM advert WHERE id = '$_POST[]'")
?>

<?php
    require_once './inc/header.inc.php';
?>
<h1 class="text-center lead display-3 mt-5">Retrouvez toutes les annonces de notre site ici !</h1>
<div class="container m-5">
    <?= $content ?>
</div>

<?php
    require_once './inc/footer.inc.php';
?>