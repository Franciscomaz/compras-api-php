<?php

use Compras\Application\Produto\ProdutoService;
use Compras\Infrastructure\Repositories\ProdutosRepository;
use Slim\Http\Request;
use Slim\Http\Response;

$app->group('/produtos', function () use ($app) {
    $app->get('/{id}', function (Request $request, Response $response) {
        $produto = (new ProdutoService(new ProdutosRepository()))
            ->buscar($request->getAttribute('id'))
            ->toJson();
        $response->write($produto);
    });
    $app->get('', function (Request $request, Response $response) {
        $produtos = (new ProdutoService(new ProdutosRepository()))->listar();
        $response->write(json_encode($produtos));
    });
    $app->post('', function (Request $request, Response $response) {
        $produto = (new ProdutoService(new ProdutosRepository()))
            ->adicionar($request->getParsedBody())
            ->toJson();
        $response->write($produto);
    });
    $app->put('', function (Request $request, Response $response) {
        $produto = (new ProdutoService(new ProdutosRepository()))
            ->atualizar($request->getParsedBody())
            ->toJson();
        $response->write($produto);
    });

    $app->delete('/{id}', function (Request $request, Response $response) {
        $produto = (new ProdutoService(new ProdutosRepository()))
            ->remover($request->getAttribute('id'))
            ->toJson();
        $response->write($produto);
    });
});
