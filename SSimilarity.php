<?php
class SSimilarity {

	public function similarity(array $vec1, array $vec2) {
		$array1=$this->Vector($vec1);
		$array2=$this->Vector($vec2);
		$value=array_intersect($array1,$array2);
		$n=count($value);
		$sum=(count($array1)+count($array2));
		$numerator =2*$n;
		$sim =$numerator/$sum;
		return $sim;
	}

	protected function Vector(array $vec) {
		$array=array(); 
		if ($vec[0]>0.2) {
			$a=array(1);
		} else {
			$a=array();
		}
		if($vec[1]>0.2) {
			$b=array(2);
		} else { 
			$b=array();
		}
		$array=array_merge($a,$b);

		if($vec[2]>0.2) {
			$c=array(3);
		} else {
			$c=array();
		} 
		$array=array_merge($array,$c);
		
		if($vec[3]>0.2) {
			$d=array(4);
		} else {
			$d=array();
		} 
		$array=array_merge($array,$d);
		
		if($vec[4]>0.2) {
			$e=array(5);
		} else {
			$e=array();
		} 
		$array=array_merge($array,$e);
		return $array;
	}
}
?> 
