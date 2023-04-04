<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Swift Parking - LOCALIZAÇÃO</title>
    <!-- JAVASCRIPT -->
    <link rel="stylesheet" href="./localizacao_js/googleMap.js" defer>
    <!-- TAILWIND -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="..\assets\css\localizacao\style.css">
    <link rel="stylesheet" href="..\assets\css\localizacao\media.css">
</head>

<body>
    
   
    <!-- HEADER -->

    <?php

    include_once '..\assets\components\header.php';

    ?>

        <!-- <br><br> -->

    <main>
        <div class="about-header">
            <h1 class="about-title">Encontre-nos</h1>

            <div id="map" class="w-full h-64 sm:h-96 lg:h-128">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.075783101302!2d-46.65312558440685!3d-23.565721567639894!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce59b8630e6e05%3A0x3523300af3cfc4de!2sPareBem%20Estacionamento!5e0!3m2!1spt-PT!2sbr!4v1680026800913!5m2!1spt-PT!2sbr" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="mapa"></iframe>
            </div>
        </div>
        <div class="about-caracteristc">
            <h1 class="about-caracteristc" style="color: #8A6DF2; font-weight: bold;">Localização</h1>
            <p class="caracteristic">Endereço:</p>  <p class="caracteristic-info">Av. Paulista, 854 - Bela Vista</p>
            
            <p class="caracteristic">CEP:</p> <p class="caracteristic-info">01310-913</p>

            <p class="caracteristic">Cidade:</p> <p class="caracteristic-info">São Paulo - SP</p>
                
                
        </div>
    </main>

    <?php

    include_once '..\assets\components\footer.php';

    ?>  

</body>
</html>
