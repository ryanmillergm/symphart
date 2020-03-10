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
     * @Route("/todo", name="todo_list")
     * @Method({"GET"})
     */

    public function index() {

      $todo_list = $this->getDoctrine()->getRepository(ToDo::class)->findAll();

      return $this->render('todos/index.html.twig', array('todo_list' => $todo_list));
    }

    /**
    * @Route("/todo/new", name="new_todo")
    * @Method({"GET", "POST"})
    */
    public function new(Request $request) {
      $todo = new ToDo();

      $form = $this->createFormBuilder($todo)
      ->add('title', TextType::class, array('attr' => array('class' => 'form-control')))
      ->add('body', TextareaType::class, array (
        'attr' => array('class' => 'form-control')
      ))
      ->add('save', SubmitType::class, array(
        'label' => 'Create',
        'attr' => array('class' => 'btn btn-primary mt-3')
      ))
      ->getForm();

      $form->handleRequest($request);

      if($form->isSubmitted() && $form->isValid()) {
        $todo = $form->getData();

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($todo);
        $entityManager->flush();

        return $this->redirectToRoute('todo_list');
      }

      return $this->render('todos/new.html.twig', array('form' => $form->createView()
    ));
    }

    /**
     * @Route("/todo/{id}", name="todo_show")
     * @Method({"GET"})
     */
    public function show($id) {
      $todo = $this->getDoctrine()->getRepository(ToDo::class)->find($id);

      return $this->render('todos/show.html.twig', array('todo' => $todo));
    }

    /**
    *@Route("/todo/save")
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
