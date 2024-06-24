<?php
    class produto
    {
        public function __construct(private int $idproduto = 0, private string $nome = "",
                                    private string $descricao = "", private string $caracteristica = "",
                                    private string $preco = "", private string $imagem = "", private array $tamanho = array(),
                                    private array $arte_marcial = array()){}



    public function getIdproduto()
    {
        return $this->idproduto;
    }
    public function getNome()
    {
        return $this->nome;
    }
    public function getDescricao()
    {
        return $this->descricao;
    }
    public function getCaracteristica()
    {
        return $this->getCaracteristica;
    }
    public function getPreco()
    {
        return $this->preco;
    }
    public function getTamanho()
    {
        return $this->tamanho;
    }
    public function getArte_marcial()
    {
        return $this->arte_marcial;
    }
    public function getImagem()
    {
        return $this->imagem;
    }




    
    public function setIdproduto($idproduto)
    {
        $this->idproduto = $idproduto;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }
    public function setCaracteristica($caracteristica)
    {
        $this->caracteristica = $caracteristica;
    }
    public function setPreco($preco)
    {
        $this->preco = $preco;
    }
    public function setTamanho($tamanho)
    {
        $this->tamanho[] = $tamanho;
    }
    public function setArte_marcial($arte_marcial)
    {
        $this->arte_marcial[] = $arte_marcial;
    }
    public function setImagem($imagem)
    {
        $this->imagem = $imagem;
    }

    }
?>