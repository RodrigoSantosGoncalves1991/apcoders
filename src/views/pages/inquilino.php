<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Cadastro de inquilinos - ApCoders</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1" />
    <link rel="stylesheet" href="<?=$base;?>/assets/css/cadastro.css" />
</head>

<body>
    <header>
    </header>
    <section class="menu-cadastro">
        <form method="POST" action="<?=$base;?>/inquilinos/cadastro">

            <?php if(!empty($aviso)): ?>
                <?php list($tipo, $aviso) = explode("-", $aviso) ?>
                <?php if($tipo == 'sucesso'): ?>
                    <div class="sucesso"><?php echo $aviso; ?></div>
                <?php else: ?>
                    <div class="aviso"><?php echo $aviso; ?></div>
                <?php endif; ?>
            <?php endif; ?>

            <label for="nome">Nome:</label><br/>
            <input placeholder="Digite o Nome do Inquilino" class="input" type="text" name="nome"/>
            
            <label for="idade">Idade:</label><br/>
            <input placeholder="Digite a Idade do Inquilino" class="input" type="number" name="idade" id="idade" />
            
            <label for="sexo">Sexo:</label><br/>
            <select class="select" name="sexo" >
                <option value="homem-cisgênero">homem-cisgênero</option>
                <option value="mulher-cisgênero">mulher-cisgênero</option>
                <option value="homem-transgênero">homem-transgênero</option>
                <option value="mulher-transgênero">mulher-transgênero</option>
            </select>
            
            <label for="telefone">Telefone:</label><br/>
            <input placeholder="Digite o Telefone do Inquilino" class="input" type="text" name="telefone" id="telefone" />

            <label for="email">E-mail:</label><br/>
            <input placeholder="Digite o E-mail do Inquilino" class="input" type="text" name="email" />

            <label for="id_apartamento">Matrícula:</label><br/>
            <input placeholder="Digite a Matrícula do Imóvel" class="input" type="text" name="id_apartamento" id="id_apartamento" />

            <input class="botao" type="submit" value="Cadastrar inquilino" />

            <a href="<?=$base;?>/inquilinos/visualizar">Visualizar os Inquilinos</a>
        </form>
    </section>

    <script src="https://unpkg.com/imask"></script>
    <script>
    IMask(
        document.getElementById('id_apartamento'), {
            mask: '00000.0.0000000-00'
        }
    );
    IMask(
        document.getElementById('telefone'), {
            mask: '(00) 0 0000-0000'
        }
    );
    IMask(
        document.getElementById('idade'), {
            mask: Number,
            min: 0,
            max: 122
        }
    );
    </script>
</body>

</html>

