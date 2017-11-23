<?php

    require_once("Banco.php");
    require_once("Model/Agenda.class.php");

    class AgendaDAO
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

        /**
        * Função que cadastra um novo item
        * @param $livro - Objeto a ser cadastrado
        **/
        public function Cadastrar(Agenda $livro)
        {
            try {
                // Sql de inserção
                $sql = "INSERT INTO livro (titulo, genero, qtd_paginas, descricao)
                VALUES (:titulo, :genero, :qtd_paginas, :descricao)";

                // Parametros que serão substituidos no sql
                $param = array(
                        ":titulo" => $livro->getTitulo(),
                        ":genero" => $livro->getGenero(),
                        ":qtd_paginas" => $livro->getQtdPaginas(),
                        ":descricao" => $livro->getDescricao()
                );
                /* Executa a função contida na classe DAO/banco.php que
                substitui os parametros e excuta o código sql */
                return $this->banco->ExecuteNonQuery($sql, $param);
            } catch (PDOException $e) {
                if ($this->debug) {
                    echo "Error: {$e->getMessage()}";
                }
            }
        }

        /**
        * Função que Atualiza um item
        * @param $livro - Objeto a ser Atualizado
        **/
        public function Atualizar(Agenda $livro)
        {
            try {
                // Sql de atualização
                $sql = "UPDATE livro SET titulo = :titulo, genero = :genero,
                qtd_paginas = :qtd_paginas, descricao = :descricao
                WHERE  id = :id";

                // Parametros que serão substituidos no sql
                $param = array(
                        ":id" => $livro->getId(),
                        ":titulo" => $livro->getTitulo(),
                        ":genero" => $livro->getGenero(),
                        ":qtd_paginas" => $livro->getQtdPaginas(),
                        ":descricao" => $livro->getDescricao()
                );
                /* Executa a função contida na classe DAO/banco.php que
                substitui os parametros e excuta o código sql */
                return $this->banco->ExecuteNonQuery($sql, $param);
            } catch (PDOException $e) {
                if ($this->debug) {
                    echo "Error: {$e->getMessage()}";
                }
            }
        }

        /**
        * Função que deleta um item
        * @param $livro - Objeto a ser deletado
        **/
        public function DeletarLivro($id)
        {
            try {
                // Sql de atualização
                $sql = "DELETE FROM livro WHERE  id = :id";

                // Parametros que serão substituidos no sql
                $param = array(
                        ":id" => $id
                );
                /* Executa a função contida na classe DAO/banco.php que
                substitui os parametros e excuta o código sql */
                return $this->banco->ExecuteNonQuery($sql, $param);
            } catch (PDOException $e) {
                if ($this->debug) {
                    echo "Error: {$e->getMessage()}";
                }
            }
        }

        /**
        * Pesquisa todos os itens da tabela livro
        **/
        public function PesquisarTodos()
        {
            try {
                /* Sql de pesquisa, seleciona todos os campos da tabela livro
                e ordena pelo titulo de forma ascendente */
                $sql = "select id, titulo, genero, qtd_paginas, descricao from livro order by titulo ASC";

                /* Cria um array vazio */
                $livros = array();

                /* Cria uma variavel que rescebe o conjunto de itens resultantes
                da execução do sql construido acima */
                $itens = $this->banco->ExecuteQuery($sql);

                /* Laço de repetição */
                foreach ($itens as $item) {
                    /* Cria um novo livro */
                    $livro = new Agenda();
                    /* Seta os valores do item trazido do banco de dados no novo livro */
                    $livro->setId($item["id"]);
                    $livro->setTitulo($item["titulo"]);
                    $livro->setGenero($item["genero"]);
                    $livro->setQtdPaginas($item["qtd_paginas"]);
                    $livro->setDescricao($item["descricao"]);

                    /* Adiciona o novo libro ao array criado anteriormente */
                    $livros[] = $livro;
                }
                /* Retorna o array com todos os livros encontrados no banco de dados*/
                return $livros;
            } catch (PDOException $e) {
                if ($this->debug) {
                    echo "Error: {$e->getMessage()}";
                }
            }
        }

        /**
        * Pesquisa um livro determinado pelo paramtro recebido
        * @param $id - Id do livro a ser pesquisado
        **/
        public function PesquisarAgenda($id)
        {
            try {

                /* Sql de pesquisa, seleiona todos os campos da tabela livro
                onde o id é igual ao parametro :id*/
                $sql = "select id, titulo, genero, qtd_paginas, descricao from livro where id = :id";

                // Parametros que serão substituidos no sql
                $param = array(':id' => $id);

                /* Cria variavel, executa o sql criado acima e recebe o resultado
                da execução */
                $resultado = $this->banco->ExecuteQueryOneRow($sql, $param);

                /* Cria um novo livro */
                $livro = new Agenda();

                /* Seta valores no novo livro*/
                $livro->setId($resultado["id"]);
                $livro->setTitulo($resultado["titulo"]);
                $livro->setGenero($resultado["genero"]);
                $livro->setQtdPaginas($resultado["qtd_paginas"]);
                $livro->setDescricao($resultado["descricao"]);

                /* Retorna o livro */
                return $livro;
            } catch (PDOException $e) {
                if ($this->debug) {
                    echo "Error: {$e->getMessage()}";
                }
            }
        }
    }
