<?php
require "models/Usuario.php";

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario de login
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validar las credenciales del usuario

    $usuario = new Usuario();
    $loginUsuario = $usuario->validar($email, $password);

    if ($loginUsuario) {
        // Iniciar sesión y redirigir al usuario a la página principal
        $_SESSION['usuario'] = $email;
        header('Location: bienvenida.php');
        return;
        
    } else {
        // Mostrar un mensaje de error
        $mensaje = 'Email o password incorrecto';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Inicio de sesión</title>
    
    <!-- Biblioteca de estilos de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Tu archivo de estilos CSS -->
    <link rel="stylesheet" href="css/styles.css">
    
    <!-- Script para resaltar el enlace activo en la navegación -->
    <script src="assets/js/navigation.js"></script>
    
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Booking a Book</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Préstamos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Socios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Libros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Categorías</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Cerrar sesión</a>
                </li>
            </ul>
        </div>
    </nav>
    

    <div class="container">
        <h1>Iniciar sesión</h1>
        <?php if (isset($mensaje)): ?>
            <p><?php echo $mensaje; ?></p>
        <?php endif; ?>
        <form method="post">
        <label>Email:</label>
        <input type="text" name="email" /><br>
        <label>Password:</label>
        <input type="password" name="password" /><br>
        <input type="submit" value="Iniciar sesión" />
    </form>
</div>

<!-- Biblioteca de scripts de jQuery -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<!-- Biblioteca de scripts de Bootstrap -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<!-- Tu archivo de script JS -->
<script src="assets/js/navigation.js"></script>
<script>
    $(document).ready(function(){
        highlightActiveLink();
    });
</script>
</body>
</html>

            
