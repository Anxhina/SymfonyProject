<?php

namespace App\Controller;

use App\Entity\UsersList;
use App\Form\UsersListType;
use App\Repository\UsersListRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/users/list")



 */
class UsersListController extends AbstractController
{
    /**
     * @Route("/", name="users_list_index", methods={"GET"})
     */
    public function index(UsersListRepository $usersListRepository): Response
    {
        return $this->render('users_list/index.html.twig', [
            'users_lists' => $usersListRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="users_list_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $usersList = new UsersList();
        $form = $this->createForm(UsersListType::class, $usersList);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($usersList);
            $entityManager->flush();

            return $this->redirectToRoute('users_list_index');
        }

        return $this->render('users_list/new.html.twig', [
            'users_list' => $usersList,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="users_list_show", methods={"GET"})
     */
    public function show(UsersList $usersList): Response
    {
        return $this->render('users_list/show.html.twig', [
            'users_list' => $usersList,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="users_list_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, UsersList $usersList): Response
    {
        $form = $this->createForm(UsersListType::class, $usersList);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('users_list_index');
        }

        return $this->render('users_list/edit.html.twig', [
            'users_list' => $usersList,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="users_list_delete", methods={"DELETE"})
     */
    public function delete(Request $request, UsersList $usersList): Response
    {
        if ($this->isCsrfTokenValid('delete'.$usersList->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($usersList);
            $entityManager->flush();
        }

        return $this->redirectToRoute('users_list_index');
    }
}
