<?php
// register.php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    #$username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $email_in = $_POST['email'];
    $nombre = $_POST['name'];
    $apellido = $_POST['surname'];


    $sql = "INSERT INTO usuarios (nombre,apellido,email,contrasenia) VALUES (:nombre,:apellido,:email_in, :password)";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute(['nombre' => $nombre,'apellido' => $apellido,'email_in' => $email_in, 'password' => $password]);
        echo "Usuario registrado con éxito";
        header('Location: login.php');

    } catch (PDOException $e) {
        if ($e->errorInfo[1] == 1062) {
            echo "El nombre de usuario ya está en uso.";
        } else {
            echo "Error al registrar el usuario: " . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dente register</title>
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
            <a href="https://www.instagram.com/" target="_blank" class="a_img"><img src="content/icons/instagram.png" alt="linkedin"></a>
            <a href="https://www.youtube.com/@Soliforx-Dev" target="_blank" class="a_img"><img src="content/icons/youtube.png" alt="linkedin"></a>
        </nav>

    </header>




    <main>
        <h1>Registro</h1>
        
        <section>
        <form method="post" action="register.php">
            <?php if (!empty($message)) { echo '<p class="message">' . $message . '</p>'; } ?>

            <label for="Nombre">Nombre</label>
                <input type="text" name="name" required>

            <label for="Apellido">Apellido</label>
                <input type="text" name="surname" required>

            <label for="Email">Email</label>
                <input type="email" name="email" required>

            <label for="Contraseña">Contraseña</label>
                <input type="password" name="password" required>
            
            <input type="submit" value="Registrarse" id="registro">
        </form>


        <img src="content/images/smile.jpg" alt="Recuerda cepillar" id="registro_image">
        

        </section>

    </main>
    <footer>
        <p>Dente CORP INC, 1995</p>
        <p>Todos los derechos reservados, incluyendo el derecho a vender tus dientes</p>

    </footer>
</body>
</html>