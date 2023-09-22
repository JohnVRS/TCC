<?php 
    Class ReceitaDAO {
        public function registrarReceita($receita) {
                    try{
                        $sql = "INSERT INTO receita(cod_usuario,valor,descri,data) 
                                VALUES(:cod_usuario,:valor,:descri,:data)";
                        $p_sql = Connection::getInstance()->prepare($sql);

                        $p_sql->bindValue(':cod_usuario',$receita->getCodUsuario());
                        $p_sql->bindValue(':valor',$receita->getValor());
                        $p_sql->bindValue(':descri',$receita->getDescri());
                        $p_sql->bindValue(':data',$receita->getData());
                        

                        return $p_sql->execute();
                    } catch(Exception $e) {
                        echo "Erro ao registrar Receita:".$e->getMessage();
                    }
        }
        public function atualizarReceita($usuario,$valor) {
            try {

                $valorAtual = $usuario->getReceita();
                $valorNovo = $valorAtual + $valor;

                $sql = "UPDATE usuario SET receita = :nova_receita WHERE cod LIKE :cod_usuario";
                $p_sql = Connection::getInstance()->prepare($sql);

                $p_sql->bindValue(':nova_receita',$valorNovo);
                $p_sql->bindValue(':cod_usuario',$usuario->getCod());

                return $p_sql->execute();
            } catch(Exception $e) {
                echo "Erro ao atualizar Receita:".$e->getMessage();
            }
        }

    }

?> 