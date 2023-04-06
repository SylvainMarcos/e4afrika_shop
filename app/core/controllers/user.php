<?php

   class User{

    public function register($username, $password, $confirm_password, $profile){

        if(
            isset($username) && !empty($username) && 
            isset($password) && !empty($password) && 
            isset($confirm_password) && !empty($confirm_password) &&
            isset($profile) && !empty($profile)
         ){
            if($password === $confirm_password){
                require_once 'app/core/database/models.php';
                $database = new Model();
                $table = 'user';
                $fields = 'username,profile,password';
                $value = '?,?,?';
                $data = array($username,$profile,sha1($password));
                $database ->add($table,$fields,$value,$data);

                echo '<script> alert(" Votre compte a été crée!")</script>';

            }
            else{
                echo '<script> alert(" Erreur ! Les mots de passe ne sont pas identique !")</script>';
            }
        }
        else{
            echo '<script> alert(" Erreur ! Tous les champs sont requis !")</script>';
        }
        
    }

    public function login($username, $password){

        if(
            isset($username) && !empty($username) && 
            isset($password) && !empty($password) 
        
         ){
            require_once 'app/core/database/models.php';
            $database = new Model();
            $table = 'user';
            $fields = 'id, password';
            $sfields = 'username';
            $data = array($username);

            $query = $database->read_filter_once($table, $fields, $sfields, $data);
            $pass = $query->fetch();

           
            if($pass){

                

                if($pass['password'] == sha1($password)){

                    require_once 'app/utils/methods.php';
                    $info = array(['username'=>$username, 'id'=>$pass['id']]);
                    authenticate($info);
                    var_dump($_SESSION['user_info']);
                    echo '<script> alert(" Bienvenue !")</script>';
                    header('location: /');

                }
                else{
                    echo '<script> alert(" Erreur ! username ou mot de passe incorrect !")</script>';
                }

            }
            else{
                echo '<script> alert(" Erreur ! username ou mot de passe incorrect !")</script>';
            }
        }
        
    }
   }












?>