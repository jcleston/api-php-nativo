<?php

//Verifica se existe a rota
if ($acao == "" && $parametro == "") {
    echo json_encode(["ERRO" => "Rota não existe"]);
    exit;
}

//Retonar todos os registros
if ($acao == "lista" && $parametro == "") {
    $sql = "SELECT * FROM clientes ORDER BY nome";
    $resultado = $conn->prepare($sql);
    $resultado->execute();
    $objeto = $resultado->fetchAll(PDO::FETCH_ASSOC);

    if ($objeto) {
        echo json_encode(["dados" => $objeto]);
    } else {
        echo json_encode(["dados" => "Vazio"]);
    }
}

//Retonar um único registros
if ($acao == "lista" && $parametro != "") {
    $sql = "SELECT * FROM clientes WHERE id={$parametro}";
    $resultado = $conn->prepare($sql);
    $resultado->execute();
    $objeto = $resultado->fetchObject();

    if ($objeto) {
        echo json_encode(["dados" => $objeto]);
    } else {
        echo json_encode(["dados" => "Vazio"]);
    }
}
