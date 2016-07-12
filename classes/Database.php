<?php
    class Database {
        private $host = 'localhost';
        private $user = 'root';
        private $pass = '';
        private $dbname = 'myblog';

        private $dbh;
        private $error;
        private $statement;

        public function __construct() {
            //SET DSN
            $dsn = 'mysql:host='.$this->host.';dbname='.$this->dbname;
            //SET OPTIONS
            $options = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );
            //CREATE A NEW PDO INSTANCE
            try {
                $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
            } catch(PDOEception $e) {
                $this->error = $e->getMessage();
            }
        }

        public function query($query) {
            $this->statement = $this->dbh->prepare($query);
        }

        public function bind($param, $value, $type = null) {
            if(is_null($type)) {
                switch (true) {
                    case is_int($value):
                        $type = PDO::PARAM_INT;
                        break;
                    case is_bool($value):
                        $type = PDO::PARAM_BOOL;
                        break;
                    case is_null($value):
                        $type = PDO::PARAM_NULL;
                        break;
                    default:
                        $type = PDO::PARAM_STR;                        
                }
            }
            $this->statement->bindValue($param, $value, $type);
        }

        public function execute() {
            return $this->statement->execute();
        }

        public function resultset() {
            $this->execute();
            return $this->statement->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>