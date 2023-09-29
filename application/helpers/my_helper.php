<?php

// --------------------------------------------------------------------
if ( ! function_exists('atrim'))
{
    /**
     * -----------------------------------------------------------------
     * All Trim
     * -----------------------------------------------------------------
     * 
     * Strip whitespace from the beginning , end and inbetween of a string
     *
     *
     * @return  string
     */
    function atrim(string $string){
        $string = trim($string);
        return preg_replace('/\s+/',' ',$string);
    }
}


if ( ! function_exists('uncamelize_it'))
{
    /**
     * -----------------------------------------------------------------
     * uncamelize it Case
     * -----------------------------------------------------------------
     * 
     * opposit of `camelize_it`, converts from camelCase to Standard Case Example `isNewProfile` becomes `is_new_profile`
     *
     * 
     * @return  string
     */
    function uncamelize_it(string $string, string $seperator = '_'){

        $string = trim($string);

            $original_seperator = trim($seperator) == '' ? ' ' : trim($seperator);
            $strings = str_split($string);
            $string = "";
            $count = 0;
            $previous = 'none';
            foreach($strings as $part){
                
                if(ctype_alpha($part) and trim($part) != ""){
                    $part = $count == 0 ? strtolower($part): $part;
                    $seperator = $previous == 1 ? '' : $original_seperator;

                    $part = ctype_upper($part) ? $seperator.strtolower($part) : $part;

                    $string .= $part;
                    $count ++;
                    $previous = 0;
                }

                if(trim($part) == "" and $previous == 0){
                    $string .= $seperator;
                    $previous = 1;
                }
                
                
            }

       return $string;
    }
}

if ( ! function_exists('uncamelize_arr'))
{
    /**
     * -----------------------------------------------------------------
     * Carmel Case Array
     * -----------------------------------------------------------------
     * 
     * converts all the keys in camel case in an array(ASSOCIATIVE ARRAY) to standard case 
     *
     * 
     * @return  array
     */
    function uncamelize_arr(array $array, string $seperator = '_'){

        if(is_assoc($array)){
            $new_array = array();
            foreach($array as $key=>$value){
                $new_key = uncamelize_it($key,$seperator);
                unset($array[$key]);
                $array[$new_key] = $value;
            }
        }

        return $array;
       
    }
}


if ( ! function_exists('camelize_it'))
{
    /**
     * -----------------------------------------------------------------
     * To Carmel Case
     * -----------------------------------------------------------------
     * 
     * removes underscore or any specified character and converts a string to carmel case. Example `is_new_profile` becomes `isNewProfile`
     *
     * 
     * @return  string
     */
    function camelize_it(string $string,$seperator = '_'){

        
        $string = atrim($string); // removing excess spaces from around the string

        // verifying if the string contains the seperator
        if(strpos($string,$seperator) !== false){
            $string = preg_replace('/'.$seperator.'/',' ',$string); // replace the seperator with whitespace
            $string = trim($string); //trim string again incase the seperator is at the beginning or end
        }

        // checking if the current string has whitespaces and removing them
        if(spaces($string)){
            $string = preg_replace('/\s+/','',ucwords(strtolower($string)));
        }

        $string = strtolower($string[0]).substr($string,1);

        
        
        return $string;


    }
}

if ( ! function_exists('camelize_arr'))
{
    /**
     * -----------------------------------------------------------------
     * Carmel Case Array
     * -----------------------------------------------------------------
     * 
     * converts all the keys in standard case in an array(ASSOCIATIVE ARRAY) to camelCase 
     *
     * 
     * @return  array
     */
    function camelize_arr(array $array, string $seperator = '_'){

        if(is_assoc($array)){
            $new_array = array();
            foreach($array as $key=>$value){
                $new_key = camelize_it($key,$seperator);
                unset($array[$key]);
                $array[$new_key] = $value;
            }
        }

        return $array;
       
    }
}

if ( ! function_exists('spaces'))
{
    /**
     * -----------------------------------------------------------------
     * Spaces
     * -----------------------------------------------------------------
     * 
     * returns true if a string has whitespaces
     *
     * 
     * @return  bool
     */
    function spaces(string $str){
        
        return strpos($str,' ') !== false ? true : false;
       
    }
}


if ( ! function_exists('months_short'))
{
    /**
     * -----------------------------------------------------------------
     * Strip Money
     * -----------------------------------------------------------------
     * 
     * returns json  [{"text": "Algeria", "value" : "Algeria"}]
     *
     * @param   array $data
     * @return  array
     */
    function months_short(){
        
        return $short = array(
            'Jan', 
            'Feb', 
            'Mar', 
            'Apr', 
            'May', 
            'Jun', 
            'Jul', 
            'Aug', 
            'Sep', 
            'Oct', 
            'Nov', 
            'Dec'
          );
       
    }
}

if ( ! function_exists('months_long'))
{
    /**
     * -----------------------------------------------------------------
     * Strip Money
     * -----------------------------------------------------------------
     * 
     * returns json  [{"text": "Algeria", "value" : "Algeria"}]
     *
     * @param   array $data
     * @return  array
     */
    function months_long(){
        
        return $long = array(
            'January', 
            'February', 
            'March', 
            'April', 
            'May', 
            'June', 
            'July', 
            'August', 
            'September', 
            'October', 
            'November', 
            'December'
          );
       
    }
}

if ( ! function_exists('strip_money'))
{
    /**
     * -----------------------------------------------------------------
     * Strip Money
     * -----------------------------------------------------------------
     * 
     * returns json  [{"text": "Algeria", "value" : "Algeria"}]
     *
     * @param   array $data
     * @return  array
     */
    function strip_money($value){
        
        $value = trim(str_replace('$','',$value));
        $value = trim(str_replace(',','',$value));
        $value = trim($value);

        return $value;

        
       
    }
}
// --------------------------------------------------------------------
if ( ! function_exists('array_option'))
{
    /**
     * -----------------------------------------------------------------
     * array_options
     * -----------------------------------------------------------------
     * 
     * returns json  [{"text": "Algeria", "value" : "Algeria"}]
     *
     * @param   array $data
     * @return  array
     */
    function array_option($value="",$text, $contain = false){
        $value = trim($value);
        $text = trim($text);
        $data = array(
            'text'=> $text,
            'value'=>$value
        );

        if($contain){
            $data = array($data);
        }
        return $data;

        
       
    }
}
// --------------------------------------------------------------------

if ( ! function_exists('time_diff'))
{
    /**
     * -----------------------------------------------------------------
     * Time Difference
     * -----------------------------------------------------------------
     * 
     * returns a difference between a timestamp and a current timestamp in a more readable format
     *
     * @param   int $timestamp the timestamp
     * @param   string $past_tense string surfix if the current time is greater than the time provided `Default value 'ago'`
     * @param   string $future_tense prefix if the current time is lest than the time provided `Default value 'in'`
     * @return  string
     */
    function time_diff($timestamp, $past_tense ='ago',$future_tense = 'in'){
        $just_now = "";
        static $periods = array('year','month','day','hour','minute','second');


        //checks if a valid value was sent
        if(!is_timestamp($timestamp)){
                return trigger_error("Wrong time format: '$timestamp' - please provide a valid time stamp",E_USER_ERROR);
        }


        $now_timestamp = time();

        $time = date("Y-m-j H:i:s",$timestamp);
        $now = new DateTime('now');
        $time = new DateTime($time);
        $diff = $now->diff($time)->format('%y %m %d %h %i %s');
        $diff = explode(' ',$diff);
        $diff = array_combine($periods,$diff);
        
        $diff = array_filter($diff);
        $period1 = key($diff);
        $value1 = current($diff);
        $value2 = next($diff);
        $period2 = key($diff);
        
        
        

        if(!$value1){
            $period1 = "";
            $period2 = "";
            $value1 = "";
            $value2 = "";
            $future_tense = "";
            $past_tense = "";
            $just_now = "Just now";
        }

        
        

        if($period1 == 'day' and $value1 > 7){
            $initital = $value1;
            $period1 = 'Week';
            $value1 = floor($initital/7);
            $period2 = 'day';
            $value2 = $initital - ($value1*7);
        }
        

        if(!$value2){
            $period2 = "";
            $value2 = "";
        }
        

        if($now_timestamp > $timestamp){
            $future_tense = "";
        }else{
            $past_tense = "";
        }

        

        $period1 = $value1>1?$period1."s":$period1;
        $period2 = $value2>1?$period2."s":$period2;
        $response = $future_tense." ".$value1." ".$period1." ".$value2." ".$period2." ".$past_tense.$just_now;

         $response = trim($response);
         $response = explode(" ",$response);
         $response = array_filter($response);
         $response = array_map('trim',$response);
         $response = implode(" ",$response);
         


         return $response;        

        


    }
}
// --------------------------------------------------------------------
if ( ! function_exists('replace_empty'))
{
    /**
     * -----------------------------------------------------------------
     * replacen empty
     * -----------------------------------------------------------------
     * 
     * loops throught an asscociative array and replaces all empty values with null or any specified value
     *
     * @param   array $data
     * @return  int
     */
    function replace_empty($array,$replacement =null){
        $new_array = array();
        if(is_assoc($array)){
            foreach($array as $key=>$value){
                if(trim($value) == ""){
                     $array[$key] = $replacement;                    
                }
            }
        }

        return $array;


        
       
    }
}

// --------------------------------------------------------------------
if ( ! function_exists('is_empty_values'))
{
    /**
     * -----------------------------------------------------------------
     * json_options
     * -----------------------------------------------------------------
     * 
     * checks if all values in an array is empty
     *
     * @param   array $data
     * @return  int
     */
    function is_empty_values($array){
        if(is_assoc($array)){
            $counter = 0;
            $items = count($array);
            foreach($array  as $key=>$value){
                if(trim($value) == ""){
                    $counter++;
                }
            }

            if($counter == $items){
                return true;
            }else{
                return false;
            }

        }        
       
    }
}

// --------------------------------------------------------------------
if ( ! function_exists('json_option'))
{
    /**
     * -----------------------------------------------------------------
     * json_options
     * -----------------------------------------------------------------
     * 
     * returns json  [{"text": "Algeria", "value" : "Algeria"}]
     *
     * @param   array $data
     * @return  int
     */
    function json_option($value,$text ="", $contain = false){
        $value = trim($value);
        $text = trim($text);
        $data = array(
            'text'=> $text,
            'value'=>$value
        );

        if($contain){
            $data = array($data);
        }
        return json_encode($data);

        
       
    }
}

// --------------------------------------------------------------------
if ( ! function_exists('replace_null'))
{
    /**
     * -----------------------------------------------------------------
     * replacen null
     * -----------------------------------------------------------------
     * 
     * loops throught an asscociative array and replaces all null values with empty or any specified value
     *
     * @param   array $data
     * @return  int
     */
    function replace_null($array,$replacement ="", $replace_empty = false){
        $new_array = array();
        if(is_assoc($array)){
            foreach($array as $key=>$value){
                if(is_null($value)){
                    $array[$key] = $replacement;
                }
                if($replace_empty){
                    if($value ==""){
                        $array[$key] = $replacement;
                    }
                }
            }
        }

        return $array;


        
       
    }
}

// --------------------------------------------------------------------
if ( ! function_exists('extract_keys'))
{
    /**
     * -----------------------------------------------------------------
     * extract keys
     * -----------------------------------------------------------------
     * 
     * loops through an array and extracts array keys and values of keys included in the key
     * if the second parameter is set to true it checks if all keys present in the array and returns false if all keys are not present in the array
     *
     * @param   array $data
     * @return  
     */
    function extract_keys($array,$keys,$exact_match = false){
        $counter = 0;
        $new_array = array();
        if(is_assoc($array)){
            foreach($keys as $key){
                
                if(!isset($array[$key])){
                    $counter++;
                }else{
                    $new_array[$key] = $array[$key];
                }
            }

            if($exact_match){
               if($counter > 0){
                   return false;
               }else{
                   return $new_array;
               }
            }else{
                return $new_array;
            }

        }else{
            return false;
        }


        
       
    }
}

if ( ! function_exists('zero_index'))
{
    /**
     * -----------------------------------------------------------------
     * Clean Array
     * -----------------------------------------------------------------
     * 
     * removes all keys with empty values and returns an array with no empty values;
     *
     * @param   array $data
     * @return  int
     */
    function zero_index($data){
            
        if(is_object($data)){
            foreach(json_decode(json_encode($data)) as $key=>$value){
                $val = $value;
            }
            return trim($val);
        }else{
            return null;
        }
       
    }
}

// --------------------------------------------------------------------
if ( ! function_exists('clean_array'))
{
    /**
     * -----------------------------------------------------------------
     * Clean Array
     * -----------------------------------------------------------------
     * 
     * removes all keys with empty values and returns an array with no empty values;
     *
     * @param   array $data
     * @return  int
     */
    function clean_array($data){

        if(is_assoc($data)){
            foreach($data as $key=>$value){
                if(is_array($value)){
                    if(count($value) == 0){
                        unset($data[$key]);
                    }
                }elseif(is_string($value)){
                    if(trim($value) == ""){
                        unset($data[$key]);
                    }else{
                        $data[$key] = trim($value);
                    }
                }
                
               
            }

            return $data;
        }else{
            return $data;
        }
       
    }
}

// --------------------------------------------------------------------

if ( ! function_exists('check_array_keys'))
{
    /**
     * returns false if one key in the data doesn't match the array of keys provided;
     *
     * @param   float $int
     * @return  int
     */
    function check_array_keys($data,$keys,$empty_check = false){
        $counter = 0;
        if(is_assoc($data)){

            foreach($data as $key=>$value){

                if($empty_check == true){
                    if(trim($value) == ""){
                        $counter++;
                    }
                }
                if(!in_array($key,$keys)){
                    $counter++;
                }
            }

            if($counter>0){
                return false;
            }elseif($counter == 0){
                return true;
            }
        }else{
            false;
        }
       
    }
}

// --------------------------------------------------------------------
if ( ! function_exists('bytes_KB'))
{
    /**
     * Converts Bytes to KiloBytes
     *
     * @param   float $int
     * @return  int
     */
    function bytes_KB($int){
       return round($int / 1024);
    }
}

// --------------------------------------------------------------------

if ( ! function_exists('is_file_input'))
{
    /**
     * --------------------------------------------------------------
     * Is FILE Input?
     * --------------------------------------------------------------
     * checks if an input FILE exist in the $_FILES
     * 
     * @param   string   $name  The name of the input element to check for. `IMPORTANT`
     * @param   bool $empty if the function should also check whether or not the element is empty or not `OPTIONAL`
     * @return  bool
     */
    function is_file_input($name,$empty = false){
        //checking if the post data exist
        if(isset($_FILES[$name])){

            if($empty){
                    //checking if data is emoty or not
                    if(trim($_FILES[$name]['name']) == ""){
                        return false; // if it exist and can't be empty but is empty
                        }else{
                            return true; // if it exist and can't be empty and isn't empty
                    }

                }else{
                    return true; // if it exist and it can be empty
            }

        }else{
            return false; // if post data doesnt exist;
        }
    }
}

// -------------------------------------------------------------------

if ( ! function_exists('file_input'))
{
    /**
     * --------------------------------------------------------------
     * File Input 
     * --------------------------------------------------------------
     * Returns an input file data if exist or you can specify a paramter for 
     * 
     * @param   string   $name  The name of the input element to check for. `IMPORTANT`
     * @param   bool|string $default_value The default value to return if the element is empty `OPTIONAL`. if ommitted empty string would be returned
     * @return  mixed 
     * - `null` if the name of the input element provieded wasn't found
     * - `array` if a defualt value was provied or an empty Array if if the file sent was empty
     */
    function file_input($name,$default_value = false){
        $name = trim($name);
        if(is_file_input($name)){
            
            if(is_file_input($name,true)){
                return $_FILES[$name];
            }else{
                if(is_null($default_value)){
                        $data['name'] = null;
                        $data['type'] = null;
                        $data['tmp_name'] = null;
                        $data['error'] = null;
                        $data['size'] = null;
                    return $data;
                }else{
                    if($default_value != false){
                        $data['name'] = $default_value;
                        $data['type'] = null;
                        $data['tmp_name'] = null;
                        $data['error'] = null;
                        $data['size'] = null;
                        return $data;
                    }else{
                        return $_FILES[$name];
                    }
                }
            }

        }else{
            return NULL;
        }
    }
}

// -------------------------------------------------------------------
if ( ! function_exists('unset_session'))
{
    /**
     * --------------------------------------------------------------
     * unset_session
     * --------------------------------------------------------------
     * unsets a SESSION value
     * 
     * @param   string   $name  The name of the input element to check for. `IMPORTANT`
     * @return  bool 
     * - `null` if the name of the input element provieded wasn't found
     * - `string` if a defualt value was provied or an empty string if none wasn't
     */
    function unset_session($name){
        (!is_session_started())?session_start():false;

        if(isset($_SESSION[$name])){
            unset($_SESSION[$name]);
            return true;
        }else{
            return true;
        }
    }
}

// -------------------------------------------------------------------
if ( ! function_exists('session'))
{
    /**
     * --------------------------------------------------------------
     * SESSION
     * --------------------------------------------------------------
     * Returns a SESSION value
     * 
     * @param   string   $name  The name of the input element to check for. `IMPORTANT`
     * @param   bool|string $default_value The default value to return if the element is empty `OPTIONAL`. if ommitted empty string would be returned
     * @return  mixed 
     * - `null` if the name of the input element provieded wasn't found
     * - `string` if a defualt value was provied or an empty string if none wasn't
     */
    function session($name,$default_value = false){
        (!is_session_started())?session_start():false;

        $name = trim($name);
        if(is_session($name)){
            
            if(is_session($name,true)){
                return (is_object($_SESSION[$name]) or is_array($_SESSION[$name]) or is_bool($_SESSION[$name]) or is_null($_SESSION[$name]))? $_SESSION[$name] : trim($_SESSION[$name]);
            }else{
                if(is_null($default_value)){
                    return NULL;
                }else{
                    if($default_value != false){
                        return $default_value;
                    }else{
                        //return is_array($_SESSION[$name]) or is_object($_SESSION[$name])? $_SESSION[$name] : trim($_SESSION[$name]);
                        return (is_object($_SESSION[$name]) or is_array($_SESSION[$name]) or is_bool($_SESSION[$name]) or is_null($_SESSION[$name]))? $_SESSION[$name] : trim($_SESSION[$name]);
                    }
                }
            }

        }else{
            return NULL;
        }
    }
}

// -------------------------------------------------------------------

if ( ! function_exists('is_session'))
{
    /**
     * --------------------------------------------------------------
     * Is SESSION?
     * --------------------------------------------------------------
     * Checks if a SESSION data exist.
     * 
     * @param   string   $name  The name of the input element to check for. `IMPORTANT`
     * @param   bool $empty if the function should also check whether or not the element is empty or not `OPTIONAL`
     * @return  bool
     */
    function is_session($name,$empty = false){
        //checking if the post data exist
        (!is_session_started())?session_start():false;

        if(isset($_SESSION[$name])){

            if($empty){
                    if(is_object($_SESSION[$name]) or is_array($_SESSION[$name])){
                        return empty($_SESSION[$name]) ? false: true;
                    }else{
                        //checking if data is emoty or not
                        if(trim($_SESSION[$name]) == "" or $_SESSION[$name] == false or  $_SESSION[$name] == null){
                            return false; // if it exist and can't be empty but is empty
                            }else{
                                return true; // if it exist and can't be empty and isn't empty
                        }
                    }
                    

                }else{
                    return true; // if it exist and it can be empty
            }

        }else{
            return false; // if post data doesnt exist;
        }
    }
}

// -------------------------------------------------------------------

