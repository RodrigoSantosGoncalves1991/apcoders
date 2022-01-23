<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Cadastro de unidades - ApCoders</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1" />
    <link rel="stylesheet" href="<?=$base;?>/assets/css/cadastro.css" />
</head>

<body>
    <header>
    </header>
    <section class="menu-cadastro">
        <form method="POST" action="<?=$base;?>/unidades/cadastro">

            <?php if(!empty($aviso)): ?>
                <?php list($tipo, $aviso) = explode("-", $aviso) ?>
                <?php if($tipo == 'sucesso'): ?>
                    <div class="sucesso"><?php echo $aviso; ?></div>
                <?php else: ?>
                    <div class="aviso"><?php echo $aviso; ?></div>
                <?php endif; ?>
            <?php endif; ?>

            <label for="id_apartamento">Matrícula:</label><br/>
            <input placeholder="Digite a Matrícula do Imóvel" class="input" type="text" name="id_apartamento" id="id_apartamento" />
            
            <label for="proprietario">Proprietário:</label><br/>
            <input placeholder="Digite o Nome do Proprietário" class="input" type="text" name="proprietario" />
            
            <label for="condominio">Condomínio:</label><br/>
            <input placeholder="Digite o Nome do Condomínio" class="input" type="text" name="condominio" />
            
            <label for="endereco">Endereço:</label><br/>
            <input placeholder="Digite o Endereço do Imóvel" class="input" type="text" name="endereco" />

            <input class="botao" type="submit" value="Cadastrar unidade" />

            <a href="<?=$base;?>/unidades/visualizar">Visualização das Unidades</a>
        </form>
    </section>

    <script src="https://unpkg.com/imask"></script>
    <script>
    IMask(
        document.getElementById('id_apartamento'), {
            mask: '00000.0.0000000-00'
        }
    );
    </script>
</body>

</html>