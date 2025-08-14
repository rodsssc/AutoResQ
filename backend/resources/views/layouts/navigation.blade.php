<!-- Enhanced Sidebar (navigation.blade.php) -->
<div class="sidebar d-flex flex-column">
   
    <!-- Enhanced Sidebar Brand -->
    <div class="sidebar-brand">
        <a href="{{ route('dashboard') }}" class="sidebar-brand-link">
            <div class="logo-container">
                <x-application-logo class="sidebar-logo" />
                <div class="logo-glow"></div>
            </div>
            <div class="brand-content">
                <span class="sidebar-brand-text">AutoResQ</span>
                <span class="sidebar-brand-tagline">Emergency Response</span>
            </div>
            <div class="brand-accent"></div>
        </a>
    </div>
    
    <!-- Navigation -->
    <div class="sidebar-nav">
        <div class="nav-section">
            <div class="nav-section-title">Main</div>
            <nav>
                <a href="{{ route('dashboard') }}" 
                   class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="bi bi-grid-1x2"></i>
                    Dashboard
                </a>
                {{-- <a href="#" 
                   class="nav-link {{ request()->routeIs('ServiceRequest.*') ? 'active' : '' }}">
                    <i class="bi bi-clipboard-data"></i>
                    Service Requests
                </a> --}}
            </nav>
        </div>
        
        <div class="nav-section">
            <div class="nav-section-title">Management</div>
            <nav>
                <a href="{{Route('admin.users')}}" class="nav-link">
                    <i class="bi bi-people"></i>
                    Manage Users
                </a>
                <a href="#" class="nav-link">
                    <i class="bi bi-truck"></i>
                    Fleet Management
                </a>
                <a href="#" class="nav-link">
                    <i class="bi bi-journal-text"></i>
                    Activity Logs
                </a>
            </nav>
        </div>
        
        <div class="nav-section">
            <div class="nav-section-title">System</div>
            <nav>
                <a href="#" class="nav-link">
                    <i class="bi bi-gear"></i>
                    Settings
                </a>
                <a href="#" class="nav-link">
                    <i class="bi bi-question-circle"></i>
                    Help & Support
                </a>
            </nav>
        </div>
    </div>
    
    <!-- User Dropdown -->
    <div class="sidebar-footer">
        <div class="dropdown user-dropdown">
            <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=3b82f6&color=fff&size=150" 
                     alt="User Avatar" class="user-avatar">
                <div class="user-info">
                    <div class="user-name">{{ Auth::user()->name }}</div>
                    <div class="user-role">{{ Auth::user()->role ?? 'User' }}</div>
                </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark">
                <li>
                    <a class="dropdown-item" href="{{ route('profile.edit') }}">
                        <i class="bi bi-person me-2"></i>Profile
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="#">
                        <i class="bi bi-gear me-2"></i>Preferences
                    </a>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="dropdown-item" href="{{ route('logout') }}" 
                           onclick="event.preventDefault(); this.closest('form').submit();">
                            <i class="bi bi-box-arrow-right me-2"></i>Sign Out
                        </a>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>