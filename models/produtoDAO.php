<?php
    class produtoDAO extends conexao
    {
        public function __contruct()
        {
            parent:: __construct();
        }



        //busco produtos ativos
        // se estiver ativo no banco ira aparecer na loja
        public function buscar_produtos()
        {
            $sql = "SELECT * FROM produto where status = ?";
			
			$stm = $this->db->prepare($sql);
            $stm->bindValue(1,"ativo"); // atribuindo  o valor ativo a consulta sql
			$stm->execute();
            //fechando a conexao com o banco
			$this->db = null;
            // retorno os resultados, no caso são mais de um
			return $stm->fetchAll(PDO::FETCH_OBJ);
        }





        // vou buscar no banco de dados um produto que tenha um tamanho definido,
        //se o produto nao tiver o tamanho, nao ira buscar no banco


        public function buscar_um_produto($produto)
        {
            $sql = "SELECT * FROM produto  inner join tamanho
            on tamanho.idproduto = produto.idproduto 
            where produto.idproduto = ?";
			
			$stm = $this->db->prepare($sql);
            $stm->bindValue(1,$produto->getIdproduto());
			$stm->execute();
			$this->db = null;
			return $stm->fetchAll(PDO::FETCH_OBJ);
        }






        // tem relação com o usuario administrador 
        //



        public function buscar_todos_produtos()
        { //buscar todos produtos ativo ou nao
            $sql = "SELECT * FROM produto";
			
			$stm = $this->db->prepare($sql);
			$stm->execute();
			$this->db = null;
			return $stm->fetchAll(PDO::FETCH_OBJ);
        }






        // excluir administrador 
        //excluir produto
        public function excluir_produto($produto) {
            
            try {
                $sql = "UPDATE produto SET status = 'inativo' WHERE idproduto = ?";
                $stm = $this->db->prepare($sql);
                $stm->bindValue(1,$produto ->getIdproduto());
                $stm->execute();
                $this->db = null;
                return  true;
            } catch(PDOException $e) {
                echo "Erro ao conectar com o banco de dados: " . $e->getMessage();
            }
        }


        
        // ativar produto
        public function ativar_produto($produto) {
            
            try {
                $sql = "UPDATE produto SET status = 'ativo' WHERE idproduto = ?";
                $stm = $this->db->prepare($sql);
                $stm->bindValue(1,$produto ->getIdproduto());
                $stm->execute();
                $this->db = null;
                return  true;
            } catch(PDOException $e) {
                echo "Erro ao conectar com o banco de dados: " . $e->getMessage();
            }
        }
              
    }
?>