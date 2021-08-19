<?php



class Org_structures extends CI_model{

     
    private $abbrs,$table="org_structure";




    /**
     * __construct
     * - assigns the database object to a variable
     * @param database 
     * @return
     * 
     * 
     */
    function __construct(){

        $this->load_abbrs(); // loading abbreviations
    }


    /**
     * add_structure()
     * @param string-fullname - the name attached the STRUCTURE - unique
     * @param string-abbr - abbreviation attached to the STRUCTURE - unique
     * @param string-under - the structure to contain the STRUCTURE you are creating, it abbreviation is need - existing structure
     * @param string-rank -  the ranking of this structure when placed alongside its siblings NOTE!: must not be greater than rank of containing structure(Parent Container)
     * @return true-success
     * @return false-failure
     */
    public function add_structure($fullname,$abbr,$under,$rank){
        try{
            // making sure right value was passed
            if($fullname == "" or is_array($fullname) or $abbr == "" or is_array($abbr) or is_bool($fullname) or is_bool($abbr) or is_bool($under) or is_array($under) or !is_numeric($rank)){
                throw new Exception("<b>Invalid Data Passed!</b> Check arguments and try again", 1);
            }


            $abbr = strtoupper($abbr);
            $table = $this->table;
            $under = $this->get_abbr($under);
            $type = "structure";
            $date = time();




            //checking for fullname - making sure the fullname is unique
            if($this->check_duplicate("fullname",$fullname)){
                throw new Exception("<b>Invalid Fullname:</b> <i>$fullname</i> already Exist in the Organization structure", 1);
            }


            //checking for abbr - making sure the ABBR provided is unique
            if($this->check_duplicate("abbr",$abbr)){
                throw new Exception("<b>Invalid Abbreviation:</b> <i>$abbr</i> already Exist in the Organization structure", 1);
            }

            //checking for under -- making sure the parent structure exist
            if(!$this->check_duplicate("abbr",$under)){
                throw new Exception("<b>invalue structure:</b> <i>$under</i> isn't a valid structure in the Organization structure", 1);
            }

            // getting parent details
            $parent_struture__detail= $this->mydb->select($table,"*",['abbr'=>$under])->get_results()[0];

            $parent_address = $parent_struture__detail->address;

            $parent_rank = $parent_struture__detail->rank;

            $address = $parent_address."/".$abbr; // creating address from parent address 

                    
            // checking rank
            if($rank>$parent_rank){
                throw new Exception("<b>Rank($rank)</b> provided is greater than parent($under) rank($parent_rank)", 1);
            }


            $data = [
                "fullname"=>$fullname,
                "abbr"=>$abbr,
                "under"=>$under,
                "rank"=>$rank,
                "address"=>$address,
                "date_added"=>$date,
                "type"=>$type
            ];

            if($this->mydb->insert($table,$data)){
                $new_struture = $this->mydb->select($table,"*",['abbr'=>$abbr])->get_results()[0];
                $hash_key = sha1($new_struture->id."-".$address); // generating hash_key

                ///updating hash_key
                if($this->mydb->update($table,["hash_key"=>$hash_key],['abbr'=>$abbr])){
                        return  true;
                }
                
                }else{
                    return false;
            }











        }catch( Exception $e ) {
          $message = $e->getMessage();
        
          die( $message );
        }



    }


