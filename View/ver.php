<?php
require_once("Controller/LivroController.php");
require_once("Model/Livro.class.php");

$id = filter_input(INPUT_GET, "id");
?>
<div id="divVer">
    <h3>Visualizar</h3>
    <br/>
    <?php
        if ($id) {
            $livroController = new LivroController();
            $livro = $livroController->PesquisarLivro($id);

            if ($livro) {
                ?>
            <ul>
                <li class="title">Título</li>
                <li class="detail"><?= $livro->getTitulo(); ?></li>
                <li class="title">Gênero</li>
                <li class="detail"><?php echo $livro->getGenero(); ?></li>
                <li class="title">Qtd. Páginas</li>
                <li class="detail"><?php echo $livro->getQtdPaginas(); ?></li>
                <li class="title">Descrição</li>
                <li class="detail"><?php echo $livro->getDescricao(); ?></li>
                <li class="title"><a href="?pagina=novo&id=<?php echo $livro->getId(); ?>" class="waves-efffect green accent-3 btn">Editar</a></li>
            </ul>

            <?php
            } else {
                echo "Livro não encontrado!";
            }
        } else {
            echo "Código não encontrado!";
        }
    ?>
</br/>
</div>
