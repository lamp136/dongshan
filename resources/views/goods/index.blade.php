@extends('moban.moban')
@section('content')
<div class="mws-panel grid_8">
  <div class="mws-panel-header">
    <span>
      <i class="icon-table"></i>商品列表</span>
  </div>
  <div class="mws-panel-body no-padding">
    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">
   	<form action='/admins/goods/index' method='get'>
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
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 224px;">商品名称</th>
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 209px;">商品价格</th>
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 148px;">商品图片</th>
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 111px;">操作</th></tr>
        </thead>
        <tbody role="alert" aria-live="polite" aria-relevant="all">
	        @foreach($goods as $k=>$v)
	          <tr class="@if($k%2==0)
						even
						@else 
						odd
						@endif
	          ">
	            <td class=" sorting_1">{{$v['id']}}</td>
	            <td class=" ">{{$v['title']}}</td>
	            <td class=" ">{{$v['price']}}</td>
              
	            <td class=" ">
                @foreach(explode(',',$v['pic']) as $a=>$b)
                <img src="{{$b}}" width='50'>
                @endforeach
              </td>

	            <td class=" ">
	            <!-- 修改和删除的连接 -->
	            <a href="/admins/goods/edit?id={{$v['id']}}" style='color:black;font-size:20px'><i class="icon-pencil-2"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
	            <a href="/admins/goods/delete?id={{$v['id']}}" style='color:black;font-size:20px'><i class="icon-trash"></i></a>
	            </td>
	          </tr>
	        @endforeach
        </tbody>
		
      </table>
      <div class="dataTables_paginate paging_full_numbers" id="pages">
      		{!!$goods->appends($request)->render()!!} 
    </div>
  </div>
</div>
@endsection
