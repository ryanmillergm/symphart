<?php
  namespace App\Controller;

  use App\Entity\ToDo;

  use Symfony\Component\HttpFoundation\Response;
  use Symfony\Component\HttpFoundation\Request;
  use Symfony\Component\Routing\Annotation\Route;
  use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
  use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

  use Symfony\Component\Form\Extension\Core\Type\TextType;
  use Symfony\Component\Form\Extension\Core\Type\TextareaType;
  use Symfony\Component\Form\Extension\Core\Type\SubmitType;

  class ToDoController extends AbstractController {
    /**
     * @Route("/todos")
     * @Method({"GET"})
     */

    public function index() {

      $todo_list = $this->getDoctrine()->getRepository(ToDo::class)->findAll();

      return $this->render('todos/index.html.twig', array('todo_list' => $todo_list));
    }

    /**
     * @Route("/todos/{id}", name="todo_show")
     * @Method({"GET"})
     */
    public function show($id) {
      $todo = $this->getDoctrine()->getRepository(ToDo::class)->find($id);

      return $this->render('todos/show.html.twig', array('todo' => $todo));
    }

    /**
    *@Route("/todos/save")
    */
    // public function save(){
    //   $entityManager = $this->getDoctrine()->getManager();
    //
    //   $todo_list = new ToDo();
    //   $todo_list->setTitle('To-Do 2: Clean bathroom.');
    //   $todo_list->setBody('I will clean sinks, toilet, shower and tub');
    //
    //   $entityManager->persist($todo_list);
    //
    //   $entityManager->flush();
    //
    //   return new Response('Saved an To-Do List with the id of '.$todo_list->getId());
    // }
  }
