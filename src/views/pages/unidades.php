<html>
<head>
    <meta charset="utf-8" />
    <title>Unidades - ApCoders</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1" />
    <link rel="stylesheet" href="<?=$base;?>/assets/css/visualizacao.css" />
</head>

<body>
    <header>
        <h1>Unidades Cadastradas</h1>
        <hr/>
    </header>

<a href="<?=$base;?>/unidades/cadastro">Cadastrar nova unidade</a>

<table border="1" width="100%">
    <tr>
        <th>ID</th>
        <th>MATRÍCULA DO IMÓVEL</th>
        <th>PROPRIETÁRIO</th>
        <th>CONDOMÍNIO</th>
        <th>ENDEREÇO</th>
    </tr>
    <?php foreach($unidades as $unidade): ?>
        <tr>
            <td><?=$unidade['id'];?></td>
            <td><?=$unidade['id_apartamento'];?></td>
            <td><?=$unidade['proprietario'];?></td>
            <td><?=$unidade['condominio'];?></td>
            <td><?=$unidade['endereco'];?></td>
        </tr>
    <?php endforeach; ?>
</table>
<footer>
    <hr/>
    ApCoders
</footer>
</body>
</html>