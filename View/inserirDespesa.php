<?php
    require_once("../Model/Usuario.class.php");
    require_once("../Model/Receita.class.php");
    require_once("../Model/Despesa.class.php");
    require_once("../Model/Connection.class.php");
    require_once("../Controller/UsuarioDAO.class.php");
    require_once("../Controller/DespesaDAO.class.php");
    require_once("../Controller/ReceitaDAO.class.php");

    if (isset($_GET['saveDespesa'])) {
        $cod_usuario = $_GET['cod_usuario'];
        
        $dao = new UsuarioDAO();
        $usuarioAtual = $dao->puxarDadosByCOD($cod_usuario);
       
        $valor = $_GET['inputDespesa'];
        $descricao = $_GET['desc'];
        $data = $_GET['dateDesp'];
    
        $despesaDAO = new DespesaDAO();
        $despesa = new Despesa($cod_usuario, $valor, $descricao, $data);
        
        if ($despesaDAO->registrarDespesa($despesa)) {
            
            $despesaDAO->atualizarDespesa($usuarioAtual,$valor);
            $dao->atualizarSaldo($usuarioAtual,$usuarioAtual->getReceita(),$usuarioAtual->getDespesa());

            echo "Despesa registrada com sucesso!";
            header("Location: sistema.php");
            
        } else {
            echo "Erro ao registrar despesa.";
        }
    }
    
    
?>
