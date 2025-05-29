{{-- @if (auth()->user()->hasRole('admin')) --}}
    <li class="nav-item topbar-icon dropdown hidden-caret">
        <a
            class="nav-link dropdown-toggle"
            href="#"
            id="notifDropdown"
            role="button"
            data-bs-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
        >
            <i class="fa fa-bell"></i>
            @php
                $unreadNotifications = isset($notifications) ? $notifications->whereNull('read_at') : collect();
                $notificationCount = $unreadNotifications->count();
            @endphp
            <i class="fa fa-bell"></i>
            @if($notificationCount > 0)
                <span class="notification">{{ $notificationCount }}</span>
            @endif
        </a>
        <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
            <li>
                <div class="dropdown-title">
                    Vous avez {{ $notificationCount }} nouvelle{{ $notificationCount > 1 ? 's' : '' }} notification{{ $notificationCount > 1 ? 's' : '' }} non lue{{ $notificationCount > 1 ? 's' : '' }}
                </div>
            </li>
            <li>
                <div class="notif-scroll scrollbar-outer">
                    <div class="notif-center">
                        @if(isset($notifications) && $notifications->isNotEmpty())
                            @forelse ($notifications->take(5) as $notification) {{-- Show latest 5 --}}
                                @php
                                    $data = json_decode($notification->data);
                                    // Déterminer une icône basée sur un type de notification hypothétique
                                    $iconClass = 'fa-bell'; // Icône par défaut
                                    if(isset($data->type)) {
                                        switch ($data->type) {
                                            case 'stock_alert': $iconClass = 'fa-cubes text-warning'; break;
                                            case 'new_order': $iconClass = 'fa-shopping-cart text-success'; break;
                                            case 'user_mention': $iconClass = 'fa-user-tag text-info'; break;
                                            default: $iconClass = 'fa-info-circle text-primary'; break;
                                        }
                                    }
                                @endphp
                                <a href="{{ $data->link ?? '#' }}" class="d-flex align-items-center py-2 px-3 {{ is_null($notification->read_at) ? 'fw-bold' : '' }}">
                                    <div class="notif-icon notif-info me-3"> {{-- Added me-3 for spacing --}}
                                        <i class="fa {{ $iconClass }}"></i>
                                    </div>
                                    <div class="notif-content">
                                        <span class="block" style="white-space: normal; line-height: 1.3;">{{ Str::limit($data->message ?? 'Notification sans message', 70) }}</span>
                                        <span class="time text-muted" style="font-size: 0.75rem;">{{ $notification->created_at->diffForHumans() }}</span>
                                    </div>
                                </a>
                            @empty
                                <div class="notif-content text-center py-3">
                                    <span class="block">Aucune nouvelle notification.</span>
                                </div>
                            @endforelse
                        @else
                            <div class="notif-content text-center py-3">
                                <span class="block">Aucune notification disponible.</span>
                            </div>
                        @endif
                    </div>
                </div>
            </li>

            <li>
                <a class="see-all" href="#">
                    Voir toutes les notifications<i class="fa fa-angle-right"></i>
                </a>
            </li>
        </ul>
    </li>
{{-- @endif --}}
