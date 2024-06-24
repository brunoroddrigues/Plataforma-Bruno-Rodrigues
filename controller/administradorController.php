<?php

require_once "models/conexao.php";
require_once "models/Produto.php";
require_once "models/produtoDAO.php";


    // tem relação com o produtoDAO


    class administradorController // consegue acessa se é administrador ou não
    {
        public function exibir()
        {
            //verifico se o tipo do usuario nao é adminstrador
            if(($_SESSION["tipo"] != "administrador") )
            {
                // se eele nao for administrar, vai redirecionar o usuario para inicio
                header("location: index.php?controle=inicioController&metodo=index");  
                die();
            }
            // SE FOR ADM, VAI PRA ESSA FNÇÃO 
				$produtoDAO = new produtoDAO();
				$retorno = $produtoDAO->buscar_todos_produtos();
             require_once "views/administrador.php";
        }





        // ESTOU CRIANDO AS FUNÇÕES, VOU INSTANCIA O PRODUTODAO,
        // ONDE VAI FAZER A VERIFICAÇÃO SE TEM OS PRODUTOS, 
        // SE TIVER CONSIGO INATIVAR E ATIVAR OS PRODUTOS PRA APARECEM 
        // NA LOJA OU NÃO, ISSO NO PERFIL DE ADMINISTRADOR

        public function excluir_produto()   //excluir administrador
    {
        if($_GET["idproduto"])
        {
            $produto = new produto(idproduto:$_GET["idproduto"]);
            $produtoDAO = new produtoDAO();
            $ret=$produtoDAO->excluir_produto($produto);
            if($ret)
            {
                header("location: index.php?controle=administradorController&metodo=exibir");
            }
            //print_r($produto);
        }
    }


    
    public function ativar_produto()   //excluir administrador
    {
        if($_GET["idproduto"])
        {
            $produto = new produto(idproduto:$_GET["idproduto"]);
            $produtoDAO = new produtoDAO();
            $ret=$produtoDAO->ativar_produto($produto);
            if($ret)
            {
                header("location: index.php?controle=administradorController&metodo=exibir");
            }
            //print_r($produto);
        }
    }




    }


    
?>