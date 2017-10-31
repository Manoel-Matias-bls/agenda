<div id="divNovo">
    <h3>Novo</h3>
    <div class="row">
        <form method="post" name="form_novo">
            <div class="input-field col s12">
                <input id="fieldTitulo" name="fieldTitulo" type="text" class="validate" value=""/>
                <label for="fieldTitulo">Título</label>
            </div>
            <div class="input-field col s12">
                <input id="fieldGenero" name="fieldGenero" type="text" class="validate" value=""/>
                <label for="fieldGenero">Gênero</label>
            </div>
            <div class="input-field col s12">
                <input id="fieldQtdPaginas" name="fieldQtdPaginas" type="text" class="validate" value=""/>
                <label for="fieldQtdPaginas">Qtd. Páginas</label>
            </div>
            <div class="input-field col s12">
                <textarea id="fieldDescricao" name="fieldDescricao" class="materialize-textarea" value=""></textarea>
                <label for="fieldDescricao">Descrição</label>
            </div>
            <div class="col s12">
                <span>&nbsp;</span>
            </div>
            <div class="col s12">
                <input type="submit" class="waves-effect green accent-3 btn" name="btnGravar" value="Gravar" />
                <a class="waves-effect red lighten-1 waves-light btn" href="?pagina=novo"><i class="material-icons left">loop</i>Cancelar</a>
            </div>
        </form>
    </div>
</div>
