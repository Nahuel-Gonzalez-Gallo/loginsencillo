<?php
// login.php
require 'config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    #$username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['contrasenia'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['nombre'];
        echo "Inicio de sesión exitoso";
        // Redirigir al usuario a una página segura
        header('Location: dashboard.php');
        exit;
    } else {
        echo "Nombre de usuario o contraseña incorrectos.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dente login</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/jpg"  href="content/images/profile.jpg">

</head>
<body>
    <header>
        <nav>
            <a href="#trabajo">Contratar para cumpleaños</a>
            <a href="#saludarme">Contacto</a>
            <a href="#sobre-mi">Sobre nosotros</a>
        </nav>

        <nav>
            <a href="https://uy.linkedin.com/" target="_blank" class="a_img"><img src="content/icons/linkedin.png" alt="linkedin"></a>
            <a href="https://www.instagram.com/" target="_blank" class="a_img"><img src="content/icons/instagram.png" alt="instagram"></a>
            <a href="https://www.youtube.com/@Soliforx-Dev" target="_blank" class="a_img"><img src="content/icons/youtube.png" alt="youtube"></a>
        </nav>

    </header>




    <main>
        <h1>Iniciar sesión</h1>

        <section>
        <form method="post" action="login.php">

            <?php if (!empty($message)) { echo '<p class="message">' . $message . '</p>'; } ?>


            <label for="Correo">Correo</label>
            <input type="email" name="email" id="" required>

            <label for="Contraseña">Contraseña</label>
            <input type="password" name="password" id="" required>
            
            <a href="/register.html">No tienes cuenta? Registrate</a>

            <input type="submit" value="Iniciar sesión" id="registro">
        </form>
        
        <img src="content/images/dentistry.jpg" alt="Recuerda cepillar">
        
        </section>



    </main>
    <footer>

        <p>Dente CORP INC, 1995</p>
        <p>Todos los derechos reservados</p>

    </footer>
</body>
</html>