    /**
     * add_position()
     * @param string-fullname - the name attached the POSITION - unique
     * @param string-abbr - abbreviation attached to the POSITION - unique
     * @param string-under - the structure to contain the POSITION you are creating, it abbreviation is need - existing structure
     * @param string-rank -  the ranking of this POSSITION when placed alongside its siblings
     * @param string-amount - the number of profiles /people that can hold this position
     * @return false-failure
     */
    public function add_position($fullname,$abbr,$under,$rank,$amount){
        try{

            // making sure right value was passed
            if($fullname == "" or is_array($fullname) or $abbr == "" or is_array($abbr) or is_bool($fullname) or is_bool($abbr) or is_bool($under) or is_array($under) or !is_numeric($rank) or $amount =="" or !is_numeric($amount) or $rank==""){
                throw new Exception("<b>Invalid Data Passed!</b> Check arguments and try again", 1);
            }

            $abbr = strtoupper($abbr);
            $table = $this->table;
            $under = strtoupper($under);
            $type = "position";
            $date = time();



            //checking for fullname - making sure the fullname is unique
            if($this->check_duplicate("fullname",$fullname)){
                throw new Exception("<b>Invalid Fullname:</b> <i>$fullname</i> already Exist in the Organization structure", 1);
            }


            //checking for abbr - making sure the ABBR provided is unique
            if($this->check_duplicate("abbr",$abbr)){
                throw new Exception("<b>Invalid Abbreviation:</b> <i>$abbr</i> already Exist in the Organization structure", 1);
            }

            //checking for under -- making sure the parent structure exist
            if(!$this->check_duplicate("abbr",$under)){
                throw new Exception("<b>invalue structure:</b> <i>$under</i> isn't a valid structure in the Organization structure", 1);
            }

            // getting parent details
            $parent_struture__detail= $this->mydb->select($table,"*",['abbr'=>$under])->get_results()[0];

            $parent_address = $parent_struture__detail->address;

            $address = $parent_address."/".$abbr; // creating address from parent address 

                    
            ///checking for amount
            if(!is_numeric($amount)){
                throw new Exception("Invalid datatype provided($amount) - argument must be a number not a string", 1);
            }

            if($amount == 0){
                throw new Exception("Amount should be more than 0", 1);         
            }

            $data = [
                "fullname"=>$fullname,
                "abbr"=>$abbr,
                "under"=>$under,
                "rank"=>$rank,
                "address"=>$address,
                "date_added"=>$date,
                "type"=>$type,
                "amount"=>$amount
            ];

            if($this->mydb->insert($table,$data)){
                $new_struture = $this->mydb->select($table,"*",['abbr'=>$abbr])->get_results()[0];
                $hash_key = sha1($new_struture->id."-".$address); // generating hash_key

                ///updating hash_key
                if($this->mydb->update($table,["hash_key"=>$hash_key],['abbr'=>$abbr])){
                        return  true;
                }
                
                }else{
                    return false;
            }




            return $address;






        }catch( Exception $e ) {
          $message = $e->getMessage();
        
          die( $message );
        }



    }


    /**
     * check_duplicate()
     * - Checks to see if a VALUE duplicate exists in a particular FIELD.
     * @param string FIELD NAME -column to check
     * @param string VALUE - value to check for
     * @return boolen 
     * 
     */
    public function check_duplicate($field,$value){
        try{
            $table = $this->table;

            //checking for field
            if(!$this->mydb->field_in_table($field,$table)){
                throw new Exception("<b>$field</b> is not a field in <b>$table</b>", 1);
            }


            $check = $this->mydb->select($table,"*",[$field => $value])->get_num_rows();

            if($check){
                return true;
            }else{
                return false;
            }


        }catch( Exception $e ) {
          $message = $e->getMessage();
        
          die( $message );
        }
    }


    /**
     * get_sub_structures()
     * - returns all the sub structures of the provided structure
     * @param VALUE - can either be th ID, HASH_KEY, ADDRESS, ABBR, FULLNAME 
     * @return  array - and array containing objects for each row of structure found
     * @return false -  if no sub structure was found
     * 
     */
    public function get_sub_structures($val){
        try{
            $table = $this->table;
            $type = 'structure';
            $val = trim($val);

            $abbr = $this->get_abbr($val);
        
            $result = $this->mydb->select($table,"*",['under'=>$abbr,'type'=>$type],['rank-desc'])->get_results();
        
            if(!empty($result)){
                return $result;
            }else{
                return false;
            }



        }catch( Exception $e ) {
            $message = $e->getMessage();
          
            die( $message );
          }

        

    }


