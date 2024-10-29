<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Acadêmico</title>
</head>
<body>
    <h1>Sistema Acadêmico - Cadastro de Aluno</h1>
    <a href="alunos.php">Voltar para a listagem</a>
    <form action="salvarAluno.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $aluno->getId(); ?>">
        <input type="text" name="nome" value="<?php echo $aluno->getNome(); ?>" placeholder="Nome:">
        <br>
        <input type="text" name="matricula" value="<?php echo $aluno->getMatricula(); ?>" placeholder="Matrícula:">
        <br>
        <label for="foto">Foto:</label>
        <input type="file" name="foto" value="<?php echo $aluno->getFoto(); ?>">
        <br>
        <button type="submit">Salvar</button>
    </form>
</body>
</html>