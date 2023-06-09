<html>
<head>

<meta charset="UTF-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport"content="width=device-width, initial-scale=1.0">
<!-- GOOGLEFONTS -->
<script src="https://cdn.tailwindcss.com"></script>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap"rel="stylesheet">
<!-- CSS -->
<link rel="stylesheet" href="../assets/css/admin_main/login.css">
<link rel="stylesheet" href="../assets/css/admin_main/login_media.css">

<!-- TITLE -->

<title>Login</title>

</head>
    
    <body>

    <?php

    include_once "../assets/components/header.php";

    ?>

        <div id="login">

            <form class="card" method="POST" action="..\ops\op_login.php?op=logar">

                <div class="card-header">

                    <img class="logo" src="../assets/img/icons/logo_swift_parking.png"
                            alt="">
                    <h1 class="gradient">Login</h1>
                </div>

                <div class="card-content">

                    <center>
                        
                    <?php

                    if (isset($_SESSION['msg'])) {
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                    
                    ?>
                    </center>

                    <div class="card-content-area">

                        <label for="email">E-mail</label>

                        <input type="text" name="email" maxlength="80" placeholder="E-mail" required>

                    </div>

                    <div class="card-content-area">

                        <label for="password">Senha</label>

                        <input type="password" name="senha" maxlength="50" placeholder="Senha" required>

                    </div>

                </div>

                <div class="card-footer">
                    <input type="submit" value="Entrar" class="submit">
                </div>

            </form>

        </div>

    </body>

</html>
