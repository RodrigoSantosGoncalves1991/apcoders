<?php
namespace src\handlers;
use src\models\Inquilino;

class InquilinoHandler {

    public static function emailJaExiste($email) {
        $inquilino = Inquilino::select()->where('email', $email)->one();
        return $inquilino ? true : false;
    }

    public static function adicionaInquilino($nome, $idade, $sexo, $telefone, $email,  $id_apartamento) {
        Inquilino::insert([
            'nome' => $nome,
            'idade' => $idade,
            'sexo' => $sexo,
            'telefone' => $telefone,
            'email' => $email,
            'id_apartamento' => $id_apartamento
        ])->execute();

        return true;
    }

    public static function carregaInquilinos() {
        $inquilinos = Inquilino::select()->execute();
        return $inquilinos;
    }
}
