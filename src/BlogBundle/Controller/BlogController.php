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
use BlogBundle\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;// classe permettant de retourner une réponse HTTP simplement
use Symfony\Component\HttpFoundation\Request;//classe permettant

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
            'BlogBundle:Hello:index.html.twig',
            array(
                'pageTitle' => "J'aime Symfony",
                'innerTitle' => 'Symfony exposé par le contrôleur',
                'majVersion' => 1,
                'minVersion' => 0,
//                'menuOptions' => $this->menuOptions()
            )
        );
    }



//    private function menuOptions(){
//        return array(
//            array(
//                'libelle' => 'Accueil',
//                'route' => 'menu_homepage',
//                'titre' => "Retour à l'accueil de myBlog"
//            ),
//            array(
//                "libelle" => "Articles",
//                "route" => "",
//                "titre" => "Blog",
//                "enfants" => array(
//                    array(
//                        "libelle" => "Tous les articles",
//                        "route" => "blog_article",
//                        "titre" => "Voir tous les articles"
//                    ),
//                    array(
//                        "libelle" => "Les 5 derniers articles",
//                        'route' => "blog_ajouter",
//                        "titre" => "Voir les 5 derniers articles"
//                    ),
//                    array(
//                        "libelle" => "Voir l'article",
//                        "route" => "blog_voir",
//                        "titre" => "Voir un article en particulier",
//                        "identifiant" => 39
//                    )    )
//            ),
//            array(
//                "libelle" => "Contact",
//                "route" => "menu_contacts",
//                "titre" => "Contactez l'auteur de myBlog"
//            )
//        );
//    }

    /**
     * Permet de récupérer un paramètre qui vient d'une URL de type /blog/post/{id}
     * @param int $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function voirAction($id, request $httpRequest){
        //return new Response($this->toHtml($id));

        //Maintenant je peux accéder aux paramètres de requête HTTP
        // (tout ce qui se situé après ? dans la requête HTTP)
        //par l'intermédiare de l'objet Request $httpRequest

        $action = $httpRequest->query->get("action", "voir");

        // La méthode $this->generateUrl() permet de convertir
        //	le nom d'une route en une URL :
        // $this->generateUrl("blog_ajouter") => http://blog.dev/app_dev.php/blog/ajouter
        // La méthode $this->redirect() redirige une requête HTTP vers une autre requête HTTP
        if ($action == 'ajouter') {
            return $this->doRedirect('blog_hello');

            /**return $this->redirect(
             * $this->generateUrl("blog_hello")
             * );
             *
             * $url = $this->generateUrl("blog_hello");
             * return $this->redirect($url);
             **/
        }
        $url="";
        // Charger le post correspondant à l'ID passé en paramètre
        return $this->render(
            'BlogBundle:Hello:article.html.twig',
            array(
                'id' => $id,
                'auteur' => 'Stéphanie CAUMONT',
                'action' => $action,
                'url' => $url,
//                'menuOptions' => $this->menuOptions()
            )
        );
    }

    /**
     * Redirection en PHP
     * if(array_key_exists("action", $_GET)){
     *    if($_GET["action"] == "ajouter"){
     *        $url = "app_dev.php/hello-world";
     *        header("Location: " . $url);
     *    }
     * }
     */
//                                         MENU SIMPLE
//    private function menuOptions()
//    {
//        return array(
//            array(
//                "libelle" => "Accueil",
//                "route" => "menu_homepage",
//                "titre" => "retour à l'accueil de myBlog"
//            ),
//            array(
//                "libelle" => "Tous les articles",
//                "route" => "blog_article",
//                "titre" => "Voir tous les articles"
//            ),
//            array(
//                "libelle" => "Les 5 derniers articles",
//                "route" => "blog_ajouter",
//                "titre" => "Voir les 5 derniers articles"
//            ),
//            array(
//                'libelle' => 'L\'article',
//                'route' => 'blog_voir',
//                'titre' => 'Voir l\article',
//                'identifiant'=>68
//            ),
//            array(
//                "libelle" => "Contacts",
//                "route" => "menu_contacts",
//                "titre" => "Contactez l'auteur du blog"
//            )
//        );
//
//    }
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
						<h2>On devra retourner l'article avec le n° :  . $id . </h2>
					</header>
				</body>
			</html>";
    }

    public function articleAction()
    {
        $id="";
        $action="";
        $url="";
               return $this->render(
            'BlogBundle:Hello:article.html.twig',
                   array(
                       'id' => $id,
                       'auteur' => 'Stéphanie CAUMONT',
                       'action' => $action,
                       'url' => $url,
//                       'menuOptions' => $this->menuOptions()
                   )
               );
    }

//
//    public function ajouterAction()
//    {
//        $id="";
//        $action="";
//        $url="";
//        return $this->render(
//            "BlogBundle:Hello:ajouter.html.twig",
//
//              array(
//                  "id" => $id,
//                  "auteur" => "Stéphanie CAUMONT",
//                  "action" => $action,
//                  "url"=> $url,
//                  "menuOptions" => $this->menuOptions()
//              )
//               );
//    }

    /**
     * @param Request $request
     * @return Response
     */
    public function ajouterAction(Request $request){
        $idCree = 5; // Pour l'instant, on va créer une valeur "artificielle"


//        Récupère le service Doctrine dans la variable $doctrine
//        @var Object $doctrine
        $doctrine =$this->getDoctrine();

//        Depuis le service Doctrine, on veut récupérer le gestionnaire d'entities
//        (Entity Manager)
//        @var
        $manager = $doctrine->getManager();

        $article = new Article();

//        $article->getId($idCree);
        $article->setTitre('Un post magique par Entité');
        $article->setAuteur('Stéphanie CAUMONT');
        $article->setContenu('On utilise un objet Entité pour, dans un premier temps, passer des informations à une vue');
        $article->setPublication('1');
//        On va demander à Doctrine de faire "persister" (enregistrer) l'objet $article en BDD'
        $manager->persist($article);

        //Pour écrire l'ensemble des objets à faire persister
        $manager->flush();


        // Dans la classe Contrôleur, on récupère un objet Session
        // et de cet objet Session, on utilise le service getFlashBag()
        $flashMessage = $this->get('session')->getFlashBag();
        //$flashMessage = $this->get("session")->getFlashBag();
        $flashMessage->add('info', 'Je suis un message Flash, service de Symfony.');
        $flashMessage->add('info', 'Autre message');

        // Vous ne faites pas... $mailer = new swiftMailer();

        /**
         * En PHP :
         * $_SESSION["info"] = array(
         * 	"Je suis un message Flash, service de Symfony",
         * 	"Je suis capable d'afficher la valeur 5"
         * );
         **/
        return $this->render(
            'BlogBundle:Hello:ajouter.html.twig',
            array(
                'date' => date('d-m-Y H:i:s'),
                'article'=>$article, //on passe l'instance de l'objet BlogBundle\Entity\article
//                'menuOptions' => $this->menuOptions()
            )
        );
    }

}