<?php
    require_once './inc/init.php';

    if(!isset($_GET['action'])){
        header('location:index.php');
        exit();
    }

    if(isset($_GET['action']))
    {
        $r= $pdo->query("SELECT * FROM advert WHERE id = '$_GET[action]'"); 

        $p=$r->fetch(PDO::FETCH_ASSOC);
    }

    //! Affichage des caractéristiques
    $content.= '<div class="container" style="display:flex; justify-content:center;">';
    $content.= '<div class="card mb-3" style="width:70rem;">';
    $content.= '<div class="card-body">';
    $content .= '<h2 class="text-center">'.$p['title'].'</h2>';
    $content .= '<p class="text-center">'.$p['description'].'</p>';
    $content .= '<h4 class="text-center">Code postal : '.$p['postal_code'].'</h4>';
    $content .= '<h4 class="text-center">Ville : '.$p['city'].'</h4>';
    $content .= '<h4 class="text-center">Type : '.$p['type'].'</h4>';
    $content .= '<h3 class="text-center">Prix : '.$p['price'].' €</h3>';
    $content.= '</div>';
    $content.= '</div>';
    $content.= '</div>';
    $content .= '<form action="" method="POST">';
    $content.= '<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Votre message" name="message"></textarea>';
    $content .= '<input class="btn btn-outline-dark mt-3" type="submit" value="Je réserve">';
    $content .= '</form>';

    if($_POST)
    {
        if(!empty($_POST['message']))
        {
            $r = $pdo->query("UPDATE advert SET reservation_message = '$_POST[message]' WHERE id = '$_GET[action]'");

            $content .= '<div class="alert alert-success mt-5" role="alert">
            Message bien envoyé : '.$_POST['message'].'
        </div>';
        }
    }

?>

<?php
    require_once './inc/header.inc.php';
?>
<h1 class="text-center lead display-3 mt-5">Consultez une annonce</h1>
<div class="container m-5">
    <?= $content ?>
</div>

<?php
    require_once './inc/footer.inc.php';
?>