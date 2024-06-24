<?php

    require_once "models/conexao.php";
    require_once "models/produtoDAO.php";
    require_once "models/produto.php";

    // crio a função no controller, e vou no DAO, pra buscar as informaçoes no
    //banco de dados atraves das funçoes criadas..
    

    // crio as funções, instancio  o produtoDAO que é responsdavel por acesa o 
    //banco atraves do metodos buscar_todos

    class produtoController 
    {
        public function buscar_todos()    // estou mostrando o status se esta ativo ou inativo o produto - se estiver ativo ira aparecer, se estiver inativo nao ira aparecer
        {
            $produtoDAO = new produtoDAO();
            $retorno = $produtoDAO->buscar_produtos();
            require_once "views/loja.php";
        }




        public function mostrar_detalhes_produto()// esta mostrando os detalhes -> descricao, preco, caracteristicas, tamanho...
        {
            if(isset($_GET["id"]))
            {
                $produto = new produto($_GET["id"]);
                $produtoDAO = new produtoDAO();
                $retorno = $produtoDAO->buscar_um_produto($produto);
                
                require_once "views/detalheProduto.php";
            }
        }






        public function adicionar_carrinho()
        {   
            if($_SESSION["idusuario"] == 0) {
                header("location: index.php?controle=usuarioController&metodo=exibir_login");
            }else {
                if(isset($_GET["idproduto"])){
                    $linha = -1;
                    $achou = false;
                    if(isset($_SESSION["carrinho"]))
                    {
                        foreach($_SESSION["carrinho"] as $linha=>$dado)
                        {
                            if($_GET["idproduto"] == $dado["idproduto"]){
                                $achou = true;
                            }
                        }
                    }
     
                    if(!$achou){
                       
                        $produto = new produto($_GET["idproduto"]);
                        $produtoDAO = new produtoDAO();
                        $retorno = $produtoDAO->buscar_um_produto($produto);
                   
                        $_SESSION["carrinho"][$linha + 1 ]["idproduto"] = $retorno[0]->idproduto; // quando clicar no botao, vai pegar os dados do banco de dados
                        $_SESSION["carrinho"][$linha + 1 ]["nome"] = $retorno[0]->nome;
                        $_SESSION["carrinho"][$linha + 1 ]["preco"] = $retorno[0]->preco;
                        $_SESSION["carrinho"][$linha + 1 ]["quantidade"] = 1;
                        $_SESSION["carrinho"][$linha + 1 ]["imagem"] = $retorno[0]->imagem;
                        $_SESSION["carrinho"][$linha + 1 ]["descricao"] = $retorno[0]->descricao;
    
                        
                        //echo "<pre>";
                        //print_r($_SESSION);
                        //echo "</pre>";
     
                    }
                     header("location:http://localhost/plataforma_bruno/index.php?controle=carrinhoController&metodo=exibir");
                }
            }
        }
    }
?>