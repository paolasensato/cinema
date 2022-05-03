<?php require "conecta.php" ; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatórios</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        require "menu.php";
    ?>
    <main>
    <form name="formLocacao" method="post" action="locacao.php">
            <label for="datainicial">Data inicial:</label>
            <input type="date" name="datainicial" id="datainicial" required>
            <label for="datafinal">Data final:</label>
            <input type="date" name="datafinal" id="datafinal" required>
            <button type="submit">Pesquisar</button>
    </form>
    <?php
        $data = date('Y-m-d');
        //recuperar as datas digitadas
        $datainicial = $_POST["datainicial"] ?? $data;
        $datafinal = $_POST["datafinal"] ?? $data;
    ?>
    <p> Intervalo de datas: <?=$datainicial?> e <?=$datafinal?></p>
    <table>
        <thead>
            <td>Id</td>
            <td>Cliente</td>
            <td>Data</td>
            <td>Filmes Locados</td>
        </thead>
        <tbody>
            <?php
                $sql = "select l.id, c.nome, date_format(l.data, '%d-%m-%Y') data from locacao l
                    inner join cliente c on (c.id = l.cliente_id)
                    where l.data between :datainicial and :datafinal
                    order by l.data desc";
                    $consultaLocacao = $pdo->prepare($sql);
                    $consultaLocacao->bindParam(":datainicial", $datainicial);
                    $consultaLocacao->bindParam(":datafinal", $datafinal);
                    $consultaLocacao->execute();
                    while ($locacao = $consultaLocacao->fetch(PDO::FETCH_OBJ)) {
                        //separar os dados 
                        $id = $locacao->id;
                        $data = $locacao->data;
                        $nome = $locacao->nome;
                        ?>
                            <tr>
                                <td><?=$id?></td>
                                <td><?=$nome?></td>
                                <td><?=$data?></td>
                                <td>
                                    <?php
                                    $sql= "select f.titulo from filme_locacao fl
                                    inner join filme f on (f.id = fl.filme_id)
                                    where fl.locacao_id = :id 
                                    order by f.titulo";
                                    $consultaFilmes = $pdo->prepare($sql);
                                    $consultaFilmes->bindParam(":id", $id);
                                    $consultaFilmes->execute();
                                    while ($filmes = $consultaFilmes->fetch(PDO::FETCH_OBJ)){
                                        $titulo = $filmes->titulo;
                                        ?>
                                        <p><?=$titulo?></p>
                                        <?php
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php
                    }
            ?>
        </tbody>
    </table>
</main>
</body>
</html>