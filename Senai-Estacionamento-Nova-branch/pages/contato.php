<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Swift Parking - CONTATO</title>
    <!-- TAILWIND -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FONTS GOOGLE -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/contato/style.css">
    <link rel="stylesheet" href="../assets/css/contato/media.css">
</head>
<body>
    <!-- HEADER -->
    
    <?php

    include_once '..\assets\components\header.php';

    ?>

    <!-- MAIN -->

    <main>
        <section class="contact-form">
            <form>
                <div class="input-control">
                    <label for="name">Nome</label>
                    <input type="text" name="name" id="name" placeholder="Seu nome" required>
                </div>
                <div class="input-control">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" placeholder="Seu E-mail" required>
                </div>
                <div class="input-control">
                    <label for="subject">Assunto</label>
                    <input type="text" name="subject" id="subject" placeholder="Motivo do contato" required>
                </div>
                <div class="input-control">
                    <label for="message">Mensagem</label>
                    <textarea name="message" id="message" cols="30" rows="5" placeholder="Informações adicionais"></textarea>
                </div>
                <button type="submit">Enviar</button>
            </form>
        </section>

        <section class="contact-information">
            <h2>Informações de contato</h2>
            <div class="information">
                <p class="information-title">Endereço</p>
                <p class="information-content">Rua, ------------------------</p>
            </div>
            <div class="information">
                <p class="information-title">SAC</p>
                <p class="information-content">0800 0105 560</p>
            </div>
            <div class="information">
                <p class="information-title">E-mail de contato</p>
                <p class="information-content"><a href="mailto:contato@swiftparking.com">contato@swiftparking.com</a></p>
            </div>
            <div class="information">
                <p class="information-title">Nosso site</p>
                <p class="information-content"><a href="../index.html">https://www.swiftparking.com</a></p>
            </div>
        </section>
    </main>

    <!-- FOOTER -->

    <?php

    include_once '..\assets\components\footer.php';

    ?>   
</body>
</html>