if ( ! function_exists('is_post'))
{
    /**
     * --------------------------------------------------------------
     * Is POST?
     * --------------------------------------------------------------
     * Checks if a post data exist.
     * 
     * @param   string   $name  The name of the input element to check for. `IMPORTANT`
     * @param   bool $empty if the function should also check whether or not the element is empty or not `OPTIONAL`
     * @return  bool
     */
    function is_post($name,$empty = false){
        //checking if the post data exist
        if(isset($_POST[$name])){

            if($empty){
                if(is_object($_POST[$name]) or is_array($_POST[$name])){
                    return empty($_POST[$name]) ? false: true;
                }else{
                    //checking if data is emoty or not
                    if(trim($_POST[$name]) == "" or $_POST[$name] == false or  $_POST[$name] == null){
                        return false; // if it exist and can't be empty but is empty
                        }else{
                            return true; // if it exist and can't be empty and isn't empty
                    }
                }

                }else{
                    return true; // if it exist and it can be empty
            }

        }else{
            return false; // if post data doesnt exist;
        }
    }
}

// -------------------------------------------------------------------

if ( ! function_exists('post'))
{
    /**
     * --------------------------------------------------------------
     * POST
     * --------------------------------------------------------------
     * Returns a POST value
     * 
     * @param   string   $name  The name of the input element to check for. `IMPORTANT`
     * @param   bool|string $default_value The default value to return if the element is empty `OPTIONAL`. if ommitted empty string would be returned
     * @return  mixed 
     * - `null` if the name of the input element provieded wasn't found
     * - `string` if a defualt value was provied or an empty string if none wasn't
     */
    function post($name,$default_value = false){
        $name = trim($name);
        if(is_post($name)){
            
            if(is_post($name,true)){
                return (is_object($_POST[$name]) or is_array($_POST[$name]) or is_bool($_POST[$name]) or is_null($_POST[$name]))? $_POST[$name] : trim($_POST[$name]);
            }else{
                if(is_null($default_value)){
                    return NULL;
                }else{
                    if($default_value != false){
                        return $default_value;
                    }else{
                        return (is_object($_POST[$name]) or is_array($_POST[$name]) or is_bool($_POST[$name]) or is_null($_POST[$name]))? $_POST[$name] : trim($_POST[$name]);
                    }
                }
            }

        }else{
            return NULL;
        }
    }
}

// -------------------------------------------------------------------

if ( ! function_exists('is_get'))
{
    /**
     * --------------------------------------------------------------
     * Is GET?
     * --------------------------------------------------------------
     * Checks if a GET data exist.
     * 
     * @param   string   $name  The name of the input element to check for. `IMPORTANT`
     * @param   bool $empty if the function should also check whether or not the element is empty or not `OPTIONAL`
     * @return  bool
     */
    function is_get($name,$empty = false){
        //checking if the post data exist
        if(isset($_GET[$name])){

            if($empty){
                    //checking if data is emoty or not
                    if(trim($_GET[$name]) == ""){
                        return false; // if it exist and can't be empty but is empty
                        }else{
                            return true; // if it exist and can't be empty and isn't empty
                    }

                }else{
                    return true; // if it exist and it can be empty
            }

        }else{
            return false; // if post data doesnt exist;
        }
    }
}

// -------------------------------------------------------------------

if ( ! function_exists('get'))
{
    /**
     * --------------------------------------------------------------
     * GET
     * --------------------------------------------------------------
     * Returns a GET value
     * 
     * @param   string   $name  The name of the input element to check for. `IMPORTANT`
     * @param   bool|string $default_value The default value to return if the element is empty `OPTIONAL`. if ommitted empty string would be returned
     * @return  mixed 
     * - `null` if the name of the input element provieded wasn't found
     * - `string` if a defualt value was provied or an empty string if none wasn't
     */
    function get($name,$default_value = false){
        $name = trim($name);
        if(is_get($name)){
            
            if(is_get($name,true)){
                return trim($_GET[$name]);
            }else{

                if(is_null($default_value)){
                    return NULL;
                }else{
                    if($default_value != false){
                        return $default_value;
                    }else{
                        return trim($_GET[$name]);
                    }
                }
                
            }

        }else{
            return NULL;
        }
    }
}

// -------------------------------------------------------------------

if ( ! function_exists('get_extension'))
{
    /**
     * --------------------------------------------------------------
     * Get Extension
     * --------------------------------------------------------------
     * returns the file extension from the filepath provided.
     * 
     * @param   string   $file  
     * @return  string
     */
    function get_extension($file){
        return pathinfo($file, PATHINFO_EXTENSION);
    }
}

// -------------------------------------------------------------------

if ( ! function_exists('create_filename'))
{
    /**
     * --------------------------------------------------------------
     * Create filename
     * --------------------------------------------------------------
     * Creates a file name from the string and extension passed. replaces `space` with `_`
     * 
     * @param   string   $str  
     * @param   string   $extension file extention
     * @return  string
     */
    function create_filename($str,$extension){
        $str = trim($str);
        $str = preg_replace('/\s+/', '_', $str);

        $str = $str.".".$extension;
        return $str;
    }
}

// -------------------------------------------------------------------

if ( ! function_exists('multiple_array_key_exist'))
{
    /**
     * --------------------------------------------------------------
     * Multiple array key check
     * --------------------------------------------------------------
     * verifies if array keys exist in and array
     * 
     * @param   array   $keys  
     * @param   array   $array - ASSOCIATIVE ARRAY
     */
    function multiple_array_key_exist(array $keys, array $array){
            try{

                if(!is_assoc($array)){
                    throw new Exception("Parameter two must be an Associative array", 1);
                }

                foreach($keys as $key){
                    if(!array_key_exists($key,$array)){
                        throw new Exception('$data["'.$key.'"] was not provided!', 1);
                    }
                }

                return true;

            }catch(Exception $e){
                $msg = $e->getMessage();
                die($msg);
            }
    }
}

// -------------------------------------------------------------------

if ( ! function_exists('g_image'))
{
    /**
     * --------------------------------------------------------------
     * Google image
     * --------------------------------------------------------------
     * links directly to an image in a google drive and can be used in **HTML** with the `img`
     * elementsetting the `src` attribute value to the return value of this function.
     * 
     * @param   Int $id     The image `id` on the Google Drive
     * @return  Image 
     */
    function g_image($id){
        return "https://drive.google.com/uc?export=view&id=".$id;
    }
}

// -------------------------------------------------------------------



if ( ! function_exists('is_assoc'))
{
    /**
     * --------------------------------------------------------------
     * Is Associative Array ?
     * --------------------------------------------------------------
     * Checks to see if the array provided is an ` Associative Array `.
     *
     * @param   Array $array
     * @return  Bool    `True` if value is an Associative Array, `False` otherwise
     * 
     */
    function is_assoc($array):bool{
        return is_array($array) and (array_values($array) !== $array);
    }
}

// --------------------------------------------------------------------

if ( ! function_exists('is_url'))
{
    /**
     * --------------------------------------------------------------
     * is_url ?
     * --------------------------------------------------------------
     * Checks to see if the value provided is a valid `Url`.
     *
     * @param   string $url
     * @return  Bool    `True` if value is a Url, `False` otherwise
     * 
     */
    function is_url( string $url){
        $url = trim($url);
        return (filter_var($url, FILTER_VALIDATE_URL))?true:false;
    }
}

// --------------------------------------------------------------------


if ( ! function_exists('print_p'))
{
    /**
     * --------------------------------------------------------------
     * Print Preview
     * --------------------------------------------------------------
     * - Prints data in a more organized and readable form
     * @param any $value 
     * @return  String return is wrapped in a `<pre>` html element 
     * 
     */
    function print_p($value):string{
        echo "<pre>";
        return print_r($value);
        echo "</pre>";
      }
}

// --------------------------------------------------------------------


if ( ! function_exists('substri_count'))
{
    /**
     * --------------------------------------------------------------
     * Sub-string Count
     * --------------------------------------------------------------
     * count how many times a string exist in another string. `case-insensitive`
     * @param string $haystack
     * @param string $needle
     * @return int
     * 
     */
    function substri_count(string $haystack, string $needle):int{

        return substr_count(strtoupper($haystack), strtoupper($needle));
    }
}

// --------------------------------------------------------------------


if ( ! function_exists('http_get'))
{
    /**
     * --------------------------------------------------------------
     * `HTTP` Force Request response
     * --------------------------------------------------------------
     * Forcefully Sends HTTP request to a url using `curl` 
     * @param string $url 
     * @return json 
     * 
     */
    function http_get($url){
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
      }
}

// --------------------------------------------------------------------

if ( ! function_exists('http_send'))
{
    /**
     * --------------------------------------------------------------
     * `HTTP` Send POST Data
     * --------------------------------------------------------------
     * Send JSON data via POST with PHP `cURL` to a specific `url`.
     * - Parameter 2 is `optional` holds the data being sent.
     * 
     * @param string $url The url to send the request to.
     * @param array $data Needs to be an Associative array. 
     * @return json 
     * 
     */
    function http_send(string $url, array $data = array()){
        try {




            // Create a new cURL resource
            $ch = curl_init($url);
           
            if(!empty($data) and is_array($data)){
                // Attach encoded JSON string to the POST fields
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            }
                    
            // Set the content type to application/json
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

            // Return response instead of outputting
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            // Execute the POST request
            $result = curl_exec($ch);

            // Close cURL resource
            curl_close($ch);

            return $result;
        


            
        } catch( Exception $e ) {
          $message = $e->getMessage();

          die( $message );
        }
      }
}

// --------------------------------------------------------------------

if ( ! function_exists('http_recieve'))
{
    /**
     * --------------------------------------------------------------
     * `HTTP` recieve Data
     * --------------------------------------------------------------
     *  returns data recieved from `http`
     * @return json 
     * 
     */
    function http_recieve(){
        try {

            return file_get_contents('php://input');
            
        } catch( Exception $e ) {
          $message = $e->getMessage();

          die( $message );
        }
      }
}

// --------------------------------------------------------------------


if ( ! function_exists('currencies'))
{
    

    /**
     * currencies
     * - returns an object of all currencies
     * @param  
     * @return object 
     * 
     * 
     */
    function currencies(){
    
        $data = '{"results":{"ALL":{"currencyName":"Albanian Lek","currencySymbol":"Lek","id":"ALL"},"XCD":{"currencyName":"East Caribbean Dollar","currencySymbol":"$","id":"XCD"},"EUR":{"currencyName":"Euro","currencySymbol":"€","id":"EUR"},"BBD":{"currencyName":"Barbadian Dollar","currencySymbol":"$","id":"BBD"},"BTN":{"currencyName":"Bhutanese Ngultrum","id":"BTN"},"BND":{"currencyName":"Brunei Dollar","currencySymbol":"$","id":"BND"},"XAF":{"currencyName":"Central African CFA Franc","id":"XAF"},"CUP":{"currencyName":"Cuban Peso","currencySymbol":"$","id":"CUP"},"USD":{"currencyName":"United States Dollar","currencySymbol":"$","id":"USD"},"FKP":{"currencyName":"Falkland Islands Pound","currencySymbol":"£","id":"FKP"},"GIP":{"currencyName":"Gibraltar Pound","currencySymbol":"£","id":"GIP"},"HUF":{"currencyName":"Hungarian Forint","currencySymbol":"Ft","id":"HUF"},"IRR":{"currencyName":"Iranian Rial","currencySymbol":"﷼","id":"IRR"},"JMD":{"currencyName":"Jamaican Dollar","currencySymbol":"J$","id":"JMD"},"AUD":{"currencyName":"Australian Dollar","currencySymbol":"$","id":"AUD"},"LAK":{"currencyName":"Lao Kip","currencySymbol":"₭","id":"LAK"},"LYD":{"currencyName":"Libyan Dinar","id":"LYD"},"MKD":{"currencyName":"Macedonian Denar","currencySymbol":"ден","id":"MKD"},"XOF":{"currencyName":"West African CFA Franc","id":"XOF"},"NZD":{"currencyName":"New Zealand Dollar","currencySymbol":"$","id":"NZD"},"OMR":{"currencyName":"Omani Rial","currencySymbol":"﷼","id":"OMR"},"PGK":{"currencyName":"Papua New Guinean Kina","id":"PGK"},"RWF":{"currencyName":"Rwandan Franc","id":"RWF"},"WST":{"currencyName":"Samoan Tala","id":"WST"},"RSD":{"currencyName":"Serbian Dinar","currencySymbol":"Дин.","id":"RSD"},"SEK":{"currencyName":"Swedish Krona","currencySymbol":"kr","id":"SEK"},"TZS":{"currencyName":"Tanzanian Shilling","currencySymbol":"TSh","id":"TZS"},"AMD":{"currencyName":"Armenian Dram","id":"AMD"},"BSD":{"currencyName":"Bahamian Dollar","currencySymbol":"$","id":"BSD"},"BAM":{"currencyName":"Bosnia And Herzegovina Konvertibilna Marka","currencySymbol":"KM","id":"BAM"},"CVE":{"currencyName":"Cape Verdean Escudo","id":"CVE"},"CNY":{"currencyName":"Chinese Yuan","currencySymbol":"¥","id":"CNY"},"CRC":{"currencyName":"Costa Rican Colon","currencySymbol":"₡","id":"CRC"},"CZK":{"currencyName":"Czech Koruna","currencySymbol":"Kč","id":"CZK"},"ERN":{"currencyName":"Eritrean Nakfa","id":"ERN"},"GEL":{"currencyName":"Georgian Lari","id":"GEL"},"HTG":{"currencyName":"Haitian Gourde","id":"HTG"},"INR":{"currencyName":"Indian Rupee","currencySymbol":"₹","id":"INR"},"JOD":{"currencyName":"Jordanian Dinar","id":"JOD"},"KRW":{"currencyName":"South Korean Won","currencySymbol":"₩","id":"KRW"},"LBP":{"currencyName":"Lebanese Lira","currencySymbol":"£","id":"LBP"},"MWK":{"currencyName":"Malawian Kwacha","id":"MWK"},"MRO":{"currencyName":"Mauritanian Ouguiya","id":"MRO"},"MZN":{"currencyName":"Mozambican Metical","id":"MZN"},"ANG":{"currencyName":"Netherlands Antillean Gulden","currencySymbol":"ƒ","id":"ANG"},"PEN":{"currencyName":"Peruvian Nuevo Sol","currencySymbol":"S/.","id":"PEN"},"QAR":{"currencyName":"Qatari Riyal","currencySymbol":"﷼","id":"QAR"},"STD":{"currencyName":"Sao Tome And Principe Dobra","id":"STD"},"SLL":{"currencyName":"Sierra Leonean Leone","id":"SLL"},"SOS":{"currencyName":"Somali Shilling","currencySymbol":"S","id":"SOS"},"SDG":{"currencyName":"Sudanese Pound","id":"SDG"},"SYP":{"currencyName":"Syrian Pound","currencySymbol":"£","id":"SYP"},"AOA":{"currencyName":"Angolan Kwanza","id":"AOA"},"AWG":{"currencyName":"Aruban Florin","currencySymbol":"ƒ","id":"AWG"},"BHD":{"currencyName":"Bahraini Dinar","id":"BHD"},"BZD":{"currencyName":"Belize Dollar","currencySymbol":"BZ$","id":"BZD"},"BWP":{"currencyName":"Botswana Pula","currencySymbol":"P","id":"BWP"},"BIF":{"currencyName":"Burundi Franc","id":"BIF"},"KYD":{"currencyName":"Cayman Islands Dollar","currencySymbol":"$","id":"KYD"},"COP":{"currencyName":"Colombian Peso","currencySymbol":"$","id":"COP"},"DKK":{"currencyName":"Danish Krone","currencySymbol":"kr","id":"DKK"},"GTQ":{"currencyName":"Guatemalan Quetzal","currencySymbol":"Q","id":"GTQ"},"HNL":{"currencyName":"Honduran Lempira","currencySymbol":"L","id":"HNL"},"IDR":{"currencyName":"Indonesian Rupiah","currencySymbol":"Rp","id":"IDR"},"ILS":{"currencyName":"Israeli New Sheqel","currencySymbol":"₪","id":"ILS"},"KZT":{"currencyName":"Kazakhstani Tenge","currencySymbol":"лв","id":"KZT"},"KWD":{"currencyName":"Kuwaiti Dinar","id":"KWD"},"LSL":{"currencyName":"Lesotho Loti","id":"LSL"},"MYR":{"currencyName":"Malaysian Ringgit","currencySymbol":"RM","id":"MYR"},"MUR":{"currencyName":"Mauritian Rupee","currencySymbol":"₨","id":"MUR"},"MNT":{"currencyName":"Mongolian Tugrik","currencySymbol":"₮","id":"MNT"},"MMK":{"currencyName":"Myanma Kyat","id":"MMK"},"NGN":{"currencyName":"Nigerian Naira","currencySymbol":"₦","id":"NGN"},"PAB":{"currencyName":"Panamanian Balboa","currencySymbol":"B/.","id":"PAB"},"PHP":{"currencyName":"Philippine Peso","currencySymbol":"₱","id":"PHP"},"RON":{"currencyName":"Romanian Leu","currencySymbol":"lei","id":"RON"},"SAR":{"currencyName":"Saudi Riyal","currencySymbol":"﷼","id":"SAR"},"SGD":{"currencyName":"Singapore Dollar","currencySymbol":"$","id":"SGD"},';
        $data .= '"ZAR":{"currencyName":"South African Rand","currencySymbol":"R","id":"ZAR"},"SRD":{"currencyName":"Surinamese Dollar","currencySymbol":"$","id":"SRD"},"TWD":{"currencyName":"New Taiwan Dollar","currencySymbol":"NT$","id":"TWD"},"TOP":{"currencyName":"Paanga","id":"TOP"},"VEF":{"currencyName":"Venezuelan Bolivar","id":"VEF"},"DZD":{"currencyName":"Algerian Dinar","id":"DZD"},"ARS":{"currencyName":"Argentine Peso","currencySymbol":"$","id":"ARS"},"AZN":{"currencyName":"Azerbaijani Manat","currencySymbol":"ман","id":"AZN"},"BYR":{"currencyName":"Belarusian Ruble","currencySymbol":"p.","id":"BYR"},"BOB":{"currencyName":"Bolivian Boliviano","currencySymbol":"$b","id":"BOB"},"BGN":{"currencyName":"Bulgarian Lev","currencySymbol":"лв","id":"BGN"},"CAD":{"currencyName":"Canadian Dollar","currencySymbol":"$","id":"CAD"},"CLP":{"currencyName":"Chilean Peso","currencySymbol":"$","id":"CLP"},"CDF":{"currencyName":"Congolese Franc","id":"CDF"},"DOP":{"currencyName":"Dominican Peso","currencySymbol":"RD$","id":"DOP"},"FJD":{"currencyName":"Fijian Dollar","currencySymbol":"$","id":"FJD"},"GMD":{"currencyName":"Gambian Dalasi","id":"GMD"},"GYD":{"currencyName":"Guyanese Dollar","currencySymbol":"$","id":"GYD"},"ISK":{"currencyName":"Icelandic Króna","currencySymbol":"kr","id":"ISK"},"IQD":{"currencyName":"Iraqi Dinar","id":"IQD"},"JPY":{"currencyName":"Japanese Yen","currencySymbol":"¥","id":"JPY"},"KPW":{"currencyName":"North Korean Won","currencySymbol":"₩","id":"KPW"},"LVL":{"currencyName":"Latvian Lats","currencySymbol":"Ls","id":"LVL"},"CHF":{"currencyName":"Swiss Franc","currencySymbol":"Fr.","id":"CHF"},"MGA":{"currencyName":"Malagasy Ariary","id":"MGA"},"MDL":{"currencyName":"Moldovan Leu","id":"MDL"},"MAD":{"currencyName":"Moroccan Dirham","id":"MAD"},"NPR":{"currencyName":"Nepalese Rupee","currencySymbol":"₨","id":"NPR"},"NIO":{"currencyName":"Nicaraguan Cordoba","currencySymbol":"C$","id":"NIO"},"PKR":{"currencyName":"Pakistani Rupee","currencySymbol":"₨","id":"PKR"},"PYG":{"currencyName":"Paraguayan Guarani","currencySymbol":"Gs","id":"PYG"},"SHP":{"currencyName":"Saint Helena Pound","currencySymbol":"£","id":"SHP"},"SCR":{"currencyName":"Seychellois Rupee","currencySymbol":"₨","id":"SCR"},"SBD":{"currencyName":"Solomon Islands Dollar","currencySymbol":"$","id":"SBD"},"LKR":{"currencyName":"Sri Lankan Rupee","currencySymbol":"₨","id":"LKR"},"THB":{"currencyName":"Thai Baht","currencySymbol":"฿","id":"THB"},"TRY":{"currencyName":"Turkish New Lira","id":"TRY"},"AED":{"currencyName":"UAE Dirham","id":"AED"},"VUV":{"currencyName":"Vanuatu Vatu","id":"VUV"},"YER":{"currencyName":"Yemeni Rial","currencySymbol":"﷼","id":"YER"},"AFN":{"currencyName":"Afghan Afghani","currencySymbol":"؋","id":"AFN"},"BDT":{"currencyName":"Bangladeshi Taka","id":"BDT"},"BRL":{"currencyName":"Brazilian Real","currencySymbol":"R$","id":"BRL"},"KHR":{"currencyName":"Cambodian Riel","currencySymbol":"៛","id":"KHR"},"KMF":{"currencyName":"Comorian Franc","id":"KMF"},"HRK":{"currencyName":"Croatian Kuna","currencySymbol":"kn","id":"HRK"},"DJF":{"currencyName":"Djiboutian Franc","id":"DJF"},"EGP":{"currencyName":"Egyptian Pound","currencySymbol":"£","id":"EGP"},"ETB":{"currencyName":"Ethiopian Birr","id":"ETB"},"XPF":{"currencyName":"CFP Franc","id":"XPF"},"GHS":{"currencyName":"Ghanaian Cedi","id":"GHS"},"GNF":{"currencyName":"Guinean Franc","id":"GNF"},"HKD":{"currencyName":"Hong Kong Dollar","currencySymbol":"$","id":"HKD"},"XDR":{"currencyName":"Special Drawing Rights","id":"XDR"},"KES":{"currencyName":"Kenyan Shilling","currencySymbol":"KSh","id":"KES"},"KGS":{"currencyName":"Kyrgyzstani Som","currencySymbol":"лв","id":"KGS"},"LRD":{"currencyName":"Liberian Dollar","currencySymbol":"$","id":"LRD"},"MOP":{"currencyName":"Macanese Pataca","id":"MOP"},"MVR":{"currencyName":"Maldivian Rufiyaa","id":"MVR"},"MXN":{"currencyName":"Mexican Peso","currencySymbol":"$","id":"MXN"},"NAD":{"currencyName":"Namibian Dollar","currencySymbol":"$","id":"NAD"},"NOK":{"currencyName":"Norwegian Krone","currencySymbol":"kr","id":"NOK"},"PLN":{"currencyName":"Polish Zloty","currencySymbol":"zł","id":"PLN"},"RUB":{"currencyName":"Russian Ruble","currencySymbol":"руб","id":"RUB"},"SZL":{"currencyName":"Swazi Lilangeni","id":"SZL"},"TJS":{"currencyName":"Tajikistani Somoni","id":"TJS"},"TTD":{"currencyName":"Trinidad and Tobago Dollar","currencySymbol":"TT$","id":"TTD"},"UGX":{"currencyName":"Ugandan Shilling","currencySymbol":"USh","id":"UGX"},"UYU":{"currencyName":"Uruguayan Peso","currencySymbol":"$U","id":"UYU"},"VND":{"currencyName":"Vietnamese Dong","currencySymbol":"₫","id":"VND"},"TND":{"currencyName":"Tunisian Dinar","id":"TND"},"UAH":{"currencyName":"Ukrainian Hryvnia","currencySymbol":"₴","id":"UAH"},"UZS":{"currencyName":"Uzbekistani Som","currencySymbol":"лв","id":"UZS"},"TMT":{"currencyName":"Turkmenistan Manat","id":"TMT"},"GBP":{"currencyName":"British Pound","currencySymbol":"£","id":"GBP"},"ZMW":{"currencyName":"Zambian Kwacha","id":"ZMW"},"BTC":{"currencyName":"Bitcoin","currencySymbol":"BTC","id":"BTC"},"BYN":{"currencyName":"New Belarusian Ruble","currencySymbol":"p.","id":"BYN"},"BMD":{"currencyName":"Bermudan Dollar","id":"BMD"},"GGP":{"currencyName":"Guernsey Pound","id":"GGP"},"CLF":{"currencyName":"Chilean Unit Of Account","id":"CLF"},"CUC":{"currencyName":"Cuban Convertible Peso","id":"CUC"},"IMP":{"currencyName":"Manx pound","id":"IMP"},"JEP":{"currencyName":"Jersey Pound","id":"JEP"},"SVC":{"currencyName":"Salvadoran Colón","id":"SVC"},"ZMK":{"currencyName":"Old Zambian Kwacha","id":"ZMK"},"XAG":{"currencyName":"Silver (troy ounce)","id":"XAG"},"ZWL":{"currencyName":"Zimbabwean Dollar","id":"ZWL"}}}';
    
        $data = json_decode($data);
    
        return $data->results;
    }



    }

