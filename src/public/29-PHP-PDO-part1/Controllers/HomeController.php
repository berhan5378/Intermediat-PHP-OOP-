<?php 
declare(strict_types=1);
class HomeController 
{
    public function index():View
    {
        try{/*
            $db=new PDO('mysql:host=db;dbname=my_db','root','root');
            $query='SELECT * FROM users';
            $stmt =$db->query($query);
            var_dump($stmt->fetchAll());
            //or
            foreach($db->query($query)as $user){
                echo '<pre>';
                var_dump($user);
                echo '</pre>';
            }
            //OR
            foreach($db->query($query)->fetchAll(PDO::FETCH_OBJ)as $user){//to display as a object
                echo '<pre>';
                var_dump($user);
                echo '</pre>';
            }*/
            //or
            /*
            $db=new PDO('mysql:host=db;dbname=my_db','root','root',[
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ 
            ]); 
            $query='SELECT * FROM users';
            foreach($db->query($query)as $user){
                echo '<pre>';
                var_dump($user);
                echo '</pre>';
            }
                */


                $db=new PDO('mysql:host=db;dbname=my_db','root','root',[
                    PDO::ATTR_EMULATE_PREPARES => false, //this help to denid for the same placeholder like (:data,:data) also helps return var typs as a types (is not chage to string)
                ]); 
                $email='john@.com';
                $name='jone Doe';
                $createdAt=date('Y-m-d H:m:i', strtotime('07/11/2021 9:00PM'));
                $query='INSERT INTO users (email, name, created_at) VALUES (:email,:name,:date)';

                $stmt=$db->prepare($query);
                /*
                $stmt->execute(
                    [
                        ':name' => $name,
                        'email' => $email,
                        'date' => $createdAt,
                    ]
                    );
                    */ 
                    //or
                    $stmt->bindValue('name',$name, PDO::PARAM_STR);//we can add PDO prameter what type to bind BUT PDO by default is string
                    $stmt->bindValue(':date',$createdAt);
                    $stmt->bindParam('email',$email);

                    $name='your name';//this is not affect
                    $email='exa.com';//this is posible(the email is change) b/c we use bindParam() insted of bindValue()
                    $stmt->execute();
                $id=$db->lastInsertId();
                $user=$db->query('SELECT * FROM users WHERE id ='.$id)->fetch();//it's better use prepare insted of use id ='.$id
                echo '<pre>';
                var_dump($user);
                echo '</pre>';
        }catch(\PDOException $e){
            throw new \PDOException($e->getMessage(),(int)$e->getCode());
        } 
       return View::make('index',$_GET);
        
    } 
}