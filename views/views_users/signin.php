<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login KGE</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="includes/css/Lstyle.css">
</head>
<style>
  
</style>
<body>
    <div class="container">
        <div class="login-box">
            <h2>¡ES MOMENTO DE INGRESAR!</h2>
            <form id="form1" method="post" action="./includes/php/valida.php">
                <div class="user-box" id="datos" id="inp10">
                    <input type="text" id="inp10" name="usuario" maxlength="30" required  >
                    <label> Usuario</label>
                </div>
                <div class="user-box">
                    <input  type="password" class="form-control" id="floatingPassword" placeholder="Teclee su contrase&ntilde;a" id="inp3" name="password" required>
                    <label></label>
                </div><br>
                <div class="remember-forgot">
                    <div class="checkbox">
                        <input type="checkbox" id="remember-me">
                        <label for="remember-me">Recordar contraseña</label>
                    </div><br>
                    <a href="#" class="forgot-password">¿Olvidaste tu contraseña?</a>
                </div>
                <button type="submit" name="enviar">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Iniciar Sesión
                </button>
            </form>
        </div>
        <div class="logo-box">
            <img src="includes/img/logo.png" alt="Logo">
        </div>
    </div>

    <script src="script.js"></script>
</body>
<script>
    
</script>
</html>
