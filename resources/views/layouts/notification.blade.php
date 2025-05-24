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
            <span class="notification">{{ isset($notifications) ? $notifications->count() : 0 }}</span>
        </a>
        <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
            <li>
                <div class="dropdown-title">
                    Vous avez {{ isset($notifications) ? $notifications->count() : 0 }} nouvelles notifications
                </div>
            </li>
            <li>
                <div class="notif-scroll scrollbar-outer">
                    <div class="notif-center">
                        @if(isset($notifications) && $notifications->isNotEmpty())
                            @foreach ($notifications as $notification)
                                @php
                                    $data = json_decode($notification->data);
                                @endphp
                                <a href="#">
                                    <div class="notif-icon notif-info">
                                        <i class="fa fa-bell"></i> <!-- Utilisez une icône appropriée -->
                                    </div>
                                    <div class="notif-content">
                                        <span class="block">{{ $data->message ?? 'Notification sans message' }}</span>
                                        <span class="time">{{ $notification->created_at->diffForHumans() }}</span>
                                    </div>
                                </a>
                            @endforeach
                        @else
                            <div class="notif-content">
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
