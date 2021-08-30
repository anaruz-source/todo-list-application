<?php

namespace App\Controller;

use App\Entity\Task;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ToDoListController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        $tasks = $this->getDoctrine()->getRepository(Task::class)->findBy([], ['id' => 'DESC']);

        return $this->render('index.html.twig', ['tasks' => $tasks]);
    }

    /**
     * @Route("/create", name="create_task", methods={"POST"})
     */
    public function create(Request $request): Response
    {
        $title = trim($request->request->get('title'));
        if (empty($title)) {
            return $this->redirectToRoute('index');
        }

        $manager = $this->getDoctrine()->getManager();

        $task = new Task();

        $task->setTitle($title);

        $manager->persist($task);
        $manager->flush();

        return $this->redirectToRoute('index');
    }

    /**
     * @Route("/switch-status/{id}", name="switch_status")
     */
    public function switchStatus($id): Response
    {
        $manager = $this->getDoctrine()->getManager();
        $task = $this->getDoctrine()->getRepository(Task::class)->find($id);
        $task->setStatus(!$task->getStatus());

        $manager->flush();

        return $this->redirectToRoute('index');
    }

    /**
     * @Route("/delete/{id}", name="delete_task")
     */
    public function delete(Task $id): Response // param converter to object Task
    {
        $manager = $this->getDoctrine()->getManager();

        $manager->remove($id);
        $manager->flush();

        return $this->redirectToRoute('index');
    }
}
