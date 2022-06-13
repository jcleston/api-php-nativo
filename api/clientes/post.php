<?php

//Verifica se existe a rota
if ($acao == "" && $parametro == "") {
    echo json_encode(["ERRO" => "Rota não existe"]);
    exit;
}

if ($acao == "adiciona" && $parametro == "") {
    $sql = "INSERT INTO clientes (";

    $contador = 1;
    foreach (array_keys($_POST) as $indice) {
        if (count($_POST) > $contador) {
            $sql .= "{$indice},";
        } else {
            $sql .= "{$indice}";
        }
        $contador++;
    }

    $sql .= ") VALUES (";

    $contador = 1;
    foreach (array_values($_POST) as $valor) {
        if (count($_POST) > $contador) {
            $sql .= "'{$valor}', ";
        } else {
            $sql .= "'{$valor}' ";
        }
        $contador++;
    }

    $sql .= ")";
    
    $resultado = $conn->prepare($sql);
    $exec = $resultado->execute();

    if ($exec) {
        echo json_encode(["dados" => "Cadastrado com sucesso!"]);
    } else {
        echo json_encode(["dados" => "Não cadastrado!"]);
    }

}
