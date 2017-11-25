<?php
require_once("Controller/AgendaController.php");

$agendaController = new AgendaController();

$id = filter_input(INPUT_GET, "id");
if ($id > 0) {
    if ($agendaController->DeletarAgenda($id)) {
        echo "Contato Excluido!";
    } else {
        echo "Erro ao tentar Excluir!";
    }
}

$agendas = $agendaController->PesquisarTodos();
?>

<div id="divPesquisa">
    <h3>Pesquisar</h3>
    <br/>
    <?php
    if ($agendas != null) {
        ?>
    <table>
        <thead>
            <tr>
                <th>
                    Nome
                </th>
                <th>
                    Número
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($agendas as $agenda) {
                ?>
            <tr>
                <td><?php echo $agenda->getNome(); ?></td>
                <td><?php echo $agenda->getNumero(); ?></td>
                <td>
                    <a href="?pagina=novo&id=<?php echo $agenda->getId(); ?>" class="waves-efffect yellow accent-3 btn">Editar</a>
                    <a href="?pagina=ver&id=<?php echo $agenda->getId(); ?>" class="waves-efffect blue accent-3 btn">Ver</a>
                    <a href="?pagina=pesquisa&id=<?php echo $agenda->getId(); ?>" class="waves-efffect red accent-3 btn">Excluir</a>
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
