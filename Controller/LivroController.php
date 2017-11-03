<?php
    require_once("DAO/LivroDAO.php");

    class LivroController
    {
        private $livroDAO;

        public function __construct()
        {
            $this->livroDAO = new LivroDAO();
        }

        public function Cadastrar(Livro $livro)
        {
            if ((strlen(trim($livro->getTitulo())) > 0) &&
            (strlen(trim($livro->getGenero())) > 0) &&
            (strlen(trim($livro->getDescricao())) > 0) &&
            (strlen(trim($livro->getQtdPaginas())) > 0)) {
                $livro->setGenero(substr(
                    $livro->getGenero(),
                0,
                    45
                ));
                $livro->getQtdPaginas = (int) $livro->getQtdPaginas();
                $this->livroDAO->Cadastrar($livro);
            } else {
                return false;
            }
        }
    }
