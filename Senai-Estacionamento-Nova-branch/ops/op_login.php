<?php

require_once "..\ops\db.php";

$operacao = $_GET['op'];
session_start();

if ($operacao == "deslogar") {

    unset($_SESSION['admin']);

    header('Location: ..\index.php');

} elseif ($operacao == "logar"){

    $email = $_POST['email'];
    $senha = sha1($_POST['senha']); //sha1

    $sql = mysqli_query($conn, "SELECT * FROM usuarios WHERE email='$email' AND senha='$senha'");
    $row = mysqli_fetch_assoc($sql);
    session_start();

    if (mysqli_num_rows($sql) == 1) {

            $_SESSION['admin'] = $row['ADMINISTRADOR'];
            header('Location: ..\admin_pages\main.php');
        }
        else {
            $_SESSION['msg'] = "Login incorreto.";
            header('Location: ..\admin_pages\login.php');
        }
}