// --------------------------------------------------------------------


if ( ! function_exists('countries'))
{
    

    /**
     * countries
     * - returns an object of all countries
     * @param  
     * @return object 
     * 
     * 
     */
    function countries(){
    
        $data = '{"results":{"AF":{"alpha3":"AFG","currencyId":"AFN","currencyName":"Afghan afghani","currencySymbol":"؋","id":"AF","name":"Afghanistan"},"AI":{"alpha3":"AIA","currencyId":"XCD","currencyName":"East Caribbean dollar","currencySymbol":"$","id":"AI","name":"Anguilla"},"AU":{"alpha3":"AUS","currencyId":"AUD","currencyName":"Australian dollar","currencySymbol":"$","id":"AU","name":"Australia"},"BD":{"currencyId":"BDT","currencyName":"Bangladeshi taka","name":"Bangladesh","alpha3":"BGD","id":"BD","currencySymbol":"৳"},"BJ":{"currencyId":"XOF","currencyName":"West African CFA franc","name":"Benin","alpha3":"BEN","id":"BJ","currencySymbol":"Fr"},"BR":{"alpha3":"BRA","currencyId":"BRL","currencyName":"Brazilian real","currencySymbol":"R$","id":"BR","name":"Brazil"},"KH":{"alpha3":"KHM","currencyId":"KHR","currencyName":"Cambodian riel","currencySymbol":"៛","id":"KH","name":"Cambodia"},"TD":{"currencyId":"XAF","currencyName":"Central African CFA franc","name":"Chad","alpha3":"TCD","id":"TD","currencySymbol":"Fr"},"CG":{"currencyId":"XAF","currencyName":"Central African CFA franc","name":"Congo","alpha3":"COG","id":"CG","currencySymbol":"Fr"},"CU":{"currencyId":"CUP","currencyName":"Cuban peso","currencySymbol":"$","name":"Cuba","alpha3":"CUB","id":"CU"},"DM":{"alpha3":"DMA","currencyId":"XCD","currencyName":"East Caribbean dollar","currencySymbol":"$","id":"DM","name":"Dominica"},"FI":{"alpha3":"FIN","currencyId":"EUR","currencyName":"European euro","currencySymbol":"€","id":"FI","name":"Finland"},"GE":{"currencyId":"GEL","currencyName":"Georgian lari","name":"Georgia","alpha3":"GEO","id":"GE","currencySymbol":"₾"},"GD":{"alpha3":"GRD","currencyId":"XCD","currencyName":"East Caribbean dollar","currencySymbol":"$","id":"GD","name":"Grenada"},"HT":{"currencyId":"HTG","currencyName":"Haitian gourde","name":"Haiti","alpha3":"HTI","id":"HT","currencySymbol":"G"},"IN":{"alpha3":"IND","currencyId":"INR","currencyName":"Indian rupee","currencySymbol":"₹","id":"IN","name":"India"},"IL":{"alpha3":"ISR","currencyId":"ILS","currencyName":"Israeli new sheqel","currencySymbol":"₪","id":"IL","name":"Israel"},"KZ":{"alpha3":"KAZ","currencyId":"KZT","currencyName":"Kazakhstani tenge","currencySymbol":"лв","id":"KZ","name":"Kazakhstan"},"KW":{"currencyId":"KWD","currencyName":"Kuwaiti dinar","name":"Kuwait","alpha3":"KWT","id":"KW","currencySymbol":"د.ك"},"LS":{"currencyId":"LSL","currencyName":"Lesotho loti","name":"Lesotho","alpha3":"LSO","id":"LS","currencySymbol":"L"},"LU":{"alpha3":"LUX","currencyId":"EUR","currencyName":"European euro","currencySymbol":"€","id":"LU","name":"Luxembourg"},"MY":{"alpha3":"MYS","currencyId":"MYR","currencyName":"Malaysian ringgit","currencySymbol":"RM","id":"MY","name":"Malaysia"},"MU":{"alpha3":"MUS","currencyId":"MUR","currencyName":"Mauritian rupee","currencySymbol":"₨","id":"MU","name":"Mauritius"},"MN":{"alpha3":"MNG","currencyId":"MNT","currencyName":"Mongolian tugrik","currencySymbol":"₮","id":"MN","name":"Mongolia"},"MM":{"currencyId":"MMK","currencyName":"Myanma kyat","name":"Myanmar","alpha3":"MMR","id":"MM","currencySymbol":"Ks"},"NC":{"currencyId":"XPF","currencyName":"CFP franc","name":"New Caledonia","alpha3":"NCL","id":"NC","currencySymbol":"Fr"},"NO":{"alpha3":"NOR","currencyId":"NOK","currencyName":"Norwegian krone","currencySymbol":"kr","id":"NO","name":"Norway"},"PG":{"currencyId":"PGK","currencyName":"Papua New Guinean kina","name":"Papua New Guinea","alpha3":"PNG","id":"PG","currencySymbol":"K"},"PT":{"alpha3":"PRT","currencyId":"EUR","currencyName":"European euro","currencySymbol":"€","id":"PT","name":"Portugal"},"RW":{"currencyId":"RWF","currencyName":"Rwandan franc","name":"Rwanda","alpha3":"RWA","id":"RW","currencySymbol":"Fr"},"WS":{"currencyId":"WST","currencyName":"Samoan tala","name":"Samoa (Western)","alpha3":"WSM","id":"WS","currencySymbol":"T"},"RS":{"alpha3":"SRB","currencyId":"RSD","currencyName":"Serbian dinar","currencySymbol":"Дин.","id":"RS","name":"Serbia"},"SI":{"alpha3":"SVN","currencyId":"EUR","currencyName":"European euro","currencySymbol":"€","id":"SI","name":"Slovenia"},"ES":{"alpha3":"ESP","currencyId":"EUR","currencyName":"European euro","currencySymbol":"€","id":"ES","name":"Spain"},"SE":{"alpha3":"SWE","currencyId":"SEK","currencyName":"Swedish krona","currencySymbol":"kr","id":"SE","name":"Sweden"},"TZ":{"alpha3":"TZA","currencyId":"TZS","currencyName":"Tanzanian shilling","currencySymbol":"TSh","id":"TZ","name":"Tanzania"},"TN":{"currencyId":"TND","currencyName":"Tunisian dinar","name":"Tunisia","alpha3":"TUN","id":"TN","currencySymbol":"ملّيم"},"UA":{"alpha3":"UKR","currencyId":"UAH","currencyName":"Ukrainian hryvnia","currencySymbol":"₴","id":"UA","name":"Ukraine"},"UZ":{"alpha3":"UZB","currencyId":"UZS","currencyName":"Uzbekistani som","currencySymbol":"лв","id":"UZ","name":"Uzbekistan"},"YE":{"alpha3":"YEM","currencyId":"YER","currencyName":"Yemeni rial","currencySymbol":"﷼","id":"YE","name":"Yemen"},"DZ":{"currencyId":"DZD","currencyName":"Algerian dinar","name":"Algeria","alpha3":"DZA","id":"DZ","currencySymbol":"د.ج"},"AR":{"alpha3":"ARG","currencyId":"ARS","currencyName":"Argentine peso","currencySymbol":"$","id":"AR","name":"Argentina"},"AZ":{"alpha3":"AZE","currencyId":"AZN","currencyName":"Azerbaijani manat","currencySymbol":"ман","id":"AZ","name":"Azerbaijan"},"BY":{"alpha3":"BLR","currencyId":"BYN","currencyName":"New Belarusian ruble","currencySymbol":"p.","id":"BY","name":"Belarus"},';
        $data .= '"BO":{"alpha3":"BOL","currencyId":"BOB","currencyName":"Bolivian boliviano","currencySymbol":"$b","id":"BO","name":"Bolivia"},"BG":{"alpha3":"BGR","currencyId":"BGN","currencyName":"Bulgarian lev","currencySymbol":"лв","id":"BG","name":"Bulgaria"},"CA":{"alpha3":"CAN","currencyId":"CAD","currencyName":"Canadian dollar","currencySymbol":"$","id":"CA","name":"Canada"},"CN":{"alpha3":"CHN","currencyId":"CNY","currencyName":"Chinese renminbi","currencySymbol":"¥","id":"CN","name":"China"},"CR":{"alpha3":"CRI","currencyId":"CRC","currencyName":"Costa Rican colon","currencySymbol":"₡","id":"CR","name":"Costa Rica"},"CZ":{"alpha3":"CZE","currencyId":"CZK","currencyName":"Czech koruna","currencySymbol":"Kč","id":"CZ","name":"Czech Republic"},"EC":{"alpha3":"ECU","currencyId":"USD","currencyName":"U.S. Dollar","currencySymbol":"$","id":"EC","name":"Ecuador"},"EE":{"alpha3":"EST","currencyId":"EUR","currencyName":"European euro","currencySymbol":"€","id":"EE","name":"Estonia"},"PF":{"currencyId":"XPF","currencyName":"CFP franc","name":"French Polynesia","alpha3":"PYF","id":"PF","currencySymbol":"Fr"},"GH":{"currencyId":"GHS","currencyName":"Ghanaian cedi","name":"Ghana","alpha3":"GHA","id":"GH","currencySymbol":"₵"},"GN":{"currencyId":"GNF","currencyName":"Guinean franc","name":"Guinea","alpha3":"GIN","id":"GN","currencySymbol":"Fr"},"HK":{"alpha3":"HKG","currencyId":"HKD","currencyName":"Hong Kong dollar","currencySymbol":"$","id":"HK","name":"Hong Kong"},"IR":{"alpha3":"IRN","currencyId":"IRR","currencyName":"Iranian rial","currencySymbol":"﷼","id":"IR","name":"Iran, Islamic Republic of"},"JM":{"alpha3":"JAM","currencyId":"JMD","currencyName":"Jamaican dollar","currencySymbol":"J$","id":"JM","name":"Jamaica"},"KI":{"alpha3":"KIR","currencyId":"AUD","currencyName":"Australian dollar","currencySymbol":"$","id":"KI","name":"Kiribati"},"LA":{"alpha3":"LAO","currencyId":"LAK","currencyName":"Lao kip","currencySymbol":"₭","id":"LA","name":"Laos"},"LY":{"currencyId":"LYD","currencyName":"Libyan dinar","name":"Libya","alpha3":"LBY","id":"LY","currencySymbol":"ل.د"},"MK":{"alpha3":"MKD","currencyId":"MKD","currencyName":"Macedonian denar","currencySymbol":"ден","id":"MK","name":"Macedonia (Former Yug. Rep.)"},"ML":{"currencyId":"XOF","currencyName":"West African CFA franc","name":"Mali","alpha3":"MLI","id":"ML","currencySymbol":"Fr"},"FM":{"alpha3":"FSM","currencyId":"USD","currencyName":"U.S. Dollar","currencySymbol":"$","id":"FM","name":"Micronesia"},"MS":{"alpha3":"MSR","currencyId":"XCD","currencyName":"East Caribbean dollar","currencySymbol":"$","id":"MS","name":"Montserrat"},"NR":{"alpha3":"NRU","currencyId":"AUD","currencyName":"Australian dollar","currencySymbol":"$","id":"NR","name":"Nauru"},"NI":{"alpha3":"NIC","currencyId":"NIO","currencyName":"Nicaraguan cordoba","currencySymbol":"C$","id":"NI","name":"Nicaragua"},"PK":{"alpha3":"PAK","currencyId":"PKR","currencyName":"Pakistani rupee","currencySymbol":"₨","id":"PK","name":"Pakistan"},"PE":{"alpha3":"PER","currencyId":"PEN","currencyName":"Peruvian nuevo sol","currencySymbol":"S/.","id":"PE","name":"Peru"},"QA":{"alpha3":"QAT","currencyId":"QAR","currencyName":"Qatari riyal","currencySymbol":"﷼","id":"QA","name":"Qatar"},"KN":{"alpha3":"KNA","currencyId":"XCD","currencyName":"East Caribbean dollar","currencySymbol":"$","id":"KN","name":"Saint Kitts and Nevis"},"ST":{"currencyId":"STD","currencyName":"Sao Tome and Principe dobra","name":"Sao Tome and Principe","alpha3":"STP","id":"ST","currencySymbol":"Db"},"SL":{"currencyId":"SLL","currencyName":"Sierra Leonean leone","name":"Sierra Leone","alpha3":"SLE","id":"SL","currencySymbol":"Le"},"SO":{"alpha3":"SOM","currencyId":"SOS","currencyName":"Somali shilling","currencySymbol":"S","id":"SO","name":"Somalia"},"SD":{"currencyId":"SDG","currencyName":"Sudanese pound","name":"Sudan","alpha3":"SDN","id":"SD","currencySymbol":"ج.س."},"SY":{"alpha3":"SYR","currencyId":"SYP","currencyName":"Syrian pound","currencySymbol":"£","id":"SY","name":"Syria"},"TG":{"currencyId":"XOF","currencyName":"West African CFA franc","name":"Togo","alpha3":"TGO","id":"TG","currencySymbol":"Fr"},"TM":{"currencyId":"TMT","currencyName":"Turkmenistan manat","name":"Turkmenistan","alpha3":"TKM","id":"TM","currencySymbol":"m"},"GB":{"alpha3":"GBR","currencyId":"GBP","currencyName":"British pound","currencySymbol":"£","id":"GB","name":"United Kingdom"},"VE":{"currencyId":"VEF","currencyName":"Venezuelan bolivar","name":"Venezuela","alpha3":"VEN","id":"VE","currencySymbol":"Bs"},"AD":{"alpha3":"AND","currencyId":"EUR","currencyName":"European euro","currencySymbol":"€","id":"AD","name":"Andorra"},"AM":{"currencyId":"AMD","currencyName":"Armenian dram","name":"Armenia","alpha3":"ARM","id":"AM","currencySymbol":"֏"},"BS":{"alpha3":"BHS","currencyId":"BSD","currencyName":"Bahamian dollar","currencySymbol":"$","id":"BS","name":"Bahamas"},"BE":{"alpha3":"BEL","currencyId":"EUR","currencyName":"European euro","currencySymbol":"€","id":"BE","name":"Belgium"},"BA":{"alpha3":"BIH","currencyId":"BAM","currencyName":"Bosnia and Herzegovina konvertibilna marka","currencySymbol":"KM","id":"BA","name":"Bosnia-Herzegovina"},"BF":{"currencyId":"XOF","currencyName":"West African CFA franc","name":"Burkina Faso","alpha3":"BFA","id":"BF","currencySymbol":"Fr"},"KY":{"alpha3":"CYM","currencyId":"KYD","currencyName":"Cayman Islands dollar","currencySymbol":"$","id":"KY","name":"Cayman Islands"},"CO":{"alpha3":"COL","currencyId":"COP","currencyName":"Colombian peso","currencySymbol":"$","id":"CO","name":"Colombia"},"CI":{"currencyId":"XOF","currencyName":"West African CFA franc","name":"Côte d\'Ivoire","alpha3":"CIV","id":"CI","currencySymbol":"Fr"},"DK":{"alpha3":"DNK","currencyId":"DKK","currencyName":"Danish krone","currencySymbol":"kr","id":"DK","name":"Denmark"},"EG":{"alpha3":"EGY","currencyId":"EGP","currencyName":"Egyptian pound","currencySymbol":"£","id":"EG","name":"Egypt"},"ET":{"currencyId":"ETB","currencyName":"Ethiopian birr","name":"Ethiopia","alpha3":"ETH","id":"ET","currencySymbol":"Br"},"GA":{"currencyId":"XAF","currencyName":"Central African CFA franc","name":"Gabon","alpha3":"GAB","id":"GA","currencySymbol":"Fr"},"GI":{"alpha3":"GIB","currencyId":"GIP","currencyName":"Gibraltar pound","currencySymbol":"£","id":"GI","name":"Gibraltar"},"GW":{"currencyId":"XOF","currencyName":"West African CFA franc","name":"Guinea-Bissau","alpha3":"GNB","id":"GW","currencySymbol":"Fr"},';
        $data .= '"HU":{"alpha3":"HUN","currencyId":"HUF","currencyName":"Hungarian forint","currencySymbol":"Ft","id":"HU","name":"Hungary"},"IQ":{"currencyId":"IQD","currencyName":"Iraqi dinar","name":"Iraq","alpha3":"IRQ","id":"IQ","currencySymbol":"ع.د"},"JP":{"alpha3":"JPN","currencyId":"JPY","currencyName":"Japanese yen","currencySymbol":"¥","id":"JP","name":"Japan"},"KP":{"alpha3":"PRK","currencyId":"KPW","currencyName":"North Korean won","currencySymbol":"₩","id":"KP","name":"Korea North"},"LV":{"alpha3":"LVA","currencyId":"LVL","currencyName":"Latvian lats","currencySymbol":"Ls","id":"LV","name":"Latvia"},"LI":{"alpha3":"LIE","currencyId":"CHF","currencyName":"Swiss Franc","currencySymbol":"Fr.","id":"LI","name":"Liechtenstein"},"MG":{"currencyId":"MGA","currencyName":"Malagasy ariary","name":"Madagascar","alpha3":"MDG","id":"MG","currencySymbol":"Ar"},"MT":{"alpha3":"MLT","currencyId":"EUR","currencyName":"European Euro","currencySymbol":"€","id":"MT","name":"Malta"},"MD":{"currencyId":"MDL","currencyName":"Moldovan leu","name":"Moldova","alpha3":"MDA","id":"MD","currencySymbol":"L"},"MA":{"currencyId":"MAD","currencyName":"Moroccan dirham","name":"Morocco","alpha3":"MAR","id":"MA","currencySymbol":"د.م."},"NP":{"alpha3":"NPL","currencyId":"NPR","currencyName":"Nepalese rupee","currencySymbol":"₨","id":"NP","name":"Nepal"},"NE":{"currencyId":"XOF","currencyName":"West African CFA franc","name":"Niger","alpha3":"NER","id":"NE","currencySymbol":"Fr"},"PW":{"alpha3":"PLW","currencyId":"USD","currencyName":"U.S. Dollar","currencySymbol":"$","id":"PW","name":"Palau"},"PH":{"alpha3":"PHL","currencyId":"PHP","currencyName":"Philippine peso","currencySymbol":"₱","id":"PH","name":"Philippines"},"RO":{"alpha3":"ROU","currencyId":"RON","currencyName":"Romanian leu","currencySymbol":"lei","id":"RO","name":"Romania"},"LC":{"alpha3":"LCA","currencyId":"XCD","currencyName":"East Caribbean dollar","currencySymbol":"$","id":"LC","name":"Saint Lucia"},"SA":{"alpha3":"SAU","currencyId":"SAR","currencyName":"Saudi riyal","currencySymbol":"﷼","id":"SA","name":"Saudi Arabia"},"SG":{"alpha3":"SGP","currencyId":"SGD","currencyName":"Singapore dollar","currencySymbol":"$","id":"SG","name":"Singapore"},"ZA":{"alpha3":"ZAF","currencyId":"ZAR","currencyName":"South African rand","currencySymbol":"R","id":"ZA","name":"South Africa"},"SR":{"alpha3":"SUR","currencyId":"SRD","currencyName":"Surinamese dollar","currencySymbol":"$","id":"SR","name":"Suriname"},"TW":{"alpha3":"TWN","currencyId":"TWD","currencyName":"New Taiwan dollar","currencySymbol":"NT$","id":"TW","name":"Taiwan"},"TO":{"currencyId":"TOP","currencyName":"Paanga","name":"Tonga","alpha3":"TON","id":"TO","currencySymbol":"T$"},"TV":{"alpha3":"TUV","currencyId":"AUD","currencyName":"Australian dollar","currencySymbol":"$","id":"TV","name":"Tuvalu"},"US":{"alpha3":"USA","currencyId":"USD","currencyName":"United States dollar","currencySymbol":"$","id":"US","name":"United States of America"},"VN":{"alpha3":"VNM","currencyId":"VND","currencyName":"Vietnamese dong","currencySymbol":"₫","id":"VN","name":"Vietnam"},"AL":{"alpha3":"ALB","currencyId":"ALL","currencyName":"Albanian lek","currencySymbol":"Lek","id":"AL","name":"Albania"},"AG":{"alpha3":"ATG","currencyId":"XCD","currencyName":"East Caribbean dollar","currencySymbol":"$","id":"AG","name":"Antigua and Barbuda"},"AT":{"alpha3":"AUT","currencyId":"EUR","currencyName":"European euro","currencySymbol":"€","id":"AT","name":"Austria"},"BB":{"alpha3":"BRB","currencyId":"BBD","currencyName":"Barbadian dollar","currencySymbol":"$","id":"BB","name":"Barbados"},"BT":{"currencyId":"BTN","currencyName":"Bhutanese ngultrum","name":"Bhutan","alpha3":"BTN","id":"BT","currencySymbol":"Nu."},"BN":{"alpha3":"BRN","currencyId":"BND","currencyName":"Brunei dollar","currencySymbol":"$","id":"BN","name":"Brunei"},"CM":{"currencyId":"XAF","currencyName":"Central African CFA franc","name":"Cameroon","alpha3":"CMR","id":"CM","currencySymbol":"Fr"},"CL":{"alpha3":"CHL","currencyId":"CLP","currencyName":"Chilean peso","currencySymbol":"$","id":"CL","name":"Chile"},"CD":{"currencyId":"CDF","currencyName":"Congolese franc","name":"Congo, Democratic Republic","alpha3":"COD","id":"CD","currencySymbol":"Fr"},"CY":{"alpha3":"CYP","currencyId":"EUR","currencyName":"European euro","currencySymbol":"€","id":"CY","name":"Cyprus"},"DO":{"alpha3":"DOM","currencyId":"DOP","currencyName":"Dominican peso","currencySymbol":"RD$","id":"DO","name":"Dominican Republic"},"ER":{"currencyId":"ERN","currencyName":"Eritrean nakfa","name":"Eritrea","alpha3":"ERI","id":"ER","currencySymbol":"Nfk"},"FR":{"alpha3":"FRA","currencyId":"EUR","currencyName":"European euro","currencySymbol":"€","id":"FR","name":"France"},"DE":{"alpha3":"DEU","currencyId":"EUR","currencyName":"European euro","currencySymbol":"€","id":"DE","name":"Germany"},"GT":{"alpha3":"GTM","currencyId":"GTQ","currencyName":"Guatemalan quetzal","currencySymbol":"Q","id":"GT","name":"Guatemala"},"HN":{"alpha3":"HND","currencyId":"HNL","currencyName":"Honduran lempira","currencySymbol":"L","id":"HN","name":"Honduras"},"ID":{"alpha3":"IDN","currencyId":"IDR","currencyName":"Indonesian rupiah","currencySymbol":"Rp","id":"ID","name":"Indonesia"},"IT":{"alpha3":"ITA","currencyId":"EUR","currencyName":"European euro","currencySymbol":"€","id":"IT","name":"Italy"},"KE":{"alpha3":"KEN","currencyId":"KES","currencyName":"Kenyan shilling","currencySymbol":"KSh","id":"KE","name":"Kenya"},"KG":{"alpha3":"KGZ","currencyId":"KGS","currencyName":"Kyrgyzstani som","currencySymbol":"лв","id":"KG","name":"Kyrgyzstan"},"LR":{"alpha3":"LBR","currencyId":"LRD","currencyName":"Liberian dollar","currencySymbol":"$","id":"LR","name":"Liberia"},"MO":{"currencyId":"MOP","currencyName":"Macanese pataca","name":"Macau","alpha3":"MAC","id":"MO","currencySymbol":"P"},"MV":{"currencyId":"MVR","currencyName":"Maldivian rufiyaa","name":"Maldives","alpha3":"MDV","id":"MV","currencySymbol":".ރ"},"MX":{"alpha3":"MEX","currencyId":"MXN","currencyName":"Mexican peso","currencySymbol":"$","id":"MX","name":"Mexico"},"ME":{"alpha3":"MNE","currencyId":"EUR","currencyName":"European Euro","currencySymbol":"€","id":"ME","name":"Montenegro"},"NA":{"alpha3":"NAM","currencyId":"NAD","currencyName":"Namibian dollar","currencySymbol":"$","id":"NA","name":"Namibia"},"NZ":{"alpha3":"NZL","currencyId":"NZD","currencyName":"New Zealand dollar","currencySymbol":"$","id":"NZ","name":"New Zealand"},"OM":{"alpha3":"OMN","currencyId":"OMR","currencyName":"Omani rial","currencySymbol":"﷼","id":"OM","name":"Oman"},"PY":{"alpha3":"PRY","currencyId":"PYG","currencyName":"Paraguayan guarani","currencySymbol":"Gs","id":"PY","name":"Paraguay"},"PR":{"alpha3":"PRI","currencyId":"USD","currencyName":"U.S. Dollar","currencySymbol":"$","id":"PR","name":"Puerto Rico"},"SH":{"alpha3":"SHN","currencyId":"SHP","currencyName":"Saint Helena pound","currencySymbol":"£","id":"SH","name":"Saint Helena"},"SM":{"alpha3":"SMR","currencyId":"EUR","currencyName":"European euro","currencySymbol":"€","id":"SM","name":"San Marino"},"SC":{"alpha3":"SYC","currencyId":"SCR","currencyName":"Seychellois rupee","currencySymbol":"₨","id":"SC","name":"Seychelles"},"SB":{"alpha3":"SLB","currencyId":"SBD","currencyName":"Solomon Islands dollar","currencySymbol":"$","id":"SB","name":"Solomon Islands"},"LK":{"alpha3":"LKA","currencyId":"LKR","currencyName":"Sri Lankan rupee","currencySymbol":"₨","id":"LK","name":"Sri Lanka"},"CH":{"alpha3":"CHE","currencyId":"CHF","currencyName":"Swiss franc","currencySymbol":"Fr.","id":"CH","name":"Switzerland"},"TH":{"alpha3":"THA","currencyId":"THB","currencyName":"Thai baht","currencySymbol":"฿","id":"TH","name":"Thailand"},"TR":{"currencyId":"TRY","currencyName":"Turkish new lira","name":"Turkey","alpha3":"TUR","id":"TR","currencySymbol":"₺"},"AE":{"currencyId":"AED","currencyName":"UAE dirham","name":"United Arab Emirates","alpha3":"ARE","id":"AE","currencySymbol":"فلس"},';
        $data .='"VU":{"currencyId":"VUV","currencyName":"Vanuatu vatu","name":"Vanuatu","alpha3":"VUT","id":"VU","currencySymbol":"Vt"},"ZM":{"currencyId":"ZMW","currencyName":"Zambian kwacha","name":"Zambia","alpha3":"ZMB","id":"ZM","currencySymbol":"ZK"},"AO":{"currencyId":"AOA","currencyName":"Angolan kwanza","name":"Angola","alpha3":"AGO","id":"AO","currencySymbol":"Kz"},"AW":{"alpha3":"ABW","currencyId":"AWG","currencyName":"Aruban florin","currencySymbol":"ƒ","id":"AW","name":"Aruba"},"BH":{"currencyId":"BHD","currencyName":"Bahraini dinar","name":"Bahrain","alpha3":"BHR","id":"BH","currencySymbol":"دينار"},"BZ":{"alpha3":"BLZ","currencyId":"BZD","currencyName":"Belize dollar","currencySymbol":"BZ$","id":"BZ","name":"Belize"},"BW":{"alpha3":"BWA","currencyId":"BWP","currencyName":"Botswana pula","currencySymbol":"P","id":"BW","name":"Botswana"},"BI":{"currencyId":"BIF","currencyName":"Burundi franc","name":"Burundi","alpha3":"BDI","id":"BI","currencySymbol":"Fr"},"CF":{"currencyId":"XAF","currencyName":"Central African CFA franc","name":"Central African Republic","alpha3":"CAF","id":"CF","currencySymbol":"Fr"},"KM":{"currencyId":"KMF","currencyName":"Comorian franc","name":"Comoros","alpha3":"COM","id":"KM","currencySymbol":"Fr"},"HR":{"alpha3":"HRV","currencyId":"HRK","currencyName":"Croatian kuna","currencySymbol":"kn","id":"HR","name":"Croatia"},"DJ":{"currencyId":"DJF","currencyName":"Djiboutian franc","name":"Djibouti","alpha3":"DJI","id":"DJ","currencySymbol":"Fr"},"SV":{"alpha3":"SLV","currencyId":"USD","currencyName":"U.S. Dollar","currencySymbol":"$","id":"SV","name":"El Salvador"},"FJ":{"alpha3":"FJI","currencyId":"FJD","currencyName":"Fijian dollar","currencySymbol":"$","id":"FJ","name":"Fiji"},"GM":{"currencyId":"GMD","currencyName":"Gambian dalasi","name":"Gambia","alpha3":"GMB","id":"GM","currencySymbol":"D"},"GR":{"alpha3":"GRC","currencyId":"EUR","currencyName":"European euro","currencySymbol":"€","id":"GR","name":"Greece"},"GY":{"alpha3":"GUY","currencyId":"GYD","currencyName":"Guyanese dollar","currencySymbol":"$","id":"GY","name":"Guyana"},"IS":{"alpha3":"ISL","currencyId":"ISK","currencyName":"Icelandic króna","currencySymbol":"kr","id":"IS","name":"Iceland"},"IE":{"alpha3":"IRL","currencyId":"EUR","currencyName":"European euro","currencySymbol":"€","id":"IE","name":"Ireland"},"JO":{"currencyId":"JOD","currencyName":"Jordanian dinar","name":"Jordan","alpha3":"JOR","id":"JO","currencySymbol":"د.ا "},"KR":{"alpha3":"KOR","currencyId":"KRW","currencyName":"South Korean won","currencySymbol":"₩","id":"KR","name":"Korea South"},"LB":{"alpha3":"LBN","currencyId":"LBP","currencyName":"Lebanese lira","currencySymbol":"£","id":"LB","name":"Lebanon"},"MW":{"currencyId":"MWK","currencyName":"Malawian kwacha","name":"Malawi","alpha3":"MWI","id":"MW","currencySymbol":"MK"},"MR":{"currencyId":"MRO","currencyName":"Mauritanian ouguiya","name":"Mauritania","alpha3":"MRT","id":"MR","currencySymbol":"UM"},"MC":{"alpha3":"MCO","currencyId":"EUR","currencyName":"European Euro","currencySymbol":"€","id":"MC","name":"Monaco"},"MZ":{"currencyId":"MZN","currencyName":"Mozambican metical","name":"Mozambique","alpha3":"MOZ","id":"MZ","currencySymbol":"MT"},"NL":{"alpha3":"NLD","currencyId":"EUR","currencyName":"European euro","currencySymbol":"€","id":"NL","name":"Netherlands"},"NG":{"alpha3":"NGA","currencyId":"NGN","currencyName":"Nigerian naira","currencySymbol":"₦","id":"NG","name":"Nigeria"},"PA":{"alpha3":"PAN","currencyId":"PAB","currencyName":"Panamanian balboa","currencySymbol":"B/.","id":"PA","name":"Panama"},"PL":{"alpha3":"POL","currencyId":"PLN","currencyName":"Polish zloty","currencySymbol":"zł","id":"PL","name":"Poland"},"RU":{"alpha3":"RUS","currencyId":"RUB","currencyName":"Russian ruble","currencySymbol":"руб","id":"RU","name":"Russia"},"VC":{"alpha3":"VCT","currencyId":"XCD","currencyName":"East Caribbean dollar","currencySymbol":"$","id":"VC","name":"Saint Vincent and the Grenadines"},"SN":{"currencyId":"XOF","currencyName":"West African CFA franc","name":"Senegal","alpha3":"SEN","id":"SN","currencySymbol":"Fr"},"SK":{"alpha3":"SVK","currencyId":"EUR","currencyName":"European euro","currencySymbol":"€","id":"SK","name":"Slovakia"},"SS":{"currencyId":"SDG","currencyName":"Sudanese pound","name":"South Sudan","alpha3":"SSD","id":"SS","currencySymbol":"£"},"SZ":{"currencyId":"SZL","currencyName":"Swazi lilangeni","name":"Swaziland","alpha3":"SWZ","id":"SZ","currencySymbol":"L"},"TJ":{"currencyId":"TJS","currencyName":"Tajikistani somoni","name":"Tajikistan","alpha3":"TJK","id":"TJ","currencySymbol":"ЅМ"},"TT":{"alpha3":"TTO","currencyId":"TTD","currencyName":"Trinidad and Tobago dollar","currencySymbol":"TT$","id":"TT","name":"Trinidad and Tobago"},"UG":{"alpha3":"UGA","currencyId":"UGX","currencyName":"Ugandan shilling","currencySymbol":"USh","id":"UG","name":"Uganda"},"UY":{"alpha3":"URY","currencyId":"UYU","currencyName":"Uruguayan peso","currencySymbol":"$U","id":"UY","name":"Uruguay"},"WF":{"currencyId":"XPF","currencyName":"CFP franc","name":"Wallis and Futuna Islands","alpha3":"WLF","id":"WF","currencySymbol":"Fr"},"LT":{"alpha3":"LTU","currencyId":"EUR","currencyName":"European euro","currencySymbol":"€","id":"LT","name":"Lithuania"}}}';
    
        $data = json_decode($data);
    
        return $data->results;
    }

}

