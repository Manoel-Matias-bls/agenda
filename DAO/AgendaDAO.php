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
        * @param $agenda - Objeto a ser cadastrado
        **/
        public function Cadastrar(Agenda $agenda)
        {
            try {
                // Sql de inserção
                $sql = "INSERT INTO contato (nome, numero, endereco)
                VALUES (:nome, :numero, :endereco)";

                // Parametros que serão substituidos no sql
                $param = array(
                        ":nome" => $agenda->getNome(),
                        ":numero" => $agenda->getNumero(),
                        ":endereco" => $agenda->getEndereco()
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
        * @param $agenda - Objeto a ser Atualizado
        **/
        public function Atualizar(Agenda $agenda)
        {
            try {
                // Sql de atualização
                $sql = "UPDATE contato SET nome = :nome, numero = :numero,
                endereco = :endereco
                WHERE  id = :id";

                // Parametros que serão substituidos no sql
                $param = array(
                        ":id" => $agenda->getId(),
                        ":nome" => $agenda->getNome(),
                        ":numero" => $agenda->getNumero(),
                        ":endereco" => $agenda->getEndereco()
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
        * @param $agenda - Objeto a ser deletado
        **/
        public function DeletarAgenda($id)
        {
            try {
                // Sql de atualização
                $sql = "DELETE FROM contato WHERE  id = :id";

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
                /* Sql de pesquisa, seleciona todos os campos da tabela contato
                e ordena pelo nome de forma ascendente */
                $sql = "select id, nome, numero, endereco from contato order by nome ASC";

                /* Cria um array vazio */
                $contatos = array();

                /* Cria uma variavel que rescebe o conjunto de itens resultantes
                da execução do sql construido acima */
                $itens = $this->banco->ExecuteQuery($sql);

                /* Laço de repetição */
                foreach ($itens as $item) {
                    /* Cria um novo objeto agenda */
                    $agenda = new Agenda();
                    /* Seta os valores do item trazido do banco de dados no novo agenda */
                    $agenda->setId($item["id"]);
                    $agenda->setNome($item["nome"]);
                    $agenda->setNumero($item["numero"]);
                    $agenda->setEndereco($item["endereco"]);

                    /* Adiciona o novo contato ao array criado anteriormente */
                    $contatos[] = $agenda;
                }
                /* Retorna o array com todos os contatos encontrados no banco de dados*/
                return $contatos;
            } catch (PDOException $e) {
                if ($this->debug) {
                    echo "Error: {$e->getMessage()}";
                }
            }
        }

        /**
        * Pesquisa um contato determinado pelo parametro recebido
        * @param $id - Id do contato a ser pesquisado
        **/
        public function PesquisarAgenda($id)
        {
            try {

                /* Sql de pesquisa, seleiona todos os campos da tabela contato
                onde o id é igual ao parametro :id*/
                $sql = "select id, nome, numero, endereco from contato where id = :id";

                // Parametros que serão substituidos no sql
                $param = array(':id' => $id);

                /* Cria variavel, executa o sql criado acima e recebe o resultado
                da execução */
                $resultado = $this->banco->ExecuteQueryOneRow($sql, $param);

                /* Cria um novo objeto */
                $agenda = new Agenda();

                /* Seta valores no novo agenda*/
                $agenda->setId($resultado["id"]);
                $agenda->setNome($resultado["nome"]);
                $agenda->setNumero($resultado["numero"]);
                $agenda->setEndereco($resultado["endereco"]);

                /* Retorna o agenda */
                return $agenda;
            } catch (PDOException $e) {
                if ($this->debug) {
                    echo "Error: {$e->getMessage()}";
                }
            }
        }
    }
