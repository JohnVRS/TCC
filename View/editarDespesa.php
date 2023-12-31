<?php
include_once("../Model/Connection.class.php");
include_once("../Model/Despesa.class.php");
include_once("../Controller/DespesaDAO.class.php");
include_once("../Controller/UsuarioDAO.class.php");
include_once("../Model/Usuario.class.php");

if (isset($_GET['codDesp']) && is_numeric($_GET['codDesp'])) {
    $cod_despesa = $_GET['codDesp'];
    //$cod_usuario = $_GET['cod_usuario'];

    //$daoUser = new UsuarioDAO();
    //$usuario = $daoUser->puxarDadosByCOD($cod_usuario);

    $daoDesp = new DespesaDAO();
    $despesa = $daoDesp->puxarDadosByCOD($cod_despesa);

    if ($despesa) {
        if (isset($_POST['editDespesa'])) {

            $valor = $_POST['valor'];
            $desc = $_POST['desc'];
            $date = $_POST['date'];
            $categoria = $_POST['categoria'];




            $despesa->setValor($valor);
            $despesa->setDescri($desc);
            $despesa->setData($date);
            $despesa->setCategoria($categoria);

            $daoDesp->editar($despesa);

            header("Location: sistema.php");
            exit();
        }
    } else {
        echo "Despesa não encontrada.";
    }
} else {
    echo "ID de despesa inválido.";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editando DESPESA...</title>

    <link rel="stylesheet" href="../CSS/editar.css">
</head>

<body>
<div class="container">
    <form action="" method="POST">
        <h2> Editar despesa</h2>
        <hr>
        <div class="coolinput">
            <label for="input" class="text">Valor R$:</label>
            <input type="text" name="valor" id="valorDesp" class="input" required value="<?php echo htmlspecialchars($despesa->getValor()); ?>">
        </div>
        <div class="coolinput">
            <label for="desc" class="text">Descrição: </label>
            <input type="text" name="desc" id="descDesp" class="input" value="<?php echo htmlspecialchars($despesa->getDescri()); ?>">
        </div>
        <input type="date" name="date" id="dataDesp" required value="<?php echo htmlspecialchars($despesa->getData()); ?>">
        <div class="select" style="width:100%;">
            <select name="categoria" id="" required>
                <option value="Outros">Selecione a categoria</option>
                <option value="Compras" <?php if ($despesa->getCategoria() === "Compras") echo "selected"; ?>>Compras</option>
                <option value="Comida" <?php if ($despesa->getCategoria() === "Comida") echo "selected"; ?>>Comida</option>
                <option value="Roupas" <?php if ($despesa->getCategoria() === "Roupas") echo "selected"; ?>>Roupas</option>
                <option value="Viagem" <?php if ($despesa->getCategoria() === "Viagem") echo "selected"; ?>>Viagem</option>
                <option value="Combustível" <?php if ($despesa->getCategoria() === "Combustível") echo "selected"; ?>>Combustível</option>
                <option value="Emergência" <?php if ($despesa->getCategoria() === "Emergência") echo "selected"; ?>>Emergência</option>
                <option value="Outros" <?php if ($despesa->getCategoria() === "Outros") echo "selected"; ?>>Outro</option>
            </select>
        </div>
        <br>
        <br>
        <div class="styleButtonsContainer">
            <button type="submit" name="editDespesa" class="styleButtons" id="salvarD"><span>SALVAR</span></button>
            <a href="../View/sistema.php" type="button" class="styleButtons" id="btnClose_Desp"><span>VOLTAR</span></a>
        </div>
    </form>
</div>



</body>

</html>