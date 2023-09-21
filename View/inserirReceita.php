<?php
    require_once("../Model/Usuario.class.php");
    require_once("../Model/Receita.class.php");
    require_once("../Model/Despesa.class.php");
    require_once("../Model/Connection.class.php");
    require_once("../Controller/UsuarioDAO.class.php");
    require_once("../Controller/DespesaDAO.class.php");
    require_once("../Controller/ReceitaDAO.class.php");

    if (isset($_GET['saveReceita'])) {
        
        $cod_usuario = $_GET['cod_usuario'];
    
       
        $valor = $_GET['inputReceita'];
        $descricao = $_GET['descRece'];
        $data = $_GET['dateRece'];
    
      
        $receitaDAO = new ReceitaDAO();
        $receita = new Receita($cod_usuario, $valor, $descricao, $data);

        
        if ($receitaDAO->registrarReceita($receita)) {
            
            echo "Despesa registrada com sucesso!";
            header("Location: sistema.php");
            
        } else {
            echo "Erro ao registrar despesa.";
        }
    }
    
    
?>
