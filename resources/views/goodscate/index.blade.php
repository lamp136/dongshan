@extends('moban.moban')
@section('content')
<div class="mws-panel grid_8">
  <div class="mws-panel-header">
    <span>
      <i class="icon-table"></i>分类列表</span>
  </div>
  <div class="mws-panel-body no-padding">
    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">
   	<form action='/admins/fenlei/index' method='get'>
      
      
    </form>  
        
      </div>
  
      <table class="mws-datatable mws-table dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
        <thead>
          <tr role="row">
            <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 170px;">ID</th>
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 224px;">分类名称</th>
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 209px;">分类路径</th>
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 148px;">状态</th>
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 111px;">操作</th></tr>
        </thead>
        <tbody role="alert" aria-live="polite" aria-relevant="all">
	        @foreach($cate as $k=>$v)
	          <tr class="@if($k%2==0)
						even
						@else 
						odd
						@endif
	          ">
	            <td class=" sorting_1">{{$v['id']}}</td>
	            <td class=" ">{{$v['name']}}</td>
	            <td class=" ">{{pathName($v['path'])}}</td>
	            <td class=" ">{{$v['status']}}</td>
	            <td class=" ">
	            <!-- 修改和删除和添加分类 -->
	            <a href="/admins/cate/edit/{{$v['id']}}" style='color:black;font-size:20px'><i class="icon-pencil-2"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
	            <a href="/admins/cate/delete/{{$v['id']}}" style='color:black;font-size:20px'><i class="icon-trash"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
	            <a href="/admins/cate/add/{{$v['id']}}" style='color:black;font-size:20px'><i class="icon-plus"></i></a>
	            </td>
	          </tr>
	        @endforeach
        </tbody>
		
      </table>
      <div class="dataTables_paginate paging_full_numbers" id="pages">
      		 
    </div>
  </div>
</div>
@endsection
