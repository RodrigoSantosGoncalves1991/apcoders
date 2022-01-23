<html>
<head>
    <meta charset="utf-8" />
    <title>Unidades - ApCoders</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1" />
    <link rel="stylesheet" href="<?=$base;?>/assets/css/visualizacao.css" />
</head>

<body>
    <header>
        <h1>Despesas Cadastradas</h1>
        <hr/>
    </header>

<a href="<?=$base;?>/despesas/cadastro">Cadastrar nova despesa</a>
<br/>
<br/>
<br/>
<div>
    <label id="label">
        <label for="unidade">Filtro por unidade: <input type="text" name="unidade" id="unidade"/> </label>
        <label for="fatura_vencida">Fatura vencida: <input type="checkbox" name="fatura_vencida" id="fatura_vencida"/> </label>
    </label>
</div>


<table border="1" width="100%" id = "table">
    <tr>
        <th>ID</th>
        <th>DESCRIÇÃO</th>
        <th>TIPO DE DESPESA</th>
        <th>VALOR</th>
        <th>VENCIMENTO DO BOLETO</th>
        <th>STATUS DE PAGAMENTO</th>
        <th>MATRÍCULA DO IMÓVEL</th>
        <th>EDITAR DESPESA</th>
    </tr>
</table>
<footer>
    <hr/>
    ApCoders
</footer>
<script src="https://unpkg.com/imask"></script>
<script>
    IMask(
        document.getElementById('unidade'), {
            mask: '00000.0.0000000-00'
        }
    );

    function clearTable(table) {
        while(table.childNodes.length > 2) {
            table.removeChild(table.lastChild);
        }
    }
    function renderTable(despesas) {
        for(const despesa of despesas) {
            let tr = document.createElement('tr');
            for(const property in despesa) {
                let td = document.createElement('td');
                if (property === 'vencimento_fatura') {
                    const dt = new Date(despesa[property]);
                    dt.setHours(dt.getHours() + 3);
                    td.innerHTML = dt.toLocaleDateString('pt-BR');
                } else if (property === 'valor') {
                    const options = { style: 'currency', currency: 'BRL' };
                    const numberFormat = new Intl.NumberFormat('pt-BR', options);
                    td.innerHTML = numberFormat.format(despesa[property]);
                } else {
                    td.innerHTML = despesa[property];
                }
                tr.appendChild(td);
            }
            let td = document.createElement('td');
            td.innerHTML = `<a href="${base}/despesas/${despesa['id']}/editar">
                                <img width="20" src="${base}/assets/images/document.png" alt=""/>
                            </a>`
            tr.appendChild(td);
            table.appendChild(tr);
        }
    }

    function filtroGeral() {
        if(unidade.value && !fatura_vencida.checked) {
            let filtradasPorMatricula = despesas.filter(
                (obj) => { 
                    return obj.id_apartamento.indexOf(unidade.value) > -1;
                }
            );
            clearTable(table);
            renderTable(filtradasPorMatricula);
        } 
        else if(!unidade.value && fatura_vencida.checked) {
            let filtradasPorVencidos = despesas.filter(
                (obj) => {
                    return obj.status_pagamento === "vencido";
                    }
            );
            clearTable(table);
            renderTable(filtradasPorVencidos);
        } 
        else if (unidade.value && fatura_vencida.checked) {
            let filtradas = despesas.filter(
                (obj) => { 
                    return obj.id_apartamento.indexOf(unidade.value) > -1;
                }
            ).filter(
                (obj) => {
                    return obj.status_pagamento === "vencido";
                    }
            );
            clearTable(table);
            renderTable(filtradas);
        } else {
            clearTable(table);
            renderTable(despesas);
        }
    }

    function filtraListaPorMatricula(evt) {
        filtroGeral();
    }

    function filtraListaPorFaturaVencida(evt) {
        filtroGeral();
    }
    let base = '<?=$base;?>';
    console.log(base);
    let despesas = JSON.parse('<?=json_encode($despesas)?>');
    const table = document.querySelector('table');
    renderTable(despesas);

    const unidade = document.getElementById('unidade');
    unidade.addEventListener('input', filtraListaPorMatricula);

    const fatura_vencida = document.getElementById('fatura_vencida');
    fatura_vencida.addEventListener('change', filtraListaPorFaturaVencida);
</script>
</body>
</html>


