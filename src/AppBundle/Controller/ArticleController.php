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
    public function listArticleAction(Request $request)
    {
        return $this->render('article/list.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/blog/article/{id}", name="article_show", requirements={"id"="\d+"})
     */
    public function showArticleAction(Request $request, $id = 1)
    {
        return $this->render('article/show.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
}
