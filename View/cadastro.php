<?php
    require_once("../Model/Connection.class.php");
    require_once("../Model/Usuario.class.php");
    require_once("../Controller/UsuarioDAO.class.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Cadastro</title>

    <link rel="stylesheet" href="../CSS/cadastro.css">
</head>
<body>
    <div class="tela-cadastro">
        <form action="cadastro.php" method="POST">
            <fieldset>
                <legend><strong>Cadastro</strong></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelInput">Nome completo</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" required>
                    <label for="email" class="labelInput">Email</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" required>
                    <label for="telefone" class="labelInput">Telefone</label>
                </div>
                <br>
                <p>Sexo:</p>
                <input type="radio" name="genero" id="feminino" value="feminino" required>
                <label for="feminino">Feminino</label>
                <br>
                <input type="radio" name="genero" id="masculino" value="masculino" required>
                <label for="masculino">Masculino</label>
                <br>
                <input type="radio" name="genero" id="outro" value="outro" required>
                <label for="outro">Outro</label>
                <br><br>

                    <label for="data_nasc"><strong>Data de Nascimento:</strong></label>
                    <input type="date" name="data_nasc" id="data_nasc"  required>
                

                <br><br>
                <div class="inputBox">
                    <input type="text" name="estado" id="estado" class="inputUser" required>
                    <label for="estado" class="labelInput">Estado</label>
                </div>
                <br><br>
                <input type="submit"  name="submit" value="Enviar" id="button">

            </fieldset>
                <?php 
                    if($_SERVER['REQUEST_METHOD'] == 'POST'){
                        $usuario = new Usuario();

                        $usuario->setNome($_POST['nome']);
                        $usuario->setTele($_POST['telefone']);
                        $usuario->setNasc($_POST['data_nasc']);
                        $usuario->setEstado($_POST['estado']);
                        $usuario->setSexo($_POST['genero']);
                        $usuario->setEmail($_POST['email']);

                        $DAO = new UsuarioDAO();
                        $DAO->cadastrar($usuario);
                    }
                
                
                ?>




        </form>
    </div>

</body>
</html>