// --------------------------------------------------------------------


if ( ! function_exists('get_client_ip'))
{
    

    
    /**
     * get_client_ip
     * - Get the ip address of users
     * 
     * @return ip address
     * @return False if ip isn't found 
     * 
     * 
     */
    function get_client_ip() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

}

// --------------------------------------------------------------------


if ( ! function_exists('get_user_ip'))
{
    

    
    /**
     * get_user_ip
     * - Get the ip address of users
     * 
     * @return ip address
     * @return False if ip isn't found 
     * 
     * 
     */
    function get_user_ip() {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = false;
        return $ipaddress;
    }




}

// --------------------------------------------------------------------

if ( ! function_exists('is_HTML'))
{
    

    
    /**
     * is_HTML()
     * - Checks if a string contains HTML Tags
     * 
     *@param $string
     * @return false of HTML tags doesn't exit in the string
     * @return true if HTML Tags Exist in the string
     * 
     * 
     */
    function is_HTML($string) {
        return $string != strip_tags($string) ? true:false;
    }




}

// --------------------------------------------------------------------


if ( ! function_exists('formatSizeUnits'))
{
    

    
    /**
     * is_HTML()
     * - Checks if a string contains HTML Tags
     * 
     *@param $string
     * @return false of HTML tags doesn't exit in the string
     * @return true if HTML Tags Exist in the string
     * 
     * 
     */
    function formatSizeUnits($bytes)
    {
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }

        return $bytes;
    }
}

