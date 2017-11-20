<?php
    require_once("DAO/LivroDAO.php");

    class LivroController
    {
        /* Cria uma variavel global*/
        private $livroDAO;

        /**
        * Construtor da classe, roda toda vez que a classe é chamada
        **/
        public function __construct()
        {
            /* Cria um novo livro com a variavel global*/
            $this->livroDAO = new LivroDAO();
        }

        /**
        * Cadastra um novo Livro
        * @param $livro - Livro a ser cadastrado
        **/
        public function Cadastrar(Livro $livro)
        {
            /* Verifica se todos os campos do livro tem uma ou mais letras,
            para que nenhum campo seja vazio*/
            if ((strlen(trim($livro->getTitulo())) > 0) &&
            (strlen(trim($livro->getGenero())) > 0) &&
            (strlen(trim($livro->getDescricao())) > 0) &&
            (strlen(trim($livro->getQtdPaginas())) > 0)) {

                /* Delimita genero a 45 caracteres*/
                $livro->setGenero(substr(
                    $livro->getGenero(),
                    0,
                    45
                ));

                /* converte QtdPaginas para inteiro*/
                $livro->getQtdPaginas = (int) $livro->getQtdPaginas();

                /* Executa a função Cadastrar da classe DAO e retorna o
                resultado True ou False indicando se o cadastro foi bem sucedido*/
                return $this->livroDAO->Cadastrar($livro);

                /* Caso algum campo do livro não tenha sido preenchido retorna falso*/
            } else {
                return false;
            }
        }

        /**
        * Pesquisa todos os livros contidos na tabela livro do banco de dados
        **/
        public function PesquisarTodos()
        {
            /* Executa a funçao PesquisarTodos contida na classe DAO e retorna
            seu resultado*/
            return $this->livroDAO->PesquisarTodos();
        }

        /**
        * Pesquisa um Livro determinado pelo parametro
        * @param $id - Id do Livro a ser pesquisado
        **/
        public function PesquisarLivro($id)
        {
            /* Verifica se o id é maio que Zero, caso não seja retorna Nulo*/
            if ($id > 0) {
                /* Executa e  enviando o parametro id para a funçao PesquisarLivro
                contida na classe DAO e retorna seu resultado*/
                return $this->livroDAO->PesquisarLivro($id);
            } else {
                return null;
            }
        }
    }
