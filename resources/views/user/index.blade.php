@extends('moban.moban')
@section('content')
<div class="mws-panel grid_8">
  <div class="mws-panel-header">
    <span>
      <i class="icon-table"></i>用户列表</span>
  </div>
  <div class="mws-panel-body no-padding">
    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">
   	<form action='/admins/user/index' method='get'>
      <div id="DataTables_Table_0_length" class="dataTables_length">
        <label>显示
          <select size="1" name="num" aria-controls="DataTables_Table_0">
            <option value="10" @if(isset($request['num']) && $request['num']==10) selected @endif>10</option>
            <option value="25" @if(isset($request['num']) && $request['num']==25) selected @endif>25</option>
            <option value="50" @if(isset($request['num']) && $request['num']==50) selected @endif>50</option>
            <option value="100" @if(isset($request['num']) && $request['num']==100) selected @endif>100</option></select>数据
         </label>
      </div>
      <div class="dataTables_filter" id="DataTables_Table_0_filter">
        <label>关键字
          <input type="text" name='username' value="{{$request['username'] or ''}}" aria-controls="DataTables_Table_0">
          <button class='btn btn-primary'>搜索</button>
    </form>  
        </label>
      </div>
  
      <table class="mws-datatable mws-table dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
        <thead>
          <tr role="row">
            <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 170px;">用户ID</th>
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 224px;">用户名</th>
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 209px;">邮箱</th>
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 148px;">状态</th>
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 148px;">角色</th>
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 111px;">操作</th></tr>
        </thead>
        <tbody role="alert" aria-live="polite" aria-relevant="all">
	        @foreach($user as $k=>$v)
	          <tr class="@if($k%2==0)
						even
						@else 
						odd
						@endif
	          ">
	            <td class=" sorting_1">{{$v['id']}}</td>
	            <td class=" ">{{$v['username']}}</td>
	            <td class=" ">{{$v['email']}}</td>
              <td class=" ">{{showstatus($v['status'])}}</td>
              @if($v['display_name']==NULL)
              <td class=" ">没有角色</td>
              @else
              <td class=" " style="color:red"><a href="/admins/user/roledel?uid={{$v['id']}}&role_id={{$v['role_id']}}" onclick="return confirm('确定要删除该角色吗?')">{{$v['display_name']}}</a></td>
              @endif
	            <td class=" ">
	            <!-- 修改和删除的连接 -->
	            <a href="/admins/user/edit?id={{$v['id']}}&rol={{$v['display_name']}}&role_id={{$v['role_id']}}" style='color:black;font-size:20px'><i class="icon-pencil-2"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
	            <a href="/admins/user/delete?id={{$v['id']}}" style='color:black;font-size:20px' onclick="return confirm('确定删除该用户和该用户下的所有角色吗?')"><i class="icon-trash"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
              <a href="/Role/attach?id={{$v['id']}}" style='color:black;font-size:20px'><i class="icon-user"></i></a>

	            </td>
	          </tr>
	        @endforeach
        </tbody>
		
      </table>
      <div class="dataTables_paginate paging_full_numbers" id="pages">
      		{!!$user->appends($request)->render()!!} 
    </div>
  </div>
</div>
@endsection
