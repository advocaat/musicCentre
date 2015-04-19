<?php

   include("connectdb.php");
         ?>

<fieldset>
       <form  method="POST" action="loginPanel.php">
       <p>
       <label for="login_field"><strong>Username:</strong></label>
       <input type="text" id="login_field" name="login_field" value="">
       </p>
       <p>
       <label for="password_field"><strong>Password:</strong></label>
       <input type="text" id="password_field" name="password_field" value="">
      </p>
       <input type="submit" id="submit" name="submit" value="Login">
       </form>

</fieldset>

<?php

if($_SERVER['REQUEST_METHOD'] == "POST"){


    $req = $dat->query("SELECT user_name AS 'User', user_password AS 'Password', user_accessLevel AS 'Access' FROM user WHERE user_name = '" . $_REQUEST['login_field'] ."' AND user_password = '" . $_REQUEST['password_field'] . "'");


     $result = $req->fetchAll(PDO::FETCH_ASSOC);

        if($result){
             foreach($result as $row){
                    $count += 1;
                    session_start();
                    $_SESSION["userName"]= $row['User'];
                    $_SESSION["accessLevel"] = $row['Access'];
                    echo "<p>User name :" . htmlspecialchars($_SESSION["userName"]) . "</p>";

                    echo "<p>Access level :" . htmlspecialchars($_SESSION["accessLevel"]). "</p>";
             }
         }else{

               header("Location: rego.php");

             }
    }

?>