// --------------------------------------------------------------------

if ( ! function_exists('server_base_url'))
{
    

    
    /**
     * server_base_url()
     * - returns sever path to main folder
     * 
     *@param $string
     * @return false of HTML tags doesn't exit in the string
     * @return true if HTML Tags Exist in the string
     * 
     * 
     */
    function server_base_url($str="")   
    {
        $str = ltrim($str,"\\//");
        $url = $dir = dirname(APPPATH)."\\";
        if($str !="" and is_string($str)){
            $url = $url.$str;
        }

        return $url;
    }
}

// --------------------------------------------------------------------

if ( ! function_exists('is_email'))
{
    

    
    /**
     * is_email()
     * - checks if email string provided is email
     * 
     *@param $string
     * @return false of HTML tags doesn't exit in the string
     * @return true if HTML Tags Exist in the string
     * 
     * 
     */
    function is_email($email)   
    {
        return (filter_var($email,FILTER_VALIDATE_EMAIL) !== false)?true:false;

    }
}

// --------------------------------------------------------------------

if ( ! function_exists('builders'))
{
    

    
    /**
     * is_email()
     * - checks if email string provided is email
     * 
     *@param $string
     * @return false of HTML tags doesn't exit in the string
     * @return true if HTML Tags Exist in the string
     * 
     * 
     */
    function builders($str="")   
    {
        $str = ltrim($str,"\\//");
        $url = $dir = APPPATH."builders"."\\";
        if($str !="" and is_string($str)){
            $url = $url.$str;
        }

        return $url;
    }
}


if ( ! function_exists('mail_template'))
{
    

    
    /**
     * is_email()
     * - checks if email string provided is email
     * 
     *@param $string
     * @return false of HTML tags doesn't exit in the string
     * @return true if HTML Tags Exist in the string
     * 
     * 
     */
    function mail_template($str="")   
    {
        $str = ltrim($str,"\\//");
        $url = $dir = APPPATH."mail_templates"."\\";
        if($str !="" and is_string($str)){
            $url = $url.$str;
        }

        return $url;
    }
}

// --------------------------------------------------------------------

if ( ! function_exists('is_session_started'))
{
    

    
    /**
     * is_email()
     * - checks if email string provided is email
     * 
     *@param $string
     * @return false of HTML tags doesn't exit in the string
     * @return true if HTML Tags Exist in the string
     * 
     * 
     */
    function is_session_started()
    {
        if ( php_sapi_name() !== 'cli' ) {
            if ( version_compare(phpversion(), '5.4.0', '>=') ) {
                return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
            } else {
                return session_id() === '' ? FALSE : TRUE;
            }
        }
        return FALSE;
    }
}

// --------------------------------------------------------------------

if ( ! function_exists('load_essentials'))
{
    

    
    /**
     * is_email()
     * - checks if email string provided is email
     * 
     *@param $string
     * @return false of HTML tags doesn't exit in the string
     * @return true if HTML Tags Exist in the string
     * 
     * 
     */
    function load_essentials()   
    {
        $url = base_url($_SERVER['PATH_INFO']);

        if(isset($_POST['user_timezone'])){
            $timezone = $_POST['user_timezone'];
            session_start();
            $_SESSION['user_timezone'] = $timezone;
            echo "done";
            unset($_POST['user_timezone']);
            header("Refresh:0");
        }

        if(!isset($_SESSION['user_timezone'])){
            echo '<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js">
                    </script>
                    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jstimezonedetect/1.0.4/jstz.min.js">
                    </script>
                    <script type="text/javascript">
                        $(document).ready(function(){
                        var tz = jstz.determine(); // Determines the time zone of the browser client
                        var timezone = tz.name(); //For e.g.:"Asia/Kolkata" for the Indian Time.
                            console.log("'.$url.'");
                        $.post("'.$url.'", {user_timezone: timezone}, function(data) {
                            console.log(data);
                            //Preocess the timezone in the controller function and get
                            //the confirmation value here. On success, refresh the page.
                        });
                        });
                    </script>';
            header("Refresh:0");
        }

        $user_ip = get_user_ip();
        $_SESSION['user_ip'] = $user_ip;
           
        

    }
}

// --------------------------------------------------------------------

if ( ! function_exists('get_date'))
{
    

    
    /**
     * is_email()
     * - checks if email string provided is email
     * 
     *@param $string
     * @return false of HTML tags doesn't exit in the string
     * @return true if HTML Tags Exist in the string
     * 
     * 
     */
    function get_date($format="r",$timestamp,$timezone)   
    {
        $default_tz = date_default_timezone_get();
        
        
        $date = new DateTime(date("r",$timestamp), new DateTimeZone($default_tz));
        $date->setTimezone(new DateTimeZone($timezone));

        return $date->format($format);



    }
}

// --------------------------------------------------------------------

if ( ! function_exists('convert_time'))
{
    

    
    /**
     * is_email()
     * - checks if email string provided is email
     * 
     *@param $string
     * @return false of HTML tags doesn't exit in the string
     * @return true if HTML Tags Exist in the string
     * 
     * 
     */
    function convert_time($format="U",$date,$origin_tz,$destination_tz)   
    {
        if(is_timestamp($date)){
            $date = date("r",$date);
        }

        $date = new DateTime($date, new DateTimeZone($origin_tz));
        $date->setTimezone(new DateTimeZone($destination_tz));

        return $date->format($format);
        //return strtotime($date->format("r"));


        



    }
}

// --------------------------------------------------------------------

if ( ! function_exists('is_timestamp'))
{
    

    
    /**
     * is_email()
     * - checks if email string provided is email
     * 
     *@param $string
     * @return false of HTML tags doesn't exit in the string
     * @return true if HTML Tags Exist in the string
     * 
     * 
     */
    function is_timestamp($timestamp)
    {
        return ( 1 === preg_match( '~^[1-9][0-9]*$~', $timestamp ) );
    }
}

// --------------------------------------------------------------------


if ( ! function_exists('get_timezone_offset'))
{
       
        /**    Returns the offset from the origin timezone to the remote timezone, in seconds.
        *    @param $remote_tz;
        *    @param $origin_tz; If null the servers current timezone is used as the origin.
        *    @return int;
        */
        function get_timezone_offset($remote_tz, $origin_tz = null) {
            
            if(is_timezone($remote_tz)){
                if($origin_tz === null) {
                    if(!is_string($origin_tz = date_default_timezone_get())) {
                        return false; // A UTC timestamp was returned -- bail out!
                    }
                }
                $origin_dtz = new DateTimeZone($origin_tz);
                $remote_dtz = new DateTimeZone($remote_tz);
                $origin_dt = new DateTime("now", $origin_dtz);
                $remote_dt = new DateTime("now", $remote_dtz);
                $offset = $origin_dtz->getOffset($origin_dt) - $remote_dtz->getOffset($remote_dt);
                $offset = $offset * -1;
                return $offset;
            }else{
                return false;
            }
        }
}

// --------------------------------------------------------------------

if ( ! function_exists('is_timezone'))
{
    

    
    /**
     * ----------------------------------------------------------------
     * Valid Timezone?
     * ----------------------------------------------------------------
     * Checks if a `Timezone` is valid.
     * 
     * @param string $timezone
     * @return false If the timezone provided is invalid.
     * @return true If the timezone provided is valid.
     * 
     * 
     */
    function is_timezone(string $timezone):bool   
    {
        $status = false;
        $other = array("utc"=>true,"gmt"=>true);

        if(substr_count($timezone,"/")){

            $timezone = explode("/",$timezone);
            if(count($timezone) == 2){
                $timezone[0] = ucfirst(strtolower(trim($timezone[0])));
                $timezone[1] = ucfirst(strtolower(trim($timezone[1])));
                $timezone = implode("/",$timezone);
                
                $status = isset(get_timezones_raw()[$timezone]);
            }else{
                $status = false;
            }

            }else{
                $status = false;
        }

        if($status){
            return true;
        }else{
            return (isset($other[strtolower($timezone)]));
        }





    }
}

// --------------------------------------------------------------------

