<?php 
    Class DespesaDAO {
        public function registrarDespesa($despesa) {
                    try{
                        $sql = "INSERT INTO despesa(cod_usuario,valor,descri,data) 
                                VALUES(:cod_usuario,:valor,:descri,:data)";
                        $p_sql = Connection::getInstance()->prepare($sql);

                        $p_sql->bindValue(':cod_usuario',$despesa->getCodUsuario());
                        $p_sql->bindValue(':valor',$despesa->getValor());
                        $p_sql->bindValue(':descri',$despesa->getDescri());
                        $p_sql->bindValue(':data',$despesa->getData());
                        

                        return $p_sql->execute();
                    } catch(Exception $e) {
                        echo "Erro ao registrar Despesa:".$e->getMessage();
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

    }

?> 