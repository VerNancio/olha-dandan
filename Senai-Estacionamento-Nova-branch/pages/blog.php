<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Swfit Parking - BLOG</title>
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <!-- TAILWIND -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FONTS GOOGLE -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="..\assets\css\blog\style.css">
    <link rel="stylesheet" href="..\assets\css\blog\media.css">
    <!-- ESTILOS INTERNO -->
    <style>
        .botao_paginacao{
            border: 1px solid rgb(46, 46, 46);
            border-radius: 4px;
            height: 35px;
            width: 35px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-left: 15px;
            margin-right: 15px;
        }

        .paginacao{
            display: flex;
            margin-top: 50px;
            margin-bottom: 35px;
            justify-content: center;
        }
    </style>
</head>
<body>
    <!-- HEADER -->
    <?php

    // Session star incluso no header
    include_once '..\assets\components\header.php';

    ?>

    <!-- MAIN  -->

    <main>
        <div class='blog-container'>
            <?php
                require_once("..\ops\db.php");

                $num_noticias_pag = 4; // DEFINIÇÃO DE QUANTAS NOTICIAS EXIBIDAS POR PÁGINA
                $links_pag = 2; // DEFINIÇÂO DE QUANTOS LINKS HAVERÃO PARA PAGINAÇÃO

                if (isset($_GET['pagina'])) {
                    $pagina = $_GET['pagina'];
                } else {
                    $pagina = 1;
                }

                //$_SESSION['pagina'];

                $inicio = ($pagina - 1) * $num_noticias_pag;

                $limite_pag = "SELECT * FROM NOTICIAS ORDER BY DATA_PUB DESC LIMIT $inicio, $num_noticias_pag";

                $total_registros = mysqli_query( $conn, "SELECT * FROM NOTICIAS");
                $total_registros = mysqli_num_rows($total_registros);

                $total_paginas = ceil($total_registros / $num_noticias_pag);
            
                $sql = mysqli_query($conn, $limite_pag); 
                                
                    if (mysqli_num_rows($sql) > 0) {
                        while ($row = mysqli_fetch_assoc($sql)) {
                                        
                            echo "<a href='./noticia.php?id_noticia=$row[ID_NOTICIA]'><div class='blog-post'>
                            <div class='post-image'>
                                <img src='$row[LINK_IMG] alt='imagem relacionada a notícia'>
                            </div>
                            <div class='post-content'>
                                <div class='post-title'>
                                    <h1>$row[TITULO]</h1>
                                </div>
                                <div class='post-info'>
                                    <div class='post-info-single'>
                                        <i class='bi bi-calendar'></i>
                                        <span class='news-date'>$row[DATA_PUB]</span>
                                    </div>
                                    <div class='post-info-single'>
                                        <i class='bi bi-person-fill'></i>
                                        <span class='news-author'>$row[AUTOR]</span>
                                    </div>
                                </div>
                                <div class='post-subject'>
                                    <p>$row[RESUMO]</p>
                                </div>
                                <div class='post-options'>
                                    <span class='remove-post'>
                                        ".(@$_SESSION['admin'] == 1 ? "<a href='..\ops\gerencia_noticias.php?id_noticia=". $row["ID_NOTICIA"] ."&operacao=apagar'>
                                            <i class='bi bi-trash3-fill'></i>
                                            EXCLUIR
                                    </a>" : "")."
                                    </span>
                                    <span class='edit-post'>
                                        ".(@$_SESSION['admin'] == 1 ? "<a href='../admin_pages/edit_news.php?id_noticia=$row[ID_NOTICIA]'>
                                            <i class='bi bi-pencil-fill'></i>
                                            EDITAR
                                        </a>" : "")."
                                    </span>
                                    <span class='read-more-link'><a href='./noticia.php?id_noticia=". $row['ID_NOTICIA'] ."'>LEIA MAIS</a></span>
                                </div>
                            </div>
                        </div></a>";
                    }
                }
            ?>
        </div>
        <div class="paginacao">
            <?php
            // PAGINAÇÃO

                // vamos criar a visualização

                // agora vamos criar os botões "Anterior e próximo"

                // PRIMEIRA PAGINA 
                echo '<div class="botao_paginacao"><a href="?pagina=1">1</a></div>';

                // LOOP FOR PARA LINKS PRÉ PAGINA ATUAL
                if ($pagina > 1) {
                    for($i = $pagina - $links_pag; $i < $pagina; $i++) {
                        if ($i > 1) {
                            echo '<div class="botao_paginacao"><a href="?pagina='.$i.'">'.$i.'</a></div>';
                        }
                    }
                }

                // PAGINA INTERMEDIARIA
                if ($pagina != 1 && $pagina != $total_paginas) {
                    echo '<div class="botao_paginacao"><a href="?pagina='.$pagina.'">'.$pagina.'</a></div>';
                }

                // LOOP FOR PARA LINKS PÓS PAGINA ATUAL
                for ($i = $pagina + 1; $i < $pagina + $links_pag + 1; $i++) {
                    if ($i < $total_paginas) {
                        echo '<div class="botao_paginacao"><a href="?pagina='.$i.'">'.$i.'</a></div>';
                    }
                }

                // ULTIMA PAGINA 
                if ($total_paginas > 1) {
                    echo '<div class="botao_paginacao"><a href="?pagina='.$total_paginas.'">'.$total_paginas.'</a></div>';
                }
            ?>
        </div>
        <!-- FIM DO CONTAINER -->
    </main>

    <!-- FOOTER -->

    <?php
    include_once '..\assets\components\footer.php';
    ?>       

</body>

</html>