if ( ! function_exists('get_timezones_grouped'))
{
       
    /**
     * --------------------------------------------------------------
     * Timezones Grouped
     * --------------------------------------------------------------
     * 
     * Returns all timezones grouped by continents, as an Associative Arrray.
     * Structure
     * `[Continent]`=>`['Timezone']`=>`'description'`
     * 
     * 
     */
    function get_timezones_grouped()   
    {
        $timezones = array (
            'America' => array (
                'America/Adak' => 'Adak -10:00',
                'America/Atka' => 'Atka -10:00',
                'America/Anchorage' => 'Anchorage -9:00',
                'America/Juneau' => 'Juneau -9:00',
                'America/Nome' => 'Nome -9:00',
                'America/Yakutat' => 'Yakutat -9:00',
                'America/Dawson' => 'Dawson -8:00',
                'America/Ensenada' => 'Ensenada -8:00',
                'America/Los_Angeles' => 'Los_Angeles -8:00',
                'America/Tijuana' => 'Tijuana -8:00',
                'America/Vancouver' => 'Vancouver -8:00',
                'America/Whitehorse' => 'Whitehorse -8:00',
                'America/Boise' => 'Boise -7:00',
                'America/Cambridge_Bay' => 'Cambridge_Bay -7:00',
                'America/Chihuahua' => 'Chihuahua -7:00',
                'America/Dawson_Creek' => 'Dawson_Creek -7:00',
                'America/Denver' => 'Denver -7:00',
                'America/Edmonton' => 'Edmonton -7:00',
                'America/Hermosillo' => 'Hermosillo -7:00',
                'America/Inuvik' => 'Inuvik -7:00',
                'America/Mazatlan' => 'Mazatlan -7:00',
                'America/Phoenix' => 'Phoenix -7:00',
                'America/Shiprock' => 'Shiprock -7:00',
                'America/Yellowknife' => 'Yellowknife -7:00',
                'America/Belize' => 'Belize -6:00',
                'America/Cancun' => 'Cancun -6:00',
                'America/Chicago' => 'Chicago -6:00',
                'America/Costa_Rica' => 'Costa_Rica -6:00',
                'America/El_Salvador' => 'El_Salvador -6:00',
                'America/Guatemala' => 'Guatemala -6:00',
                'America/Knox_IN' => 'Knox_IN -6:00',
                'America/Managua' => 'Managua -6:00',
                'America/Menominee' => 'Menominee -6:00',
                'America/Merida' => 'Merida -6:00',
                'America/Mexico_City' => 'Mexico_City -6:00',
                'America/Monterrey' => 'Monterrey -6:00',
                'America/Rainy_River' => 'Rainy_River -6:00',
                'America/Rankin_Inlet' => 'Rankin_Inlet -6:00',
                'America/Regina' => 'Regina -6:00',
                'America/Swift_Current' => 'Swift_Current -6:00',
                'America/Tegucigalpa' => 'Tegucigalpa -6:00',
                'America/Winnipeg' => 'Winnipeg -6:00',
                'America/Atikokan' => 'Atikokan -5:00',
                'America/Bogota' => 'Bogota -5:00',
                'America/Cayman' => 'Cayman -5:00',
                'America/Coral_Harbour' => 'Coral_Harbour -5:00',
                'America/Detroit' => 'Detroit -5:00',
                'America/Fort_Wayne' => 'Fort_Wayne -5:00',
                'America/Grand_Turk' => 'Grand_Turk -5:00',
                'America/Guayaquil' => 'Guayaquil -5:00',
                'America/Havana' => 'Havana -5:00',
                'America/Indianapolis' => 'Indianapolis -5:00',
                'America/Iqaluit' => 'Iqaluit -5:00',
                'America/Jamaica' => 'Jamaica -5:00',
                'America/Lima' => 'Lima -5:00',
                'America/Louisville' => 'Louisville -5:00',
                'America/Montreal' => 'Montreal -5:00',
                'America/Nassau' => 'Nassau -5:00',
                'America/New_York' => 'New_York -5:00',
                'America/Nipigon' => 'Nipigon -5:00',
                'America/Panama' => 'Panama -5:00',
                'America/Pangnirtung' => 'Pangnirtung -5:00',
                'America/Port-au-Prince' => 'Port-au-Prince -5:00',
                'America/Resolute' => 'Resolute -5:00',
                'America/Thunder_Bay' => 'Thunder_Bay -5:00',
                'America/Toronto' => 'Toronto -5:00',
                'America/Caracas' => 'Caracas -4:-30',
                'America/Anguilla' => 'Anguilla -4:00',
                'America/Antigua' => 'Antigua -4:00',
                'America/Aruba' => 'Aruba -4:00',
                'America/Asuncion' => 'Asuncion -4:00',
                'America/Barbados' => 'Barbados -4:00',
                'America/Blanc-Sablon' => 'Blanc-Sablon -4:00',
                'America/Boa_Vista' => 'Boa_Vista -4:00',
                'America/Campo_Grande' => 'Campo_Grande -4:00',
                'America/Cuiaba' => 'Cuiaba -4:00',
                'America/Curacao' => 'Curacao -4:00',
                'America/Dominica' => 'Dominica -4:00',
                'America/Eirunepe' => 'Eirunepe -4:00',
                'America/Glace_Bay' => 'Glace_Bay -4:00',
                'America/Goose_Bay' => 'Goose_Bay -4:00',
                'America/Grenada' => 'Grenada -4:00',
                'America/Guadeloupe' => 'Guadeloupe -4:00',
                'America/Guyana' => 'Guyana -4:00',
                'America/Halifax' => 'Halifax -4:00',
                'America/La_Paz' => 'La_Paz -4:00',
                'America/Manaus' => 'Manaus -4:00',
                'America/Marigot' => 'Marigot -4:00',
                'America/Martinique' => 'Martinique -4:00',
                'America/Moncton' => 'Moncton -4:00',
                'America/Montserrat' => 'Montserrat -4:00',
                'America/Port_of_Spain' => 'Port_of_Spain -4:00',
                'America/Porto_Acre' => 'Porto_Acre -4:00',
                'America/Porto_Velho' => 'Porto_Velho -4:00',
                'America/Puerto_Rico' => 'Puerto_Rico -4:00',
                'America/Rio_Branco' => 'Rio_Branco -4:00',
                'America/Santiago' => 'Santiago -4:00',
                'America/Santo_Domingo' => 'Santo_Domingo -4:00',
                'America/St_Barthelemy' => 'St_Barthelemy -4:00',
                'America/St_Kitts' => 'St_Kitts -4:00',
                'America/St_Lucia' => 'St_Lucia -4:00',
                'America/St_Thomas' => 'St_Thomas -4:00',
                'America/St_Vincent' => 'St_Vincent -4:00',
                'America/Thule' => 'Thule -4:00',
                'America/Tortola' => 'Tortola -4:00',
                'America/Virgin' => 'Virgin -4:00',
                'America/St_Johns' => 'St_Johns -3:-30',
                'America/Araguaina' => 'Araguaina -3:00',
                'America/Bahia' => 'Bahia -3:00',
                'America/Belem' => 'Belem -3:00',
                'America/Buenos_Aires' => 'Buenos_Aires -3:00',
                'America/Catamarca' => 'Catamarca -3:00',
                'America/Cayenne' => 'Cayenne -3:00',
                'America/Cordoba' => 'Cordoba -3:00',
                'America/Fortaleza' => 'Fortaleza -3:00',
                'America/Godthab' => 'Godthab -3:00',
                'America/Jujuy' => 'Jujuy -3:00',
                'America/Maceio' => 'Maceio -3:00',
                'America/Mendoza' => 'Mendoza -3:00',
                'America/Miquelon' => 'Miquelon -3:00',
                'America/Montevideo' => 'Montevideo -3:00',
                'America/Paramaribo' => 'Paramaribo -3:00',
                'America/Recife' => 'Recife -3:00',
                'America/Rosario' => 'Rosario -3:00',
                'America/Santarem' => 'Santarem -3:00',
                'America/Sao_Paulo' => 'Sao_Paulo -3:00',
                'America/Noronha' => 'Noronha -2:00',
                'America/Scoresbysund' => 'Scoresbysund -1:00',
                'America/Danmarkshavn' => 'Danmarkshavn +0:00',
            ),
            'Canada' => array (
                'Canada/Pacific' => 'Pacific -8:00',
                'Canada/Yukon' => 'Yukon -8:00',
                'Canada/Mountain' => 'Mountain -7:00',
                'Canada/Central' => 'Central -6:00',
                'Canada/East-Saskatchewan' => 'East-Saskatchewan -6:00',
                'Canada/Saskatchewan' => 'Saskatchewan -6:00',
                'Canada/Eastern' => 'Eastern -5:00',
                'Canada/Atlantic' => 'Atlantic -4:00',
                'Canada/Newfoundland' => 'Newfoundland -3:-30',
            ),
            'Mexico' => array (
                'Mexico/BajaNorte' => 'BajaNorte -8:00',
                'Mexico/BajaSur' => 'BajaSur -7:00',
                'Mexico/General' => 'General -6:00',
            ),
            'Chile' => array (
                'Chile/EasterIsland' => 'EasterIsland -6:00',
                'Chile/Continental' => 'Continental -4:00',
            ),
            'Antarctica' => array (
                'Antarctica/Palmer' => 'Palmer -4:00',
                'Antarctica/Rothera' => 'Rothera -3:00',
                'Antarctica/Syowa' => 'Syowa +3:00',
                'Antarctica/Mawson' => 'Mawson +6:00',
                'Antarctica/Vostok' => 'Vostok +6:00',
                'Antarctica/Davis' => 'Davis +7:00',
                'Antarctica/Casey' => 'Casey +8:00',
                'Antarctica/DumontDUrville' => 'DumontDUrville +10:00',
                'Antarctica/McMurdo' => 'McMurdo +12:00',
                'Antarctica/South_Pole' => 'South_Pole +12:00',
            ),
            'Atlantic' => array (
                'Atlantic/Bermuda' => 'Bermuda -4:00',
                'Atlantic/Stanley' => 'Stanley -4:00',
                'Atlantic/South_Georgia' => 'South_Georgia -2:00',
                'Atlantic/Azores' => 'Azores -1:00',
                'Atlantic/Cape_Verde' => 'Cape_Verde -1:00',
                'Atlantic/Canary' => 'Canary +0:00',
                'Atlantic/Faeroe' => 'Faeroe +0:00',
                'Atlantic/Faroe' => 'Faroe +0:00',
                'Atlantic/Madeira' => 'Madeira +0:00',
                'Atlantic/Reykjavik' => 'Reykjavik +0:00',
                'Atlantic/St_Helena' => 'St_Helena +0:00',
                'Atlantic/Jan_Mayen' => 'Jan_Mayen +1:00',
            ),
            'Brazil' => array (
                'Brazil/Acre' => 'Acre -4:00',
                'Brazil/West' => 'West -4:00',
                'Brazil/East' => 'East -3:00',
                'Brazil/DeNoronha' => 'DeNoronha -2:00',
            ),
            'Africa' => array (
                'Africa/Abidjan' => 'Abidjan +0:00',
                'Africa/Accra' => 'Accra +0:00',
                'Africa/Bamako' => 'Bamako +0:00',
                'Africa/Banjul' => 'Banjul +0:00',
                'Africa/Bissau' => 'Bissau +0:00',
                'Africa/Casablanca' => 'Casablanca +0:00',
                'Africa/Conakry' => 'Conakry +0:00',
                'Africa/Dakar' => 'Dakar +0:00',
                'Africa/El_Aaiun' => 'El_Aaiun +0:00',
                'Africa/Freetown' => 'Freetown +0:00',
                'Africa/Lome' => 'Lome +0:00',
                'Africa/Monrovia' => 'Monrovia +0:00',
                'Africa/Nouakchott' => 'Nouakchott +0:00',
                'Africa/Ouagadougou' => 'Ouagadougou +0:00',
                'Africa/Sao_Tome' => 'Sao_Tome +0:00',
                'Africa/Timbuktu' => 'Timbuktu +0:00',
                'Africa/Algiers' => 'Algiers +1:00',
                'Africa/Bangui' => 'Bangui +1:00',
                'Africa/Brazzaville' => 'Brazzaville +1:00',
                'Africa/Ceuta' => 'Ceuta +1:00',
                'Africa/Douala' => 'Douala +1:00',
                'Africa/Kinshasa' => 'Kinshasa +1:00',
                'Africa/Lagos' => 'Lagos +1:00',
                'Africa/Libreville' => 'Libreville +1:00',
                'Africa/Luanda' => 'Luanda +1:00',
                'Africa/Malabo' => 'Malabo +1:00',
                'Africa/Ndjamena' => 'Ndjamena +1:00',
                'Africa/Niamey' => 'Niamey +1:00',
                'Africa/Porto-Novo' => 'Porto-Novo +1:00',
                'Africa/Tunis' => 'Tunis +1:00',
                'Africa/Windhoek' => 'Windhoek +1:00',
                'Africa/Blantyre' => 'Blantyre +2:00',
                'Africa/Bujumbura' => 'Bujumbura +2:00',
                'Africa/Cairo' => 'Cairo +2:00',
                'Africa/Gaborone' => 'Gaborone +2:00',
                'Africa/Harare' => 'Harare +2:00',
                'Africa/Johannesburg' => 'Johannesburg +2:00',
                'Africa/Kigali' => 'Kigali +2:00',
                'Africa/Lubumbashi' => 'Lubumbashi +2:00',
                'Africa/Lusaka' => 'Lusaka +2:00',
                'Africa/Maputo' => 'Maputo +2:00',
                'Africa/Maseru' => 'Maseru +2:00',
                'Africa/Mbabane' => 'Mbabane +2:00',
                'Africa/Tripoli' => 'Tripoli +2:00',
                'Africa/Addis_Ababa' => 'Addis_Ababa +3:00',
                'Africa/Asmara' => 'Asmara +3:00',
                'Africa/Asmera' => 'Asmera +3:00',
                'Africa/Dar_es_Salaam' => 'Dar_es_Salaam +3:00',
                'Africa/Djibouti' => 'Djibouti +3:00',
                'Africa/Kampala' => 'Kampala +3:00',
                'Africa/Khartoum' => 'Khartoum +3:00',
                'Africa/Mogadishu' => 'Mogadishu +3:00',
                'Africa/Nairobi' => 'Nairobi +3:00',
            ),
            'Europe' => array (
                'Europe/Belfast' => 'Belfast +0:00',
                'Europe/Dublin' => 'Dublin +0:00',
                'Europe/Guernsey' => 'Guernsey +0:00',
                'Europe/Isle_of_Man' => 'Isle_of_Man +0:00',
                'Europe/Jersey' => 'Jersey +0:00',
                'Europe/Lisbon' => 'Lisbon +0:00',
                'Europe/London' => 'London +0:00',
                'Europe/Amsterdam' => 'Amsterdam +1:00',
                'Europe/Andorra' => 'Andorra +1:00',
                'Europe/Belgrade' => 'Belgrade +1:00',
                'Europe/Berlin' => 'Berlin +1:00',
                'Europe/Bratislava' => 'Bratislava +1:00',
                'Europe/Brussels' => 'Brussels +1:00',
                'Europe/Budapest' => 'Budapest +1:00',
                'Europe/Copenhagen' => 'Copenhagen +1:00',
                'Europe/Gibraltar' => 'Gibraltar +1:00',
                'Europe/Ljubljana' => 'Ljubljana +1:00',
                'Europe/Luxembourg' => 'Luxembourg +1:00',
                'Europe/Madrid' => 'Madrid +1:00',
                'Europe/Malta' => 'Malta +1:00',
                'Europe/Monaco' => 'Monaco +1:00',
                'Europe/Oslo' => 'Oslo +1:00',
                'Europe/Paris' => 'Paris +1:00',
                'Europe/Podgorica' => 'Podgorica +1:00',
                'Europe/Prague' => 'Prague +1:00',
                'Europe/Rome' => 'Rome +1:00',
                'Europe/San_Marino' => 'San_Marino +1:00',
                'Europe/Sarajevo' => 'Sarajevo +1:00',
                'Europe/Skopje' => 'Skopje +1:00',
                'Europe/Stockholm' => 'Stockholm +1:00',
                'Europe/Tirane' => 'Tirane +1:00',
                'Europe/Vaduz' => 'Vaduz +1:00',
                'Europe/Vatican' => 'Vatican +1:00',
                'Europe/Vienna' => 'Vienna +1:00',
                'Europe/Warsaw' => 'Warsaw +1:00',
                'Europe/Zagreb' => 'Zagreb +1:00',
                'Europe/Zurich' => 'Zurich +1:00',
                'Europe/Athens' => 'Athens +2:00',
                'Europe/Bucharest' => 'Bucharest +2:00',
                'Europe/Chisinau' => 'Chisinau +2:00',
                'Europe/Helsinki' => 'Helsinki +2:00',
                'Europe/Istanbul' => 'Istanbul +2:00',
                'Europe/Kaliningrad' => 'Kaliningrad +2:00',
                'Europe/Kiev' => 'Kiev +2:00',
                'Europe/Mariehamn' => 'Mariehamn +2:00',
                'Europe/Minsk' => 'Minsk +2:00',
                'Europe/Nicosia' => 'Nicosia +2:00',
                'Europe/Riga' => 'Riga +2:00',
                'Europe/Simferopol' => 'Simferopol +2:00',
                'Europe/Sofia' => 'Sofia +2:00',
                'Europe/Tallinn' => 'Tallinn +2:00',
                'Europe/Tiraspol' => 'Tiraspol +2:00',
                'Europe/Uzhgorod' => 'Uzhgorod +2:00',
                'Europe/Vilnius' => 'Vilnius +2:00',
                'Europe/Zaporozhye' => 'Zaporozhye +2:00',
                'Europe/Moscow' => 'Moscow +3:00',
                'Europe/Volgograd' => 'Volgograd +3:00',
                'Europe/Samara' => 'Samara +4:00',
            ),
            'Arctic' => array (
                'Arctic/Longyearbyen' => 'Longyearbyen +1:00',
            ),
            'Asia' => array (
                'Asia/Amman' => 'Amman +2:00',
                'Asia/Beirut' => 'Beirut +2:00',
                'Asia/Damascus' => 'Damascus +2:00',
                'Asia/Gaza' => 'Gaza +2:00',
                'Asia/Istanbul' => 'Istanbul +2:00',
                'Asia/Jerusalem' => 'Jerusalem +2:00',
                'Asia/Nicosia' => 'Nicosia +2:00',
                'Asia/Tel_Aviv' => 'Tel_Aviv +2:00',
                'Asia/Aden' => 'Aden +3:00',
                'Asia/Baghdad' => 'Baghdad +3:00',
                'Asia/Bahrain' => 'Bahrain +3:00',
                'Asia/Kuwait' => 'Kuwait +3:00',
                'Asia/Qatar' => 'Qatar +3:00',
                'Asia/Tehran' => 'Tehran +3:30',
                'Asia/Baku' => 'Baku +4:00',
                'Asia/Dubai' => 'Dubai +4:00',
                'Asia/Muscat' => 'Muscat +4:00',
                'Asia/Tbilisi' => 'Tbilisi +4:00',
                'Asia/Yerevan' => 'Yerevan +4:00',
                'Asia/Kabul' => 'Kabul +4:30',
                'Asia/Aqtau' => 'Aqtau +5:00',
                'Asia/Aqtobe' => 'Aqtobe +5:00',
                'Asia/Ashgabat' => 'Ashgabat +5:00',
                'Asia/Ashkhabad' => 'Ashkhabad +5:00',
                'Asia/Dushanbe' => 'Dushanbe +5:00',
                'Asia/Karachi' => 'Karachi +5:00',
                'Asia/Oral' => 'Oral +5:00',
                'Asia/Samarkand' => 'Samarkand +5:00',
                'Asia/Tashkent' => 'Tashkent +5:00',
                'Asia/Yekaterinburg' => 'Yekaterinburg +5:00',
                'Asia/Calcutta' => 'Calcutta +5:30',
                'Asia/Colombo' => 'Colombo +5:30',
                'Asia/Kolkata' => 'Kolkata +5:30',
                'Asia/Katmandu' => 'Katmandu +5:45',
                'Asia/Almaty' => 'Almaty +6:00',
                'Asia/Bishkek' => 'Bishkek +6:00',
                'Asia/Dacca' => 'Dacca +6:00',
                'Asia/Dhaka' => 'Dhaka +6:00',
                'Asia/Novosibirsk' => 'Novosibirsk +6:00',
                'Asia/Omsk' => 'Omsk +6:00',
                'Asia/Qyzylorda' => 'Qyzylorda +6:00',
                'Asia/Thimbu' => 'Thimbu +6:00',
                'Asia/Thimphu' => 'Thimphu +6:00',
                'Asia/Rangoon' => 'Rangoon +6:30',
                'Asia/Bangkok' => 'Bangkok +7:00',
                'Asia/Ho_Chi_Minh' => 'Ho_Chi_Minh +7:00',
                'Asia/Hovd' => 'Hovd +7:00',
                'Asia/Jakarta' => 'Jakarta +7:00',
                'Asia/Krasnoyarsk' => 'Krasnoyarsk +7:00',
                'Asia/Phnom_Penh' => 'Phnom_Penh +7:00',
                'Asia/Pontianak' => 'Pontianak +7:00',
                'Asia/Saigon' => 'Saigon +7:00',
                'Asia/Vientiane' => 'Vientiane +7:00',
                'Asia/Brunei' => 'Brunei +8:00',
                'Asia/Choibalsan' => 'Choibalsan +8:00',
                'Asia/Chongqing' => 'Chongqing +8:00',
                'Asia/Chungking' => 'Chungking +8:00',
                'Asia/Harbin' => 'Harbin +8:00',
                'Asia/Hong_Kong' => 'Hong_Kong +8:00',
                'Asia/Irkutsk' => 'Irkutsk +8:00',
                'Asia/Kashgar' => 'Kashgar +8:00',
                'Asia/Kuala_Lumpur' => 'Kuala_Lumpur +8:00',
                'Asia/Kuching' => 'Kuching +8:00',
                'Asia/Macao' => 'Macao +8:00',
                'Asia/Macau' => 'Macau +8:00',
                'Asia/Makassar' => 'Makassar +8:00',
                'Asia/Manila' => 'Manila +8:00',
                'Asia/Shanghai' => 'Shanghai +8:00',
                'Asia/Singapore' => 'Singapore +8:00',
                'Asia/Taipei' => 'Taipei +8:00',
                'Asia/Ujung_Pandang' => 'Ujung_Pandang +8:00',
                'Asia/Ulaanbaatar' => 'Ulaanbaatar +8:00',
                'Asia/Ulan_Bator' => 'Ulan_Bator +8:00',
                'Asia/Urumqi' => 'Urumqi +8:00',
                'Asia/Dili' => 'Dili +9:00',
                'Asia/Jayapura' => 'Jayapura +9:00',
                'Asia/Pyongyang' => 'Pyongyang +9:00',
                'Asia/Seoul' => 'Seoul +9:00',
                'Asia/Tokyo' => 'Tokyo +9:00',
                'Asia/Yakutsk' => 'Yakutsk +9:00',
                'Asia/Sakhalin' => 'Sakhalin +10:00',
                'Asia/Vladivostok' => 'Vladivostok +10:00',
                'Asia/Magadan' => 'Magadan +11:00',
                'Asia/Anadyr' => 'Anadyr +12:00',
                'Asia/Kamchatka' => 'Kamchatka +12:00',
            ),
            'Indian' => array (
                'Indian/Antananarivo' => 'Antananarivo +3:00',
                'Indian/Comoro' => 'Comoro +3:00',
                'Indian/Mayotte' => 'Mayotte +3:00',
                'Indian/Mahe' => 'Mahe +4:00',
                'Indian/Mauritius' => 'Mauritius +4:00',
                'Indian/Reunion' => 'Reunion +4:00',
                'Indian/Kerguelen' => 'Kerguelen +5:00',
                'Indian/Maldives' => 'Maldives +5:00',
                'Indian/Chagos' => 'Chagos +6:00',
                'Indian/Cocos' => 'Cocos +6:30',
                'Indian/Christmas' => 'Christmas +7:00',
            ),
            'Australia' => array (
                'Australia/Perth' => 'Perth +8:00',
                'Australia/West' => 'West +8:00',
                'Australia/Eucla' => 'Eucla +8:45',
                'Australia/Adelaide' => 'Adelaide +9:30',
                'Australia/Broken_Hill' => 'Broken_Hill +9:30',
                'Australia/Darwin' => 'Darwin +9:30',
                'Australia/North' => 'North +9:30',
                'Australia/South' => 'South +9:30',
                'Australia/Yancowinna' => 'Yancowinna +9:30',
                'Australia/ACT' => 'ACT +10:00',
                'Australia/Brisbane' => 'Brisbane +10:00',
                'Australia/Canberra' => 'Canberra +10:00',
                'Australia/Currie' => 'Currie +10:00',
                'Australia/Hobart' => 'Hobart +10:00',
                'Australia/Lindeman' => 'Lindeman +10:00',
                'Australia/Melbourne' => 'Melbourne +10:00',
                'Australia/NSW' => 'NSW +10:00',
                'Australia/Queensland' => 'Queensland +10:00',
                'Australia/Sydney' => 'Sydney +10:00',
                'Australia/Tasmania' => 'Tasmania +10:00',
                'Australia/Victoria' => 'Victoria +10:00',
                'Australia/LHI' => 'LHI +10:30',
                'Australia/Lord_Howe' => 'Lord_Howe +10:30',
            )
        );

        return $timezones;
    }
}

// --------------------------------------------------------------------

