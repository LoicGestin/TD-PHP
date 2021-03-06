<?php

    require_once File::build_path(array("config","Conf.php"));
    class Model

{
    private static $pdo = NULL;
        protected static $primary=NULL;
        protected static $object = NULL;

    public static function init(){
        $login = Conf::getLogin();
        $password = Conf::getPassword();
        $hostname = Conf::getHostname();
        $database_name = Conf::getDatabase();
        try{
            self::$pdo = new PDO("mysql:host=$hostname;dbname=$database_name", $login, $password,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
    }
    public static function getPdo()
    {
        if (is_null(self::$pdo)){
            self::init();
        }
        return self::$pdo;
    }

        public static function selectAll(){
        $table_name = static::$object;
        $class_name = "Model".ucfirst($table_name);
            $sql_request = "SELECT * FROM $table_name";
            try {
                $rep = Model::getPdo()->query($sql_request);
                $rep->setFetchMode(PDO::FETCH_CLASS, $class_name);
                $tab_obj = $rep->fetchAll();
            }
            catch (PDOException $e) {
                if (Conf::getDebug()) {
                    echo $e->getMessage(); // affiche un message d'erreur
                } else {
                    echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
                }
                die();
            }

            return $tab_obj;
        }

        public static function select($primary_value) {
            $table_name = static::$object;
            $class_name = "Model".ucfirst($table_name);
            $primary_key = static::$primary;
            $sql = "SELECT * from $table_name WHERE $primary_key=:nom_tag";

            // Pr??paration de la requ??te
            $req_prep = Model::getPDO()->prepare($sql);

            $values = array(
                "nom_tag" =>$primary_value,
                //nomdutag => valeur, ...
            );
            // On donne les valeurs et on ex??cute la requ??te
            $req_prep->execute($values);

            // On r??cup??re les r??sultats comme pr??c??demment
            $req_prep->setFetchMode(PDO::FETCH_CLASS, $class_name);
            $tab_obj = $req_prep->fetchAll();

            // Attention, si il n'y a pas de r??sultats, on renvoie false
            if (empty($tab_obj))
                return false;
            return $tab_obj[0];

        }
        public static function delete($primary_value){
            $table_name = static::$object;
            $class_name = "Model".ucfirst($table_name);
            $primary_key = static::$primary;
            $sql_request = "DELETE FROM $table_name WHERE $primary_key=:nom_tag;";
            try {
                $req_prep = Model::getPDO()->prepare($sql_request);

                $values = array(
                    "nom_tag" => $primary_value,
                    //nomdutag => valeur, ...
                );
                $req_prep->execute($values);
                $req_prep->setFetchMode(PDO::FETCH_CLASS, $class_name);
            }
            catch (PDOException $e) {
                if (Conf::getDebug()) {
                    echo $e->getMessage(); // affiche un message d'erreur
                } else {
                    echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
                }
                die();
            }
        }
        public static function update($data)
        {
            $table_name = static::$object;
            $class_name = "Model" . ucfirst($table_name);
            $primary_key = static::$primary;

            $sql_request = "UPDATE $table_name SET ";

            foreach ($data as $cle => $valeur) {
                if(!($cle == $primary_key)){
                    $sql_request = $sql_request . $cle. "=:" . $cle . ", ";
                }
            }
            $sql_request =  rtrim($sql_request, "       ,");
            $sql_request = $sql_request . " WHERE ".$primary_key."=:".$primary_key;
            try {
                $req_prep = Model::getPDO()->prepare($sql_request);
                $values = array();
                foreach ($data as $cle => $valeur) {
                    $values = $values + array($cle => $valeur) ;
                }
                $req_prep->execute($values);
                $req_prep->setFetchMode(PDO::FETCH_CLASS, $class_name);
            }
            catch (PDOException $e) {
                if (Conf::getDebug()) {
                    echo $e->getMessage(); // affiche un message d'erreur
                } else {
                    echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
                }
                die();
            }
        }

        public static function create($data)
        {
            $table_name = static::$object;
            $class_name = "Model" . ucfirst($table_name);
            $primary_key = static::$primary;


            $sql_request = "INSERT INTO $table_name ( ";

            foreach ($data as $cle => $valeur) {
                    $sql_request = $sql_request . $cle .  ", ";
            }
            $sql_request =  rtrim($sql_request, "       ,");

            $sql_request = $sql_request . ") VALUES (";

            foreach ($data as $cle => $valeur) {
                $sql_request = $sql_request. ":" . $cle .  ", ";
            }
            $sql_request =  rtrim($sql_request, "       ,");

            $sql_request = $sql_request . ");";
            try {
                $req_prep = Model::getPDO()->prepare($sql_request);
                $values = array();
                foreach ($data as $cle => $valeur) {
                    $values = $values + array($cle => $valeur) ;
                }
                $req_prep->execute($values);
                $req_prep->setFetchMode(PDO::FETCH_CLASS, $class_name);
            }
            catch (PDOException $e) {
                if (Conf::getDebug()) {
                    echo $e->getMessage(); // affiche un message d'erreur
                } else {
                    echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
                }
                die();
            }

        }



}
