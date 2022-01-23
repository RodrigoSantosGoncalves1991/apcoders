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
        <form method="POST" action="<?=$base;?>/despesas/cadastro">

            <?php if(!empty($aviso)): ?>
                <?php list($tipo, $aviso) = explode("-", $aviso) ?>
                <?php if($tipo == 'sucesso'): ?>
                    <div class="sucesso"><?php echo $aviso; ?></div>
                <?php else: ?>
                    <div class="aviso"><?php echo $aviso; ?></div>
                <?php endif; ?>
            <?php endif; ?>

            <label for="descricao">Descrição:</label><br/>
            <input placeholder="Descrição do Boleto" class="input" type="text" name="descricao"/>

            <label for="tipo_despesa">Tipo de Despesa:</label><br/>
            <select class="select" name="tipo_despesa" >
                <option value="condomínio" selected>condomínio</option>
                <option value="conta de água">conta de água</option>
                <option value="conta de luz">conta de luz</option>
                <option value="conta de gás">conta de gás</option>
                <option value="Internet/TV a cabo">Internet/TV a cabo</option>
                <option value="IPTU">IPTU</option>
            </select>
            
            <label for="valor">Valor do Boleto:</label><br/>
            <input placeholder="Digite o Valor do Boleto" class="input" type="text" name="valor" id="valor" />
            
            <label for="vencimento_fatura">Vencimento do Boleto:</label><br/>
            <input placeholder="Digite o Vencimento do Boleto:" class="input" type="date" name="vencimento_fatura" id="vencimento_fatura"  />

            <label for="status_pagamento">Status de Pagamento:</label><br/>
            <select class="select" name="status_pagamento" id="status_pagamento" >
                <option value="pago">pago</option>
                <option value="vencido">vencido</option>
                <option value="cancelado">cancelado</option>
                <option value="aguardando pagamento" selected>aguardando pagamento</option>
                <option value="processando">processando</option>
            </select>

            <label for="id_apartamento">Matrícula:</label><br/>
            <input placeholder="Digite a Matrícula do Imóvel" class="input" type="text" name="id_apartamento" id="id_apartamento" />

            <input class="botao" type="submit" value="Cadastrar Boleto" />

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

    function dataDeHoje() {
        let hoje = new Date().toISOString().split('T')[0];
        return hoje;
    }

    function ajustaStatusDePagamento() {
        let vencimento_fatura_milliseconds = new Date(vencimento_fatura.value).getTime(); 
        let hoje_milliseconds = new Date(dataDeHoje()).getTime();
        let status_pagamento = document.getElementById("status_pagamento");
        if (hoje_milliseconds <= vencimento_fatura_milliseconds) {
            status_pagamento.options.selectedIndex = 3;
        } else {
            status_pagamento.options.selectedIndex = 1;
        }
        console.log(status_pagamento.options.selectedIndex);
    }

    let vencimento_fatura = document.getElementById("vencimento_fatura");
    vencimento_fatura.value = dataDeHoje();

    vencimento_fatura.addEventListener('change', ajustaStatusDePagamento);

    </script>
</body>

</html>
