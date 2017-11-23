<?php
    require_once("DAO/AgendaDAO.php");

    class AgendaController
    {
        /* Cria uma variavel global*/
        private $agendaDAO;

        /**
        * Construtor da classe, roda toda vez que a classe é chamada
        **/
        public function __construct()
        {
            /* Cria um novo contato com a variavel global*/
            $this->agendaDAO = new AgendaDAO();
        }

        /**
        * Cadastra um novo Livro
        * @param $agenda - Livro a ser cadastrado
        **/
        public function Cadastrar(Agenda $agenda)
        {
            /* Verifica se todos os campos do contato tem uma ou mais letras,
            para que nenhum campo seja vazio*/
            if ((strlen(trim($agenda->getTitulo())) > 0) &&
            (strlen(trim($agenda->getGenero())) > 0) &&
            (strlen(trim($agenda->getDescricao())) > 0) &&
            (strlen(trim($agenda->getQtdPaginas())) > 0)) {

                /* Delimita genero a 45 caracteres*/
                $agenda->setGenero(substr(
                    $agenda->getGenero(),
                    0,
                    45
                ));

                /* converte QtdPaginas para inteiro*/
                $agenda->getQtdPaginas = (int) $agenda->getQtdPaginas();

                /* Executa a função Cadastrar da classe DAO e retorna o
                resultado True ou False indicando se o cadastro foi bem sucedido*/
                return $this->agendaDAO->Cadastrar($agenda);

                /* Caso algum campo do livro não tenha sido preenchido retorna falso*/
            } else {
                return false;
            }
        }

        /**
        * Cadastra um novo Livro
        * @param $agenda - Livro a ser cadastrado
        **/
        public function Atualizar(Agenda $agenda)
        {
            /* Verifica se todos os campos do livro tem uma ou mais letras,
            para que nenhum campo seja vazio*/
            if ((strlen(trim($agenda->getTitulo())) > 0) &&
            (strlen(trim($agenda->getGenero())) > 0) &&
            (strlen(trim($agenda->getDescricao())) > 0) &&
            (strlen(trim($agenda->getQtdPaginas())) > 0)) {

                /* Delimita genero a 45 caracteres*/
                $agenda->setGenero(substr(
                    $agenda->getGenero(),
                    0,
                    45
                ));

                /* converte QtdPaginas para inteiro*/
                $agenda->getQtdPaginas = (int) $agenda->getQtdPaginas();

                /* Executa a função Cadastrar da classe DAO e retorna o
                resultado True ou False indicando se o cadastro foi bem sucedido*/
                return $this->agendaDAO->Atualizar($agenda);

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
            return $this->agendaDAO->PesquisarTodos();
        }

        /**
        * Pesquisa um Livro determinado pelo parametro
        * @param $id - Id do Livro a ser pesquisado
        **/
        public function PesquisarAgenda($id)
        {
            /* Verifica se o id é maior que Zero, caso não seja retorna Nulo*/
            if ($id > 0) {
                /* Executa e  enviando o parametro id para a funçao PesquisarLivro
                contida na classe DAO e retorna seu resultado*/
                return $this->agendaDAO->PesquisarAgenda($id);
            } else {
                return null;
            }
        }

        /**
        * Deleta um Livro determinado pelo parametro
        * @param $id - Id do Livro a ser deletado
        **/
        public function DeletarAgenda($id)
        {
            /* Verifica se o id é maio que Zero, caso não seja retorna Nulo*/
            if ($id > 0) {
                /* Executa e  enviando o parametro id para a funçao PesquisarLivro
                contida na classe DAO e retorna seu resultado*/
                return $this->agendaDAO->DeletarAgenda($id);
            } else {
                return null;
            }
        }
    }
