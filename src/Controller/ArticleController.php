<?php
  namespace App\Controller;

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

      return $this->render('articles/index.html.twig', array('name' => 'Brad'));
    }
  }
?>
