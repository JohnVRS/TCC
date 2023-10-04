<?php
include_once("../Model/Connection.class.php");
include_once("../Model/Receita.class.php");
include_once("../Controller/ReceitaDAO.class.php");
include_once("../Controller/UsuarioDAO.class.php");
include_once("../Model/Usuario.class.php");

if (isset($_GET['codRece']) && is_numeric($_GET['codRece'])) {
    $cod_receita = $_GET['codRece'];
    //$cod_usuario = $_GET['cod_usuario'];

    //$daoUser = new UsuarioDAO();
    //$usuario = $daoUser->puxarDadosByCOD($cod_usuario);

    $daoRece = new ReceitaDAO();
    $receita = $daoRece->puxarDadosByCOD($cod_receita);

    if ($receita) {
        if (isset($_POST['editReceita'])) {

            $valor = $_POST['valor'];
            $desc = $_POST['desc'];
            $date = $_POST['date'];
            $categoria = $_POST['categoria'];




            $receita->setValor($valor);
            $receita->setDescri($desc);
            $receita->setData($date);
            $receita->setCategoria($categoria);

            $daoRece->editar($receita);

            header("Location: sistema.php");
            exit();
        }
    } else {
        echo "Receita não encontrada.";
    }
} else {
    echo "ID de receita inválido.";
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editando RECEITA...</title>

    <link rel="stylesheet" href="../CSS/editar.css">
</head>

<body>
    <div class="container">
        <form action="" method="POST">
            <h2> Editar receita</h2>
            <hr>
            <div class="coolinput">
                <label for="input" class="text">Valor R$:</label>
                <input type="text" name="valor" id="valorDesp" class="input" required>
            </div>
            <div class="coolinput">
                <label for="desc" class="text">Descrição: </label>
                <input type="text" name="desc" id="descDesp" class="input">
            </div>
            <input type="date" name="date" id="dataDesp" required>
            <div class="select" style="width:100%;">
                <select name="categoria" id="" required>
                    <option value="Outros">Selecione a categoria</option>
                    <option value="Compras">Compras</option>
                    <option value="Comida">Comida</option>
                    <option value="Roupas">Roupas</option>
                    <option value="Viagem">Viagem</option>
                    <option value="Combustível">Combustível</option>
                    <option value="Emergência">Emergência</option>
                    <option value="Outros">Outro</option>
                </select>
            </div>
            <br>
            <br>
            <div class="styleButtonsContainer">
                <button type="submit" name="editReceita" class="styleButtons" id="salvarD"><span>SALVAR</span></button>
                <a href="../View/sistema.php" type="button" class="styleButtons" id="btnClose_Desp"><span>VOLTAR</span></a>
            </div>
        </form>


    </div>


</body>

</html>