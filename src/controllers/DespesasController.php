<?php
namespace src\controllers;

use \core\Controller;
use src\handlers\UnidadeHandler;
use src\handlers\DespesaHandler;

class DespesasController extends Controller {

    public function despesa() {
        $aviso = '';
        if(!empty($_SESSION['aviso'])) {
            $aviso = $_SESSION['aviso'];
            $_SESSION['aviso'] = '';
        }
        $this->render('despesa', [
            'aviso' => $aviso
        ]);
    }

    public function despesas() {
        $despesas = DespesaHandler::carregaDespesas();
        $this->render('despesas',[
            'despesas' => $despesas
        ]);
    }

    public function despesaAction() {
        $descricao = filter_input(INPUT_POST, 'descricao');
        $tipo_despesa = filter_input(INPUT_POST, 'tipo_despesa');
        $valor =  floatval(str_replace(",", ".", filter_input(INPUT_POST, 'valor')));
        $vencimento_fatura = filter_input(INPUT_POST, 'vencimento_fatura');
        $status_pagamento = filter_input(INPUT_POST, 'status_pagamento');
        $id_apartamento = filter_input(INPUT_POST, 'id_apartamento');

        if ($descricao && $tipo_despesa && ($valor > 0) && $vencimento_fatura && $status_pagamento && $id_apartamento) {
            if (UnidadeHandler::apartamentoJaExiste($id_apartamento)) {
                DespesaHandler::adicionaDespesa($descricao, $tipo_despesa, $valor, $vencimento_fatura, $status_pagamento, $id_apartamento);
                $_SESSION['aviso'] = 'sucesso-Despesa cadastrada!';
            } else {
                $_SESSION['aviso'] = 'erro-Não é permitido cadastrar despesa de imóvel não cadastrado!';
            }
        } else {
            $_SESSION['aviso'] = 'erro-Preencha todos os campos corretamente!';
        }
        $this->redirect('/despesas/cadastro');
    }

    public function editdespesa($args) {
        $despesa = DespesaHandler::carregaDespesa($args['id']);

        $aviso = '';
        if(!empty($_SESSION['aviso'])) {
            $aviso = $_SESSION['aviso'];
            $_SESSION['aviso'] = '';
        }

        $this->render('editdespesa', [
            'despesa' => $despesa,
            'aviso' => $aviso
        ]);
    }

    public function editdespesaAction($args) {
        $descricao = filter_input(INPUT_POST, 'descricao');
        $tipo_despesa = filter_input(INPUT_POST, 'tipo_despesa');
        $valor =  floatval(str_replace(",", ".", filter_input(INPUT_POST, 'valor')));
        $vencimento_fatura = filter_input(INPUT_POST, 'vencimento_fatura');
        $status_pagamento = filter_input(INPUT_POST, 'status_pagamento');
        $id_apartamento = filter_input(INPUT_POST, 'id_apartamento');

        if ($descricao && $tipo_despesa && ($valor > 0) && $vencimento_fatura && $status_pagamento && $id_apartamento) {
            if (UnidadeHandler::apartamentoJaExiste($id_apartamento)) {
                DespesaHandler::editaDespesa($args['id'], $descricao, $tipo_despesa, $valor, $vencimento_fatura, $status_pagamento, $id_apartamento);
                $_SESSION['aviso'] = 'sucesso-Despesa editada!';
            } else {
                $_SESSION['aviso'] = 'erro-Não é permitido cadastrar despesa de imóvel não cadastrado!';
            }
        } else {
            $_SESSION['aviso'] = 'erro-Preencha todos os campos corretamente!';
            
        }
        $this->redirect('/despesas/'.$args['id'].'/editar');
    }

}