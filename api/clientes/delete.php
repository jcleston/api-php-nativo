<?php

//Verifica se existe a rota
if ($acao == "" && $parametro == "") {
    echo json_encode(["ERRO" => "Rota não existe"]);
    exit;
}

if ($acao == "delete" && $parametro == "") {
    echo json_encode(["ERRO" => "Registro vázio"]);
    exit;
}

if ($acao == "delete" && $parametro != "") {

    $sql = "DELETE FROM clientes WHERE id = {$parametro}";
    $resultado = $conn->prepare($sql);
    $exec = $resultado->execute();

    if ($exec) {
        echo json_encode(["dados" => "Excluído com sucesso!"]);
    } else {
        echo json_encode(["dados" => "Não Excluído!"]);
    }
}
