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
        <form method="POST" action="<?=$base;?>/despesas/<?=$despesa['id']?>/editar">

            <?php if(!empty($aviso)): ?>
                <?php list($tipo, $aviso) = explode("-", $aviso) ?>
                <?php if($tipo == 'sucesso'): ?>
                    <div class="sucesso"><?php echo $aviso; ?></div>
                <?php else: ?>
                    <div class="aviso"><?php echo $aviso; ?></div>
                <?php endif; ?>
            <?php endif; ?>

            <label for="descricao">Descrição:</label><br/>
            <input placeholder="Descrição do Boleto" class="input" type="text" name="descricao" value="<?=$despesa['descricao']?>"/>

            <label for="tipo_despesa">Tipo de Despesa:</label><br/>
            <select class="select" name="tipo_despesa" id="tipo_despesa" >
                <option value="condomínio" >condomínio</option>
                <option value="conta de água">conta de água</option>
                <option value="conta de luz">conta de luz</option>
                <option value="conta de gás">conta de gás</option>
                <option value="Internet/TV a cabo">Internet/TV a cabo</option>
                <option value="IPTU">IPTU</option>
            </select>
            
            <label for="valor">Valor do Boleto:</label><br/>
            <input placeholder="Digite o Valor do Boleto" class="input" type="text" name="valor" id="valor" value="<?=$despesa['valor']?>"/>
            
            <label for="vencimento_fatura">Vencimento do Boleto:</label><br/>
            <input placeholder="Digite o Vencimento do Boleto:" class="input" type="date" name="vencimento_fatura" id="vencimento_fatura" value="<?=$despesa['vencimento_fatura']?>" />

            <label for="status_pagamento">Status de Pagamento:</label><br/>
            <select class="select" name="status_pagamento" id="status_pagamento" >
                <option value="pago">pago</option>
                <option value="vencido">vencido</option>
                <option value="cancelado">cancelado</option>
                <option value="aguardando pagamento" >aguardando pagamento</option>
                <option value="processando">processando</option>
            </select>

            <label for="id_apartamento">Matrícula:</label><br/>
            <input placeholder="Digite a Matrícula do Imóvel" class="input" type="text" name="id_apartamento" id="id_apartamento" value="<?=$despesa['id_apartamento']?>" />

            <input class="botao" type="submit" value="Editar Boleto" />

            <a href="<?=$base;?>/despesas/visualizar">Visualizar os Boletos</a>
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
        document.getElementById('valor'), {
            mask: Number,  
            scale: 2,  
            signed: false,  
            thousandsSeparator: '.',  
            padFractionalZeros: false,  
            normalizeZeros: true,  
            radix: ',',  
            mapToRadix: ['.'] 
        }
    );

    const despesa_tipo_despesa = "<?=$despesa['tipo_despesa']?>";

    const tipo_despesa = document.getElementById("tipo_despesa");

    const tipo_despesa_optionsNodes = tipo_despesa.options;

    for(let index = 0; index < tipo_despesa_optionsNodes.length; index++) {
        if (tipo_despesa_optionsNodes[index].value === despesa_tipo_despesa) {
            tipo_despesa.options.selectedIndex = index;
        }
    }
    
    const despesa_status_pagamento = "<?=$despesa['status_pagamento']?>";

    const status_pagamento = document.getElementById("status_pagamento");

    const status_pagamento_optionsNode = status_pagamento.options;

    for(let index = 0; index < status_pagamento_optionsNode.length; index++) {
        if (status_pagamento_optionsNode[index].value === despesa_status_pagamento) {
            status_pagamento.options.selectedIndex = index;
        }
    }

    //console.log(status_pagamento.options);
    </script>
</body>

</html>
