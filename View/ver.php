<?php
require_once("Controller/AgendaController.php");
require_once("Model/Agenda.class.php");

$id = filter_input(INPUT_GET, "id");
?>
<div id="divVer">
    <h3>Visualizar</h3>
    <br/>
    <?php
        if ($id) {
            $agendaController = new AgendaController();
            $agenda = $agendaController->PesquisarAgenda($id);

            if ($agenda) {
                ?>
            <ul>
                <li class="title">Nome</li>
                <li class="detail"><?= $agenda->getNome(); ?></li>
                <li class="title">Número</li>
                <li class="detail"><?php echo $agenda->getNumero(); ?></li>
                <li class="title">Endereço</li>
                <li class="detail"><?php echo $agenda->getEndereco(); ?></li>
                <li class="title"><a href="?pagina=novo&id=<?php echo $agenda->getId(); ?>" class="waves-efffect green accent-3 btn">Editar</a></li>
            </ul>

            <?php
            } else {
                echo "Contato não encontrado!";
            }
        } else {
            echo "Código não encontrado!";
        }
    ?>
</br/>
</div>
