<?php
require_once("Controller/AgendaController.php");
require_once("Model/Agenda.class.php");

$agendaController = new AgendaController();
$agenda = new Agenda();

$id = "";
$nome = "";
$numero = "";
$endereco = "";
$result = "";

$btnGravar = filter_input(INPUT_POST, "btnGravar");
$id = filter_input(INPUT_GET, "id");

if ($id) {
    $agenda_edicao = $agendaController->PesquisarAgenda($id);

    $nome = $agenda_edicao->getNome();
    $numero = $agenda_edicao->getNumero();
    $endereco = $agenda_edicao->getEndereco();
}

if ($btnGravar) {
    $agenda->setNome(filter_input(INPUT_POST, "fieldNome"));
    $agenda->setNumero(filter_input(INPUT_POST, "fieldNumero"));
    $agenda->setEndereco(filter_input(INPUT_POST, "fieldEndereco"));
    if (!$id) {
        // Novo
        if ($agendaController->Cadastrar($agenda)) {
            $result = "Contato Cadastrado!";
        } else {
            $result = "Erro ao tentar Cadastrar!";
        }
    } else {
        // Editar
        $agenda->setId($id);
        if ($agendaController->Atualizar($agenda)) {
            $result = "Contato Atualizado!";
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
                <input id="fieldNome" name="fieldNome" type="text" class="validate" value="<?= $nome ?>"/>
                <label for="fieldNome">Nome</label>
            </div>
            <div class="input-field col s12">
                <input id="fieldNumero" name="fieldNumero" type="text" class="validate" value="<?php echo $numero ?>"/>
                <label for="fieldNumero">Número</label>
            </div>
            <div class="input-field col s12">
                <input id="fieldEndereco" name="fieldEndereco" type="text" class="validate" value="<?php echo $endereco ?>"/>
                <label for="fieldEndereco">Endereço</label>
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
