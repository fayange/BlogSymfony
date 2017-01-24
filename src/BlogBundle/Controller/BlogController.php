<?php
/**
 * Created by PhpStorm.
 * User: stephanie
 * Date: 24/01/2017
 * Time: 08:49
 * namespace Espace de nom correspond généralement au dossier contenant le contrôleur
 */

namespace BlogBundle\Controller;


/**
 * Utilisation de la classe Controller parente pour définir notre controleur
 */
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;// classe permettant de retourner une réponse HTTP simplement

/**class BlogController extends Controller{

    public function indexAction(){
        return new Response($this->toHtml());
    }

    private function toHtml(){
        return "
        <!doctype html>
        <html>
        <head>
        <title> Symfony is beautifull</title>
        </head>
        <body>
            <h1>Bonjour Symfony</h1>
        </body>
        </html>
        ";
    }
 **/

class BlogController extends Controller{

    public function indexAction(){
        return $this->render(
            "BlogBundle:Hello:index.html.twig",
            array(
                "pageTitle" => "J'aime Symfony",
                "innerTitle" => "Symfony exposé par le contrôleur"
            )
        );
    }

    /**
     * Permet de récupérer un paramètre qui vient d'une URL de type /blog/post/{id}
     * @param int $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function voirAction($id){
        //return new Response($this->toHtml($id));
        return $this->render(
            "BlogBundle:Hello:article.html.twig",
            array(
                "id" => $id
            )
        );
    }

    private function toHtml($id){
        return "
			<!doctype html>
			<html>
				<head>
					<title>Symfony is beautifull</title>
				</head>
				
				<body>
					<header>
						<h1>Bonjour Symfony</h1>
						<h2>On devra retouner l'article avec le n° : " . $id . "
					</header>
				</body>
			</html>
		";
    }

}