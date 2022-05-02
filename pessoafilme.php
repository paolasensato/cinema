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
        
        //recuperar o id enviado da página
        $id = trim ($_GET["id"] ?? NULL);
        $tipo = trim ($_GET["tipo"] ?? NULL);

        if ($tipo == "ator") {
            //sql para selecionar o ator
            $sql = "select p.id, p.nome, p.foto
                from ator a
                inner join pessoa p on (p.id = a.pessoa_id)
                where p.id = :id limit 1";
            $consultaAtor = $pdo->prepare($sql); 
            $consultaAtor->bindParam(":id", $id);
            $consultaAtor->execute();

            $dados = $consultaAtor->fetch(PDO::FETCH_OBJ);

            $titulo = "Dados do ator: {$dados->nome}";
        }else{  
            $sql = "select p.id, p.nome, p.foto
                from diretor d
                inner join pessoa p on (p.id = d.pessoa_id)
                where p.id = :id limit 1";
            $consultaDiretor =  $pdo->prepare($sql); 
            $consultaDiretor->bindParam(":id", $id);
            $consultaDiretor->execute();

            $dados = $consultaDiretor->fetch(PDO::FETCH_OBJ);

            $titulo = "Dados do diretor: {$dados->nome}";
        }
        
    ?>
    <main>
        <h1><?=$titulo?></h1>

        <img src="imagens/<?=$dados->foto?>" width="200px">
        
        <table>
            <thead>
                <tr>
                    <td>Capa do filme</td>
                    <td>Nome do filme</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    if ( $tipo == "ator") {
                        $sql = "select f.titulo, f.original, f.capa
                        from filme f
                        inner join ator a on (a.filme_id = f.id)
                        where a.pessoa_id = :id
                        order by f.titulo";
                    }else{
                        $sql = "select f.titulo, f.original, f.capa
                        from filme f
                        inner join diretor d on (d.filme_id = f.id)
                        where d.pessoa_id = :id
                        order by f.titulo";
                    }
                    $consultaFilme =  $pdo->prepare($sql); 
                    $consultaFilme->bindParam(":id", $id);
                    $consultaFilme->execute();

                    while( $dadosFilme = $consultaFilme->fetch (PDO::FETCH_OBJ)){
                        //separar os dados
                        $capa = $dadosFilme->capa;
                        $titulo = $dadosFilme->titulo;
                        $original = $dadosFilme->original;
                    }
                    ?>
                    <tr>
                        <td><img src="imagens/<?=$capa?>" width="80px"></td>
                        <td>
                            <?=$titulo?><br>
                            (<?=$original?>)
                        </td>
                    </tr>
                    <?php
                ?>
            </tbody>
        </table>
    </main>
</body>
</html>