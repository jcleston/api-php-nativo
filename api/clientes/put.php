<?php 

//Verifica se existe a rota
if ($acao == "" && $parametro == "") {
    echo json_encode(["ERRO" => "Rota não existe"]);
    exit;
}

if ($acao == "update" && $parametro == "") {
    echo json_encode(["ERRO" => "Registro vázio"]);
    exit;
}

if ($acao == "update" && $parametro != "") {
    array_shift($_POST);

    $sql = "UPDATE clientes SET ";
    $contador = 1;
    foreach (array_keys($_POST) as $indice) {
        if (count($_POST) > $contador) {
            $sql .= "{$indice} = '{$_POST[$indice]}', ";
        } else {
            $sql .= "{$indice} = '{$_POST[$indice]}' ";
        }
        $contador++;
    }

    $sql .= " WHERE id={$parametro}";
   
    $resultado = $conn->prepare($sql);
    $exec = $resultado->execute();

    if ($exec) {
        echo json_encode(["dados" => "Editado com sucesso!"]);
    } else {
        echo json_encode(["dados" => "Não Editado!"]);
    }
}