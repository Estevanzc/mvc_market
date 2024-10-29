<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Acadêmico</title>
</head>
<body>
    <h1>Sistema Acadêmico - Usuarios</h1>
    <a href="usuario.php">Incluir novo</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Foto</th>
            <th>Login</th>
            <th>Ações</th>
        </tr>
        <?php foreach($usuarios as $usuario) { ?>
            <tr>
                <td><?php echo $usuario->getId(); ?></td>
                <td><?php if ($usuario->getFoto()) {
                        ?>
                        <img src="uploads/<?php echo($usuario->getFoto());?>" alt="<?php echo($usuario->getNome())?>" style="max-width: 200px;">
                        <?php
                    } else {
                        echo("none");
                    }
                ?></td>
                <td><?php echo $usuario->getLogin(); ?></td>
                <td>
                    <a href="usuario.php?id=<?php echo $usuario->getId(); ?>">Editar</a>
                    <br>
                    <a href="excluirUsuario.php?id=<?php echo $usuario->getId(); ?>">Excluir</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>