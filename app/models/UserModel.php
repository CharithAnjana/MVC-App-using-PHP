<?php
    class UserModel
    {
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }

        public function getUser($name)
        {
            $result = $this->db->querys(
                "SELECT * FROM user WHERE Fname LIKE ?", 
                ["%{$name}%"]
            );
            return $result;
        }

        public function createUser($data)
        {
            $this->db->queryc(
                "INSERT INTO user (ID, FName, LName, Email, Pass) 
                VALUES (Default, :fname, :lname, :email, :pass)"
            );

            $this->db->bind(':fname', $data['fname']);
            $this->db->bind(':lname', $data['lname']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':pass', $data['pass']);

            if($this->db->execute())
            {
                return true;
            }
            else
            {
                return false;
            }

        }
    }

?>