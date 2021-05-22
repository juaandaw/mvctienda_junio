<?php

class coursesController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = $this->model('Course');
    }

    public function index()
    {
        $session = new Session();
            $courses = $this->model->getCourses();
            $data = [
                'titulo'    => 'Cursos en línea',
                'subtitle'  => 'Cursos',
                'menu'      => true,
                'active'    => 'courses',
                'data'      => $courses,
            ];
            if(isset($_SESSION['user'])){
                $user = $session->getUser();
                $adminEmail = $this->model->getAdminByEmail($user->email);
                if( $adminEmail != null && $adminEmail->email == $user->email){
                    $data = [
                        'titulo'    => 'Cursos en línea',
                        'subtitle'  => 'Cursos',
                        'menu'      => true,
                        'adminUser' => true,
                        'active'    => 'courses',
                        'data'      => $courses,
                    ];
                }
            }
            $this->view('courses/index', $data);

    }
}
