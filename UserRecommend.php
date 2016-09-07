<?php
require_once( 'FbInclude.php' );
class UserRecommend {

	public function GetRecUsers(array $user_id, array $nmul) {
		$uind = $this->GetUserIndex($user_id);
		$cols = count($nmul[$uind]);
		$rec_users = array();
		$recind = 0;
		for($rec=0;$rec<$cols;$rec++)
		{
			if(($nmul[$uind][$rec]>0.5))
			{
				if($rec!=$uind)
				{
					$rec_users[$recind] = $user_id[$rec];
					$recind++;
				}
			}
		}
		return $rec_users;
	}

	protected function GetUserIndex(array $user_id) {
		$ind = 0;
		for ($i = 0;$i < count($user_id);$i++) {
			if($user_id[$i] == $_SESSION[user_id]) {
				$ind = $i;
			}
		}
		return $ind;
	}
}
?> 