    /**
     * get_sub_positions()
     * - returns all the sub positions of the provided structure
     * @param VALUE - can either be th ID, HASH_KEY, ADDRESS, ABBR, FULLNAME 
     * @return  array - and array containing objects for each row of position found
     * @return false -  if no sub position was found
     * 
     */
    public function get_sub_positions($val){
        try{
            $table = $this->table;
            $type = 'position';
            $val = trim($val);

            $abbr = $this->get_abbr($val);
        
            $result = $this->mydb->select($table,"*",['under'=>$abbr,'type'=>$type],['rank-desc'])->get_results();
        
            if(!empty($result)){
                return $result;
            }else{
                return false;
            }



        }catch( Exception $e ) {
            $message = $e->getMessage();
          
            die( $message );
          }

        

    }


    /**
     * get_sub_all()
     * - returns all the sub positions and structures of the provided structure
     * @param VALUE - can either be th ID, HASH_KEY, ADDRESS, ABBR, FULLNAME 
     * @return  array - and array containing objects for each row of position found
     * @return false -  if no sub position/structure was found
     * 
     */
    public function get_sub_all($val){
        try{
            $structures = $this->get_sub_structures($val);
            $positions = $this->get_sub_positions($val);

            if(is_array($structures) && is_array($positions)){
                $all = array_merge($structures,$positions);
            }else {
                $all  = false;
            }

            return $all;




        }catch( Exception $e ) {
            $message = $e->getMessage();
          
            die( $message );
          }
    }


    /**
     * update_hash_key()
     * - updates the hash key of the structure or position provided
     * @param VALUE - can either be th ID, HASH_KEY, ADDRESS, ABBR, FULLNAME 
     * @return  boolen True on succes, False on failure
     * 
     */
    public function update_hash_key($val){
        try{
            $val = trim($val);
            $abbr = $this->get_abbr($val);
            $table = $this->table;

            $new_struture = $this->mydb->select($table,"*",['abbr'=>$abbr])->get_results()[0];
            $hash_key = sha1($new_struture->id."-".$new_struture->address); // generating hash_key
            //$hash_key = $new_struture->id."-".$new_struture->address; //hash_key without hashing

            ///updating hash_key
            if($this->mydb->update($table,["hash_key"=>$hash_key],['abbr'=>$abbr])){
                    return  true;
            }else{{
                return false;
            }}

        }catch( Exception $e ) {
            $message = $e->getMessage();
          
            die( $message );
          }
    }


    /**
     * is_structure()
     * - Checks if the value provided is a STRUCTURE
     * @param VALUE - can either be th ID, HASH_KEY, ADDRESS, ABBR, FULLNAME 
     * @return  boolen True on succes, False on failure
     * 
     */
    public function is_structure($val){

        $table = $this->table;
        $type = 'structure';
        $val = trim($val);
        //creating data for where selection
        $data = $this->gen_data($val);

        $this->mydb->or_where($data);
        $this->mydb->where(['type'=>'structure']);
        
        $result = $this->mydb->select($table,"*")->get_results();

        if(!empty($result)){
            return true;
        }else{
            return false;
        }

        
    }


    /**
     * is_position()
     * - Checks if the value provided is a POSITION
     * @param VALUE - can either be th ID, HASH_KEY, ADDRESS, ABBR, FULLNAME 
     * @return  boolen True on succes, False on failure
     * 
     */
    public function is_position($val){
        
        $table = $this->table;
        $type = 'position';
        $val = trim($val);
        //creating data for where selection
        $data = $this->gen_data($val);

        $this->mydb->or_where($data);
        $this->mydb->where(['type'=>'position']);
        
        $result = $this->mydb->select($table,"*")->get_results();

        if(!empty($result)){
            return true;
        }else{
            return false;
        }

        
    }


    /**
     * gen_data()
     * - Generates data for the or Where Condition
     * @param VALUE - can either be th ID, HASH_KEY, ADDRESS, ABBR, FULLNAME 
     * @return  array 
     * 
     */
    private function gen_data($val){
        $val = trim($val);
        $data = [
            "id"=>$val,
            "hash_key"=>$val,
            "abbr"=>$val,
            "address"=>$val,
            "fullname"=>$val
        ];
        
        return $data;

    }



