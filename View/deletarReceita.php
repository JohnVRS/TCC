<?php 
    include_once("../Model/Connection.class.php");
    include_once("../Model/Receita.class.php");
    include_once("../Controller/ReceitaDAO.class.php");
    include_once("../Controller/UsuarioDAO.class.php");
    include_once("../Model/Usuario.class.php");

    $cod_deleted = $_GET['id'];
    $cod_usuarioAtual = $_GET['cod'];

    $userDao = new UsuarioDAO();
    $usuario = $userDao->puxarDadosByCOD($cod_usuarioAtual);

    
    $TotReceita = $usuario->getReceita();

    

    $daoDelete = new ReceitaDAO();
    $receita = $daoDelete->puxarDadosByCOD($cod_deleted);

    $valorReceita = $receita->getValor();

    
    if($daoDelete->deletar($cod_deleted)){

        
        $daoDelete->atualizarReceita2($usuario,$valorReceita);

        $daoDelete->deletar($cod_deleted);
        header("Location: login.php");
        
    } else {
        echo "Erro ao deletar registro.";
    }

?>