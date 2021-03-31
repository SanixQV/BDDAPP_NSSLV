<?php


namespace bddapp\controller;


use bddapp\model\Character;
use bddapp\model\commentaire;
use bddapp\model\game;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Container;

class ControllerCharacter
{
    private $container;

    public function __construct(Container $c){
        $this->container=$c;
    }

    public function getInfoFromIdGames(Request $req, Response $res, array $args){
        try{
            $char = Character::where('id','=',$args['idchar'])->get();
            $body = $res->getBody();
            $body->write(json_encode(["character"=>$char]));
            return $res->withHeader(
                'Content-Type',
                'application/json'
            )->withBody($body);
        }
        catch(ModelNotFoundException $e){
            return $res->withStatus(404);
        }
    }


}