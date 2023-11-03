<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\EditUserType;
use App\Repository\UserRepository;
use App\Entity\Category;
use App\Form\EditCategoryType;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry as PersistenceManagerRegistry;

#[Route('/admin', name: 'admin_')]
class AdminController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index()
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    #[Route('/users', name: 'users')]
    public function usersList(UserRepository $users)
    {
        return $this->render('admin/users.html.twig', [
            'users' => $users->findAll(),
        ]);
    }

    #[Route('/users/edit/{id}', name: 'user_edit')]
    public function editUser(User $user, Request $request, PersistenceManagerRegistry $doctrine)
    {
        $form = $this->createForm(EditUserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $doctrine->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('admin_users', [], Response::HTTP_SEE_OTHER);
        }
        
        return $this->render('admin/edituser.html.twig', [
            'userForm' => $form->createView(),
        ]);
    }

// CATEGORY

    #[Route('/categories', name: 'categories')]
    public function categoriesList(CategoryRepository $categories)
    {
        return $this->render('admin/categories.html.twig', [
            'categories' => $categories->findAll(),
        ]);
    }

    #[Route('/categories/edit/{id}', name: 'category_edit')]
    public function editCategory(Category $category, Request $request, PersistenceManagerRegistry $doctrine)
    {
        $form = $this->createForm(EditCategoryType::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $doctrine->getManager();
            $em->persist($category);
            $em->flush();

            return $this->redirectToRoute('admin_categories', [], Response::HTTP_SEE_OTHER);
        }
        
        return $this->render('admin/editcategory.html.twig', [
            'categoryForm' => $form->createView(),
        ]);
    }
}
