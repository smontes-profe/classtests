<?php

    if (isset($_GET['centro'])) {
        $centro = $_GET['centro'];

        if ($centro == "ilerna") {
            header ("Location: https://www.ilerna.es");
            exit();
        }
        else {
            echo "Boooooo! Fueraaaaa!";
        }
    }
    else{
        echo "No has puesto ningun centro";
    }

?>