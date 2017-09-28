<html>
    <form method="post" action="formulaire.php">
        <fieldset>
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" /></br>

            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom" /></br></br>
            
            <input type="submit" value="Envoyer" />
            <?php
                
                /*if(isset($_POST['submit']))
                    extract($_POST);
                    $bdd= connect();
                    $requete = $bdd->prepare('INSERT INTO reservation(nom, prenom)VALUES(:nom,:prenom)');
                    $requete->execute();*/
            ?>
</html>
