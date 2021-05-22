<?php

class booksController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = $this->model('Book');
    }

    public function index()
    {
        $session = new Session();
            $books = $this->model->getBooks();
            $data = [
                'titulo'    => 'Libros',
                'subtitle'  => 'Libros',
                'menu'      => true,
                'active'    => 'books',
                'data'      => $books,
            ];
            if(isset($_SESSION['user'])){
                $user = $session->getUser();
                $adminEmail = $this->model->getAdminByEmail($user->email);
                if( $adminEmail != null && $adminEmail->email == $user->email){
                    $data = [
                        'titulo'    => 'Libros',
                        'subtitle'  => 'Libros',
                        'menu'      => true,
                        'adminUser' => true,
                        'active'    => 'books',
                        'data'      => $books,
                    ];
                }
            }
            $this->view('books/index', $data);

    }
}
