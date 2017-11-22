<?php
require_once("Controller/AgendaController.phpp");

$livroController = new AgendaController();

$id = filter_input(INPUT_GET, "id");
if ($id > 0) {
    if ($livroController->DeletarLivro($id)) {
        echo "Livro Excluido!";
    } else {
        echo "Erro ao tentar Excluir!";
    }
}

$livros = $livroController->PesquisarTodos();
?>

<div id="divPesquisa">
    <h3>Pesquisar</h3>
    <br/>
    <?php
    if ($livros != null) {
        ?>
    <table>
        <thead>
            <tr>
                <th>
                    Título
                </th>
                <th>
                    Gênero
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($livros as $livro) {
                ?>
            <tr>
                <td><?php echo $livro->getTitulo(); ?></td>
                <td><?php echo $livro->getGenero(); ?></td>
                <td>
                    <a href="?pagina=novo&id=<?php echo $livro->getId(); ?>" class="waves-efffect yellow accent-3 btn">Editar</a>
                    <a href="?pagina=ver&id=<?php echo $livro->getId(); ?>" class="waves-efffect blue accent-3 btn">Ver</a>
                    <a href="?pagina=pesquisa&id=<?php echo $livro->getId(); ?>" class="waves-efffect red accent-3 btn">Excluir</a>
                </td>
            </tr>
        <?php
            } ?>
        </tbody>
    </table>
    <?php
    }
    ?>
</br/>
</div>
