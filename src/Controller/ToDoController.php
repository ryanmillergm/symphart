<?php
  namespace App\Controller;

  use App\Entity\ToDo;

  use Symfony\Component\HttpFoundation\Response;
  use Symfony\Component\Routing\Annotation\Route;
  use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
  use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

  class ToDoController extends AbstractController {
    /**
     * @Route("/todo")
     * @Method({"GET"})
     */

    public function index() {

      $todo_list = $this->getDoctrine()->getRepository(ToDo::class)->findAll();

      return $this->render('todos/index.html.twig', array('todo_list' => $todo_list));
    }

    /**
    *@Route("/todo/save")
    */
    public function save(){
      $entityManager = $this->getDoctrine()->getManager();

      $todo_list = new ToDo();
      $todo_list->setTitle('To-Do 2: Clean bathroom.');
      $todo_list->setBody('I will clean sinks, toilet, shower and tub');

      $entityManager->persist($todo_list);

      $entityManager->flush();

      return new Response('Saved an To-Do List with the id of '.$todo_list->getId());
    }
  }
