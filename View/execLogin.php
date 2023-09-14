<?php 
    require_once("../Model/Usuario.class.php");
    require_once("../Controller/UsuarioDAO.class.php");
    require_once("../Model/Connection.class.php");

    session_start();

    if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])){
        
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        
        $conn = Connection::getInstance();
        $sql = "SELECT * FROM usuario WHERE email = ? AND senha = ?";
        $stmt = $conn->prepare($sql);
        
        $stmt->bindParam(1, $email, PDO::PARAM_STR);
        $stmt->bindParam(2, $senha, PDO::PARAM_STR);

        
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;


            header('Location: sistema.php');
            echo "Usuário encontrado!";
        } else {
            unset($_SESSION['email']);
            unset($_SESSION['senha']);

            header('Location: login.php');
            echo "Nenhum usuário encontrado.";
        }
        
    } else {
        header('Location: login.php');
    }
?>