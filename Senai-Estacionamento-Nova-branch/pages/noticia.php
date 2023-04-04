<?php

    require_once "..\ops\db.php";

    if (isset($_GET['id_noticia'])) {
        $id_noticia = $_GET['id_noticia'];
    }

    $query_noticia = "SELECT * FROM NOTICIAS WHERE ID_NOTICIA = $id_noticia";
    $result = mysqli_query($conn, $query_noticia);

    $noticia = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $noticia['TITULO'] ?></title>
    <!-- TAILWIND -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- BOOTSTRAP ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <!-- FONTS GOOGLE -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/noticia/style.css">
    <link rel="stylesheet" href="../assets/css/noticia/media.css">
    <!-- JAVASCRIPT -->
    <script src="..\assets\js\voltar.js" defer></script>
</head>
<body>
    <!-- HEADER -->

    
    <?php
    
    include_once "..\assets\components\header.php";
    
    ?>

    <!-- MAIN -->

    <main>

        <?php 

        echo '<section class="news-container">
        <div class="back-to-page">
            <a href="#" onclick="voltar()"><i class="bi bi-arrow-left"></i></a>
        </div>
        <div class="news">
            <div class="news-header">
                <h1>'. $noticia['TITULO'].'</h1>
            </div>
            <div class="news-image">
                <img src="'. $noticia['LINK_IMG'].'" alt="">
            </div>
            <!-- <div class="news-image-credits">
                <span class="image-credits">Foto de <a href="https://unsplash.com/fr/@michaelfousert?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Michael Fousert</a> na <a href="https://unsplash.com/pt-br/fotografias/CrU3lUW2jRk?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Unsplash</a>
                </span>
            </div> -->
            <div class="news-info">
                <div class="news-info-single">
                    <i class="bi bi-calendar"></i>
                    <span class="news-date">Pub &nbsp;'. $noticia['DATA_PUB'] .'</span>'.
                    (!empty($noticia['DATA_EDIT']) ? 
                    '<i class="bi bi-calendar"></i>
                    <span class="news-date">Edit &nbsp;'. $noticia['DATA_EDIT'] .'</span>'
                    :
                    ''
                    )
                .'</div>
                <div class="news-info-single">
                    <i class="bi bi-person-fill"></i>
                    <span class="news-author">'. $noticia['AUTOR'] .'</span>
                </div>
            </div>
            <div class="news-content">
                <p>'. nl2br($noticia['NOTICIA']).'</p>
            </div>
        </div>
    </section>'

        ?>

    </main>

    <!-- FOOTER -->

    <?php

    include_once '..\assets\components\footer.php';

    ?>  

    <!-- BUTTON SCROLL TO TOP -->
    <button type="button" id="btn-to-top">
        <span>&#129153;</span>
    </button>
    
    <script src="../assets/js/btnScrollToTop.js"></script>
</body>
</html>
