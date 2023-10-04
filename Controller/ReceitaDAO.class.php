<?php 
    Class ReceitaDAO {
        public function registrarReceita($receita) {
                    try{
                        $sql = "INSERT INTO receita(cod_usuario,valor,descri,data,categoria) 
                                VALUES(:cod_usuario,:valor,:descri,:data,:categoria)";
                        $p_sql = Connection::getInstance()->prepare($sql);

                        $p_sql->bindValue(':cod_usuario',$receita->getCodUsuario());
                        $p_sql->bindValue(':valor',$receita->getValor());
                        $p_sql->bindValue(':descri',$receita->getDescri());
                        $p_sql->bindValue(':data',$receita->getData());
                        $p_sql->bindValue(':categoria',$receita->getCategoria());

                        return $p_sql->execute();
                    } catch(Exception $e) {
                        echo "Erro ao registrar Receita:".$e->getMessage();
                    }
        }
        
        public function puxarDadosByCOD($cod) {
            $conn = Connection::getInstance();
            $sql = "SELECT * FROM receita WHERE cod = ?";
            $stmt = $conn->prepare($sql);
            
            $stmt->bindParam(1, $cod, PDO::PARAM_STR);
    
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC); 

            if ($result) {
                
                $receita = new Receita();
                $receita->setCod($result['cod']);
                $receita->setCodUsuario($result['cod_usuario']);
                $receita->setValor($result['valor']);
                $receita->setDescri($result['descri']);
                $receita->setData($result['data']);
                $receita->setCategoria($result['categoria']);

                return $receita;
            } else {
                echo "Nenhum usuário encontrado.";
                return null;
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
        public function atualizarReceita2($usuario,$valor) {
            try {
                $valorAtual = $usuario->getReceita();
                $valorNovo = $valorAtual - $valor;

                $sql = "UPDATE usuario SET receita = :nova_receita WHERE cod LIKE :cod_usuario";
                $p_sql = Connection::getInstance()->prepare($sql);

                $p_sql->bindValue(':nova_receita',$valorNovo);
                $p_sql->bindValue(':cod_usuario',$usuario->getCod());

                return $p_sql->execute();
            } catch(Exception $e) {
                echo "Erro ao atualizar Receita:".$e->getMessage();
            }
        }
        public function listarReceita($cod_usuario) {
            try {
                $sql = "SELECT * FROM receita WHERE cod_usuario LIKE :cod";
                $p_sql = Connection::getInstance()->prepare($sql);
        
                $p_sql->bindValue(':cod', $cod_usuario);
                $p_sql->execute(); 
        
                $listaReceita = $p_sql->fetchAll(PDO::FETCH_ASSOC); 
                return $listaReceita;
            } catch(Exception $e) {
                echo "Erro ao Consultar receitas: " . $e->getMessage();
            }
        }
        public function editar($receita){
            try {
                $sql = "UPDATE receita SET valor = :novo_valor, descri = :nova_descri, data = :nova_data, categoria = :nova_categoria WHERE cod = :cod";
                $p_sql = Connection::getInstance()->prepare($sql);

                $p_sql->bindValue(":novo_valor",$receita->getValor());
                $p_sql->bindValue(":nova_descri",$receita->getDescri());
                $p_sql->bindValue(":nova_data",$receita->getData());
                $p_sql->bindValue(":nova_categoria",$receita->getCategoria());
                $p_sql->bindValue(':cod', $receita->getCod());

                if ($p_sql->execute()) {
                    return true;
                } else {
                   
                    var_dump($p_sql->errorInfo()); 
                    return false;
                }
                
            } catch(Exception $e) {
                echo"Erro ao editar e atualizar Registro".$e->getMessage();
            }
        }

        public function deletar($cod_deleted){
            try{
                $sql = "DELETE FROM receita WHERE cod = :cod ";
                $p_sql = Connection::getInstance()->prepare($sql);
                $p_sql->bindValue(':cod',$cod_deleted);

                return $p_sql->execute();
            } catch(Exception $e){
                echo "Erro ao deletar registro de receita".$e->getMessage();
            }
        }
        

    }

?> 