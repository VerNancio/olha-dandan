<html>

    <link rel="stylesheet" href="..\assets\css\admin_main\admin_main.css">

    <?php

    session_start();

    if (!(isset($_SESSION['admin']))) {
        header('Location: ../index.php');
    }

    ?>
    
    <body>
        <div class="container">
            
            <div class="left">

                <label for="">Status atual de login: <?php 
                if ($_SESSION['admin'] == 1) {echo 'administrador';}
                else {echo 'funcionário';}?></label>

                <h2>Adicionar com minutagem personalizada</h2>
                <form method="post" action="..\ops\gerencia_carros.php?op=entrada-personalizada">
                    <input type="hidden" name="operacao" value="insercao">

                    <input type="text" maxlength="7" pattern="[a-zA-Z]{3}[0-9]{1}[a-zA-Z0-9]{1}[0-9]{2}" required id="placa" name="placa" placeholder="placa">
                    <input type='time' name="tempo" name='hora' min='10:00' max='23:50' required>
                    
                    <input type="submit" value="Enviar">
                </form>

                <h2>Adicionar com minutagem atual</h2>
                <form method="post" action="..\ops\gerencia_carros.php?op=entrada-automatica">
                    <input type="hidden" name="operacao" value="insercao">

                    <input type="text" maxlength="7" pattern="[a-zA-Z]{3}[0-9]{1}[a-zA-Z0-9]{1}[0-9]{2}" required id="placa" name="placa" placeholder="placa">
                    
                    <input type="submit" value="Enviar">
                </form>

                <br><hr><br>

                <label for="">Pesquisa</label>
                <form action=".\main.php" method="get">
                    <select name="info_select" id="">
                        <option value="">...</option>
                        <option value="tudo">Tudo</option>
                        <option value="estacionamento">Estacionamento</option>
                        <option value="saidos">Pagos</option>
                    </select>

                    &nbsp;<input type="submit" value="Pesquisar">
                </form>

                <br><br>

                <a href=".\insert_news.php"><button>Inserir Noticia</button></a>
                <a href="..\index.php"><button>Index</button></a>
                <a href="..\ops\gerencia_carros.php?op=atualizacao"><button>Atualização carros</button></a>
                <a href="..\ops\op_login.php?op=deslogar"><button>Deslogar</button></a>
            </div>
            
            <script src="..\assets\js\admin.js"></script>

            <?php

            @$pesquisa = $_GET['info_select'];

            ?>
            
            <div class="right">
                <table>
                    
                    <thead>
                        <tr>
                            <td>PLACA</td>
                            <td>ENTRADA</td>
                            <td>SAIDA</td>
                            <?php

                            if (@$pesquisa == "saidos" || @$pesquisa == 'tudo') {
                                echo "
                                <td>TOTAL HORAS</td>
                                <td>VALOR</td>
                                ";
                            }
                            
                            ?>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            require_once "..\ops\db.php";

                        // Páginação
                            $pag_rows = 17; // Número de elementos permitidos


                            if (isset($_GET['page'])) {$pag_atual = $_GET['page'];} // Este condicional verifica em qual página você está.
                            else {$pag_atual = 1;} // Se nada for encontrado é porque temos apenas uma página por enquanto 


                            $offset = ($pag_atual - 1) * $pag_rows; // Anota o offset para fazer a query abaixo

                            if (@$pesquisa != null) 
                            {

                                if ($pesquisa == "tudo") 
                                {
                                    $query = "SELECT * FROM CARROS ORDER BY ENTRADA DESC LIMIT $pag_rows OFFSET $offset"; // Query para pegar as informações no banco [1]

                                    $receber = mysqli_query($conn, $query); // Executando a query {1} 
        
                                    while ($row = mysqli_fetch_array($receber)) { // Este while gera a tabela
                                        echo "<tr>"; // Começo do body da tabela
                                        echo "<td>" . $row['PLACA'] . "</td>"; // Conteúdo da coluna PLACA
                                        echo "<td>" . $row['ENTRADA'] . "</td>"; // Conteúdo da coluna ENTRADA 

                                        if (@$row['SAIDA']) {
                                            echo "<td>" . $row['SAIDA']. "</td>";
                                            echo "<td>" . $row['TOTAL']. "</td>";
                                            echo "<td>" . $row['VALOR']. "</td>";
                                            echo "</tr>";
                                            
                                        } else {
                                            echo "<td>" . "
                                                <form id='form-" . $row['ID'] . "' method='post' action='..\ops\gerencia_carros.php?op=saida'>
                                                    <input type='text' hidden name='id_carro' value='" . $row['ID'] . "'>
                                                    <input type='text' hidden name='data_entrada' value='" . $row['ENTRADA'] . "'>
                                                                
                                                    
                                                    <input type='time' name='horario_saida' name='hora' min='10:01' max='23:00' required>
                                                    <input type='submit' form ='form-" . $row['ID'] . "' name='enviar-saida' value=' x '>
                                                </form>"
                                            . "</td>"
                                            ."<td></td>"
                                            ."<td></td>"
                                            ."</tr>"; 
                                        }
                                    }
        
                                    @$query = "SELECT COUNT(*) AS count FROM CARROS"; // Total de elementos na database [2]
                                    @$result = mysqli_query($conn, $query); // Executando a query {2}
                                    @$row = mysqli_fetch_assoc($result); // Nesta variável coloquei o resultado do fetch da tabela
                                    @$total_rows = $row['count']; 
                                    @$total_pag = ceil($total_rows / $pag_rows);

                                }
                                elseif ($pesquisa == 'estacionamento')
                                {
                                    $query = "SELECT * FROM CARROS WHERE SAIDA IS NULL ORDER BY ENTRADA DESC LIMIT $pag_rows OFFSET $offset"; // Query para pegar as informações no banco [1]

                                    $receber = mysqli_query($conn, $query); // Executando a query {1} 
        
                                    while ($row = mysqli_fetch_array($receber)) { // Este while gera a tabela
                                        echo "<tr>"; // Começo do body da tabela
                                        echo "<td>" . $row['PLACA'] . "</td>"; // Conteúdo da coluna PLACA
                                        echo "<td>" . $row['ENTRADA'] . "</td>"; // Conteúdo da coluna ENTRADA 
                                        echo "<td>" . "
                                                <form id='form-" . $row['ID'] . "' method='post' action='..\ops\gerencia_carros.php?op=saida'>
                                                    <input type='text' hidden name='id_carro' value='" . $row['ID'] . "'>
                                                    <input type='text' hidden name='data_entrada' value='" . $row['ENTRADA'] . "'>
                                                                
                                                    <input type='time' name='horario_saida' name='hora' min='10:01' max='23:00' required>
                                                    <input type='submit' form ='form-" . $row['ID'] . "' name='enviar-saida' value=' x '>
                                                </form>"
                                            . "</td>"
                                            ."<td></td>"
                                            ."<td></td>"
                                            ."</tr>"; 
                                    }
        
                                    @$query = "SELECT COUNT(*) AS count FROM CARROS WHERE SAIDA IS NULL"; // Total de elementos na database [2]
                                    @$result = mysqli_query($conn, $query); // Executando a query {2}
                                    @$row = mysqli_fetch_assoc($result); // Nesta variável coloquei o resultado do fetch da tabela
                                    @$total_rows = $row['count'];             
                                    @$total_pag = ceil($total_rows / $pag_rows);

                                }
                                elseif ($pesquisa == 'saidos')
                                {
                                    $query = "SELECT * FROM CARROS WHERE SAIDA IS ORDER BY ENTRADA DESC NOT NULL LIMIT $pag_rows OFFSET $offset"; // Query para pegar as informações no banco [1]

                                    $receber = mysqli_query($conn, $query); // Executando a query {1} 
        
                                    while ($row = mysqli_fetch_array($receber)) { // Este while gera a tabela
                                        echo "<tr>"; // Começo do body da tabela
                                        echo "<td>" . $row['PLACA'] . "</td>"; // Conteúdo da coluna PLACA
                                        echo "<td>" . $row['ENTRADA'] . "</td>"; // Conteúdo da coluna ENTRADA 
                                        echo "<td>" . $row['SAIDA']. "</td>";
                                        echo "<td>" . $row['TOTAL']. "</td>";
                                        echo "<td>" . $row['VALOR']. "</td>";

                                    }
        
                                    @$query = "SELECT COUNT(*) AS count FROM CARROS WHERE SAIDA IS NOT NULL"; // Total de elementos na database [2]
                                    @$result = mysqli_query($conn, $query); // Executando a query {2}
                                    @$row = mysqli_fetch_assoc($result); // Nesta variável coloquei o resultado do fetch da tabela
                                    @$total_rows = $row['count']; 
                                    @$total_pag = ceil($total_rows / $pag_rows);
                                    
                                }

                            
                            if ($total_pag > 1) 
                            {
                                echo "<div class='paginacao'>";

                                if ($pag_atual > 1) {
                                    echo "<a href='?info_select=$pesquisa&page=" . ($pag_atual - 1) . "'&laquo; ></a>";
                                }
    
                                for ($i = 1; $i <= $total_pag; $i++) {
                                    if ($i == $pag_atual) {
                                        echo "<span class='current-page'>$i</span>";
                                    } else {
                                        echo "<a href='?info_select=$pesquisa&page=$i'>$i</a>";
                                    }
                                }
    
                                if ($pag_atual < $total_pag) {
                                    echo "<a href='?info_select=$pesquisa&page=" . ($pag_atual + 1) . "' &raquo;</a>";
                                }
                                echo "</div>";
                                }
                            }

                            ?>
                    </tbody>
                    
                </table>
            </div>
        </div>
        
        
    </body>

</html>
