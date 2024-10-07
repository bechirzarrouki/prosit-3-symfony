<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\AuthorRepository;
class AuthorController extends AbstractController
{   
    public $authors = array(
    array('id' => 1, 'picture' => '/image/Victor-Hugo.png','username' => 'Victor Hugo', 'email' => 'victor.hugo@gmail.com ', 'nb_books' => 100,'details'=>'http://127.0.0.1:8000/author/authorDetails/1'),
    array('id' => 2, 'picture' => '/image/william-shakespeare.jfif','username' => ' William Shakespeare', 'email' =>  ' william.shakespeare@gmail.com', 'nb_books' => 200 ,'details'=>'http://127.0.0.1:8000/author/authorDetails/2'),
    array('id' => 3, 'picture' => '/image/Taha_hussein.jfif','username' => 'Taha Hussein', 'email' => 'taha.hussein@gmail.com', 'nb_books' => 300,'details'=>'http://127.0.0.1:8000/author/authorDetails/3'),
    );

    #[Route('/author', name: 'app_author')]
    public function index(): Response
    {
        return $this->render('author/index.html.twig', [
            'controller_name' => 'AuthorController',
        ]);
    }
    #[Route('/author/showAuthor/{id}', name: 'apps1_author')]
    public function showAuthor( $id): Response
    {   
        
        return $this->render('author/show.html.twig', [
            'controller_name' => 'AuthorController',
            'author' => $this->authors[$id],
        ]);
    }
    #[Route('/author/listAuthor', name: 'apps2_author')]
    public function listAuthors(AuthorRepository $authorRepository): Response
    {    

        $a=$authorRepository->findAll();

        return $this->render('author/list.html.twig', [
            'controller_name' => 'AuthorController',
            'authors' => $a,
        ]);
    }
    #[Route('/author/authorDetails/{id}', name: 'apps3_author')]
    public function authorDetails($id): Response
    {    
        return $this->render('author/showAuthor.html.twig', [
            'controller_name' => 'AuthorController',
            'author' => $this->authors[$id-1],
        ]);
    }
}
