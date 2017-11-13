<?php
    require_once("Banco.php");
    require_once("Model/Livro.class.php");

    class LivroDAO
    {
        private $banco;
        private $debug;

        public function __construct()
        {
            $this->banco = new Banco;
            $this->debug = true;
        }

        public function __destruct()
        {
            $this->banco->Disconnect();
        }

        public function Cadastrar(Livro $livro)
        {
            try {
                $sql = "INSERT INTO livro (titulo, genero, qtd_paginas, descricao)
                VALUES (:titulo, :genero, :qtd_paginas, :descricao)";

                $param = array(
                        ":titulo" => $livro->getTitulo(),
                        ":genero" => $livro->getGenero(),
                        ":qtd_paginas" => $livro->getQtdPaginas(),
                        ":descricao" => $livro->getDescricao()
                );

                return $this->banco->ExecuteNonQuery($sql, $param);
            } catch (PDOException $e) {
                if ($this->debug) {
                    echo "Error: {$e->getMessage()}";
                }
            }
        }
    }
