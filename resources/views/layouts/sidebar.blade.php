<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('custom/avatar5.png')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{auth()->user()->name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            @if(session()->has('menus'))
                @forelse(session()->get('menus') as $key => $menu)
                    @if($menu['R_opt'] === 1)
                        <li>
                            <a href="{{url($menu['menu_id']['route'])}}"><i class="fa {{$menu['menu_id']['icon']}}"></i> <span>{{$menu['menu_id']['name']}}</span></a>
                        </li>
                    @endif
                @empty
                @endforelse
            @endif
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="../../index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
                    <li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
                </ul>
            </li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
        </ul>
    </section>
</aside>