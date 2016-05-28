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

	//通过user_ID获取用户表的username
	function getUsernameById($id){
		$data = DB::table('useradd')->where('id','=',$id)->first()['username'];

		return $data;
	}

	//文章列表页,统计文章评论数量
	function commentsnum($id){
		return DB::table('comments')->where('article_id',$id)->count();
	}
 ?>