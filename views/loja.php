<?php
    require_once "cabecalho1.php";
?>
</head>
<body>
    
    <header>
        <h1>Produtos de Artes Marciais</h1>
        <nav>
            <ul>  
                <?php
                    require_once "menu.php";
                ?>
            </ul>
            <a href="index.php?controle=carrinhoController&metodo=exibir"><i class="fas fa-shopping-cart carrinho-icon" onclick="window.location.href='carrinho.html'"></i></a>
        </nav>
    </header>
    <main class="produtos-background">
    <div class="centralizar_produtos">
        <?php
        foreach($retorno as $dado)
        {
            $preco = number_format($dado->preco,2,',','.'); // aqui chama a função do botao carrinho..
            echo"<section class='produto'>
            <a href='index.php?controle=produtoController&metodo=mostrar_detalhes_produto&id={$dado->idproduto}'><img src='img/{$dado->imagem}' alt='{$dado->nome}' width='200px'></a>
            <h2 class='tauri-regular'>{$dado->nome}</h2>
            <p class='preco-texto'>Preço: <span class='preco'>R$ $preco</span></p>
            <a href='index.php?controle=produtoController&metodo=adicionar_carrinho&idproduto={$dado->idproduto}' class = 'btn1'>Adicionar Carrinho
            </a> 
            </section>";
        }
        ?>
    </div>
    </main>
    <footer>
        <?php
        require_once "footer.php";
        ?>
    </footer>
</body>
</html>
