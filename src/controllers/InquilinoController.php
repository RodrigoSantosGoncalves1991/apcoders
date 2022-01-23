<?php
namespace src\controllers;

use \core\Controller;
use src\handlers\UnidadeHandler;
use src\handlers\InquilinoHandler;

class InquilinoController extends Controller {

    public function inquilino() {
        $aviso = '';
        if(!empty($_SESSION['aviso'])) {
            $aviso = $_SESSION['aviso'];
            $_SESSION['aviso'] = '';
        }
        $this->render('inquilino', [
            'aviso' => $aviso
        ]);
    }

    public function inquilinos() {
        $inquilinos = InquilinoHandler::carregaInquilinos();
        $this->render('inquilinos', [
            'inquilinos' => $inquilinos
        ]);
    }

    public function inquilinoAction() {
        $nome = filter_input(INPUT_POST, 'nome');
        $idade = filter_input(INPUT_POST, 'idade');
        $sexo = filter_input(INPUT_POST, 'sexo');
        $telefone = filter_input(INPUT_POST, 'telefone');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $id_apartamento = filter_input(INPUT_POST, 'id_apartamento');

        $id_apartamento = strlen($id_apartamento) === 18 ? $id_apartamento : '';

        if ($nome && $idade && $sexo && $telefone && $email && $id_apartamento) {
            if (UnidadeHandler::apartamentoJaExiste($id_apartamento)) {
                if (!InquilinoHandler::emailJaExiste($email)) {
                    InquilinoHandler::adicionaInquilino($nome, $idade, $sexo, $telefone, $email,  $id_apartamento);
                    $_SESSION['aviso'] = 'sucesso-Inquilino cadastrado!';
                } else {
                    $_SESSION['aviso'] = 'erro-Inquilo já é cadastrado!';
                }
            } else {
                $_SESSION['aviso'] = 'erro-Não é permitido cadastrar inquilino de imóvel não cadastrado!';
            }
        } else {
            $_SESSION['aviso'] = 'erro-Preencha todos os campos corretamente!';
        }
        $this->redirect('/inquilinos/cadastro');
    }
}