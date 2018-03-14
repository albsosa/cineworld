<?php
use App\Lib\Auth,
    App\Lib\Response,
    App\Validation\TestValidation,
    App\Middleware\AuthMiddleware;

$app->group('/empleado/', function () {
	//Este listar va a recibir dos parametros el primero es el limite y el segundo es un pagina
    $this->get('listar/{l}/{p}', function ($req, $res, $args) {
    	return $res->withHeader('Content-type', 'application/json')
    						->write(
    							json_encode($this->model->empleado->listar($args['l'], $args['p']))
    						);
    });
    $this->get('obtener/{id}', function ($req, $res, $args) {
    		return $res->withHeader('Content-type', 'application/json')
    						->write(
    							json_encode($this->model->empleado->obtener($args['id']))
    						);

    });
    $this->post('registrar', function ($req, $res, $args) {
		return $res->withHeader('Content-type', 'application/json')
    						->write(
    							json_encode($this->model->empleado->registrar($req->getParsedBody()))
    						);
    });
    $this->put('actualizar/{id}', function ($req, $res, $args) {
		return $res->withHeader('Content-type', 'application/json')
    						->write(
    							json_encode($this->model->empleado->actualizar($req->getParsedBody(), $args['id']))
    						);
    });
    $this->delete('eliminar/{id}', function ($req, $res, $args) {
		return $res->withHeader('Content-type', 'application/json')
    						->write(
    							json_encode($this->model->empleado->eliminar($args['id']))
    						);
    });
    
});