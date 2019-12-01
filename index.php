<html>
   <head>
      <title>
          ITech Lab4
     </title>
   </head>
   <body>

<?php $fs = fopen('accounts.txt','r');
if(!$fs)
    {
        echo("Невозможно открыть файл");
    }
else
    {
        $array;
        while(!feof($fs))
        {
            $logAndPass = fgets($fs);    
            $login = strtok($logAndPass,' ');
            $password = strtok(" \n\r");
            $array[$login]=$password;
        }
        fclose($fs);
        var_dump($array);
        
    }  


?>

                    <form method="POST">
                       <b>Форма авторизации</b> 
                        <br><br>Введите логин<br>
                       <input type="text" name="login"><br>
                       Введите пароль<br>
                       <input type="password" name="password"><br>                     
                    <input type="submit" value="Вход">
                    </form>
                    
<?php 
//if($_POST['login']==$login && $_POST['password']==$password)
if($_POST['login']) 
 { 
  if (preg_match("/[0-9a-z_]/i", $_POST['login'])) 
   {
       if(array_key_exists($_POST['login'],$array) && $_POST['password']==$array[$_POST['login']])
        {
             echo '<b style="color:green">Вы успешно авторизовались</b>';
        }
        else
        {
            echo '<b style="color:red">Неправильный логин или пароль!!!</b>';
        }
    } 
   else { echo '<b style="color:red">Логин введен неверно!</b>';  } }

 else { echo '<b style="color:red">Логин не введен!</b>'; } 

?>



</body>
</html>