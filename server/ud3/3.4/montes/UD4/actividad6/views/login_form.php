<?php
/**
 * Vista para mostrar el formulario de Login.
 */
?>

<h2>Inicio de Sesión</h2>
<p>Por favor, introduce tus credenciales.</p>

<form action="login.php" method="POST">
    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($email ?? '') ?>" required>
    </div>
    <div>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
    </div>
    
    <button type="submit">Iniciar Sesión</button>
</form>