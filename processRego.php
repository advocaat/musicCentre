<?php
// connect database
   include("connectdb.php");
   if($_SERVER['REQUEST_METHOD'] == "POST"){
   $req = $dat->query("SELECT user_name AS 'User', user_id AS 'Id', user_password AS 'Password', user_accessLevel AS 'Access' FROM user");


   $result = $req->fetchAll(PDO::FETCH_ASSOC);
        $count = 0;

        foreach($result as $row){
            $count +=1;


        }





            $name = $_REQUEST['userName'];

            $password = $_REQUEST['userPassword'];

            $confirm= $_REQUEST['confirmPassword'];
            $nameUnique = true;
            foreach($result as $row){
                if($row['User'] == $name){
                $nameUnique == false;
                    return;
                }

            }
            $passwordsMatch = $password == $confirm;
            $passwordOK = strlen($password)  >= 5;

            if($nameUnique && $passwordsMatch && $passwordOK){
                //add row to table

                if(
                $dat->exec("INSERT INTO user ( user_name, user_accessLevel, user_artist, user_password) VALUES  ('"  .  $name . "', '1','null','" . $password ."');")
                ){
                    echo "data inserted\n";


                }else{
                    echo "problem\n";
                }

            }

            else{
              if($password < 5){
                echo "password must have at least 5 characters";
              }
              else{
                echo "no dice";
                }
            }
    }






?>






