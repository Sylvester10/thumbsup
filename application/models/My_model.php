<?php



class My_model extends CI_model{


    // autoloaded // load personal libraries
    function __construct()
    {
        parent::__construct();


        // get database configuration
        $data = array(
            'servername'=>$this->db->hostname,
            'username' =>$this->db->username,
            'password'=>$this->db->password,
            'dbname' =>$this->db->database
        );


        // load mydb --- access it anywhere as $this->mydb
        $this->load->library('my_database',$data,'mydb');
       
        
        
    }

}




?>