    /**
     * get_abbr()
     * - Returns the abbreviation of a Value
     * @param VALUE - can either be th ID, HASH_KEY, ADDRESS, ABBR, FULLNAME 
     * @return  string 
     */
    public function get_abbr($val){
        try{
            $table = $this->table;
            $val = trim($val);

            // quick check if an abbreviation was provided in case of case sensistive database
            if(isset($this->abbrs[strtoupper($val)])){
                $val = strtoupper($val);
            }

            //creating data for where selection
            $data = $this->gen_data($val);

            // checking if value provided is a valid structure
            if(!$this->is_structure($val) and !$this->is_position($val)){
                throw new Exception("<b>Invalid Structure / Position($val):</b> Trying to acces a structure/Position that doesn't exist in the organization structure. ", 1); 
            }
            
            //connecting to da
            $this->mydb->or_where($data);
            $abbr = $this->mydb->select($table,"*")->get_results()[0]->abbr;

            return $abbr;



        }catch( Exception $e ) {
            $message = $e->getMessage();
          
            die( $message );
          }

    }


    /**
     * get_id()
     * - Returns the id of a Value
     * @param VALUE - can either be th ID, HASH_KEY, ADDRESS, ABBR, FULLNAME 
     * @return  string 
     */
    public function get_id($val){
        try{
            $table = $this->table;
            $val = trim($val);

            // quick check if an abbreviation was provided in case of case sensistive database
            if(isset($this->abbrs[strtoupper($val)])){
                $val = strtoupper($val);
            }

            //creating data for where selection
            $data = $this->gen_data($val);

            // checking if value provided is a valid structure
            if(!$this->is_structure($val) or !$this->is_position($val)){
                throw new Exception("<b>Invalid Structure / Position($val):</b> Trying to acces a structure/Position that doesn't exist in the organization structure. ", 1); 
            }
            
            //connecting to da
            $this->mydb->or_where($data);
            $result = $this->mydb->select($table,"*")->get_results()[0]->id;

            return $result;



        }catch( Exception $e ) {
            $message = $e->getMessage();
          
            die( $message );
          }

    }

    /**
     * get_id()
     * - Returns the fullname of a Value
     * @param VALUE - can either be th ID, HASH_KEY, ADDRESS, ABBR, FULLNAME 
     * @return  string 
     */
    public function get_fullname($val){
        try{
            $table = $this->table;
            $val = trim($val);

            // quick check if an abbreviation was provided in case of case sensistive database
            if(isset($this->abbrs[strtoupper($val)])){
                $val = strtoupper($val);
            }

            //creating data for where selection
            $data = $this->gen_data($val);

            // checking if value provided is a valid structure
            if(!$this->is_structure($val) or !$this->is_position($val)){
                throw new Exception("<b>Invalid Structure / Position($val):</b> Trying to acces a structure/Position that doesn't exist in the organization structure. ", 1); 
            }
            
            //connecting to da
            $this->mydb->or_where($data);
            $result = $this->mydb->select($table,"*")->get_results()[0]->fullname;

            return $result;



        }catch( Exception $e ) {
            $message = $e->getMessage();
          
            die( $message );
          }

    }


    /**
     * get_parent_structure()
     * - Returns the parent structure of a Value
     * @param VALUE - can either be th ID, HASH_KEY, ADDRESS, ABBR, FULLNAME 
     * @return  string 
     */
    public function get_parent_structure($val){
        try{
            $table = $this->table;
            $val = trim($val);

            // quick check if an abbreviation was provided in case of case sensistive database
            if(isset($this->abbrs[strtoupper($val)])){
                $val = strtoupper($val);
            }

            //creating data for where selection
            $data = $this->gen_data($val);

            // checking if value provided is a valid structure
            if(!$this->is_structure($val) or !$this->is_position($val)){
                throw new Exception("<b>Invalid Structure / Position($val):</b> Trying to acces a structure/Position that doesn't exist in the organization structure. ", 1); 
            }
            
            //connecting to da
            $this->mydb->or_where($data);
            $result = $this->mydb->select($table,"*")->get_results()[0]->under;
            $result = ($result == NULL)? False : $result;
            return $result;



        }catch( Exception $e ) {
            $message = $e->getMessage();
          
            die( $message );
          }

    }

