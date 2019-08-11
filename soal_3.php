<?php 

    
    function Palindrome($string){   


         $arr = array(); 
         $arr = str_split($string);
         $status  = "";
         $x = "";

        for ($i = count($arr)-1; $i >= 0; $i--) {

                $x .= $arr[$i];
            
        }
            if ($string == $x) {
            
                $status = $string." Merupakan Kalimat Palindrome";
            
            } else {
            
                $status = $string." Bukan Kalimat Palindrome";
            
            }
    
        return $status;
    } 

    echo Palindrome("MALAM");

 ?>