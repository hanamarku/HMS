<?php
class dbController{
    protected $host="localhost";
    protected $user="root";
    protected $password="";
    protected $database= "menaxhim_spitali";


    public $con=null;

    public function __construct()
    {
        $this->con=mysqli_connect($this->host,$this->user,$this->password,$this->database);
        if($this->con->connect_error){
            echo "Fail".$this->connect_error;
        }
    }

    public function __destruct()
    {
        $this->closeConnection();
    }

    protected function closeConnection(){
        if($this->con!=null){
            $this->con->close();
            $this->con=null;
        }
    }
}