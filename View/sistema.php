<?php 

    require_once("../Model/Usuario.class.php");
    require_once("../Model/Receita.class.php");
    require_once("../Model/Despesa.class.php");
    require_once("../Model/Connection.class.php");
    require_once("../Controller/UsuarioDAO.class.php");
    require_once("../Controller/DespesaDAO.class.php");
    require_once("../Controller/ReceitaDAO.class.php");
    
    
    session_start();
    
    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true )){
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header("Location: login.php");
    } else {
        $email = $_SESSION['email'];
        $senha = $_SESSION['senha'];

        $logado = $email;
        $dao = new UsuarioDAO;
        $usuarioAtual = $dao->puxarDados($email,$senha);
        
        $name = $usuarioAtual->getNome();
        $cod_usuarioAtual = $usuarioAtual->getCod();
        $valorReceita = $usuarioAtual->getReceita();    
        $valorDespesa = $usuarioAtual->getDespesa();
        $valorSaldo = $usuarioAtual->getSaldo();
        $dao->atualizarSaldo($usuarioAtual,$valorReceita,$valorDespesa);
    };
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>

    <link rel="stylesheet" href="../CSS//index/body.css">
    <link rel="stylesheet" href="../CSS/index/dashboard_saldos.css">
    <link rel="stylesheet" href="../CSS/modal.css">
    <link rel="stylesheet" href="../CSS/index/table.css">
    <link rel="stylesheet" href="../CSS/index/footer.css">
    <link rel="stylesheet" href="../CSS/index/logo.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,400;6..12,500;6..12,700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">

