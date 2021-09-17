<?php
    //Core class
    class Core
    {
        protected $currentController = 'Home';
        protected $currentMethod = 'index';
        protected $param = [];

        public function __construct()
        {
            $url = $this->getUrl();

            //Look in controllers & ucwords will capitalize first letter
            if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php'))
            {
                $this->currentController = ucwords($url[0]);   //to set new controller
                unset($url[0]);
            }

            //Require the controller
            require_once '../app/controllers/' . $this->currentController . '.php';
            $this->currentController = new $this->currentController;


            
            //Look for the method
            if(isset($url[1]))
            {
                if(method_exists($this->currentController, $url[1]))
                {
                    $this->currentMethod = $url[1];
                    unset($url[1]);
                }
            }

            //Get parameters
            $this->param = $url ? array_values($url) : [];

            //Call a callback with array
            call_user_func_array([$this->currentController, $this->currentMethod], $this->param);
        }

        public function getUrl()
        {
            if(isset($_GET['url']))
            {
                $url = rtrim($_GET['url'], '/');
                $url = filter_var($url, FILTER_SANITIZE_URL);   //to filter url
                $url = explode('/', $url);   //break url into an array

                return $url;
            }
        }
    }

?>