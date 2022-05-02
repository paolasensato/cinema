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
    <form name="formDiretores" method="post" action="diretor.php">
            <label for="palavra">Palavra-chave:</label>
            <input type="text" name="palavra" id="palavra" required> 
            <button type="submit">Buscar</button>
    </form>
    <table>
        <thead>
                <tr>
                    <td>Foto</td>
                    <td>Id</td>
                    <td>Nome do Diretor</td>
                    <td>Opções</td>
                </tr>
        </thead>
        <tbody>
            <?php
                $palavra = trim( $_POST["palavra"] ?? NULL);
                echo "<p>Palavra digitada: {$palavra}</p>";
                $palavra = "%{$palavra}%";

                $sql = "select p.id, p.nome, p.foto
                from diretor d
                inner join pessoa p on (p.id = d.pessoa_id)
                where p.nome like :palavra
                group by p.id 
                order by p.nome";

                $consulta = $pdo->prepare($sql);

                $consulta->bindParam(":palavra", $palavra);

                $consulta->execute();

                while ($dados = $consulta->fetch(PDO::FETCH_OBJ)){
                    $id = $dados->id; 
                    $nome = $dados->nome;
                    $foto = $dados->foto;
                    ?>
                     <tr>
                         <td>
                             <img src="imagens/<?=$foto?>" width="80px">
                         </td>
                         <td><?=$id?></td>
                         <td><?=$nome?></td>
                         <td>
                            <a href="pessoafilme.php?id=<?=$id?>&tipo=diretor">Ver filmes</a>                               
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