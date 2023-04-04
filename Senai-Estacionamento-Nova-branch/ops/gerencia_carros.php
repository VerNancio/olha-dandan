<?php

require_once "..\ops\db.php";

$operacao = $_GET['op'];

function calcularValor($entrada, $saida) {
    @$entrada_dt = new DateTime($entrada);
    @$saida_dt = new DateTime($saida);

    @$diff_segundos = $saida_dt->getTimestamp() - $entrada_dt->getTimestamp();

    if ($diff_segundos <= 900) { // Este condicional decide o preço
        return 0;
    } else {
        $diff_horas = ceil($diff_segundos / 3600);
        if ($diff_horas == 1) {
            return 27;
        } elseif ($diff_horas == 2) {
            return 32;
        } else {
            return 32 + ($diff_horas - 2) * 9;
        }
    }
}

if ($operacao == "entrada-personalizada") {
    $placa = $_POST['placa'];
    $data = date('Y-m-d');
    $horario = $_POST['tempo'];

    $data_horario = $data + $horario;
    
    $sql = mysqli_query($conn,"INSERT INTO carros(placa, entrada) VALUES('$placa','$data $horario')");

    header("Location: ..\admin_pages\main.php");

}

if ($operacao == "entrada-automatica") {
    $placa = $_POST['placa'];
    $data_horario = date('Y-m-d H:i');
    
    $sql = mysqli_query($conn,"INSERT INTO carros(placa, entrada) VALUES('$placa','$data_horario')");

    header("Location: ..\admin_pages\main.php");

}

elseif ($operacao == "saida") {

    $carroId = $_POST['id_carro'];
    $horarioSaida = $_POST['horario_saida'];
    $dataEntrada = strtotime(substr("" . $_POST['data_entrada'] . "",0,-9));
    
    if (!(date('Y-m-d H:i', $dataEntrada) < date('Y-m-d'))) {

        $datetimeSaida = date('Y-m-d') . " $horarioSaida";
        
        $enviar = mysqli_query($conn, "UPDATE carros SET SAIDA = '$datetimeSaida' WHERE ID = '$carroId'");
        $total = mysqli_query($conn, "UPDATE carros SET TOTAL = TIMEDIFF(SAIDA, ENTRADA) WHERE ID = '$carroId'");
        $query_valor1 = mysqli_query($conn, "SELECT ENTRADA, SAIDA FROM CARROS WHERE ID = '$carroId'");

    
        while ($row = mysqli_fetch_array($query_valor1)) {
            $valor = calcularValor("" . $row['ENTRADA'] . "", "" . $row['SAIDA'] . "");
            mysqli_query($conn, "UPDATE carros SET VALOR = $valor WHERE ID = '$carroId'");
        }

    } else {
        $datetimeSaida = date('Y-m-d', $dataEntrada) . " 23:00";

        $enviar = mysqli_query($conn, "UPDATE carros SET SAIDA = '$datetimeSaida' WHERE ID = '$carroId'");
        $total = mysqli_query($conn, "UPDATE carros SET TOTAL = TIMEDIFF(SAIDA, ENTRADA) WHERE ID = '$carroId'");
        $query_valor1 = mysqli_query($conn, "SELECT ENTRADA, SAIDA FROM CARROS WHERE ID = '$carroId'");

        while ($row = mysqli_fetch_array($query_valor1)) {
            $valor = calcularValor("" . $row['ENTRADA'] . "", "" . $row['SAIDA'] . "");
            mysqli_query($conn, "UPDATE carros SET VALOR = $valor WHERE ID = '$carroId'");
        }

        $total = mysqli_query($conn, "UPDATE carros SET TOTAL = 'GUINCHADO' WHERE ID = '$carroId'");
    }

    header('Location: ..\admin_pages\main.php');
}

elseif ($operacao == 'atualizacao') {

    $dias = 1;
    $data = date('Y-m-d');

    

    $horario_fechamento = new DateTime('23:00');

    $query = mysqli_query($conn, "SELECT * FROM CARROS WHERE SAIDA IS NULL AND DATE(ENTRADA) < '" . $data ."'");

    while($row = mysqli_fetch_array($query)) {

        $saida_obrigatoria = date('Y-m-d H:i', strtotime(substr($row['ENTRADA'], 0, 10) . "23:00"));

        $query_data_saida = mysqli_query($conn, "UPDATE CARROS SET SAIDA = '". $saida_obrigatoria  ."' WHERE ID = " . $row['ID']);
        $valor = calcularValor("" . $row['ENTRADA'] . "", "" . $saida_obrigatoria . "");

        $query_guincho = mysqli_query($conn, "UPDATE CARROS SET TOTAL = 'GUINCHADO' WHERE ID = " . $row['ID']);
        $query_guincho = mysqli_query($conn, "UPDATE CARROS SET VALOR = '$valor' WHERE ID = " . $row['ID']);
    }

    if (date('H:i') > $horario_fechamento) {

        $query = mysqli_query($conn, "SELECT * FROM CARROS 
        WHERE SAIDA IS NULL 
        AND DATE(ENTRADA) = '" . $data."'");

        while($row = mysqli_fetch_array($query)) {
            $query_guincho = mysqli_query($conn, "UPDATE CARROS SET SAIDA = '". $data ."', TOTAL = 'GUINCHADO' WHERE ID = " . $row['ID']);
        }

    }


    header('Location: ..\admin_pages\main.php');
}
