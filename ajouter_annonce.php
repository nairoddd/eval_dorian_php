<?php
    require_once './inc/init.php';

    if(!empty($_POST))
    {
        foreach($_POST as $key=>$value)
        {
            $_POST[$key] = htmlspecialchars(addslashes($value));
        }

        if(!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['codePostal']) && !empty($_POST['ville']) && !empty($_POST['type']) && !empty($_POST['prix']) ) 
        {
            $req = $pdo->query("INSERT INTO advert (title,description,postal_code,city,type,price) VALUES ('$_POST[title]','$_POST[description]','$_POST[codePostal]','$_POST[ville]','$_POST[type]','$_POST[prix]')");
        }
    else{
            $content.= "<div class=\"alert alert-danger\" role=\"alert\">
                        Remplissez tous les champs
                        </div>";
        }
    }
    
?>



<!-- AFFICHAGE -->
<?php
    require_once './inc/header.inc.php';
?>
<h1 class="lead display-4 text-center mt-5">Ajouter une annonce</h1>
<div class="container m-5">
    <?= $content; ?>
    <form action="" method="POST">
        <!-- TITRE -->
    <div class="mb-3">
        <label for="title" class="form-label">Titre de l'annonce</label>
        <input type="text" class="form-control" id="title" name="title">
    </div>
<!-- DESCRIPTION -->
    <div class="form-floating mb-3">
        <textarea class="form-control" placeholder="Votre description" id="description" name="description" style="height: 100px"></textarea>
        <label for="description">Description de l'annonce</label>
    </div>
<!-- CODE POSTAL -->
    <div class="col-md-2">
        <label for="codePostal" class="form-label">Code postal</label>
        <input type="text" class="form-control" id="codePostal" name="codePostal">
    </div>
<!-- VILLE -->
    <div class="mb-3">
        <label for="ville" class="form-label">Ville</label>
        <input type="text" class="form-control" id="ville" name="ville">
    </div>
<!-- TYPE -->
    <div class="col-md-2 mb-3">
    <label for="type" class="form-label">Type</label>
    <select id="type" class="form-select" name="type">
      <option value="location">Location</option>
      <option value="vente">Vente</option>
    </select>
  </div>
  <!-- PRIX -->
  <div class="mb-3">
        <label for="prix" class="form-label">Prix</label>
        <input type="text" class="form-control" id="prix" name="prix">
    </div>

    <button type="submit" class="btn btn-dark">Ajouter</button>
    </form>
</div>


<?php
    require_once './inc/footer.inc.php';
?>
