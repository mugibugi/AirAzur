<html>
    <head>
        <meta charset="ISO-8859-1">
        <title></title>
    </head>
    <body>
        <?php
            function getLesVols()
            {

            // D�claration d'un tableau

            $vols = array();

              // Appel au fichier permettant la connection � la BD
             require dirname(__FILE__)."/Connection.php";
             // Selection de la base de donn�es et requete SQL
               $requete ="SELECT numero, a1.nomAero as a1, a2.nomAero as a2, depart, arrivee, dateDepart, dateArrivee, heureDepart, heureArrivee, prix "
                       . "from vol, aeroport AS a1, aeroport AS a2 "
                       . "WHERE depart = a1.numAero AND arrivee = a2.numAero";
            // Remplissage d'un tableau correspondant � chaque vol
                $bdd= connect();
                $i=0;
                try 
                {	
                    $sql = $bdd->prepare($requete);
                    $sql->execute();
                    
                    while($ligne=$sql->fetch(PDO::FETCH_OBJ))
                    { 
                        
                        $unVol[$i]= ["numero"=>$ligne->numero,
                            "depart"=>$ligne->a1,
                            "dateDepart"=>$ligne->dateDepart,
                            "heureDepart"=>$ligne->heureDepart,
                            "arrivee"=>$ligne->a2,
                            "dateArrivee"=>$ligne->dateArrivee,
                            "heureArrivee"=>$ligne->heureArrivee,
                            "prix"=>$ligne->prix];
                        $i++;
                    } 
                    
                }
                catch(PDOException $e)
                {
                    echo "Erreur dans la requ�te" . $e->getMessage();
                }

             // Remplissage du tableau multi-dimensionnel $vols avec chacun des vols

                for($r=0;$r<$i;$r++){
                    array_push($vols,$unVol[$r]);
                }

            // Retourner le tableau

            return $vols;

            }
            
            function getLesResa(){
               
            // D�claration d'un tableau

            $reservations = array();

              // Appel au fichier permettant la connection � la BD
             require dirname(__FILE__)."/connection.php";
             // Selection de la base de donn�es et requete SQL
                $requete="select * from reservation ";
            // Remplissage d'un tableau correspondant � chaque reservation
                $bdd= connect();
                $i=0;
                try 
                {	
                    $sql = $bdd->prepare($requete);
                    $sql->execute();
                    
                    while($ligne=$sql->fetch(PDO::FETCH_OBJ))
                    { 
                        
                        $uneResa[$i]= [
                            "nomClient"=>$ligne->nomClient,
                            "prenomClient"=>$ligne->prenomClient,
                            "numero"=>$ligne->numVol,
                            "qdPlace"=>$ligne->nbPlace
                        ];
                        $i++;
                    } 
                    
                }
                catch(PDOException $e)
                {
                    echo "Erreur dans la requ�te" . $e->getMessage();
                }

             // Remplissage du tableau multi-dimensionnel $vols avec chacun des vols

                for($r=0;$r<$i;$r++){
                    array_push($reservations,$uneResa[$r]);
                }

            // Retourner le tableau

            return $reservations;
            }
         ?>
        
    </body>
</html>