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
                        echo "Erro ao registrar Despesa:".$e->getMessage();
                    }
                }
    }

?> 