<?php 
if (isset($_COOKIE['centro'])){
    echo "<h1> Cookie 'centro': "  . htmlspecialchars($_COOKIE['centro']) . "</h1>";

}else {
    header('Location: formEJ5.php');
    exit;
}
?>
    



