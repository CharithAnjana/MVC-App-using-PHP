<?php
    class User extends Controller
    {
        public function __construct()
        {
            $this->user = $this->model('UserModel');
        }   
        
        public function index()
        {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') 
            {
                $name = $_POST['name'];

                $user = $this->user->getUser($name);
                $data = $user;
                $this->view('User/index', $data);
            }
            else
            {
                $this->view('User/index');
            } 
        }

        public function register()
        {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') 
            {
                $data = [
                    'fname' => $_POST['fname'],
                    'lname' => $_POST['lname'],                    
                    'email' => $_POST['email'],
                    'pass' => $_POST['pass']
                ];
                
                if($this->user->createUser($data))
                {
                    header("Location: http://localhost/mvc_app/user/register");
                }
                else
                {
                    die("error!");
                }
                
            }
            else
            {
                $this->view('User/register');
            }
        }
       
    }

?>
