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

        public function puxarDados($email ,$senha) {
            $conn = Connection::getInstance();
            $sql = "SELECT * FROM usuario WHERE email = ? AND senha = ?";
            $stmt = $conn->prepare($sql);
            
            $stmt->bindParam(1, $email, PDO::PARAM_STR);
            $stmt->bindParam(2, $senha, PDO::PARAM_STR);

        
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC); // Use fetch em vez de fetchAll, pois esperamos apenas um resultado.

            if ($result) {
                // Criar e retornar um objeto Usuario com os dados encontrados
                $usuario = new Usuario();
                $usuario->setCod($result['cod']);
                $usuario->setNome($result['nome']);
                $usuario->setTele($result['tel']);
                $usuario->setSexo($result['sexo']);
                $usuario->setNasc($result['nasc']);
                $usuario->setEmail($result['email']);
                $usuario->setSenha($result['senha']);
                $usuario->setSaldo($result['saldo']);
                $usuario->setDespesa($result['despesa']);
                $usuario->setReceita($result['receita']);

                return $usuario;
            } else {
                echo "Nenhum usuário encontrado.";
                return null;
            }

        }
        public function puxarDadosByCOD($cod) {
            $conn = Connection::getInstance();
            $sql = "SELECT * FROM usuario WHERE cod = ?";
            $stmt = $conn->prepare($sql);
            
            $stmt->bindParam(1, $cod, PDO::PARAM_STR);
    
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC); // Use fetch em vez de fetchAll, pois esperamos apenas um resultado.

            if ($result) {
                // Criar e retornar um objeto Usuario com os dados encontrados
                $usuario = new Usuario();
                $usuario->setCod($result['cod']);
                $usuario->setNome($result['nome']);
                $usuario->setTele($result['tel']);
                $usuario->setSexo($result['sexo']);
                $usuario->setNasc($result['nasc']);
                $usuario->setEmail($result['email']);
                $usuario->setSenha($result['senha']);
                $usuario->setSaldo($result['saldo']);
                $usuario->setDespesa($result['despesa']);
                $usuario->setReceita($result['receita']);

                return $usuario;
            } else {
                echo "Nenhum usuário encontrado.";
                return null;
            }

        }
        public function atualizarSaldo($usuario,$valorReceita,$valorDespesa){
            try {
                $saldo = $valorReceita - $valorDespesa;

                $sql = "UPDATE usuario SET saldo = :saldo WHERE cod LIKE :cod_usuario";
                $p_sql = Connection::getInstance()->prepare($sql);

                $p_sql->bindValue(':saldo',$saldo);
                $p_sql->bindValue(':cod_usuario',$usuario->getCod());

                return $p_sql->execute();
            } catch(Exception $e) {
                echo "Erro ao atualizar o saldo geral:".$e->getMessage();
            }

        }

        
    }
    
?> 