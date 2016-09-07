<?php
class PbLSV {

	public function ProbLSV(mysqli_result $result) {
		$i = 0;
		$probability = array();
		while($row = mysqli_fetch_array($result, MYSQL_NUM))
		{
			$total=$row[1]+$row[2]+$row[3]+$row[4]+$row[5];
			$pmo = $row[1]/$total;
			$pbo = $row[2]/$total;
			$pso = $row[3]/$total;
			$pmu = $row[4]/$total;
			$pga = $row[5]/$total;
			if ($pmo > 0.2) {
				$probability[$i][0]=$pmo;
			} else {
				$probability[$i][0]=0;
			}
			if ($pbo > 0.2) {
				$probability[$i][1]=$pbo;
			} else {
				$probability[$i][1]=0;
			}
			if ($pso > 0.2) {
				$probability[$i][2]=$pso;
			} else {
				$probability[$i][2]=0;
			}
			if ($pmu > 0.2) {
				$probability[$i][2]=$pmu;
			} else {
				$probability[$i][2]=0;
			}
			if ($pga > 0.2) {
				$probability[$i][2]=$pga;
			} else {
				$probability[$i][2]=0;
			}
			$i++;
		}
		return $probability;
	}

	public function GetUserID(mysqli_result $result) {
		$i = 0;
		$user_id = array();
		while($row = mysqli_fetch_array($result, MYSQL_NUM))
		{
			$user_id[$i] = $row[0];
			$i++;
		}
		return $user_id;
	}

}
?> 
