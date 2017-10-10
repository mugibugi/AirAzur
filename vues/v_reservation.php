<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
             <table border>
                    <tr>
                        
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Num Vol</th>
                        <th>Mail</th>
                        <th>Adresse</th>
                        <th>Nombre de places</th>
                        <th>PDF</th>
                    </tr>
            
            <?php     
            
            foreach($reservations as $uneResa)
            {
                $indice=$uneResa['NUMRESA'];
                $nomClient=$uneResa['nomClient'];
                $prenomClient=$uneResa['prenomClient'];
                $numeroVol=$uneResa['numero'];
                $mail=$uneResa['mail'];
                $adresse=$uneResa['adresse'];
                $qdPlace=$uneResa['qdPlace'];
            ?>    
               
                       
                   <tr>
                       
                        <td><?php echo $nomClient ?></td>
                        <td><?php echo $prenomClient ?></td>
                        <td><?php echo $numeroVol ?></td>
                        <td><?php echo $mail ?></td>
                        <td><?php echo $adresse ?></td>
                        <td><?php echo $qdPlace ?></td>
                        <td><a href='index.php?action=pdfReservation&numReservation=<?php echo $indice; ?>'><img src='images/pdf.png'></a></td>
                    </tr>
            <?php    
            }
            ?>    
                </table>
            
    </body>
</html>
