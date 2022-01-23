<html>
<head>
    <meta charset="utf-8" />
    <title>Unidades - ApCoders</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1" />
    <link rel="stylesheet" href="<?=$base;?>/assets/css/visualizacao.css" />
</head>

<body>
    <header>
        <h1>Inquilinos Cadastrados</h1>
        <hr/>
    </header>

<a href="<?=$base;?>/inquilinos/cadastro">Cadastrar novo inquilino</a>

<table border="1" width="100%">
    <tr>
        <th>ID</th>
        <th>NOME</th>
        <th>IDADE</th>
        <th>SEXO</th>
        <th>TELEFONE</th>
        <th>E-MAIL</th>
        <th>MATRÍCULA DO IMÓVEL</th>
    </tr>
    <?php foreach($inquilinos as $inquilino): ?>
        <tr>
            <td><?=$inquilino['id'];?></td>
            <td><?=$inquilino['nome'];?></td>
            <td><?=$inquilino['idade'];?></td>
            <td><?=$inquilino['sexo'];?></td>
            <td><?=$inquilino['telefone'];?></td>
            <td><?=$inquilino['email'];?></td>
            <td><?=$inquilino['id_apartamento'];?></td>
        </tr>
    <?php endforeach; ?>
</table>
<footer>
    <hr/>
    ApCoders
</footer>
</body>
</html>