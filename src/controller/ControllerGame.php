<?php


namespace bddapp\controller;


use bddapp\model\commentaire;
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
            $game = ["Game"=>$game,
                "links"=>
                    [["comments"=>
                        ["href"=>$this->container->router->pathFor('infoGamesComme', ["idGames" =>
                            $game["id"]])]],
                    ["characters"=>["href"=>$this->container->router->pathFor('infoGamesChar', ["idGames" =>
                $game["id"]])]]]];
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

    public function getCommFromIdGames(Request $req, Response $res, array $args){
        try{
            $comm = commentaire::select('idCom','titre','contenu','created_at')->where('idJeu','=',$args['idGames'])->get();
            $body = $res->getBody();
            $tab =[];
            foreach ($comm as $com){
                $c = $this->container->router->pathFor('infoCom', ["idcom" => $com["idCom"]]);
                array_push($tab,["comment :"=> $com, "links" => ["self"=>["href"=>$c]]]);
            }
            $body->write(json_encode(["Comments : "=>$tab]));
            return $res->withHeader(
                'Content-Type',
                'application/json'
            )->withBody($body);
        }
        catch(ModelNotFoundException $e){
            return $res->withStatus(404);
        }
    }


    public function getCharacterFromId(Request $req, Response $res, array $args){
        $game = game::find($args['idGames'])->first();
        $body = $res->getBody();
        $chars = $game->character()->Select('id','name')->get();
        $tab =[];
        foreach ($chars as $char){
            $c = $this->container->router->pathFor('infoChar', ["idchar" => $char["id"]]);
            array_push($tab,["character :"=> $char, "links" => ["self"=>["href"=>$c]]]);
        }
        $body->write(json_encode(["Characters : "=>$tab]));
        return $res->withHeader(
            'Content-Type',
            'application/json'
        )->withBody($body);
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
        $tab = [];
        foreach ($games as $game){
            $c = $this->container->router->pathFor('infoGamesId', ["idGames" => $game["id"]]);
            array_push($tab,["Game :"=> $game, "links" => ["self"=>["href"=>$c]]]);
        }
        $games = ["games"=>$tab, 'links'=>
                [
                    "prev"=>
                        ['href'=>$this->container->router->pathFor('infoGames')."?page=".$prev],
                    "next"=>
                        ['href'=>$this->container->router->pathFor('infoGames')."?page=".$next]]];
        $body->write(json_encode($games));
        return $res->withHeader(
            'Content-Type',
            'application/json'
        )->withBody($body);
    }

}