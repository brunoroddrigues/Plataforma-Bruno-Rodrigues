<?php
	require_once "cabecalho1.php";
?>
<header>
        <h1>Administrador</h1>
        <nav>
            <ul>
            <?php
                require_once "menu.php"; 
            ?>
            </ul>
        </nav>
        <br><br><br>
    </header>
<div class="content">
	<div class="">
		
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Imagem</th>
					<th>Nome</th>
					<th>Preço</th>
				</tr>
			</thead>
			<tbody>
			<?php
				
				
				if(is_array($retorno))
				{
					foreach($retorno as $dado)
					{
                        echo "<tr>
                        <td style='text-align: center;'><img style='width: 300px; display: block; margin: 0 auto;' src='img/{$dado->imagem}'></td>
                        <td style='text-align: center;'>{$dado->nome}</td>
                        <td style='text-align: center;'>{$dado->preco}</td>
                        <td style='text-align: center;'> 
                        ";
                        if($dado->status=='ativo')
                        {  // esse alterar sempre vai ficar visivel
                        echo"<a href='index.php?controle=administradorController&metodo=excluir_produto&idproduto={$dado->idproduto}' class='btn btn-danger'>Inativar</a>";
                        }
                        else
                        {
                            echo"<a href='index.php?controle=administradorController&metodo=ativar_produto&idproduto={$dado->idproduto}' class='btn btn-danger'>Ativar</a>";
                        }
                      
                          echo "
                        </td>
                    </tr>";
              

					}
				}
			?>
			</tbody>
		</table>
		<br>
		<a href="form_produto.php" class="btn btn-primary">Novo Produto</a>
	</div>
</div>

