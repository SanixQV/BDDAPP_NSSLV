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
            $max= 200*$args['idPage'];
        }
        else{
            $max=200;
        }
        $games = game::select('id','name','alias','deck','description','original_release_date')->whereBetWeen('id',[$max-200,$max])->get();
        $body = $res->getBody();
        //skip
        //take
        if($args['idPage']==1){
            $prev=1;
        }
        else{
            $prev=$args['idPage']-1;
        }
        $next = $args['idPage']+1;
        $games = array("games"=>$games,array('links'=> array("prev"=>array('href'=>'/api/games/page/'.$prev),"next"=>array('href'=>'/api/games/page'.$next))));
        $body->write(json_encode($games));
        return $res->withHeader(
            'Content-Type',
            'application/json'
        )->withBody($body);
    }

}