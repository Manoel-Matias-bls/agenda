<?php
class Livro
{
    private $id;
    private $titulo;
    private $genero;
    private $qtd_paginas;
    private $descricao;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setGenero($genero)
    {
        $this->genero = $genero;
    }

    public function getGenero()
    {
        return $this->genero;
    }

    public function setQtdPaginas($qtd_paginas)
    {
        $this->qtd_paginas = $qtd_paginas;
    }

    public function getQtdPaginas()
    {
        return $this->qtd_paginas;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }
}