if ( ! function_exists('get_timezones_raw'))
{
        
    /**
     * --------------------------------------------------------------
     * Timezones Raw
     * --------------------------------------------------------------
     * 
     * Returns all timezones as an Associative Arrray.
     * Structure
     * `[TimeZone]`=>`'Timezone description'`
     * - E.g
     * - `['America/Adak'] => '(GMT-10:00) America/Adak (Hawaii-Aleutian Standard Time)'`
     * 
     * 
     */
    function get_timezones_raw():array   
    {

        $timezones = array(
            'America/Adak' => '(GMT-10:00) America/Adak (Hawaii-Aleutian Standard Time)',
            'America/Atka' => '(GMT-10:00) America/Atka (Hawaii-Aleutian Standard Time)',
            'America/Anchorage' => '(GMT-9:00) America/Anchorage (Alaska Standard Time)',
            'America/Juneau' => '(GMT-9:00) America/Juneau (Alaska Standard Time)',
            'America/Nome' => '(GMT-9:00) America/Nome (Alaska Standard Time)',
            'America/Yakutat' => '(GMT-9:00) America/Yakutat (Alaska Standard Time)',
            'America/Dawson' => '(GMT-8:00) America/Dawson (Pacific Standard Time)',
            'America/Ensenada' => '(GMT-8:00) America/Ensenada (Pacific Standard Time)',
            'America/Los_Angeles' => '(GMT-8:00) America/Los_Angeles (Pacific Standard Time)',
            'America/Tijuana' => '(GMT-8:00) America/Tijuana (Pacific Standard Time)',
            'America/Vancouver' => '(GMT-8:00) America/Vancouver (Pacific Standard Time)',
            'America/Whitehorse' => '(GMT-8:00) America/Whitehorse (Pacific Standard Time)',
            'Canada/Pacific' => '(GMT-8:00) Canada/Pacific (Pacific Standard Time)',
            'Canada/Yukon' => '(GMT-8:00) Canada/Yukon (Pacific Standard Time)',
            'Mexico/BajaNorte' => '(GMT-8:00) Mexico/BajaNorte (Pacific Standard Time)',
            'America/Boise' => '(GMT-7:00) America/Boise (Mountain Standard Time)',
            'America/Cambridge_Bay' => '(GMT-7:00) America/Cambridge_Bay (Mountain Standard Time)',
            'America/Chihuahua' => '(GMT-7:00) America/Chihuahua (Mountain Standard Time)',
            'America/Dawson_Creek' => '(GMT-7:00) America/Dawson_Creek (Mountain Standard Time)',
            'America/Denver' => '(GMT-7:00) America/Denver (Mountain Standard Time)',
            'America/Edmonton' => '(GMT-7:00) America/Edmonton (Mountain Standard Time)',
            'America/Hermosillo' => '(GMT-7:00) America/Hermosillo (Mountain Standard Time)',
            'America/Inuvik' => '(GMT-7:00) America/Inuvik (Mountain Standard Time)',
            'America/Mazatlan' => '(GMT-7:00) America/Mazatlan (Mountain Standard Time)',
            'America/Phoenix' => '(GMT-7:00) America/Phoenix (Mountain Standard Time)',
            'America/Shiprock' => '(GMT-7:00) America/Shiprock (Mountain Standard Time)',
            'America/Yellowknife' => '(GMT-7:00) America/Yellowknife (Mountain Standard Time)',
            'Canada/Mountain' => '(GMT-7:00) Canada/Mountain (Mountain Standard Time)',
            'Mexico/BajaSur' => '(GMT-7:00) Mexico/BajaSur (Mountain Standard Time)',
            'America/Belize' => '(GMT-6:00) America/Belize (Central Standard Time)',
            'America/Cancun' => '(GMT-6:00) America/Cancun (Central Standard Time)',
            'America/Chicago' => '(GMT-6:00) America/Chicago (Central Standard Time)',
            'America/Costa_Rica' => '(GMT-6:00) America/Costa_Rica (Central Standard Time)',
            'America/El_Salvador' => '(GMT-6:00) America/El_Salvador (Central Standard Time)',
            'America/Guatemala' => '(GMT-6:00) America/Guatemala (Central Standard Time)',
            'America/Knox_IN' => '(GMT-6:00) America/Knox_IN (Central Standard Time)',
            'America/Managua' => '(GMT-6:00) America/Managua (Central Standard Time)',
            'America/Menominee' => '(GMT-6:00) America/Menominee (Central Standard Time)',
            'America/Merida' => '(GMT-6:00) America/Merida (Central Standard Time)',
            'America/Mexico_City' => '(GMT-6:00) America/Mexico_City (Central Standard Time)',
            'America/Monterrey' => '(GMT-6:00) America/Monterrey (Central Standard Time)',
            'America/Rainy_River' => '(GMT-6:00) America/Rainy_River (Central Standard Time)',
            'America/Rankin_Inlet' => '(GMT-6:00) America/Rankin_Inlet (Central Standard Time)',
            'America/Regina' => '(GMT-6:00) America/Regina (Central Standard Time)',
            'America/Swift_Current' => '(GMT-6:00) America/Swift_Current (Central Standard Time)',
            'America/Tegucigalpa' => '(GMT-6:00) America/Tegucigalpa (Central Standard Time)',
            'America/Winnipeg' => '(GMT-6:00) America/Winnipeg (Central Standard Time)',
            'Canada/Central' => '(GMT-6:00) Canada/Central (Central Standard Time)',
            'Canada/East-Saskatchewan' => '(GMT-6:00) Canada/East-Saskatchewan (Central Standard Time)',
            'Canada/Saskatchewan' => '(GMT-6:00) Canada/Saskatchewan (Central Standard Time)',
            'Chile/EasterIsland' => '(GMT-6:00) Chile/EasterIsland (Easter Is. Time)',
            'Mexico/General' => '(GMT-6:00) Mexico/General (Central Standard Time)',
            'America/Atikokan' => '(GMT-5:00) America/Atikokan (Eastern Standard Time)',
            'America/Bogota' => '(GMT-5:00) America/Bogota (Colombia Time)',
            'America/Cayman' => '(GMT-5:00) America/Cayman (Eastern Standard Time)',
            'America/Coral_Harbour' => '(GMT-5:00) America/Coral_Harbour (Eastern Standard Time)',
            'America/Detroit' => '(GMT-5:00) America/Detroit (Eastern Standard Time)',
            'America/Fort_Wayne' => '(GMT-5:00) America/Fort_Wayne (Eastern Standard Time)',
            'America/Grand_Turk' => '(GMT-5:00) America/Grand_Turk (Eastern Standard Time)',
            'America/Guayaquil' => '(GMT-5:00) America/Guayaquil (Ecuador Time)',
            'America/Havana' => '(GMT-5:00) America/Havana (Cuba Standard Time)',
            'America/Indianapolis' => '(GMT-5:00) America/Indianapolis (Eastern Standard Time)',
            'America/Iqaluit' => '(GMT-5:00) America/Iqaluit (Eastern Standard Time)',
            'America/Jamaica' => '(GMT-5:00) America/Jamaica (Eastern Standard Time)',
            'America/Lima' => '(GMT-5:00) America/Lima (Peru Time)',
            'America/Louisville' => '(GMT-5:00) America/Louisville (Eastern Standard Time)',
            'America/Montreal' => '(GMT-5:00) America/Montreal (Eastern Standard Time)',
            'America/Nassau' => '(GMT-5:00) America/Nassau (Eastern Standard Time)',
            'America/New_York' => '(GMT-5:00) America/New_York (Eastern Standard Time)',
            'America/Nipigon' => '(GMT-5:00) America/Nipigon (Eastern Standard Time)',
            'America/Panama' => '(GMT-5:00) America/Panama (Eastern Standard Time)',
            'America/Pangnirtung' => '(GMT-5:00) America/Pangnirtung (Eastern Standard Time)',
            'America/Port-au-Prince' => '(GMT-5:00) America/Port-au-Prince (Eastern Standard Time)',
            'America/Resolute' => '(GMT-5:00) America/Resolute (Eastern Standard Time)',
            'America/Thunder_Bay' => '(GMT-5:00) America/Thunder_Bay (Eastern Standard Time)',
            'America/Toronto' => '(GMT-5:00) America/Toronto (Eastern Standard Time)',
            'Canada/Eastern' => '(GMT-5:00) Canada/Eastern (Eastern Standard Time)',
            'America/Caracas' => '(GMT-4:-30) America/Caracas (Venezuela Time)',
            'America/Anguilla' => '(GMT-4:00) America/Anguilla (Atlantic Standard Time)',
            'America/Antigua' => '(GMT-4:00) America/Antigua (Atlantic Standard Time)',
            'America/Aruba' => '(GMT-4:00) America/Aruba (Atlantic Standard Time)',
            'America/Asuncion' => '(GMT-4:00) America/Asuncion (Paraguay Time)',
            'America/Barbados' => '(GMT-4:00) America/Barbados (Atlantic Standard Time)',
            'America/Blanc-Sablon' => '(GMT-4:00) America/Blanc-Sablon (Atlantic Standard Time)',
            'America/Boa_Vista' => '(GMT-4:00) America/Boa_Vista (Amazon Time)',
            'America/Campo_Grande' => '(GMT-4:00) America/Campo_Grande (Amazon Time)',
            'America/Cuiaba' => '(GMT-4:00) America/Cuiaba (Amazon Time)',
            'America/Curacao' => '(GMT-4:00) America/Curacao (Atlantic Standard Time)',
            'America/Dominica' => '(GMT-4:00) America/Dominica (Atlantic Standard Time)',
            'America/Eirunepe' => '(GMT-4:00) America/Eirunepe (Amazon Time)',
            'America/Glace_Bay' => '(GMT-4:00) America/Glace_Bay (Atlantic Standard Time)',
            'America/Goose_Bay' => '(GMT-4:00) America/Goose_Bay (Atlantic Standard Time)',
            'America/Grenada' => '(GMT-4:00) America/Grenada (Atlantic Standard Time)',
            'America/Guadeloupe' => '(GMT-4:00) America/Guadeloupe (Atlantic Standard Time)',
            'America/Guyana' => '(GMT-4:00) America/Guyana (Guyana Time)',
            'America/Halifax' => '(GMT-4:00) America/Halifax (Atlantic Standard Time)',
            'America/La_Paz' => '(GMT-4:00) America/La_Paz (Bolivia Time)',
            'America/Manaus' => '(GMT-4:00) America/Manaus (Amazon Time)',
            'America/Marigot' => '(GMT-4:00) America/Marigot (Atlantic Standard Time)',
            'America/Martinique' => '(GMT-4:00) America/Martinique (Atlantic Standard Time)',
            'America/Moncton' => '(GMT-4:00) America/Moncton (Atlantic Standard Time)',
            'America/Montserrat' => '(GMT-4:00) America/Montserrat (Atlantic Standard Time)',
            'America/Port_of_Spain' => '(GMT-4:00) America/Port_of_Spain (Atlantic Standard Time)',
            'America/Porto_Acre' => '(GMT-4:00) America/Porto_Acre (Amazon Time)',
            'America/Porto_Velho' => '(GMT-4:00) America/Porto_Velho (Amazon Time)',
            'America/Puerto_Rico' => '(GMT-4:00) America/Puerto_Rico (Atlantic Standard Time)',
            'America/Rio_Branco' => '(GMT-4:00) America/Rio_Branco (Amazon Time)',
            'America/Santiago' => '(GMT-4:00) America/Santiago (Chile Time)',
            'America/Santo_Domingo' => '(GMT-4:00) America/Santo_Domingo (Atlantic Standard Time)',
            'America/St_Barthelemy' => '(GMT-4:00) America/St_Barthelemy (Atlantic Standard Time)',
            'America/St_Kitts' => '(GMT-4:00) America/St_Kitts (Atlantic Standard Time)',
            'America/St_Lucia' => '(GMT-4:00) America/St_Lucia (Atlantic Standard Time)',
            'America/St_Thomas' => '(GMT-4:00) America/St_Thomas (Atlantic Standard Time)',
            'America/St_Vincent' => '(GMT-4:00) America/St_Vincent (Atlantic Standard Time)',
            'America/Thule' => '(GMT-4:00) America/Thule (Atlantic Standard Time)',
            'America/Tortola' => '(GMT-4:00) America/Tortola (Atlantic Standard Time)',
            'America/Virgin' => '(GMT-4:00) America/Virgin (Atlantic Standard Time)',
            'Antarctica/Palmer' => '(GMT-4:00) Antarctica/Palmer (Chile Time)',
            'Atlantic/Bermuda' => '(GMT-4:00) Atlantic/Bermuda (Atlantic Standard Time)',
            'Atlantic/Stanley' => '(GMT-4:00) Atlantic/Stanley (Falkland Is. Time)',
            'Brazil/Acre' => '(GMT-4:00) Brazil/Acre (Amazon Time)',
            'Brazil/West' => '(GMT-4:00) Brazil/West (Amazon Time)',
            'Canada/Atlantic' => '(GMT-4:00) Canada/Atlantic (Atlantic Standard Time)',
            'Chile/Continental' => '(GMT-4:00) Chile/Continental (Chile Time)',
            'America/St_Johns' => '(GMT-3:-30) America/St_Johns (Newfoundland Standard Time)',
            'Canada/Newfoundland' => '(GMT-3:-30) Canada/Newfoundland (Newfoundland Standard Time)',
            'America/Araguaina' => '(GMT-3:00) America/Araguaina (Brasilia Time)',
            'America/Bahia' => '(GMT-3:00) America/Bahia (Brasilia Time)',
            'America/Belem' => '(GMT-3:00) America/Belem (Brasilia Time)',
            'America/Buenos_Aires' => '(GMT-3:00) America/Buenos_Aires (Argentine Time)',
            'America/Catamarca' => '(GMT-3:00) America/Catamarca (Argentine Time)',
            'America/Cayenne' => '(GMT-3:00) America/Cayenne (French Guiana Time)',
            'America/Cordoba' => '(GMT-3:00) America/Cordoba (Argentine Time)',
            'America/Fortaleza' => '(GMT-3:00) America/Fortaleza (Brasilia Time)',
            'America/Godthab' => '(GMT-3:00) America/Godthab (Western Greenland Time)',
            'America/Jujuy' => '(GMT-3:00) America/Jujuy (Argentine Time)',
            'America/Maceio' => '(GMT-3:00) America/Maceio (Brasilia Time)',
            'America/Mendoza' => '(GMT-3:00) America/Mendoza (Argentine Time)',
            'America/Miquelon' => '(GMT-3:00) America/Miquelon (Pierre & Miquelon Standard Time)',
            'America/Montevideo' => '(GMT-3:00) America/Montevideo (Uruguay Time)',
            'America/Paramaribo' => '(GMT-3:00) America/Paramaribo (Suriname Time)',
            'America/Recife' => '(GMT-3:00) America/Recife (Brasilia Time)',
            'America/Rosario' => '(GMT-3:00) America/Rosario (Argentine Time)',
            'America/Santarem' => '(GMT-3:00) America/Santarem (Brasilia Time)',
            'America/Sao_Paulo' => '(GMT-3:00) America/Sao_Paulo (Brasilia Time)',
            'Antarctica/Rothera' => '(GMT-3:00) Antarctica/Rothera (Rothera Time)',
            'Brazil/East' => '(GMT-3:00) Brazil/East (Brasilia Time)',
            'America/Noronha' => '(GMT-2:00) America/Noronha (Fernando de Noronha Time)',
            'Atlantic/South_Georgia' => '(GMT-2:00) Atlantic/South_Georgia (South Georgia Standard Time)',
            'Brazil/DeNoronha' => '(GMT-2:00) Brazil/DeNoronha (Fernando de Noronha Time)',
            'America/Scoresbysund' => '(GMT-1:00) America/Scoresbysund (Eastern Greenland Time)',
            'Atlantic/Azores' => '(GMT-1:00) Atlantic/Azores (Azores Time)',
            'Atlantic/Cape_Verde' => '(GMT-1:00) Atlantic/Cape_Verde (Cape Verde Time)',
            'Africa/Abidjan' => '(GMT+0:00) Africa/Abidjan (Greenwich Mean Time)',
            'Africa/Accra' => '(GMT+0:00) Africa/Accra (Ghana Mean Time)',
            'Africa/Bamako' => '(GMT+0:00) Africa/Bamako (Greenwich Mean Time)',
            'Africa/Banjul' => '(GMT+0:00) Africa/Banjul (Greenwich Mean Time)',
            'Africa/Bissau' => '(GMT+0:00) Africa/Bissau (Greenwich Mean Time)',
            'Africa/Casablanca' => '(GMT+0:00) Africa/Casablanca (Western European Time)',
            'Africa/Conakry' => '(GMT+0:00) Africa/Conakry (Greenwich Mean Time)',
            'Africa/Dakar' => '(GMT+0:00) Africa/Dakar (Greenwich Mean Time)',
            'Africa/El_Aaiun' => '(GMT+0:00) Africa/El_Aaiun (Western European Time)',
            'Africa/Freetown' => '(GMT+0:00) Africa/Freetown (Greenwich Mean Time)',
            'Africa/Lome' => '(GMT+0:00) Africa/Lome (Greenwich Mean Time)',
            'Africa/Monrovia' => '(GMT+0:00) Africa/Monrovia (Greenwich Mean Time)',
            'Africa/Nouakchott' => '(GMT+0:00) Africa/Nouakchott (Greenwich Mean Time)',
            'Africa/Ouagadougou' => '(GMT+0:00) Africa/Ouagadougou (Greenwich Mean Time)',
            'Africa/Sao_Tome' => '(GMT+0:00) Africa/Sao_Tome (Greenwich Mean Time)',
            'Africa/Timbuktu' => '(GMT+0:00) Africa/Timbuktu (Greenwich Mean Time)',
            'America/Danmarkshavn' => '(GMT+0:00) America/Danmarkshavn (Greenwich Mean Time)',
            'Atlantic/Canary' => '(GMT+0:00) Atlantic/Canary (Western European Time)',
            'Atlantic/Faeroe' => '(GMT+0:00) Atlantic/Faeroe (Western European Time)',
            'Atlantic/Faroe' => '(GMT+0:00) Atlantic/Faroe (Western European Time)',
            'Atlantic/Madeira' => '(GMT+0:00) Atlantic/Madeira (Western European Time)',
            'Atlantic/Reykjavik' => '(GMT+0:00) Atlantic/Reykjavik (Greenwich Mean Time)',
            'Atlantic/St_Helena' => '(GMT+0:00) Atlantic/St_Helena (Greenwich Mean Time)',
            'Europe/Belfast' => '(GMT+0:00) Europe/Belfast (Greenwich Mean Time)',
            'Europe/Dublin' => '(GMT+0:00) Europe/Dublin (Greenwich Mean Time)',
            'Europe/Guernsey' => '(GMT+0:00) Europe/Guernsey (Greenwich Mean Time)',
            'Europe/Isle_of_Man' => '(GMT+0:00) Europe/Isle_of_Man (Greenwich Mean Time)',
            'Europe/Jersey' => '(GMT+0:00) Europe/Jersey (Greenwich Mean Time)',
            'Europe/Lisbon' => '(GMT+0:00) Europe/Lisbon (Western European Time)',
            'Europe/London' => '(GMT+0:00) Europe/London (Greenwich Mean Time)',
            'Africa/Algiers' => '(GMT+1:00) Africa/Algiers (Central European Time)',
            'Africa/Bangui' => '(GMT+1:00) Africa/Bangui (Western African Time)',
            'Africa/Brazzaville' => '(GMT+1:00) Africa/Brazzaville (Western African Time)',
            'Africa/Ceuta' => '(GMT+1:00) Africa/Ceuta (Central European Time)',
            'Africa/Douala' => '(GMT+1:00) Africa/Douala (Western African Time)',
            'Africa/Kinshasa' => '(GMT+1:00) Africa/Kinshasa (Western African Time)',
            'Africa/Lagos' => '(GMT+1:00) Africa/Lagos (Western African Time)',
            'Africa/Libreville' => '(GMT+1:00) Africa/Libreville (Western African Time)',
            'Africa/Luanda' => '(GMT+1:00) Africa/Luanda (Western African Time)',
            'Africa/Malabo' => '(GMT+1:00) Africa/Malabo (Western African Time)',
            'Africa/Ndjamena' => '(GMT+1:00) Africa/Ndjamena (Western African Time)',
            'Africa/Niamey' => '(GMT+1:00) Africa/Niamey (Western African Time)',
            'Africa/Porto-Novo' => '(GMT+1:00) Africa/Porto-Novo (Western African Time)',
            'Africa/Tunis' => '(GMT+1:00) Africa/Tunis (Central European Time)',
            'Africa/Windhoek' => '(GMT+1:00) Africa/Windhoek (Western African Time)',
            'Arctic/Longyearbyen' => '(GMT+1:00) Arctic/Longyearbyen (Central European Time)',
            'Atlantic/Jan_Mayen' => '(GMT+1:00) Atlantic/Jan_Mayen (Central European Time)',
            'Europe/Amsterdam' => '(GMT+1:00) Europe/Amsterdam (Central European Time)',
            'Europe/Andorra' => '(GMT+1:00) Europe/Andorra (Central European Time)',
            'Europe/Belgrade' => '(GMT+1:00) Europe/Belgrade (Central European Time)',
            'Europe/Berlin' => '(GMT+1:00) Europe/Berlin (Central European Time)',
            'Europe/Bratislava' => '(GMT+1:00) Europe/Bratislava (Central European Time)',
            'Europe/Brussels' => '(GMT+1:00) Europe/Brussels (Central European Time)',
            'Europe/Budapest' => '(GMT+1:00) Europe/Budapest (Central European Time)',
            'Europe/Copenhagen' => '(GMT+1:00) Europe/Copenhagen (Central European Time)',
            'Europe/Gibraltar' => '(GMT+1:00) Europe/Gibraltar (Central European Time)',
            'Europe/Ljubljana' => '(GMT+1:00) Europe/Ljubljana (Central European Time)',
            'Europe/Luxembourg' => '(GMT+1:00) Europe/Luxembourg (Central European Time)',
            'Europe/Madrid' => '(GMT+1:00) Europe/Madrid (Central European Time)',
            'Europe/Malta' => '(GMT+1:00) Europe/Malta (Central European Time)',
            'Europe/Monaco' => '(GMT+1:00) Europe/Monaco (Central European Time)',
            'Europe/Oslo' => '(GMT+1:00) Europe/Oslo (Central European Time)',
            'Europe/Paris' => '(GMT+1:00) Europe/Paris (Central European Time)',
            'Europe/Podgorica' => '(GMT+1:00) Europe/Podgorica (Central European Time)',
            'Europe/Prague' => '(GMT+1:00) Europe/Prague (Central European Time)',
            'Europe/Rome' => '(GMT+1:00) Europe/Rome (Central European Time)',
            'Europe/San_Marino' => '(GMT+1:00) Europe/San_Marino (Central European Time)',
            'Europe/Sarajevo' => '(GMT+1:00) Europe/Sarajevo (Central European Time)',
            'Europe/Skopje' => '(GMT+1:00) Europe/Skopje (Central European Time)',
            'Europe/Stockholm' => '(GMT+1:00) Europe/Stockholm (Central European Time)',
            'Europe/Tirane' => '(GMT+1:00) Europe/Tirane (Central European Time)',
            'Europe/Vaduz' => '(GMT+1:00) Europe/Vaduz (Central European Time)',
            'Europe/Vatican' => '(GMT+1:00) Europe/Vatican (Central European Time)',
            'Europe/Vienna' => '(GMT+1:00) Europe/Vienna (Central European Time)',
            'Europe/Warsaw' => '(GMT+1:00) Europe/Warsaw (Central European Time)',
            'Europe/Zagreb' => '(GMT+1:00) Europe/Zagreb (Central European Time)',
            'Europe/Zurich' => '(GMT+1:00) Europe/Zurich (Central European Time)',
            'Africa/Blantyre' => '(GMT+2:00) Africa/Blantyre (Central African Time)',
            'Africa/Bujumbura' => '(GMT+2:00) Africa/Bujumbura (Central African Time)',
            'Africa/Cairo' => '(GMT+2:00) Africa/Cairo (Eastern European Time)',
            'Africa/Gaborone' => '(GMT+2:00) Africa/Gaborone (Central African Time)',
            'Africa/Harare' => '(GMT+2:00) Africa/Harare (Central African Time)',
            'Africa/Johannesburg' => '(GMT+2:00) Africa/Johannesburg (South Africa Standard Time)',
            'Africa/Kigali' => '(GMT+2:00) Africa/Kigali (Central African Time)',
            'Africa/Lubumbashi' => '(GMT+2:00) Africa/Lubumbashi (Central African Time)',
            'Africa/Lusaka' => '(GMT+2:00) Africa/Lusaka (Central African Time)',
            'Africa/Maputo' => '(GMT+2:00) Africa/Maputo (Central African Time)',
            'Africa/Maseru' => '(GMT+2:00) Africa/Maseru (South Africa Standard Time)',
            'Africa/Mbabane' => '(GMT+2:00) Africa/Mbabane (South Africa Standard Time)',
            'Africa/Tripoli' => '(GMT+2:00) Africa/Tripoli (Eastern European Time)',
            'Asia/Amman' => '(GMT+2:00) Asia/Amman (Eastern European Time)',
            'Asia/Beirut' => '(GMT+2:00) Asia/Beirut (Eastern European Time)',
            'Asia/Damascus' => '(GMT+2:00) Asia/Damascus (Eastern European Time)',
            'Asia/Gaza' => '(GMT+2:00) Asia/Gaza (Eastern European Time)',
            'Asia/Istanbul' => '(GMT+2:00) Asia/Istanbul (Eastern European Time)',
            'Asia/Jerusalem' => '(GMT+2:00) Asia/Jerusalem (Israel Standard Time)',
            'Asia/Nicosia' => '(GMT+2:00) Asia/Nicosia (Eastern European Time)',
            'Asia/Tel_Aviv' => '(GMT+2:00) Asia/Tel_Aviv (Israel Standard Time)',
            'Europe/Athens' => '(GMT+2:00) Europe/Athens (Eastern European Time)',
            'Europe/Bucharest' => '(GMT+2:00) Europe/Bucharest (Eastern European Time)',
            'Europe/Chisinau' => '(GMT+2:00) Europe/Chisinau (Eastern European Time)',
            'Europe/Helsinki' => '(GMT+2:00) Europe/Helsinki (Eastern European Time)',
            'Europe/Istanbul' => '(GMT+2:00) Europe/Istanbul (Eastern European Time)',
            'Europe/Kaliningrad' => '(GMT+2:00) Europe/Kaliningrad (Eastern European Time)',
            'Europe/Kiev' => '(GMT+2:00) Europe/Kiev (Eastern European Time)',
            'Europe/Mariehamn' => '(GMT+2:00) Europe/Mariehamn (Eastern European Time)',
            'Europe/Minsk' => '(GMT+2:00) Europe/Minsk (Eastern European Time)',
            'Europe/Nicosia' => '(GMT+2:00) Europe/Nicosia (Eastern European Time)',
            'Europe/Riga' => '(GMT+2:00) Europe/Riga (Eastern European Time)',
            'Europe/Simferopol' => '(GMT+2:00) Europe/Simferopol (Eastern European Time)',
            'Europe/Sofia' => '(GMT+2:00) Europe/Sofia (Eastern European Time)',
            'Europe/Tallinn' => '(GMT+2:00) Europe/Tallinn (Eastern European Time)',
            'Europe/Tiraspol' => '(GMT+2:00) Europe/Tiraspol (Eastern European Time)',
            'Europe/Uzhgorod' => '(GMT+2:00) Europe/Uzhgorod (Eastern European Time)',
            'Europe/Vilnius' => '(GMT+2:00) Europe/Vilnius (Eastern European Time)',
            'Europe/Zaporozhye' => '(GMT+2:00) Europe/Zaporozhye (Eastern European Time)',
            'Africa/Addis_Ababa' => '(GMT+3:00) Africa/Addis_Ababa (Eastern African Time)',
            'Africa/Asmara' => '(GMT+3:00) Africa/Asmara (Eastern African Time)',
            'Africa/Asmera' => '(GMT+3:00) Africa/Asmera (Eastern African Time)',
            'Africa/Dar_es_Salaam' => '(GMT+3:00) Africa/Dar_es_Salaam (Eastern African Time)',
            'Africa/Djibouti' => '(GMT+3:00) Africa/Djibouti (Eastern African Time)',
            'Africa/Kampala' => '(GMT+3:00) Africa/Kampala (Eastern African Time)',
            'Africa/Khartoum' => '(GMT+3:00) Africa/Khartoum (Eastern African Time)',
            'Africa/Mogadishu' => '(GMT+3:00) Africa/Mogadishu (Eastern African Time)',
            'Africa/Nairobi' => '(GMT+3:00) Africa/Nairobi (Eastern African Time)',
            'Antarctica/Syowa' => '(GMT+3:00) Antarctica/Syowa (Syowa Time)',
            'Asia/Aden' => '(GMT+3:00) Asia/Aden (Arabia Standard Time)',
            'Asia/Baghdad' => '(GMT+3:00) Asia/Baghdad (Arabia Standard Time)',
            'Asia/Bahrain' => '(GMT+3:00) Asia/Bahrain (Arabia Standard Time)',
            'Asia/Kuwait' => '(GMT+3:00) Asia/Kuwait (Arabia Standard Time)',
            'Asia/Qatar' => '(GMT+3:00) Asia/Qatar (Arabia Standard Time)',
            'Europe/Moscow' => '(GMT+3:00) Europe/Moscow (Moscow Standard Time)',
            'Europe/Volgograd' => '(GMT+3:00) Europe/Volgograd (Volgograd Time)',
            'Indian/Antananarivo' => '(GMT+3:00) Indian/Antananarivo (Eastern African Time)',
            'Indian/Comoro' => '(GMT+3:00) Indian/Comoro (Eastern African Time)',
            'Indian/Mayotte' => '(GMT+3:00) Indian/Mayotte (Eastern African Time)',
            'Asia/Tehran' => '(GMT+3:30) Asia/Tehran (Iran Standard Time)',
            'Asia/Baku' => '(GMT+4:00) Asia/Baku (Azerbaijan Time)',
            'Asia/Dubai' => '(GMT+4:00) Asia/Dubai (Gulf Standard Time)',
            'Asia/Muscat' => '(GMT+4:00) Asia/Muscat (Gulf Standard Time)',
            'Asia/Tbilisi' => '(GMT+4:00) Asia/Tbilisi (Georgia Time)',
            'Asia/Yerevan' => '(GMT+4:00) Asia/Yerevan (Armenia Time)',
            'Europe/Samara' => '(GMT+4:00) Europe/Samara (Samara Time)',
            'Indian/Mahe' => '(GMT+4:00) Indian/Mahe (Seychelles Time)',
            'Indian/Mauritius' => '(GMT+4:00) Indian/Mauritius (Mauritius Time)',
            'Indian/Reunion' => '(GMT+4:00) Indian/Reunion (Reunion Time)',
            'Asia/Kabul' => '(GMT+4:30) Asia/Kabul (Afghanistan Time)',
            'Asia/Aqtau' => '(GMT+5:00) Asia/Aqtau (Aqtau Time)',
            'Asia/Aqtobe' => '(GMT+5:00) Asia/Aqtobe (Aqtobe Time)',
            'Asia/Ashgabat' => '(GMT+5:00) Asia/Ashgabat (Turkmenistan Time)',
            'Asia/Ashkhabad' => '(GMT+5:00) Asia/Ashkhabad (Turkmenistan Time)',
            'Asia/Dushanbe' => '(GMT+5:00) Asia/Dushanbe (Tajikistan Time)',
            'Asia/Karachi' => '(GMT+5:00) Asia/Karachi (Pakistan Time)',
            'Asia/Oral' => '(GMT+5:00) Asia/Oral (Oral Time)',
            'Asia/Samarkand' => '(GMT+5:00) Asia/Samarkand (Uzbekistan Time)',
            'Asia/Tashkent' => '(GMT+5:00) Asia/Tashkent (Uzbekistan Time)',
            'Asia/Yekaterinburg' => '(GMT+5:00) Asia/Yekaterinburg (Yekaterinburg Time)',
            'Indian/Kerguelen' => '(GMT+5:00) Indian/Kerguelen (French Southern & Antarctic Lands Time)',
            'Indian/Maldives' => '(GMT+5:00) Indian/Maldives (Maldives Time)',
            'Asia/Calcutta' => '(GMT+5:30) Asia/Calcutta (India Standard Time)',
            'Asia/Colombo' => '(GMT+5:30) Asia/Colombo (India Standard Time)',
            'Asia/Kolkata' => '(GMT+5:30) Asia/Kolkata (India Standard Time)',
            'Asia/Katmandu' => '(GMT+5:45) Asia/Katmandu (Nepal Time)',
            'Antarctica/Mawson' => '(GMT+6:00) Antarctica/Mawson (Mawson Time)',
            'Antarctica/Vostok' => '(GMT+6:00) Antarctica/Vostok (Vostok Time)',
            'Asia/Almaty' => '(GMT+6:00) Asia/Almaty (Alma-Ata Time)',
            'Asia/Bishkek' => '(GMT+6:00) Asia/Bishkek (Kirgizstan Time)',
            'Asia/Dacca' => '(GMT+6:00) Asia/Dacca (Bangladesh Time)',
            'Asia/Dhaka' => '(GMT+6:00) Asia/Dhaka (Bangladesh Time)',
            'Asia/Novosibirsk' => '(GMT+6:00) Asia/Novosibirsk (Novosibirsk Time)',
            'Asia/Omsk' => '(GMT+6:00) Asia/Omsk (Omsk Time)',
            'Asia/Qyzylorda' => '(GMT+6:00) Asia/Qyzylorda (Qyzylorda Time)',
            'Asia/Thimbu' => '(GMT+6:00) Asia/Thimbu (Bhutan Time)',
            'Asia/Thimphu' => '(GMT+6:00) Asia/Thimphu (Bhutan Time)',
            'Indian/Chagos' => '(GMT+6:00) Indian/Chagos (Indian Ocean Territory Time)',
            'Asia/Rangoon' => '(GMT+6:30) Asia/Rangoon (Myanmar Time)',
            'Indian/Cocos' => '(GMT+6:30) Indian/Cocos (Cocos Islands Time)',
            'Antarctica/Davis' => '(GMT+7:00) Antarctica/Davis (Davis Time)',
            'Asia/Bangkok' => '(GMT+7:00) Asia/Bangkok (Indochina Time)',
            'Asia/Ho_Chi_Minh' => '(GMT+7:00) Asia/Ho_Chi_Minh (Indochina Time)',
            'Asia/Hovd' => '(GMT+7:00) Asia/Hovd (Hovd Time)',
            'Asia/Jakarta' => '(GMT+7:00) Asia/Jakarta (West Indonesia Time)',
            'Asia/Krasnoyarsk' => '(GMT+7:00) Asia/Krasnoyarsk (Krasnoyarsk Time)',
            'Asia/Phnom_Penh' => '(GMT+7:00) Asia/Phnom_Penh (Indochina Time)',
            'Asia/Pontianak' => '(GMT+7:00) Asia/Pontianak (West Indonesia Time)',
            'Asia/Saigon' => '(GMT+7:00) Asia/Saigon (Indochina Time)',
            'Asia/Vientiane' => '(GMT+7:00) Asia/Vientiane (Indochina Time)',
            'Indian/Christmas' => '(GMT+7:00) Indian/Christmas (Christmas Island Time)',
            'Antarctica/Casey' => '(GMT+8:00) Antarctica/Casey (Western Standard Time (Australia))',
            'Asia/Brunei' => '(GMT+8:00) Asia/Brunei (Brunei Time)',
            'Asia/Choibalsan' => '(GMT+8:00) Asia/Choibalsan (Choibalsan Time)',
            'Asia/Chongqing' => '(GMT+8:00) Asia/Chongqing (China Standard Time)',
            'Asia/Chungking' => '(GMT+8:00) Asia/Chungking (China Standard Time)',
            'Asia/Harbin' => '(GMT+8:00) Asia/Harbin (China Standard Time)',
            'Asia/Hong_Kong' => '(GMT+8:00) Asia/Hong_Kong (Hong Kong Time)',
            'Asia/Irkutsk' => '(GMT+8:00) Asia/Irkutsk (Irkutsk Time)',
            'Asia/Kashgar' => '(GMT+8:00) Asia/Kashgar (China Standard Time)',
            'Asia/Kuala_Lumpur' => '(GMT+8:00) Asia/Kuala_Lumpur (Malaysia Time)',
            'Asia/Kuching' => '(GMT+8:00) Asia/Kuching (Malaysia Time)',
            'Asia/Macao' => '(GMT+8:00) Asia/Macao (China Standard Time)',
            'Asia/Macau' => '(GMT+8:00) Asia/Macau (China Standard Time)',
            'Asia/Makassar' => '(GMT+8:00) Asia/Makassar (Central Indonesia Time)',
            'Asia/Manila' => '(GMT+8:00) Asia/Manila (Philippines Time)',
            'Asia/Shanghai' => '(GMT+8:00) Asia/Shanghai (China Standard Time)',
            'Asia/Singapore' => '(GMT+8:00) Asia/Singapore (Singapore Time)',
            'Asia/Taipei' => '(GMT+8:00) Asia/Taipei (China Standard Time)',
            'Asia/Ujung_Pandang' => '(GMT+8:00) Asia/Ujung_Pandang (Central Indonesia Time)',
            'Asia/Ulaanbaatar' => '(GMT+8:00) Asia/Ulaanbaatar (Ulaanbaatar Time)',
            'Asia/Ulan_Bator' => '(GMT+8:00) Asia/Ulan_Bator (Ulaanbaatar Time)',
            'Asia/Urumqi' => '(GMT+8:00) Asia/Urumqi (China Standard Time)',
            'Australia/Perth' => '(GMT+8:00) Australia/Perth (Western Standard Time (Australia))',
            'Australia/West' => '(GMT+8:00) Australia/West (Western Standard Time (Australia))',
            'Australia/Eucla' => '(GMT+8:45) Australia/Eucla (Central Western Standard Time (Australia))',
            'Asia/Dili' => '(GMT+9:00) Asia/Dili (Timor-Leste Time)',
            'Asia/Jayapura' => '(GMT+9:00) Asia/Jayapura (East Indonesia Time)',
            'Asia/Pyongyang' => '(GMT+9:00) Asia/Pyongyang (Korea Standard Time)',
            'Asia/Seoul' => '(GMT+9:00) Asia/Seoul (Korea Standard Time)',
            'Asia/Tokyo' => '(GMT+9:00) Asia/Tokyo (Japan Standard Time)',
            'Asia/Yakutsk' => '(GMT+9:00) Asia/Yakutsk (Yakutsk Time)',
            'Australia/Adelaide' => '(GMT+9:30) Australia/Adelaide (Central Standard Time (South Australia))',
            'Australia/Broken_Hill' => '(GMT+9:30) Australia/Broken_Hill (Central Standard Time (South Australia/New South Wales))',
            'Australia/Darwin' => '(GMT+9:30) Australia/Darwin (Central Standard Time (Northern Territory))',
            'Australia/North' => '(GMT+9:30) Australia/North (Central Standard Time (Northern Territory))',
            'Australia/South' => '(GMT+9:30) Australia/South (Central Standard Time (South Australia))',
            'Australia/Yancowinna' => '(GMT+9:30) Australia/Yancowinna (Central Standard Time (South Australia/New South Wales))',
            'Antarctica/DumontDUrville' => '(GMT+10:00) Antarctica/DumontDUrville (Dumont-d\'Urville Time)',
            'Asia/Sakhalin' => '(GMT+10:00) Asia/Sakhalin (Sakhalin Time)',
            'Asia/Vladivostok' => '(GMT+10:00) Asia/Vladivostok (Vladivostok Time)',
            'Australia/ACT' => '(GMT+10:00) Australia/ACT (Eastern Standard Time (New South Wales))',
            'Australia/Brisbane' => '(GMT+10:00) Australia/Brisbane (Eastern Standard Time (Queensland))',
            'Australia/Canberra' => '(GMT+10:00) Australia/Canberra (Eastern Standard Time (New South Wales))',
            'Australia/Currie' => '(GMT+10:00) Australia/Currie (Eastern Standard Time (New South Wales))',
            'Australia/Hobart' => '(GMT+10:00) Australia/Hobart (Eastern Standard Time (Tasmania))',
            'Australia/Lindeman' => '(GMT+10:00) Australia/Lindeman (Eastern Standard Time (Queensland))',
            'Australia/Melbourne' => '(GMT+10:00) Australia/Melbourne (Eastern Standard Time (Victoria))',
            'Australia/NSW' => '(GMT+10:00) Australia/NSW (Eastern Standard Time (New South Wales))',
            'Australia/Queensland' => '(GMT+10:00) Australia/Queensland (Eastern Standard Time (Queensland))',
            'Australia/Sydney' => '(GMT+10:00) Australia/Sydney (Eastern Standard Time (New South Wales))',
            'Australia/Tasmania' => '(GMT+10:00) Australia/Tasmania (Eastern Standard Time (Tasmania))',
            'Australia/Victoria' => '(GMT+10:00) Australia/Victoria (Eastern Standard Time (Victoria))',
            'Australia/LHI' => '(GMT+10:30) Australia/LHI (Lord Howe Standard Time)',
            'Australia/Lord_Howe' => '(GMT+10:30) Australia/Lord_Howe (Lord Howe Standard Time)',
            'Asia/Magadan' => '(GMT+11:00) Asia/Magadan (Magadan Time)',
            'Antarctica/McMurdo' => '(GMT+12:00) Antarctica/McMurdo (New Zealand Standard Time)',
            'Antarctica/South_Pole' => '(GMT+12:00) Antarctica/South_Pole (New Zealand Standard Time)',
            'Asia/Anadyr' => '(GMT+12:00) Asia/Anadyr (Anadyr Time)',
            'Asia/Kamchatka' => '(GMT+12:00) Asia/Kamchatka (Petropavlovsk-Kamchatski Time)'
        );

        return $timezones;








    }
}

