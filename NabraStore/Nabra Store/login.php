    <?php
    //Ingreso de datos que se guardaran en el archivo login.php
    $username = $POST['user'];
    $password = $POST['pass'];
    $email = $POST['emai'];

    //Para prevenir las inyeccion sql
    $username = stripslashes($username);
    $password = stripslashes($username);
    $email = stripslashes($email);
    $username = mysql_real_escape_string($username);
    $password = mysql_real_escape_string($password);
    $email = mysql_real_escape_string($email);

    //Conecta el servidor con la base de datos
    mysql_connect("localhost"; "root", "");
    mysql_select_db("login");

    //Consultas del usuario para la base de datos
    $result = mysql_query("select * from users where username = '$username' and password= '$password' and email= '$email'")
              or die("Fallo en la consulta de la base de datos ".mysql_error());
    //Devuelve una respuesta
    $row = mysql_fetch_array($result);
    //Si ingresa correctamente los datos, ingresa, en el caso contrario, tira fallo
    if($row['username'] == $username && $row['password'] == $password && $row['email'] == $email){
      echo "Logueado correctamente   Bienvenido".$row['username'];
    } else {
      echo "Fallo al loguearse, vuelva a intentarlo";
    }
   ?>
