<?php

class shopController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = $this->model('Shop');
    }

    public function index()
    {
        $session = new Session();
            $mostSold = $this->model->getMostSold();
            $news = $this->model->getNews();
            $data = [
                'titulo'    => 'Bienvenid@ a nuestra tienda',
                'menu'      => true,
                'subtitle'  => 'Bienvenid@ a nuestra tienda',
                'subtitle2' => 'Artículos nuevos',
                'data'      => $mostSold,
                'news'      => $news,
            ];
        if(isset($_SESSION['user'])){
            $user = $session->getUser();
            $adminEmail = $this->model->getAdminByEmail($user->email);
            if( $adminEmail != null && $adminEmail->email == $user->email){
                $data = [
                    'titulo'    => 'Bienvenid@ a nuestra tienda',
                    'menu'      => true,
                    'adminUser' => true,
                    'subtitle'  => 'Bienvenid@ a nuestra tienda',
                    'subtitle2' => 'Artículos nuevos',
                    'data'      => $mostSold,
                    'news'      => $news,
                ];
            }
        }
        $this->view('shop/index', $data);


    }

    public function show($id, $back = '')
    {
        $session = new Session();
        $product = $this->model->getProductById($id);
        if($session->getLogin()){
            $data = [
                'titulo'    => 'Detalle del producto',
                'subtitle'  => $product->name,
                'menu'      => true,
                'admin'     => false,
                'back'      => $back,
                'errors'    => [],
                'data'      => $product,
                'user_id'   => $session->getUserId(),
            ];
            $this->view('shop/show', $data);
        } else {
            $data = [
                'titulo'    => 'Detalle del producto',
                'subtitle'  => $product->name,
                'menu'      => true,
                'admin'     => false,
                'back'      => $back,
                'errors'    => [],
                'data'      => $product,
            ];
            $this->view('shop/show', $data);
        }
    }

    public function logout()
    {
        $session = new Session();
        $session->logout();
        header('location:'.ROOT);
    }

    public function whoami()
    {
        $session = new Session();
            $data = [
                'titulo'    => 'Quienes somos',
                'menu'      => true,
                'active'    => 'whoami',
            ];
            if(isset($_SESSION['user'])){
                $user = $session->getUser();
                $adminEmail = $this->model->getAdminByEmail($user->email);
                if( $adminEmail != null && $adminEmail->email == $user->email){
                    $data = [
                        'titulo'    => 'Quienes somos',
                        'menu'      => true,
                        'adminUser' => true,
                        'active'    => 'whoami',
                    ];
                }
            }
            $this->view('shop/whoami', $data);

    }

    public function contact()
    {
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $message = $_POST['message'] ?? '';

            if ($name == '') {
                array_push($errors, 'El nombre es obligatorio');
            }
            if ($email == '') {
                array_push($errors, 'El email es obligatorio');
            } elseif ( ! filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($errors, 'El correo electrónico no es válido');
            }
            if ($message == '') {
                array_push($errors, 'El mensaje es obligatorio');
            }

            if (count($errors) == 0) {
                if ($this->model->sendEmail($name, $email, $message)) {
                    $data = [
                        'titulo'    => 'Mensaje de Usuario',
                        'menu'      => true,
                        'errors'    => $errors,
                        'subtitle'  => 'Gracias por su mensaje',
                        'text'      => 'Gracias por su mensaje, en breve recibirá noticias nuestras',
                        'color'     => 'alert-success',
                        'url'       => 'shop',
                        'colorButton' => 'btn-success',
                        'textButton' => 'Regresar',
                    ];
                    $this->view('mensaje', $data);
                } else {
                    $data = [
                        'titulo'    => 'Mensaje de Usuario',
                        'menu'      => true,
                        'errors'    => $errors,
                        'subtitle'  => 'Error en el envío del correo electrónico',
                        'text'      => 'Existión un problema al enviar el correo electrónico. Por favor, pruebe más tarde o comuníquese con nuestro servicio de soporte.',
                        'color'     => 'alert-danger',
                        'url'       => 'shop',
                        'colorButton' => 'btn-danger',
                        'textButton' => 'Regresar',
                    ];
                    $this->view('mensaje', $data);
                }
            } else {
                $data = [
                    'titulo'    => 'Contacta con nosotros',
                    'menu'      => true,
                    'errors'    => $errors,
                    'active'    => 'contact',
                ];
                $this->view('shop/contact', $data);
            }
        } else {
            $session = new Session();

                $data = [
                    'titulo' => 'Contacta con nosotros',
                    'menu'   => true,
                    'active' => 'contact',
                ];
            if(isset($_SESSION['user'])){
                $user = $session->getUser();
                $adminEmail = $this->model->getAdminByEmail($user->email);
                if( $adminEmail != null && $adminEmail->email == $user->email){
                    $data = [
                        'titulo' => 'Contacta con nosotros',
                        'menu'   => true,
                        'adminUser' => true,
                        'active' => 'contact',
                    ];
                }
            }
                $this->view('shop/contact', $data);
            }
        }
}
