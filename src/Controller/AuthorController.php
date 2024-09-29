<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuthorController extends AbstractController
{
    #[Route('/author', name: 'app_author')]
    public function index(): Response
    {
        return $this->render('author/index.html.twig', [
            'controller_name' => 'AuthorController',
        ]);
    }
    #[Route('/author/showAuthor/{id}', name: 'apps1_author')]
    public function showAuthor($id): Response
    {   
        $authors = array(
            array('id' => 1, 'picture' => '/image/Victor-Hugo.jpg','username' => 'Victor Hugo', 'email' => 'victor.hugo@gmail.com ', 'nb_books' => 100),
            array('id' => 2, 'picture' => '/image/william-shakespeare.jfif','username' => ' William Shakespeare', 'email' =>  ' william.shakespeare@gmail.com', 'nb_books' => 200 ),
            array('id' => 3, 'picture' => '/image/Taha_hussein.jfif','username' => 'Taha Hussein', 'email' => 'taha.hussein@gmail.com', 'nb_books' => 300),
            );
        return $this->render('author/show.html.twig', [
            'controller_name' => 'AuthorController',
            'author' => $authors[$id],
        ]);
    }
    #[Route('/author/listAuthor', name: 'apps2_author')]
    public function listAuthors(): Response
    {    
        $authors = array(
        array('id' => 1, 'picture' => '/image/Victor-Hugo.jpg','username' => 'Victor Hugo', 'email' => 'victor.hugo@gmail.com ', 'nb_books' => 100),
        array('id' => 2, 'picture' => '/image/william-shakespeare.jfif','username' => ' William Shakespeare', 'email' =>  ' william.shakespeare@gmail.com', 'nb_books' => 200 ),
        array('id' => 3, 'picture' => '/image/Taha_hussein.jfif','username' => 'Taha Hussein', 'email' => 'taha.hussein@gmail.com', 'nb_books' => 300),
        );
        

        return $this->render('author/list.html.twig', [
            'controller_name' => 'AuthorController',
            'authors' => $authors,
        ]);
    }
}
