<?php


namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
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

    /**
     * Affiche la liste des articles au format JSON
     * @Route("/api/articles", name="article_list_json")
     */
    public function listJsonArticleAction()
    {
        return new JsonResponse([
            'data' => $this->getAllArticles(),
        ]);
    }

    /**
     * Affiche un article au format JSON
     * @Route("/api/article/{id}", name="article_show_json", requirements={"id"="\d+"})
     */
    public function showJsonArticleAction($id)
    {
        $article = $this->getOneArticle($id);

        // Si l'article demandé n'existe pas, on renvoie une erreur 404
        if(!$article)
            throw $this->createNotFoundException("L'article demandé n'existe pas.");

        return new JsonResponse([
            'data' => $this->getOneArticle($id)
        ]);
    }

    /**
     * Crée un nouvel article
     * @Route("/api/article/create", name="article_create_json")
     */
    public function createArticleAction(Request $request)
    {
        $json = $request->getContent();
        $post = json_decode($json);

        // Si les données envoyées ne sont pas utilisable, on renvoie une erreur BadRequest
        if(!isset($post->title) || !isset($post->description))
            throw new BadRequestHttpException('Les données envoyées ne sont pas valides');

        $this->createArticle($post->title, $post->description);

        return new JsonResponse([
            'data' => $post
        ]);
    }

    /*
     * Retourne la liste de tous les articles dans un tableau
     */
    private function getAllArticles(){
        $pdo = $this->getPDO();

        $query = 'SELECT * FROM articles';
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $pdo = null;
        return $data;
    }

    /*
     * Retourne un article avec son id. Si l'article n'existe pas, la méthode retourne null
     */
    private function getOneArticle($id){
        $pdo = $this->getPDO();

        $query = 'SELECT * FROM articles WHERE id = '.$id;
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $data = $stmt->fetch(\PDO::FETCH_ASSOC);

        $pdo = null;
        return $data;
    }

    /*
     * Créer un article
     */
    private function createArticle($title, $description){
        $pdo = $this->getPDO();

        $query = 'INSERT INTO articles (title, description) VALUES (?, ?)';
        $stmt = $pdo->prepare($query);
        $stmt->execute([$title, $description]);

        $pdo = null;
    }

    /*
     * Retourne un objet PDO pour se connecter à la base de données
     */
    private function getPDO() {
        return new \PDO('mysql:host='.$this->getParameter('database_host').
            ';dbname='.$this->getParameter('database_name').';charset=utf8',
            $this->getParameter('database_user'),
            $this->getParameter('database_password'));
    }
}
