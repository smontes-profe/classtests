<?php
if (isset($_COOKIE['centro'])) {
    echo "Cookie 'centro': " . $_COOKIE['centro'];
} else {
    header('Location: form.php');
    exit();
}
?>