<?php
require_once "cabecalho1.php";
?>
    <style>
        body {
            background: linear-gradient(to bottom, black, red);
            color: white;
            font-family: Arial, sans-serif;
        }
        h1, h2, h3, p {
            margin: 0;
        }
        main {
            display: flex;
            justify-content: center;
            align-items: center;
            height: calc(100vh - 150px);
        }
        section {
            background-color: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 18px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            text-align: center;
            width: 80%;
            max-width: 800px;
            margin: auto;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            border-radius: 5px;
        }
        th, td {
            padding: 10px;
            border-bottom: 1px solid #444;
            text-align: center;
        }
        th {
            background-color: rgba(0, 0, 0, 0.8);
        }
        td img {
            width: 100px;
            border: none; /* Remove the border from images */
        }
        .actions {
            margin-top: 20px;
        }
        .actions a {
            text-decoration: none;
            background-color: #ff4500;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            margin: 5px;
        }
        .actions a:hover {
            background-color: #e03d00;
        }
        h3
        {
            color: white;
        }
       
    </style>
</head>
<body>
    
    <header>
        <nav>
            <ul>
                <?php
                    require_once "menu.php";
                ?>
            </ul>
        </nav>
    </header>
    <main>
        <section>
            <h1>Sua compra foi concluída com sucesso!</h1>
            <h3>Detalhes do Pedido</h3>
            <p>Número do Pedido: <?php echo rand(100000, 999999); ?></p> <!-- Gera um número de pedido aleatório -->
            <p>Estimativa de Entrega: <?php echo date('d/m/Y', strtotime('+7 days')); ?></p> <!-- Adiciona 7 dias à data atual -->
            <p>Forma de Pagamento: Cartão de Crédito</p> 

            <table>
                <thead>
                    <tr>
                        <th>Imagem</th>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Quantidade</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $subtotal = 0;
                    $total = 0;
                    foreach ($produtosCompra as $dado) {
                        $subtotal = $dado["preco"] * $dado["quantidade"];
                        $total += $subtotal;
                        echo "<tr>
                                <td><img src='img/{$dado['imagem']}'></td>
                                <td class='nome'>{$dado["nome"]}</td>
                                <td>R$ " . number_format($dado["preco"], 2, ",", ".") . "</td>
                                <td style='text-align:center'>{$dado['quantidade']}</td>
                                <td>R$ " . number_format($subtotal, 2, ",", ".") . "</td>
                              </tr>";
                    }
                    ?>
                    <tr>
                        <th colspan='4'>Total da compra</th>
                        <th>R$ <?php echo number_format($total, 2, ",", "."); ?></th>
                    </tr>
                </tbody>
            </table>

            <h3>Informações de Contato</h3>
            <p>Se você tiver qualquer dúvida, entre em contato conosco pelo e-mail artesmarciais@gmail.com ou pelo telefone (14) 9.9614-9608</p>

            <div class="actions">
                <a href="index.php">Voltar à página principal</a>
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
