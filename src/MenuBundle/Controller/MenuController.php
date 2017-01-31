<?php
/**
 * Created by PhpStorm.
 * User: stephanie
 * Date: 25/01/2017
 * Time: 09:52
 */
namespace MenuBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\httpFoundation\Response;// classe permettant de retourner une réponse HTTP simplement
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

class MenuController extends Controller
{

    public function indexAction()
    {
        return $this->render(
//          return new Response("Coucou je suis le menu");

            '::nav.html.twig',
            array(
                'menuOptions' =>$this->menuOptions()
            )
        );
    }

    public function contactsAction()
    {
//        $menuOptions=array(
//            "Accueil",//=>"MenuBundle:Default:index.html.twig",
//            "Lien2",//=>"MenuBundle:Default:index.html.twig",
//            "articles",
////            "Articles"=>array(
////                "Tous les articles",//=>Action,
////                "Les 5 derniers articles",//=> Autre_Action,
////                "Something else here",//=> Quelque_chose,
////                "Separated link",//=> Separated_link,
////                "One More Separated link"//=> One_More_Separated_link
////            ),
//            "Contacts"//=> "MenuBundle:Menu:contacts.html.twig"
//        );

        return $this->render(
            'MenuBundle:Menu:contacts.html.twig',
            array(
                'menuOptions' =>$this->menuOptions()
            )
        );
    }

    public function footerAction(){
        return $this->render(
            "MenuBundle:Menu:footer.html.twig",
            array(
                "menuOptions" => $this->menuOptions()
            )
        );
    }


//                MENU SIMPLE
//    private function menuOptions()
//    {
//        return array(
//            array(
//                'libelle' => 'Accueil',
//                'route' => 'menu_homepage',
//                'titre' => "retour à l'accueil de myBlog"
//            ),
//            array(
//                'libelle' => 'Tous les articles',
//                'route' => 'blog_article',
//                'titre' => 'Voir tous les articles'
//            ),
//            array(
//                'libelle' => 'Les 5 derniers articles',
//                'route' => 'blog_ajouter',
//                'titre' => 'Voir les 5 derniers articles'
//            ),
//            array(
//                'libelle' => 'L\'article',
//                'route' => 'blog_voir',
//                'titre' => 'Voir l\article',
//                'identifiant' => 68
//            ),
//            array(
//                'libelle' => 'Contacts',
//                'route' => 'menu_contacts',
//                'titre' => 'Contactez l\'auteur du blog'
//            )
//        );
//    }


    private function menuOptions(){
        return array(
            array(
                "libelle" =>"Accueil",
                "route" => "menu_homepage",
                "titre" => "Retour à l'accueil de myBlog"
            ),
            array(
                "libelle" => "Articles",
                "route" => "",
                "titre" => "Blog",
                "enfants" => array(
                    array(
                        "libelle" => "Tous les articles",
                        "route" => "blog_article",
                        "titre" => "Voir tous les articles"
                    ),
                    array(
                        "libelle" => "Les 5 derniers articles",
                        "route" => "blog_ajouter",
                        "titre" => "Voir les 5 derniers articles"
                    ),
                    array(
                        "libelle" => "Voir l'article",
                        "route" => "blog_voir",
                        "titre" => "Voir un article en particulier",
                        "identifiant" => 39
                    )
                )
            ),
            array(
                "libelle" => "Contact",
                "route" => "menu_contacts",
                "titre" => "Contactez l'auteur de myBlog"
            )
        );
    }

}
