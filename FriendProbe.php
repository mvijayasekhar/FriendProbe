<?php
require_once('DbConnect.php');
require_once('PbLSV.php');
require_once('MulMat.php');
require_once('UserRecommend.php');
Class FriendProbe {
	public function GetRecUsers() {
		$user_id = array();
		$lsv = array();
		$nmul = array();
		$recusers = array();

		$db = new Db();
		$pblsv = new PbLSV();
		$mm = new MulMat();
		$urec = new UserRecommend();
		
		$uresult = $db->Query('SELECT userid, pmo, pbo, pso, pmu, pga FROM fprobe');
		if(!$uresult)
			echo $db->Error();

		$user_id = $pblsv->GetUserID($uresult);
		mysqli_data_seek($uresult, 0);
		$lsv = $pblsv->ProbLSV($uresult);
		$nmul = $mm->MulMatrix($lsv);
		$recusers = $urec->GetRecUsers($user_id, $nmul);
		return $recusers;
	}
}
?>
