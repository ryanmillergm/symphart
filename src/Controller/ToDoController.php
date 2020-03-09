<?php
  namespace App\Controller;

  use Symfony\Component\HttpFoundation\Response;
  use Symfony\Component\Routing\Annotation\Route;
  use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
  use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

  class ToDoController extends AbstractController {
    /**
     * @Route("/todos")
     * @Method({"GET"})
     */

    public function index() {

      return $this->render('todos/index.html.twig');
    }
  }
?>
