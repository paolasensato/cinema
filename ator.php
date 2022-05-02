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
        <h1>Relatórios de Atores</h1>
        <form name="formAtores" method="post" action="ator.php">
            <label for="palavra">Palavra-chave:</label>
            <input type="text" name="palavra" id="palavra" required> 
            <button type="submit">Buscar</button>
        </form>

        <table>
            <thead>
                <tr>
                    <td>Foto</td>
                    <td>Id</td>
                    <td>Nome do Ator</td>
                    <td>Opções</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    //recuperar variavel enviada
                    $palavra = trim( $_POST["palavra"] ?? NULL);
                    echo "<p>Palavra digitada: {$palavra}</p>";
                    $palavra = "%{$palavra}%";

                    $sql = "select p.id, p.nome, p.foto
                    from ator a
                    inner join pessoa p on (p.id = a.pessoa_id)
                    where p.nome like :palavra
                    group by p.id 
                    order by p.nome";
                    //preparar o sql para a execução
                    $consulta = $pdo->prepare($sql);
                    //passar os parametros
                    $consulta->bindParam(":palavra", $palavra);
                    //executar o sql
                    $consulta->execute();

                    while ($dados = $consulta->fetch(PDO::FETCH_OBJ)){
                       //separar os dados
                       $id = $dados->id; 
                       $nome = $dados->nome;
                       $foto = $dados->foto;
                       ?>
                        <tr>
                            <td><img src="imagens/<?=$foto?>" width="80px"></td>
                            <td><?=$id?></td>
                            <td><?=$nome?></td>
                            <td>
                                <a href="pessoafilme.php?id=<?=$id?>&tipo=ator"> Ver filmes</a>                               
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