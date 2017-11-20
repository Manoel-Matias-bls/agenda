<?php
require_once("Controller/LivroController.php");

$livroController = new LivroController();

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
                    <a href="?pagina=novo&id=<?php echo $livro->getId(); ?>" class="waves-efffect green accent-3 btn">Editar</a>
                    <a href="?pagina=ver&id=<?php echo $livro->getId(); ?>" class="waves-efffect blue accent-3 btn">Ver</a>
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
