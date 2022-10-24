<div>
    <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown">
        <i class="far fa-bell"></i>
        <span class="badge badge-warning navbar-badge">{{isset(auth()->user()->notification)}}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header">{{isset(auth()->user()->notification)}} Notificaciones</span>
        
        @isset($notifications)
            @foreach ($notifications as $notification)
                <div class="dropdown-divider"></div>
                <a href="{{$notification->data['url']}}" class="dropdown-item">
                <i class="fas fa-envelope mr-2"></i> {{$notification->data['message']}}
                <span class="float-right text-muted text-sm">{{$notification->created_at->diffforHumans()}}</span>
                </a>
            @endforeach
        @endisset
        {{-- <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div> --}}
        </li>
</div>
