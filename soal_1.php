<?php 

	// Returns maximum in array 
	function getMax($array)
	{

		$temp	= $array[0];

		foreach($array as $x)
		{
			//Cek if X > value $array temp
			if($x > $temp)
			{
				$temp = $x;
			}

		}

		return $temp;

	}
	// Returns minimum in array 
	function getMin($array)
	{

		$temp	= $array[0];

		foreach($array as $x)
		{
			//Cek if X < value $array temp
			if($x < $temp)
			{
				$temp = $x;
			}

		}

		return $temp;

	}


$arr = array(1,5,8,0,9,7,4,3,2);

echo "Max value array = " .getMax($arr)."<br>"."Min value array = ".getMin($arr);

?>