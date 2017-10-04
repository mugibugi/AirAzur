<html>
    <head>
        <meta charset="ISO-8859-1">
        <title></title>
    </head>
    <body>
        <?php
            require "Config.php";
             function connect()
             {			 
                try
                {
                    $connect = new PDO('mysql:host='.HOST.';dbname='.DBNAME,USER,PW,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        return $connect;
                }
               catch(PDOException $e)
                {
                        echo "probleme de connexion :" . $e->getMessage();
                        return false;
                }
            }
        ?>
    </body>
</html>