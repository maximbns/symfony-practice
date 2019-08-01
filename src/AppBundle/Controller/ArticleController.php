<?php


namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class ArticleController extends Controller
{
    /**
 * @Route("/blog/articles", name="article_list")
 */
    public function listArticleAction()
    {
        return $this->render('article/list.html.twig', [
            'articles' => $this->getAllArticles(),
        ]);
    }

    /**
     * @Route("/blog/article/{id}", name="article_show", requirements={"id"="\d+"})
     */
    public function showArticleAction($id)
    {
        return $this->render('article/show.html.twig', [
            'article' => $this->getOneArticle($id)
        ]);
    }

    private function getAllArticles(){
        $pdo = new \PDO('mysql:host=localhost;dbname=symfony;charset=utf8', 'root', '');
        $query = 'SELECT * FROM articles';
        $articles = $pdo->prepare($query);
        $articles->execute();

        return $articles->fetchAll();
    }

    private function getOneArticle($id){
        $pdo = new \PDO('mysql:host=localhost;dbname=symfony;charset=utf8', 'root', '');
        $query = 'SELECT * FROM articles WHERE id = '.$id;
        $articles = $pdo->prepare($query);
        $articles->execute();
        $result = $articles->fetchAll();
        return $result ? $result[0] : null;
    }
}
