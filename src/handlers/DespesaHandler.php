<?php
namespace src\handlers;
use src\models\Despesa;

class DespesaHandler {

    public static function adicionaDespesa($descricao, $tipo_despesa, $valor, $vencimento_fatura, $status_pagamento, $id_apartamento) {
        Despesa::insert([
            'descricao' => $descricao,
            'tipo_despesa' => $tipo_despesa,
            'valor' => $valor,
            'vencimento_fatura' => $vencimento_fatura,
            'status_pagamento' => $status_pagamento,
            'id_apartamento' => $id_apartamento
        ])->execute();
        return true;
    }

    public static function editaDespesa($id, $descricao, $tipo_despesa, $valor, $vencimento_fatura, $status_pagamento, $id_apartamento) {
        Despesa::update()
         ->set('descricao', $descricao)
         ->set('tipo_despesa', $tipo_despesa)
         ->set('valor', $valor)
         ->set('vencimento_fatura', $vencimento_fatura)
         ->set('status_pagamento', $status_pagamento)
         ->set('id_apartamento', $id_apartamento)
         ->where('id', $id)
        ->execute();
        return true;
    }

    public static function carregaDespesas() {
        $despesas = Despesa::select()->execute();
        return $despesas;
    }

    public static function carregaDespesa($id) {
        $despesa = Despesa::select()->find($id);
        return $despesa;
    }

}