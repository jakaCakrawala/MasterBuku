<?php 


	function kelipatan($value)
	{
		for ($i=0; $i < $value ; $i++) { 
		
			if(is_int($i/25)){

				echo "KI"."<br>";

			}elseif (is_int($i/40)) {

				echo "OS"."<br>";
			
			}elseif (is_int($i/60)) {
			
				echo  "TIK"."<br>";
			
			}elseif (is_int($i/99)) {
			
				echo "KIOSTIK"."<br>";
			
			}

		}

	}

kelipatan(100);

 ?>