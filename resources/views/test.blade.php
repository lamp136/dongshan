@extends('login.register')

@section('menu')

@foreach($data as $k=>$v)
<nav class="nav-main mega-menu">
              <ul class="nav nav-pills nav-main" id="mainMenu">
                <li class="dropdown">
                  <a class="dropdown-toggle" href="#">{{$data[$k]['name']}}
                    <i class="fa fa-angle-down"></i></a>
                  @foreach($data[$k]['sub'] as $k1=>$v1)
                  <ul class="dropdown-menu">
                  
                  @if($v1['sub'])
                    <li class="dropdown-submenu">
                      	<a href="#">{{$v1['name']}}</a>
                      @foreach($v1['sub'] as $k2=>$v2)
                      <ul class="dropdown-menu">
                     	<li><a href="index-slider-2.html">{{$v2['name']}}</a></li>
                      </ul>
                      @endforeach
                    </li>
					@else

                    <li><a href="index.html">{{$v1['name']}}</a></li>
					@endif
                    
                  </ul>
                  @endforeach
                </li>
              </ul>     
     </nav>
  @endforeach

@endsection