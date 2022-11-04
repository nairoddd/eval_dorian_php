<!-- TRAITEMENT -->
<?php
    require_once './inc/init.php';



    if(isset($_GET['action']))
    {
        $r = $pdo->query("SELECT * FROM advert ORDER BY id DESC LIMIT 15");

        while($data = $r->fetch(PDO::FETCH_ASSOC))
        {
            $content .= '<div class="card" style="width: 88rem;">
            <div class="card-body">
                <h5 class="card-title" style="text-transform:uppercase">'.$data['title'].'</h5>
                <p class="card-text text-truncate">'.$data['description'].'</p>
                <h6 class="card-text">Ville : '.$data['city'].'</h6>
                <h6 class="card-text">Code Postal : '.$data['postal_code'].'</h6>
                <h6 class="card-text">Type : '.$data['type'].'</h6>
                <h6 class="card-text">Prix : '.$data['price'].'€</h6>
            </div>
            </div>';
        }
    }






?>


<!-- AFFICHAGE -->
<?php
    require_once './inc/header.inc.php';
?>

<h1 class="lead display-2 text-center mt-5">Bienvenue sur la page d'accueil</h1>
<h3 class="text-center lead mt-2">Cliquez sur le lien pour afficher les dernieres annonces</h3>
<a class="d-flex justify-content-center" href="index.php?action=afficher">Afficher les annonces</a>
<div class="container m-5">
    <?= $content; ?>
</div>

<?php
    require_once './inc/footer.inc.php';
?>