<?php
    class itens 
    {
        public function __construct(private int $iditens = 0, private string $quantidade = "",
                                    private float $preco_unitario = 0.00, private  $produto = null){}  



    public function getIditens()
    {
         return $this->iditens;
    }
    public function getQuantidade()
    {
        return $this->idquantidade;
    }
    public function getPreco_unitario()
    {
        return $this->preco_unitario;
    }
    public function getProduto()
    {
        return $this->produto;
    }
    public function getVenda()
    {
        return $this->venda;
    }





    public function setIditens($iditens)
    {
        $this->iditens= $iditens;
    }
    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;
    }
    public function setPreco_unitario($preco_unitario)
    {
        $this->preco_unitario = $preco_unitario;
    }
    public function setProduto($produto)
    {
        $this->produto[] = $produto;
    }
    public function setVenda($venda)
    {
        $this->venda[] = $venda;
    }

    }
?>



