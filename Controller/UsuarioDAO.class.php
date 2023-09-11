<?php 
    Class UsuarioDAO {

        public function cadastrar($usuario) {
            try{
                $sql = "INSERT INTO usuario(nome,tel,sexo,nasc,email,senha) 
                        VALUES(:nome,:tel,:sexo,:nasc,:email,:senha)";
                $p_sql = Connection::getInstance()->prepare($sql);

                $p_sql->bindValue(':nome',$usuario->getNome());
                $p_sql->bindValue(':tel',$usuario->getTel());
                $p_sql->bindValue(':sexo',$usuario->getSexo());
                $p_sql->bindValue(':nasc',$usuario->getNasc());
                $p_sql->bindValue(':email',$usuario->getEmail());
                $p_sql->bindValue(':senha',$usuario->getSenha());

                return $p_sql->execute();
            } catch(Exception $e) {
                echo "Erro ao cadastrar usuário:".$e->getMessage();
            }
        }

        
    }
    
?> 