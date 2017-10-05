<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            
            foreach($reservations as $uneResa)
            {
                $nomClient=$uneResa['nomClient'];
                $prenomClient=$uneResa['prenomClient'];
                $numeroVol=$uneResa['numero'];
                $mail=$uneResa['mail'];
                $adresse=$uneResa['adresse'];
                $qdPlace=$uneResa['qdPlace'];
                echo"<table border>
                    <tr>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Num Vol</th>
                        <th>Mail</th>
                        <th>Adresse</th>
                        <th>Nombre de places</th>
                    </tr>
                    <tr>
                        <td>$nomClient</td>
                        <td>$prenomClient</td>
                        <td>$numeroVol</td>
                        <td>$mail</td>
                        <td>$adresse</td>
                        <td>$qdPlace</td>
                        <td>pdf</td>
                    </tr>
                </table>";
            }
        ?>
    </body>
</html>