// --------------------------------------------------------------------

if ( ! function_exists('get_timezones'))
{
    

    
    /**
     * --------------------------------------------------------------
     * Timezones Array
     * --------------------------------------------------------------
     * 
     * Returns all timezones as an Associative Arrray.
     * Structure
     * `[TimeZone]`=>`[offset]`,`[zone]`,`[standard]`
     * 
     * 
     */
    function get_timezones()   
    {
        $splitZoneInfo = [];
        $timezones = get_timezones_raw();

        foreach($timezones as $t=>$z){
    
            $offset = trim(str_replace(array(')','('),'',substr($z,0,strpos($z, ' '))));
            
            $zone = trim(str_replace(array(')','('),'',substr($z,strpos($z, ' '),strlen($z))));
            
            $standard = trim(str_replace(array(')','('),'',substr($zone,strpos($zone, ' '),strlen($zone))));
            
            $zone = trim(str_replace(array(')','('),'',substr($zone,0,strpos($zone, ' '))));
            
            $splitZoneInfo[$t] = [
            
                'offset' => $offset,
                'zone' => $zone,
                'standard' => $standard
                
            ];
        
        }
        
        return $splitZoneInfo;
















    }
}

// --------------------------------------------------------------------
if ( ! function_exists('countries_array'))
{
    

    
    /**
     * --------------------------------------------------------------
     * countries_array
     * --------------------------------------------------------------
     * 
     * Returns all timezones as an Associative Arrray.
     * Structure
     * `[TimeZone]`=>`[offset]`,`[zone]`,`[standard]`
     * 
     * 
     */
    function countries_array()   
    {
       return array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");


















    }
}

// --------------------------------------------------------------------



























?>