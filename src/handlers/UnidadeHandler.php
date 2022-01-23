<?php
namespace src\handlers;
use src\models\Unidade;

class UnidadeHandler {

    public static function apartamentoJaExiste($id_apartamento) {
        $unidade = Unidade::select()->where('id_apartamento', $id_apartamento)->one();
        return $unidade ? true : false;
    }

    public static function adicionaUnidade($id_apartamento, $proprietario, $condominio, $endereco) {
        Unidade::insert([
            'id_apartamento' => $id_apartamento,
            'proprietario' => $proprietario,
            'condominio' => $condominio,
            'endereco' => $endereco
        ])->execute();

        return true;
    }

    public static function carregaUnidades() {
        $unidades = Unidade::select()->execute();
        return $unidades;
    }
}




//echo "<script>console.log(".json_encode($foo).");</script>"
