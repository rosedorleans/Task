<?php

namespace App\Controller;

use App\Entity\Task;
use App\Form\TaskType;
use App\Form\SearchForm;
use App\Data\SearchData;
use App\Repository\TaskRepository;
use App\Repository\categoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/')]
class TaskController extends AbstractController
{

    #[Route('/')]
     public function indexNoLocale(): Response
     {
         return $this->redirectToRoute('app_task_index', ['_locale' => 'en']);
     }

    #[Route('/{_locale<%app.supported_locales%>}/', name: 'app_task_index', methods: ['GET'])]
    public function index(TaskRepository $taskRepository, Request $request): Response
    {
        $data = new SearchData();
        $data->page = $request->get('page', 1);
        $form = $this->createForm(SearchForm::class, $data);
        $form->handleRequest($request);
        $tasks = $taskRepository->findSearch($data);

        return $this->render('task/index.html.twig', [
            'tasks' => $tasks,
            'form' => $form->createView()
        ]);
    }
    
    #[Route('/task/new', name: 'app_task_new', methods: ['GET', 'POST'])]
    public function new(Request $request, TaskRepository $taskRepository): Response
    {
        $task = new Task();
        $form = $this->createForm(TaskType::class, $task);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $taskRepository->save($task, true);

            return $this->redirectToRoute('app_task_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('task/new.html.twig', [
            'task' => $task,
            'form' => $form,
        ]);
    }

    #[Route('/task/show/{id}', name: 'app_task_show', methods: ['GET'])]
    public function show(Task $task): Response
    {
        return $this->render('task/show.html.twig', [
            'task' => $task,
        ]);
    }

    public function getTasksByCategoryId(Category $category)
    {
        $categories = $this->getAllCategory($category);
        $tasks = $em->getRepository('App:Task')->getByCategory($categories);

        return $this->render('task/show.html.twig', [
            'task' => $task,
        ]);
    }
}
