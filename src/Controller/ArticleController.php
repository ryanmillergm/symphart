<?php
  namespace App\Controller;

  use App\Entity\Article;

  use Symfony\Component\HttpFoundation\Response;
  use Symfony\Component\Routing\Annotation\Route;
  use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
  use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

  class ArticleController extends AbstractController {
    /**
     * @Route("/", name="article_list")
     * @Method({"GET"})
     */

    public function index() {
      // return new Response('<html><body>Hello</body></html>');

      $articles = ['Article 1', 'Article 2'];

      return $this->render('articles/index.html.twig', array('articles' => $articles));
    }

    /**
    *@Route("/article/save")
    */
    public function save(){
      $entityManager = $this->getDoctrine()->getManager();

      $article = new Article();
      $article->setTitle('Article One');
      $article->setBody('This is the body for article one');

      $entityManager->persist($article);

      $entityManager->flush();

      return new Response('Saved an article with the id of '.$article->getId());
    }
  }
?>
