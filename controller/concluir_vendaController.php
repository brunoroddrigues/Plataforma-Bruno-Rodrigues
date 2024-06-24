<?php

require_once "models/conexao.php";
require_once "models/itens.php";

class concluir_vendaController
{
    public function finalizar_compra()
    {
        // Verificar se o carrinho está vazio
        if (empty($_SESSION["carrinho"])) {
            // Se o carrinho estiver vazio, redirecionar de volta para o carrinho ou para a página de produtos
            header("Location: index.php?controle=carrinhoController&metodo=exibir");
            die();
        }

        // Aqui você processaria a finalização da compra,
        // por exemplo, salvar os detalhes da compra no banco de dados,
        // atualizar estoque, gerar fatura, etc.
        $produtosCompra = $_SESSION["carrinho"];
        //  limpar o carrinho após finalizar a compra
        unset($_SESSION["carrinho"]);
        require_once "views/concluirVenda.php";
        die();
    }
}

?>
