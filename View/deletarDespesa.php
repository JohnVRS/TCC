<?php 
    include_once("../Model/Connection.class.php");
    include_once("../Model/Despesa.class.php");
    include_once("../Controller/DespesaDAO.class.php");
    include_once("../Controller/UsuarioDAO.class.php");
    include_once("../Model/Usuario.class.php");

    $cod_deleted = $_GET['id'];
    $cod_usuarioAtual = $_GET['cod'];

    $userDao = new UsuarioDAO();
    $usuario = $userDao->puxarDadosByCOD($cod_usuarioAtual);

    
    $TotDespesas = $usuario->getDespesa();

    echo"$TotDespesas";

    $daoDelete = new DespesaDAO();
    $despesa = $daoDelete->puxarDadosByCOD($cod_deleted);

    $valorDespesa = $despesa->getValor();

    
    if($daoDelete->deletar($cod_deleted)){

        
        $daoDelete->atualizarDespesa2($usuario,$valorDespesa);

        $daoDelete->deletar($cod_deleted);

        
    } else {
        echo "Erro ao deletar registro.";
    }

?>