<?php
// dashboard.php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <form>
        <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
        <a id="cerrar_sesion" href="logout.php">Cerrar sesión</a>
    </form>
</body>
</html>