<?php
/**
 * Vista para mostrar el formulario de registro.
 *
 * Esta vista es "tonta", solo muestra HTML.
 * Es incluida por el controlador 'register.php'.
 */
?>

<h2>Formulario de Registro</h2>
<p>Por favor, completa tus datos para registrarte.</p>

<form action="register.php" method="POST">
    <div>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($nombre ?? '') ?>" required>
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($email ?? '') ?>" required>
    </div>
    <div>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
    </div>
    <div>
        <label for="password_confirm">Confirmar Contraseña:</label>
        <input type="password" id="password_confirm" name="password_confirm" required>
    </div>
    
    <button type="submit">Registrarse</button>
</form>