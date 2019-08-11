<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Encrypt
{
	
	var $skey 	= "Alfa11EltranIndonesiawVcAs201DcG"; 
	
    public  function safe_b64encode($string) {
	
        $data = base64_encode($string);
        $data = str_replace(array('+','/','='),array('-','_',''),$data);
        return $data;
    }
 
	public function safe_b64decode($string) {
        $data = str_replace(array('-','_'),array('+','/'),$string);
        $mod4 = strlen($data) % 4;
        if ($mod4) {
            $data .= substr('====', $mod4);
        }
        return base64_decode($data);
    }
	
    public  function encode($value){ 
		
	    return strtr(base64_encode($value), '+=/', '.-~');

    }
    
    public function decode($value){
		
        return base64_decode(strtr($value, '.-~', '+=/'));

    }
	

}

/* End of file MY_Encrypt.php */
/* Location: ./application/libraries/MY_Encrypt.php */
