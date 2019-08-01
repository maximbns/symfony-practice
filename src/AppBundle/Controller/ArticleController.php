<?php


namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class ArticleController extends Controller
{
    /**
     * Affiche la liste des articles
     * @Route("/blog/articles", name="article_list")
     */
    public function listArticleAction()
    {
        return $this->render('article/list.html.twig', [
            'articles' => $this->getAllArticles(),
        ]);
    }

    /**
     * Affiche un article
     * @Route("/blog/article/{id}", name="article_show", requirements={"id"="\d+"})
     */
    public function showArticleAction($id)
    {
        $article = $this->getOneArticle($id);

        // Si l'article demandé n'existe pas, on renvoie vers la liste des articles
        if(!$article)
            return $this->redirectToRoute('article_list', [], 301);

        return $this->render('article/show.html.twig', [
            'article' => $this->getOneArticle($id)
        ]);
    }

    /*
     * Retourne la liste de tous les articles dans un tableau
     */
    private function getAllArticles(){
        $pdo = new \PDO('mysql:host=localhost;dbname=symfony;charset=utf8', 'root', '');
        $query = 'SELECT * FROM articles';
        $articles = $pdo->prepare($query);
        $articles->execute();

        return $articles->fetchAll();
    }

    /*
     * Retourne un article avec son id. Si l'article n'existe pas, la méthode retourne null
     */
    private function getOneArticle($id){
        $pdo = new \PDO('mysql:host=localhost;dbname=symfony;charset=utf8', 'root', '');
        $query = 'SELECT * FROM articles WHERE id = '.$id;
        $articles = $pdo->prepare($query);
        $articles->execute();
        $result = $articles->fetchAll();
        return $result ? $result[0] : null;
    }
}
