<?php
    unset($_SESSION['conectado']);
    unset($_SESSION['usuario']);
    unset($_SESSION['id']);
    header("Location: /admin");
?>