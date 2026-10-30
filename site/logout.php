<?php
session_start();
session_unset();
session_destroy();

if (!isset($_SESSION['logged_in'])) {
    echo "Sessão destruída com sucesso.";
}

header('Location: index.php');
exit;
?>
