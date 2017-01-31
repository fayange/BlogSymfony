<?php

namespace MenuBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render(':default:index.html.twig',
            array(
                "menuOptions"=>$this->menuOptions()
            ));



    }
//            MENU SIMPLE

//    private function menuOptions(){
//        return array(
//            array(
//                "libelle"=>"Accueil",
//                "route"=>"menu_homepage",
//                "titre"=>"retour à l'accueil de myBlog"
//            ),
//            array(
//                "libelle"=>"Tous les articles",
//                "route"=>"blog_article",
//                "titre"=>"Voir tous les articles"
//            ),
//            array(
//                "libelle"=>"Les 5 derniers articles",
//                "route"=>"blog_ajouter",
//                "titre"=>"Voir les 5 derniers articles"
//            ),
//            array(
//                'libelle' => 'L\'article',
//                'route' => 'blog_voir',
//                'titre' => 'Voir l\article',
//                'identifiant'=>68
//            ),
//            array(
//                "libelle"=>"Contacts",
//                "route"=>"menu_contacts",
//                "titre"=>"Contactez l'auteur du blog"
//            )
//        );
//}


    private function menuOptions(){
        return array(
            array(
                "libelle" => "Accueil",
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

