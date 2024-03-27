<?php

@session_start();

#conectarse evitando ataques de inicio de sesion -- SEGURIDAD DE CONEXIÓN --
$mysqli = new mysqli('localhost', 'root', '', 'kge');

$usuario=$_POST['usuario'];
$password=strip_tags($_POST['password']);
$_SESSION['existe'] = "NO";

#echo '<script>alert("'.$sql'")</script>';
# preparar consulta -- SEGURIDAD DE CONSULTA UTILIZANDO VARIABLES
$stmt = $mysqli->prepare("SELECT * FROM tbl_users INNER JOIN ctg_tiposusuario
ON tbl_users.id_TipoUsuario = ctg_tiposusuario.id_TipoUsuario
WHERE tbl_users.tx_username = ? AND tbl_users.tx_password = ?");

$stmt->bind_param("ss", $usuario, $password);

#ejecutar y obtener 
$stmt->execute();
$result = $stmt->get_result();

$uid = "";

if($fila = mysqli_fetch_array($result))
{
    $uid = $fila['id'];
    $datousuario = $fila['tx_username'];
    $catusr =  $fila['id_tipousuario'];
    $datopass = $fila['tx_password'];
    $tipousuario = $fila['tx_tipousuario'];

    $_SESSION['existe'] = 'SI';

    $_SESSION['id'] = $uid;
    $_SESSION['tx_username'] = $datousuario;
    $_SESSION['tx_password'] = $datopass;
    $_SESSION['id_TipoUsuario'] = $catusr;
    $_SESSION['tx_TipoUsuario'] = $tipousuario;

    if($catusr==1)
    {
        $pagina = '../../views/views_admin/index.php';
        echo("<script>alert('Bienvenido a tu sesion: " . $usuario .
        " " . $tipousuario ." , has clic en aceptar para continuar');");

        $_SESSION['id'] = $uid;
        $_SESSION['tx_username'] = $datousuario;
        $_SESSION['tx_password'] = $datopass;
        $_SESSION['id_TipoUsuario'] = $catusr;

        echo("location.replace('".$pagina."');");
        echo("</script>");

    }
    elseif($catusr ==2){
        $pagina = '../../views/views_users/index.php';
        echo("<script>alert('Bienvenido a tu sesion: ". $usuario . 
        "". $tipousuario .", has clic en aceptar para continuar');");

            
        $_SESSION['id'] = $uid;
        $_SESSION['tx_username'] = $datousuario;
        $_SESSION['tx_password'] = $datopass;
        $_SESSION['id_TipoUsuario'] = $catusr;

            
        echo("location.replace('".$pagina."');");
        echo("</script>");

    }
    }
    else {
        echo("<script>alert('Usuario no encontrado...');");
        echo("location.replace('../../signin.php');");
        echo("</script>");
    }

?>