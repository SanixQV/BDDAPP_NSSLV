<?php


namespace bddapp\controller;


use bddapp\model\commentaire;
use bddapp\model\game;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Container;

class ControllerComms
{

    private $container;

    public function __construct(Container $c){
        $this->container=$c;
    }


    public function getInfoCom(Request $req, Response $res, array $args){

        try{
            $comm = commentaire::select('idCom','titre','contenu','created_at','idJeu')->where('idCom','=',$args['idcom'])->firstOrFail();
            $body = $res->getBody();
            $body->write(json_encode(["Comment : " =>$comm,"linksToTop"=>["href"=>$this->container->router->pathFor('infoGamesComme',["idGames"=>$comm["idJeu"]])]]));
            return $res->withHeader(
                'Content-Type',
                'application/json'
            )->withBody($body);
        }
        catch(ModelNotFoundException $e){
            return $res->withStatus(404);
        }
    }

    public function postComm(Request $rq, Response $rs, array $args){
        $com = new commentaire();
        $info = $rq->getParsedBody();
        if(isset($info['titre']) && isset($info['contenu'])) {
            $com->titre = $info['titre'];
            $com->contenu = $info['contenu'];
            $com->idJeu = $args['idGames'];
            $com->save();
            $idCom = ["idcom"=>$com['idCom']];
            $rs = $this->getInfoCom($rq,$rs,$idCom);
            $rs = $rs->withHeader('Content-type','application/json');
            $rs = $rs->withHeader('Location',$this->container->router->pathFor('infoCom', ["idcom" => $com["idCom"]]));
            $rs = $rs->withStatus(201);
        }
        return $rs;
    }


}