<?php 
    Class DespesaDAO {
        public function registrarDespesa($despesa) {
                    try{
                        $sql = "INSERT INTO despesa(cod_usuario,valor,descri,data,categoria) 
                                VALUES(:cod_usuario,:valor,:descri,:data,:categoria)";
                        $p_sql = Connection::getInstance()->prepare($sql);

                        $p_sql->bindValue(':cod_usuario',$despesa->getCodUsuario());
                        $p_sql->bindValue(':valor',$despesa->getValor());
                        $p_sql->bindValue(':descri',$despesa->getDescri());
                        $p_sql->bindValue(':data',$despesa->getData());
                        $p_sql->bindValue(':categoria',$despesa->getCategoria());

                        return $p_sql->execute();
                    } catch(Exception $e) {
                        echo "Erro ao registrar Despesa:".$e->getMessage();
                    }
        }

        public function puxarDadosByCOD($cod) {
            $conn = Connection::getInstance();
            $sql = "SELECT * FROM despesa WHERE cod = ?";
            $stmt = $conn->prepare($sql);
            
            $stmt->bindParam(1, $cod, PDO::PARAM_STR);
    
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC); 

            if ($result) {
                
                $despesa = new Despesa();
                $despesa->setCod($result['cod']);
                $despesa->setCodUsuario($result['cod_usuario']);
                $despesa->setValor($result['valor']);
                $despesa->setDescri($result['descri']);
                $despesa->setData($result['data']);
                $despesa->setCategoria($result['categoria']);

                return $despesa;
            } else {
                echo "Nenhum usuário encontrado.";
                return null;
            }
        }

        public function atualizarDespesa($usuario,$valor) {
            try {
                $valorAtual = $usuario->getDespesa();
                $valorNovo = $valorAtual + $valor;

                $sql = "UPDATE usuario SET despesa = :nova_despesa WHERE cod LIKE :cod_usuario";
                $p_sql = Connection::getInstance()->prepare($sql);

                $p_sql->bindValue(':nova_despesa',$valorNovo);
                $p_sql->bindValue(':cod_usuario',$usuario->getCod());

                return $p_sql->execute();
            } catch(Exception $e) {
                echo "Erro ao atualizar Despesa:".$e->getMessage();
            }
        }
        public function atualizarDespesa2($usuario,$valor) {
            try {
                $valorAtual = $usuario->getDespesa();
                $valorNovo = $valorAtual - $valor;

                $sql = "UPDATE usuario SET despesa = :nova_despesa WHERE cod LIKE :cod_usuario";
                $p_sql = Connection::getInstance()->prepare($sql);

                $p_sql->bindValue(':nova_despesa',$valorNovo);
                $p_sql->bindValue(':cod_usuario',$usuario->getCod());

                return $p_sql->execute();
            } catch(Exception $e) {
                echo "Erro ao atualizar Despesa:".$e->getMessage();
            }
        }



        public function listarDespesa($cod_usuario) {
            try {
                $sql = "SELECT * FROM despesa WHERE cod_usuario LIKE :cod";
                $p_sql = Connection::getInstance()->prepare($sql);
        
                $p_sql->bindValue(':cod', $cod_usuario);
                $p_sql->execute(); // Execute a consulta SQL
        
                $listaDespesa = $p_sql->fetchAll(PDO::FETCH_ASSOC); // Busque os resultados
                return $listaDespesa;
            } catch(Exception $e) {
                echo "Erro ao Consultar receitas: " . $e->getMessage();
            }
        }

        public function deletar($cod_deleted){
            try{
                $sql = "DELETE FROM despesa WHERE cod = :cod ";
                $p_sql = Connection::getInstance()->prepare($sql);
                $p_sql->bindValue(':cod',$cod_deleted);

                return $p_sql->execute();
            } catch(Exception $e){
                echo "Erro ao deletar registro de despesa".$e->getMessage();
            }
        }


    }

?> 