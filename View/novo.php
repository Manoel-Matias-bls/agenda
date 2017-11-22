<?php
require_once("Controller/AgendaController.phpp");
require_once("Model/Agenda.class.php");

$agendaController = new AgendaController();
$agenda = new Agenda();

$id = "";
$titulo = "";
$genero = "";
$qtd_paginas = "";
$descricao = "";
$result = "";

$btnGravar = filter_input(INPUT_POST, "btnGravar");
$id = filter_input(INPUT_GET, "id");

if ($id) {
    $livro_edicao = $agendaController->PesquisarLivro($id);

    $titulo = $livro_edicao->getTitulo();
    $genero = $livro_edicao->getGenero();
    $qtd_paginas = $livro_edicao->getQtdPaginas();
    $descricao = $livro_edicao->getDescricao();
}

if ($btnGravar) {
    $agenda->setTitulo(filter_input(INPUT_POST, "fieldTitulo"));
    $agenda->setGenero(filter_input(INPUT_POST, "fieldGenero"));
    $agenda->setQtdPaginas(filter_input(INPUT_POST, "fieldQtdPaginas"));
    $agenda->setDescricao(filter_input(INPUT_POST, "fieldDescricao"));
    if (!$id) {
        // Novo
        if ($agendaController->Cadastrar($agenda)) {
            $result = "Livro Cadastrado!";
        } else {
            $result = "Erro ao tentar Cadastrar!";
        }
    } else {
        // Editar
        $agenda->setId($id);
        if ($agendaController->Atualizar($agenda)) {
            $result = "Livro Atualizado!";
        } else {
            $result = "Erro ao tentar Atualizar!";
        }
    }
}
?>

<div id="divNovo">
    <h3>Novo</h3>
    <div class="row">
        <form method="post" name="form_novo">
            <div class="input-field col s12">
                <input id="fieldTitulo" name="fieldTitulo" type="text" class="validate" value="<?= $titulo ?>"/>
                <label for="fieldTitulo">Título</label>
            </div>
            <div class="input-field col s12">
                <input id="fieldGenero" name="fieldGenero" type="text" class="validate" value="<?php echo $genero ?>"/>
                <label for="fieldGenero">Gênero</label>
            </div>
            <div class="input-field col s12">
                <input id="fieldQtdPaginas" name="fieldQtdPaginas" type="text" class="validate" value="<?php echo $qtd_paginas ?>"/>
                <label for="fieldQtdPaginas">Qtd. Páginas</label>
            </div>
            <div class="input-field col s12">
                <textarea id="fieldDescricao" name="fieldDescricao" class="materialize-textarea"><?php echo $descricao ?></textarea>
                <label for="fieldDescricao">Descrição</label>
            </div>
            <div class="col s12">
                <span><?php echo $result ?>&nbsp;</span>
            </div>
            <div class="col s12">
                <input type="submit" class="waves-effect green accent-3 btn" name="btnGravar" value="Gravar" />
                <a class="waves-effect red lighten-1 waves-light btn" href="?pagina=novo"><i class="material-icons left">loop</i>Cancelar</a>
            </div>
        </form>
    </div>
</div>
