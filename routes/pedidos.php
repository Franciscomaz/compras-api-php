<?php

use Compras\Application\Pedido\PedidoService;
use Compras\Infrastructure\Repositories\PedidoRepository;
use Slim\Http\Request;
use Slim\Http\Response;

$app->group('/pedidos', function () use ($app) {
    $app->get('/{id}', function (Request $request, Response $response) {
        $produto = (new PedidoService(new PedidoRepository()))
            ->buscar($request->getAttribute('id'))
            ->toJson();
        $response->write($produto);
    });
    $app->get('', function (Request $request, Response $response) {
        $produtos = (new PedidoService(new PedidoRepository()))->pedidosRealizados();
        $response->write(json_encode($produtos));
    });
    $app->post('', function (Request $request, Response $response) {
        $produto = (new PedidoService(new PedidoRepository()))
            ->realizarPedido($request->getParsedBody())
            ->toJson();
        $response->write($produto);
    });
});
