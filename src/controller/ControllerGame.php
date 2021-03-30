<?php


namespace bddapp\controller;


use bddapp\model\game;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Container;

class ControllerGame
{

    private $container;

    public function __construct(Container $c){
        $this->container=$c;
    }


    public function getInfoFromId(Request $req, Response $res, array $args){
        try{
            $game = game::select('id','name','alias','deck','description','original_release_date')->where('id','=',$args['idGames'])->firstOrFail();
            $body = $res->getBody();
            $body->write(json_encode($game));
            return $res->withHeader(
                'Content-Type',
                'application/json'
            )->withBody($body);
        }
        catch(ModelNotFoundException $e){
            return $res->withStatus(404);
        }
    }

    public function getCollectionGame(Request $req, Response $res,array $args){
        if(isset( $req->getQueryParams()['page'])){
            $max= 200*($req->getQueryParams()['page']-1);
            if($req->getQueryParams()['page']==1){
                $prev=1;
            }
            else{
                $prev=$req->getQueryParams()['page']-1;
            }
            $next = $req->getQueryParams()['page']+1;
        }
        else{
            $next = 2;
            $prev=1;
            $max=0;
        }
        $games = game::select('id','name','alias','deck','description','original_release_date')->skip($max)->take(200)->get();
        $body = $res->getBody();
        foreach ($games as $game){
            $c = $this->container->router->pathFor('infoGamesId', ["idGames" => $game["id"]]);
           $game = array("game" => $game, "links" => $c);  
        }
        $games->set
        $games = array("games"=>$games,
            array('links'=>
                array(
                    "prev"=>
                        array('href'=>$this->container->router->pathFor('infoGames').$prev),
                    "next"=>
                        array('href'=>$this->container->router->pathFor('infoGames').$next))));
        $body->write(json_encode($games));
        return $res->withHeader(
            'Content-Type',
            'application/json'
        )->withBody($body);
    }

}