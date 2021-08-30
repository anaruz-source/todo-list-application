<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ToDoListController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        return $this->render('index.html.twig');
    }

    /**
     * @Route("/create", name="create_task", methods={"POST"})
     */
    public function create(): Response
    {
        exit('to do: create a task');
    }

    /**
     * @Route("/switch-status/{id}", name="switch_status")
     */
    public function switchStatus($id): Response
    {
        exit('to do: switch status of the task which as id '.$id);
    }

    /**
     * @Route("/delete/{id}", name="delete_task")
     */
    public function delete($id): Response
    {
        exit('to do: delte  the task which has id '.$id);
    }
}
