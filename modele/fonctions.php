<?php 
session_start();
?>
<html>
    <head>
        <meta charset="ISO-8859-1">
        <title></title>
    </head>
    <body>
        <?php
        
       
            function getLesVols()
            {
  require dirname(__FILE__)."/Connection.php";
            // D�claration d'un tableau

            $vols = array();

              // Appel au fichier permettant la connection � la BD
            
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
                            "NUMRESA"=>$ligne->NUMRESA,
                            "nomClient"=>$ligne->nomClient,
                            "prenomClient"=>$ligne->prenomClient,
                            "numero"=>$ligne->numVol,
                            "mail"=>$ligne->mail,
                            "adresse"=>$ligne->adresse,
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
            
            function reserverVol() {
                // récup numéro vol
                $numero = $_REQUEST["numero"];
                return $numero;
            }
            
            function validerReservation(){
                $reservation = array();
                
                 require dirname(__FILE__)."/Connection.php";
                 
                
                // récupération du numéro
                $numero = $_REQUEST["numero"];
                $nom = $_REQUEST["nom"];
                $prenom = $_REQUEST["prenom"];
                $mail = $_REQUEST["mail"];
                $adresse = $_REQUEST["adresse"];
                $nbplace = $_REQUEST["NBvoyageur"];
                
                $reservation["numero"] =  $numero;
                $reservation["nomClient"] =$nom;
                $reservation["prenomClient"] =  $prenom;
                $reservation["mail"] = $mail;
                $reservation["adresse"] = $adresse;
                $reservation["nbPlace"] =  $nbplace;
                
                initPanier();
                
                ajouterAuPanier($reservation);
                
                creerReservation($reservation);
                
                return $reservation;
            }
                // fonction qui initialise le panier
                // le panier est un tableau indexé mis en session avec la clé "reservations"
            function initPanier() {
                    if(!isset($_SESSION['reservation']))
                    $_SESSION['reservation']= array();
            }

                // fonction qui ajoute une réservation au panier
            function ajouterAuPanier($reservation) {    
                   $_SESSION['reservation'][]= $reservation;
            }
            function creerReservation($reservation){
                
                
                //echo  $reservation["numero"] ;
               
                    // ouverture du fichier en écriture (mode w)
                
          //        require dirname(__FILE__)."/Connection.php";  
                         // connexion réussie
                        
                         $requete="INSERT INTO reservation(NUMRESA,numVol, nomClient, prenomClient, mail, adresse, nbPlace) VALUES(NULL,'".$reservation['numero']."','".$reservation['nomClient']."', '".$reservation['prenomClient']."', '".$reservation['mail']."', '".$reservation['adresse']."', '".$reservation['nbPlace']."')";
                            
                    
                     try 
                    {	
                         $bdd= connect();
                         
                        $sql = $bdd->prepare($requete);
                        $sql->execute();
                   
                    
                    }
                    catch(PDOException $e)
                    {
                        echo "Erreur dans la requ�te" . $e->getMessage();
                    }
            }   
            function getLesReservation(){
                
                require dirname(__FILE__)."/Connection.php";
                $requete="select NUMRESA from reservation ";
                
                $bdd = connect();
                
                try 
                {	
                    $sql = $bdd->prepare($requete);
                    $sql->execute();
                   
                    
                }
                catch(PDOException $e)
                {
                    echo "Erreur dans la requ�te" . $e->getMessage();
                }
                
                
                
                return $indice;
                
            }
         ?>
        
    </body>
</html>