    /**
     * load_abbrs()
     * - Loads abbreviations to the abbr variable
     * @param VALUE - can either be th ID, HASH_KEY, ADDRESS, ABBR, FULLNAME 
     * @return  array 
     * 
     */
    private function load_abbrs(){
        $table = $this->table;
        $abbr = $this->mydb->select($table,"abbr")->get_results();
        
        $array = [];

        foreach($abbr as $row){
            $array[$row->abbr] = $row->abbr;
        }

        $this->abbrs = $array;

        return true;

    }


    /**
     * abbrs()
     * - Gets available abbreviations as an array from the database
     * @param VALUE - can either be th ID, HASH_KEY, ADDRESS, ABBR, FULLNAME 
     * @return  boolen True on succes, False on failure
     * 
     */
    public function abbrs(){
        return $this->abbrs;
    }



    /**
     * search_structure()
     *  - search the structure value for the value provided
     * @param String $val -  value to be searched
     * @return Array
     * 
     */

    public function search_structures($val){
        try{
            $val = trim($val);
            $condition1 = $this->mydb->or_like(["fullname"=>$val,"abbr"=>$val]);
            $condition2 = $this->mydb->where(['type'=>'structure']);
            $condition = $this->mydb->and($condition1,$condition2);

            $result = $this->mydb->select('org_structure',"*",$condition)->get_results();
            return $result;



        }catch( Exception $e ) {
            $message = $e->getMessage();
          
            die( $message );
          }
    }



    /**
     * search_position()
     *  - search the positions  for the value provided
     * @param String $val -  value to be searched
     * @return Array
     * 
     */
    public function search_positions($val){
        try{
            $val = trim($val);

            $condition1 = $this->mydb->or_like(["fullname"=>$val,"abbr"=>$val]);
            $condition2 = $this->mydb->where(['type'=>'position']);
            $condition = $this->mydb->and($condition1,$condition2);

            $result = $this->mydb->select('org_structure',"*",$condition)->get_results();
            return $result;



        }catch( Exception $e ) {
            $message = $e->getMessage();
          
            die( $message );
          }
    }


    /**
     * search()
     *  - search the positions and structures for the value provided
     * @param String $val -  value to be searched
     * @return Array
     * 
     */
    public function search($val){
        try{
                $structures = $this->search_structures($val);
                $positions = $this->search_positions($val);

                if(is_array($structures) && is_array($positions)){
                    $all = array_merge($structures,$positions);
                }else{
                    $all = false;
                }

                return $all;





        }catch( Exception $e ) {
            $message = $e->getMessage();
          
            die( $message );
          }
    }



    public function count_structures() { 
        return $this->db->get_where('org_structure', array('type'=>'structure'))->num_rows();
    }


    public function count_positions() { 
        return $this->db->get_where('org_structure', array('type'=>'position'))->num_rows();
    }

    public function get_structures(){

        $this->db->order_by('rank', 'DESC');
        return $this->db->get_where('org_structure', array('type'=>'structure'))->result();
    }


    public function get_positions(){

        $this->db->order_by('rank', 'DESC');
        return $this->db->get_where('org_structure', array('type'=>'position'))->result();
    }


    public function get_details($id) {
        return $this->db->get_where('org_structure', array('id' => $id))->row();
    }

    public function delete($id) {
        $y = $this->common_model->get_admin_details_by_id($id);
        return $this->db->delete('org_structure', array('id' => $id));
    }


    public function get_profiles(){
       $this->db->select("profile.fullname, profile.position_main, profile.description, profile.facebook, profile.instagram, profile.twitter, profile.linkedin, profile.photo, profile.email, profile.title");
        $this->db->from("profile");
        $this->db->join("org_structure", "org_structure.fullname = profile.position_main");
        $this->db->where("organisation", "Yes");
        $this->db->order_by("org_structure.rank", "DESC");
        $query = $this->db->get();

        return $query->result();    }
















}




?>