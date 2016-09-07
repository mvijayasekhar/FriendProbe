<?php
require_once('CosineSimilarity.php');
require_once('SSimilarity.php');
class MulMat {

	public function MulMatrix(array $lsv) {
		$cssim = array();
		$ssim = array();
		$nmul = array();
		$cs = new CosineSimilarity();
		$ss = new SSimilarity();
		$row_count = count($lsv);
		$i = 0;
		while($i < $row_count)
		{
			$arr1=explode(" ",$i);
			$j = 0;
			while($j < $row_count)
			{
				$cssim[$i][$j] = $cs->similarity($lsv[$i],$lsv[$j]); // cosine similarity of $v1 and $v2
				$ssim[$i][$j] = $ss->similarity($lsv[$i],$lsv[$j]); //s similarity of $v1 and $v2
				$nmul[$i][$j] = $cssim[$i][$j] * $ssim[$i][$j];
				$j++;
			}
			$i++;
		} 
		return $nmul;
	}

}
?> 
