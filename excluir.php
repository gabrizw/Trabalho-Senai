<?php
    session_start();
    if (!isset($_SESSION['usuario'])) {
        header("Location: index.php");
        exit();
    }
    $index = $_GET['pos'];
    $emails = $_SESSION['emails'];
    $id = array_search ($_SERVER['usuario'], $emails);
    if ($index == $id) {
        echo "<script language='javascript' type='text/javascript'>
            alert('Você não pode se apagar seu idiota do caralho!');
            window.location.href='listagem.php'
            </script>";
    }
    else {
        unset($_SESSION['nomes'][$index]);
        unset($_SESSION['emails'][$index]);
        unset($_SESSION['generos'][$index]);
        unset($_SESSION['senhas'][$index]);
        $_SESSION['nomes'] = array_values($_SESSION['nomes']);
        $_SESSION['emails'] = array_values($_SESSION['emails']);
        $_SESSION['generos'] = array_values($_SESSION['generos']);
        $_SESSION['senhas'] = array_values($_SESSION['senhas']);
        header("Location: listagem.php");
    }
    
?>
