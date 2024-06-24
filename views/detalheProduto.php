<?php
require_once "cabecalho1.php";
?>
</head>
<body class="luvas-muay-thai-body">
   
    <header>
        <h1>Produtos de Artes Marciais</h1>
        <nav>
            <ul>
                <?php
                require_once "menu.php";
                ?>
            </ul>
            <a href="index.php?controle=carrinhoController&metodo=exibir"><i class="fas fa-shopping-cart carrinho-icon"></i></a>
        </nav>
    </header>
    <main>
        <section class="produto-detalhes">
            <div class="produto_card">
                <div class="titulo_produto">
                    <h5><?php echo $retorno[0]->nome; ?></h5>
                </div>
                <img src="img/<?php echo $retorno[0]->imagem; ?>" width="225px">
                <br>
                <h4>Tamanhos Disponíveis:</h4>
                <?php
                    foreach($retorno as $dado)
                    {
                        echo "<p>{$dado->descritivo}</p>";
                    } 
                 ?>
                <br>
                <p class="preco-texto">Preço: <span class="preco"><?php echo $retorno[0]->preco; ?></span></p>
                <h4>Forma de pagamento: <span class="forma-pagamento"><br>Cartão de crédito, boleto bancário, pix</span></h4>
                <h4>Descrição do Produto:</h4>
                <p><?php echo $retorno[0]->descricao; ?></p>
                <h4>Características:</h4>
                <ul>
                    <p><?php echo $retorno[0]->caracteristica; ?></p>
                </ul>
                <br><br>
                <a href="index.php?controle=produtoController&metodo=adicionar_carrinho&idproduto=<?php echo $retorno[0]->idproduto; ?>">
                    <button class="botao-amarelo">Adicionar ao carrinho</button>
                </a>
                <br><br><br>
            </div>
        </section>
    </main>
    <footer>
        <?php
        require_once "footer.php";
        ?>
    </footer>
</body>
</html>
