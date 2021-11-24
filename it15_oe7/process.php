<?php 
     define("DB_USER", "root");
     define("DB_PASS", '');
     define("DB_NAME", "it15_database");
     define("DB_CHARSET", "utf8");

     try{
         $pdo = new PDO(
             "mysql:host = ".DB_HOST.";
             charset =".DB_CHARSET.";
             dbname = ".DB_NAME, DB_USER, DB_PASS,[
                 PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
                 PDO::ATTR_DEFAULT_FETCH_MODE => PDO:: FETCH_ASSOC
             ]);
            }catch(Exception $ex){
                exit($ex->getMessage());
            }

            $stmt = $pdo->prepare("SELECT * FROM users WHERE first_name LIKE '%' OR email LIKE '%'");
            $stmt->execute(["%".$_POST["search"]."%", "%".$_POST["search"]."%"]);
            $results = $stmt->fetchAll();


        
     
?>