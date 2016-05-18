<?php 
	
	/**
	 * 用户的状态函数在index列表页
	 */
	function showstatus($staid){
		if($staid==1){
			return "激活状态";
		}else{
			return "未激活状态";
		}
	}

	function pathName($path){
		$num = substr_count($path,',');
		
		$pathname = ($num+1)."级类";

		return $pathname; 
	}
 ?>