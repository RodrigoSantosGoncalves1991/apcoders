<?php
namespace src\controllers;

use \core\Controller;
use src\handlers\UnidadeHandler;

class UnidadeController extends Controller {

    public function unidade() {
        $aviso = '';
        if(!empty($_SESSION['aviso'])) {
            $aviso = $_SESSION['aviso'];
            $_SESSION['aviso'] = '';
        }
        $this->render('unidade', [
            'aviso' => $aviso
        ]);
    }

    public function unidades() {
        $unidades = UnidadeHandler::carregaUnidades();
        $this->render('unidades', [
            'unidades' => $unidades
        ]);
    }

    public function unidadeAction() {
        $id_apartamento = filter_input(INPUT_POST, 'id_apartamento');
        $proprietario = filter_input(INPUT_POST, 'proprietario');
        $condominio = filter_input(INPUT_POST, 'condominio');
        $endereco = filter_input(INPUT_POST, 'endereco');

        $id_apartamento = strlen($id_apartamento) === 18 ? $id_apartamento : '';

        if($id_apartamento && $proprietario && $condominio && $endereco) {
            if(!UnidadeHandler::apartamentoJaExiste($id_apartamento)) {
                UnidadeHandler::adicionaUnidade($id_apartamento, $proprietario, $condominio, $endereco);
                $_SESSION['aviso'] = 'sucesso-Unidade cadastrada!';
            } else {
                $_SESSION['aviso'] = 'erro-Unidade já foi cadastrada!';
            }
        } else {
            $_SESSION['aviso'] = 'erro-Preencha todos os campos corretamente!';
        }
        $this->redirect('/unidades/cadastro');
    }

}