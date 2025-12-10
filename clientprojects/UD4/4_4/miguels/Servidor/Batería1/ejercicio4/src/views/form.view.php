<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>

<body>
    <header>
        <h1>Formulario</h1>
    </header>
    <main>
        <div>
            <form action="index.php" method="POST">
                <div>
                    <label for="name">Nombre:</label>
                    <input type="text" name="name" id="name"
                        value="<?= htmlspecialchars($old_data['name'] ?? '', ENT_QUOTES, 'UTF-8') ?>">

                    <?php if (isset($errors['name'])): ?>
                        <span><?= $errors['name'] ?></span>
                    <?php endif; ?>
                </div>

                <div>
                    <label for="surname">Apellidos:</label>
                    <input type="text" class="surname" id="surname" name="surname"
                        value="<?= htmlspecialchars($old_data['surname'] ?? '', ENT_QUOTES, 'UTF-8') ?>">

                    <?php if (isset($errors['surname'])): ?>
                        <span> <?= $errors['surname'] ?></span>
                    <?php endif; ?>
                </div>

                <div>
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" class="email"
                        value="<?= htmlspecialchars($old_data['email'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
                    
                    <?php if (isset($errors['email'])): ?>
                        <span><?= $errors['email'] ?></span>
                    <?php endif; ?>
                </div> 

                <button type="submit">Enviar</button>
            </form>
        </div>
    </main>
    <footer></footer>
</body>
</html>