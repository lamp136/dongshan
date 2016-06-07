@extends('moban.moban')
@section('content')
<div class="mws-panel grid_8">
<div class="mws-panel-header">
	<span>绑定权限</span>
</div>
<div class="mws-panel-body no-padding">
	<button>用户管理权限</button>
	<button>商品管理权限</button>
	<button>文章管理权限</button>
	<button>轮播图管理权限</button>
	<button>权限管理</button>
	<button>角色管理权限</button>
	<button>后台首页权限</button>
	<form action="/Permission/attachper" method='post' class="mws-form">
		<div class="mws-form-inline">
			<div class="mws-form-row">
				<label class="mws-form-label">权限</label>
					
				<div class="mws-form-item">
					
					@foreach($per as $pk=>$pv)
					<div style="width:220px;height:50px;float:left;margin:10px 10px;" class='str' disname="{{$pv['display_name']}}"><input type="checkbox" name='per_id[]' value="{{$pv['id']}}" ><span style="font-size:14px" >{{$pv['display_name']}}</span></div>
					@endforeach
				</div>
			</div>		
			<div class="mws-form-row">
				<label class="mws-form-label">要绑定的角色</label>
				<div class="mws-form-item">
					<select class="small" name='role_id'>
						@foreach($role as $k=>$v)
							<option value="{{$v['id']}}" @if($v['id']==$role_id) selected @endif>{{$v['name']}}--{{$v['display_name']}}</option>
						@endforeach
					</select>
				</div>
			</div>
			
		</div>
		{{csrf_field()}}
		<div class="mws-button-row">
			<input type="submit" class="btn btn-danger" value="绑定">
			<input type="reset" class="btn " value="重置">
		</div>
	</form>
</div>    	
</div>
@endsection

@section('myjs')
	<script type="text/javascript">
		$('button').eq(1).click(function(){
			$('.str').css('display','none');

			$('.str').each(function(){
			   var str =  $(this).attr('disname').substr(0,2);
			   	if(str=='用户'){
			   		$(this).css('display','block')
			   	}
			})
		})

		$('button').eq(2).click(function(){
			$('.str').css('display','none');

			$('.str').each(function(){
			   var str =  $(this).attr('disname').substr(0,2);
			   	if(str=='商品'){
			   		$(this).css('display','block')
			   	}
			})
		})

		$('button').eq(3).click(function(){
			$('.str').css('display','none');

			$('.str').each(function(){
			   var str =  $(this).attr('disname').substr(0,2);
			   	if(str=='文章'){
			   		$(this).css('display','block')
			   	}
			})
		})

		$('button').eq(4).click(function(){
			$('.str').css('display','none');

			$('.str').each(function(){
			   var str =  $(this).attr('disname').substr(0,2);
			   	if(str=='轮播'){
			   		$(this).css('display','block')
			   	}
			})
		})

		$('button').eq(5).click(function(){
			$('.str').css('display','none');

			$('.str').each(function(){
			   var str =  $(this).attr('disname').substr(0,2);
			   	if(str=='权限'){
			   		$(this).css('display','block')
			   	}
			})
		})
		$('button').eq(6).click(function(){
			$('.str').css('display','none');

			$('.str').each(function(){
			   var str =  $(this).attr('disname').substr(0,2);
			   	if(str=='角色'){
			   		$(this).css('display','block')
			   	}
			})
		})

		$('button').eq(7).click(function(){
			$('.str').css('display','none');

			$('.str').each(function(){
			   var str =  $(this).attr('disname').substr(0,2);
			   	if(str=='后台'){
			   		$(this).css('display','block')
			   	}
			})
		})
	</script>
@endsection