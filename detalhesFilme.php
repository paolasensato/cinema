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
        <?php
            //recuperar o id
            $id = trim ( $_GET["id"] ?? NULL );
            //sql seleciona os dados do filme
            $sql = "SELECT * FROM filme WHERE id = :id LIMIT 1";
            $consultaFilme = $pdo->prepare($sql);
            $consultaFilme->bindParam(":id", $id);
            $consultaFilme->execute();

            $dadosFilme = $consultaFilme->fetch(PDO::FETCH_OBJ);
        ?>

        <h1><?=$dadosFilme->titulo?></h1>

        <table>
            <tbody>
                <tr>
                    <td>
                        <img src="imagens/<?=$dadosFilme->capa?>"width="120px">
                    </td>
                    <td>
                        <p>Nome original: <?=$dadosFilme->original?></p>
                        <p>Ano de lançamento: <?=$dadosFilme->ano?></p>
                        <p><?=$dadosFilme->sinopse?></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <h2>Diretor(es) do filme:</h2>
        <?php
            $sql = "select p.nome, p.id from diretor d
                inner join pessoa p on (p.id = d.pessoa_id)
                where d.filme_id = :id";
            $consultaDiretor = $pdo->prepare($sql);
            $consultaDiretor->bindParam(":id", $id);
            $consultaDiretor->execute();

            while( $dadosDiretor = $consultaDiretor->fetch(PDO::FETCH_OBJ) ) {
                echo "<p><a href='pessoafilme.php?id={$dadosDiretor->id}&tipo=diretor'>
                {$dadosDiretor->nome}</a></p>";
            }
        ?>
        <h2>Ator(es) do filme:</h2>
        <?php
            $sql = "select p.nome, p.id from ator a
                inner join pessoa p on (p.id = a.pessoa_id)
                where a.filme_id = :id";
            $consultaAtor = $pdo->prepare($sql);
            $consultaAtor->bindParam(":id", $id);
            $consultaAtor->execute();

            while( $dadosAtor = $consultaAtor->fetch(PDO::FETCH_OBJ) ) {
                echo "<p><a href='pessoafilme.php?id={$dadosAtor->id}&tipo=ator'>
                {$dadosAtor->nome}</a></p>";                        
            }
        ?>

    </main>
</body>
</html>