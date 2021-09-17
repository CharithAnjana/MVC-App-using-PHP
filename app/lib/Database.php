<?php
    class Database
    {
        private $statement;
        private $dbHandler;
        private $error;

        public function __construct()
        {
            $conn = 'mysql:host=' . dbhost . ';dbname=' . dbname;
            $options = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );

            try
            {
                $this->dbHandler = new PDo($conn, dbuser, dbpass, $options);
            }
            catch(PDOException $e)
            {
                $this->error = $e->getMessage();
                echo $this->error;
            }
        }

        //To write select queries
        public function querys($sql, $cond = null)
        {
            $result = false;
            $this->statement = $this->dbHandler->prepare($sql);
            $this->statement->execute($cond);
            $result = $this->statement->fetchAll();
            return $result;
        }
        
        
        //To write create queries
        public function queryc($sql)
        {
            $this->statement = $this->dbHandler->prepare($sql);
        }
         //To bind values
         public function bind($para, $val, $type = null)
         {
             switch(is_null($type))
             {
                 case is_int($val):
                     $type = PDO::PARAM_INT;
                     break;
                 case is_bool($val):
                     $type = PDO::PARAM_BOOL;
                     break; 
                 case is_null($val):
                     $type = PDO::PARAM_NULL;
                     break;
                 default:
                     $type = PDO::PARAM_STR;
             }
             $this->statement->bindValue($para, $val, $type);
         }
        //To execute the statement
        public function execute()
        {
            return $this->statement->execute();
        }
       

    }

    define('dbhost', 'localhost');
    define('dbuser', 'root');
    define('dbpass', '');
    define('dbname', 'mvc');


?>