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
    <form name="formFilmes" method="post" action="filme.php">
            <h1>Relatório de Filmes</h1>
            <label for="palavra">Palavra-chave:</label>
            <input type="text" name="palavra" id="palavra" required> 
            <button type="submit">Buscar</button>
    </form>
    <table>
        <thead>
                <tr>
                    <td>Id</td>
                    <td>Capa</td>
                    <td>Título</td>
                    <td>Categoria</td>
                    <td>Original</td>
                    <td>Opções</td>
                </tr>
        </thead>
        <tbody>
            <?php
                $palavra = trim( $_POST["palavra"] ?? NULL);
                echo "<p>Palavra digitada: {$palavra}</p>";
                $palavra = "%{$palavra}%";

                $sql = "select f.id, f.capa, f.titulo, c.categoria, f.original
                    from filme f
                    inner join categoria c on (c.id= f.categoria_id)
                    where f.titulo like :palavra
                    or f.original like :palavra
                    order by f.titulo";

                $consulta = $pdo->prepare($sql);

                $consulta->bindParam(":palavra", $palavra);

                $consulta->execute();

                while ($dados = $consulta->fetch(PDO::FETCH_OBJ)){
                    $id = $dados->id; 
                    $capa = $dados->capa;
                    $titulo = $dados->titulo;
                    $categoria = $dados->categoria;
                    $original = $dados->original;
                    ?>
                     <tr>
                         <td><?=$id?></td>
                         <td>
                             <img src="imagens/<?=$capa?>" width="80px">
                         </td>
                         <td><?=$titulo?></td>
                         <td><?=$categoria?></td>
                         <td><?=$original?></td>
                         <td>
                            <a href = "detalhesFilme.php?id=<?=$id?>">
                                Ver Detalhes
                            </a>
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