<?php $render('header'); ?>

<div class="menu-raiz">
    <h2>Inquilinos</h2>
    <ul>
        <li>
            <a href="<?=$base;?>/inquilinos/cadastro">Cadastro de inquilinos</a>
        </li>
        <li>
            <a href="<?=$base;?>/inquilinos/visualizar">Visualização de inquilinos</a>
        </li>
    </ul>
    <br/>
    <h2>Unidades</h2>
    <ul>
        <li>
            <a href="<?=$base;?>/unidades/cadastro">Cadastro de unidades</a>
        </li>
        <li>
            <a href="<?=$base;?>/unidades/visualizar">Visualização das unidades</a>
        </li>
    </ul>
    <br/>
    <h2>Despesas das unidades</h2>
    <ul>
        <li>
            <a href="<?=$base;?>/despesas/cadastro">Cadastro de despesas</a>
        </li>
        <li>
            <a href="<?=$base;?>/despesas/editar">Edição de despesas</a>
        </li>
        <li>
            <a href="<?=$base;?>/despesas/visualizar">Visualização das despesas</a>
        </li>
    </ul>
</div>

<?php $render('footer'); ?>