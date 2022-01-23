<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');

$router->get('/inquilinos/cadastro', 'InquilinoController@inquilino');
$router->post('/inquilinos/cadastro', 'InquilinoController@inquilinoAction');
$router->get('/inquilinos/visualizar', 'InquilinoController@inquilinos');

$router->get('/unidades/cadastro', 'UnidadeController@unidade');
$router->post('/unidades/cadastro', 'UnidadeController@unidadeAction');
$router->get('/unidades/visualizar', 'UnidadeController@unidades');

$router->get('/despesas/cadastro', 'DespesasController@despesa');
$router->post('/despesas/cadastro', 'DespesasController@despesaAction');
$router->get('/despesas/{id}/editar', 'DespesasController@editdespesa');
$router->post('/despesas/{id}/editar', 'DespesasController@editdespesaAction');
$router->get('/despesas/visualizar', 'DespesasController@despesas');