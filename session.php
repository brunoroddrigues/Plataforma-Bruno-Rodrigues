<?php       //guardando a sessao dos usuario // guarda os dados do banco de dados na sessao do navegtador
    if(!isset($_SESSION))   
    {
        session_start(); // iniciando a sessao
            // = 0 vou iniciar a variavel da sessao idusuario, com um valor padrao
            //null  pra variaveis que podem nao ter um valor inicial
          // Verifica se a variável de sessão 'idusuario' não está definida e,
          // se necessário, define-a como 0
        if(!isset($_SESSION["idusuario"]))
        {
            $_SESSION["idusuario"] = 0;
        }
        if(!isset($_SESSION["nome"]))
        {
            $_SESSION["nome"] = null;
        }
        if(!isset($_SESSION["email"]))
        {
            $_SESSION["email"] = null;
        }
        if(!isset($_SESSION["tipo"]))
        {
            $_SESSION["tipo"] = null;
        }

        //!negação
        // Verifica se $_SESSION["carrinho"] não está definida 
        //e a define como um array vazio, se necessário
        if(!isset($_SESSION["carrinho"]))
        {
            $_SESSION["carrinho"] = array();
        }
      
    }
?>