</head>
<body>
    <div id="auxiliar"> <a href="sistema.php"><img src="../src/home.png" alt=""></a> <a href=""><img src="../src/profile.png" alt=""></a> <a href="sair.php"><img src="../src/sair.png" alt="Sair"></a></div>
    <div class="container">
        <div id="logo">
            
        </div>
        <div class="dashboard">
                <div class="receita-desp">

                    <div class="congrats">
                            <p> <small style="font-size: 18px;color: rgb(82, 82, 82);">Boa tarde,</small><br>
                                                    <?php echo"$name!" ?>
                            </p>
                    </div>

                    <div class="container-rc">
                        <div class="valores">
                            <p>Despesas
                            </p>
                            <p id="despesas-Global">R$<?php echo number_format($valorDespesa, 2, ',', '.'); ?></p>
                        </div>
                        <div class="valores">
                            <p>Receitas
                            </p>
                            <p id="receitas-Global">R$<?php echo number_format($valorReceita, 2, ',', '.'); ?></p>
                        </div>
                    </div>
                    
                </div>
                
                <div class="saldo">
                    <p>Saldo geral</p>
                    <p id="saldo-Global">R$<?php echo number_format($valorSaldo, 2, ',', '.'); ?></p> 
                </div>

                <div class="buttons">   
                    <button id="botaoDespesa"> <img src="../src/minus.png" alt="">Despesa</button> 
                    <button id="botaoReceita"> <img src="../src/plus.png" alt="">Receita</button>
                </div>
            
                    <dialog class="modal" id="modalDesp" > 
                        <form action="inserirDespesa.php" method="get">
                            <h2> Inserir despesa</h2>
                            <hr>
                            <div class="coolinput">
                                <label for="input" class="text">Valor R$:</label>
                                <input type="text" name="inputDespesa" id="valorDesp" class="input" required>
                            </div>
                            <div class="coolinput">
                                <label for="desc" class="text">Descrição: </label>
                                <input type="text" name="desc" id="descDesp" class="input" >
                            </div>
                            <input type="date" name="dateDesp" id="dataDesp" required>
                            <select name="categoriaDesp" id="" required>
                                    <option value="Outros">Selecione a categoria</option>
                                    <option value="Compras">Compras</option>
                                    <option value="Comida">Comida</option>
                                    <option value="Roupas">Roupas</option>
                                    <option value="Viagem">Viagem</option>
                                    <option value="Combustível">Combustível</option>
                                    <option value="Emergência">Emergência</option>
                                    <option value="Outros">Outro</option>
                            </select>
                            <input type="hidden" name="cod_usuario" value="<?php echo $cod_usuarioAtual;?>">
                            <br>
                            <br>
                            <div class="styleButtonsContainer">
                                <button type="submit" name="saveDespesa" class="styleButtons" id="salvarD" ><span>SALVAR</span></button>
                                <button type="button" class="styleButtons" id="btnClose_Desp" ><span>FECHAR</span></button>
                            </div>
                        </form>
                    </dialog>
                    
                    <dialog class="modal" id="modalRece" > 
                        <form action="inserirReceita.php" method="get">
                            <h2> Inserir Receita</h2>
                            <hr>
                            <div class="coolinput">
                                <label for="input" class="text">Valor R$:</label>
                                <input type="text" name="inputReceita" id="valorRece" class="input" required>
                            </div>
                            <div class="coolinput">
                                <label for="desc" class="text">Descrição: </label>
                                <input type="text" name="descRece" id="descRece" class="input">
                            </div>
                            <input type="date" name="dateRece" id="dataRece" required>
                            <div class="select" style="width:100%;">
                                <select name="categoriaRece" id="" required>
                                            <option value="Outros">Selecione a categoria</option>
                                            <option value="Salário">Salário</option>
                                            <option value="Renda Extra">Renda Extra</option>
                                            <option value="Retorno Investimentos">Retorno Investimentos</option>
                                            <option value="Outros">Outro</option>
                                </select>
                           </div>
                            
        
                            <input type="hidden" name="cod_usuario" value="<?php echo $cod_usuarioAtual;?>">
                            <br>
                            <br>
                            <div class="styleButtonsContainer">
                                <button type="submit" name="saveReceita" class="styleButtons" id="salvarR"><span>SALVAR</span></button>
                                <button type="button" class="styleButtons" id="btnClose_Rece" ><span>FECHAR</span></button>
                            </div>
                        </form>
                    </dialog>

                    <script src="../Controller/openModal.js"></script>
        </div>  
    </div>

    </div>
    <div class="Listas"> 
            <div class="Despesas">
                <table id="tabela_despesas">
                    <tr> <th>Editar</th><th>Valor</th><th>Descrição</th><th>Data</th><th>Categoria</th> </tr>
                    <?php

                        $DespesaDAO = new DespesaDAO();
                        $listaDespesa = $DespesaDAO->listarDespesa($cod_usuarioAtual);
                        foreach($listaDespesa as $l) {
                            echo "<tr>";
                            
                            echo "<td id='buttonsEdit'>";
                            echo "<a href='editarDespesa.php?id={$l['cod']}'><img src='../src/editar.png' alt='Editar'></a>";
                            echo "<a href='deletarDespesa.php?id={$l['cod']}&cod={$cod_usuarioAtual}'><img src='../src/lixeira.png' alt='Deletar'></a>";
                            echo "</td>";

                            echo "<td>{$l['valor']}</td>";
                            echo "<td>{$l['descri']}</td>";
                            echo "<td>{$l['data']}</td>";
                            echo "<td>{$l['categoria']}</td>";
                            echo "</tr>";
                        };
                        ?>
                </table>


            </div>
            <div class="Receitas">
            <table id="tabela_receitas">
                    <tr> <th>Editar</th><th>Valor</th><th>Descrição</th><th>Data</th><th>Categoria</th> </tr>
                    <?php

                        $receitaDAO = new ReceitaDAO();
                        $listaReceita = $receitaDAO->listarReceita($cod_usuarioAtual);
                        foreach($listaReceita as $l) {
                            echo "<tr>";
                            
                            echo "<td id='buttonsEdit'>";
                            echo "<a href='editarReceita.php?id={$l['cod']}'><img src='../src/editar.png' alt='Editar'></a>";
                            echo "<a href='deletarReceita.php?id={$l['cod']}'><img src='../src/lixeira.png' alt='Deletar'></a>";
                            echo "</td>";

                            echo "<td>{$l['valor']}</td>";
                            echo "<td>{$l['descri']}</td>";
                            echo "<td>{$l['data']}</td>";
                            echo "<td>{$l['categoria']}</td>";
                            echo "</tr>";
                        };
                        ?>
                </table>
            </div>
    </div>

    <footer>    
        Feito por: João Vitor Rodrigues Santos
    </footer>
</body>
</html>