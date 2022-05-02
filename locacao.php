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
        $datafinal = $_POST["datafinal"] ?? NULL;
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
                $sql = "select l.id, c.nome, date_format(l.data, '%d-%m-%Y) data from locacao l
                    inner join cliente c on (c.id = l.cliente_id)";
            ?>
        </tbody>
    </table>
</main>
</body>
</html>