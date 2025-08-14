<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="h4 mb-0 fw-bold text-gray-900">
                {{ __('Dashboard') }}
            </h1>
            <div class="d-flex align-items-center">
                <span class="badge bg-success me-2">
                    <i class="bi bi-circle-fill me-1" style="font-size: 8px;"></i>
                    System Online
                </span>
                <small class="text-muted">
                    Last updated: {{ now()->format('M d, Y H:i') }}
                </small>
            </div>
        </div>
    </x-slot>

    <div class="content-card">
        <div class="card-body p-4">
            <!-- Welcome Section -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="d-flex align-items-center mb-3">
                        <div class="welcome-icon me-3">
                            <i class="bi bi-house-heart fs-2 text-primary"></i>
                        </div>
                        <div>
                            <h5 class="card-title mb-1">Welcome back,!</h5>
                            <p class="card-text text-muted mb-0">
                                Here's what's happening with your emergency response system today.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Stats Cards -->
            <div class="row mb-4">
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="card border-0 bg-primary text-white h-100 stats-card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <h6 class="card-title mb-0 text-white-50">Total User</h6>
                                    <h2 class="mb-0 fw-bold">24</h2>
                                    <small class="text-white-50">
                                        <i class="bi bi-arrow-up"></i> +12% from yesterday
                                    </small>
                                </div>
                                <div class="stats-icon">
                                    <i class="bi bi-telephone fs-1"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="card border-0 bg-success text-white h-100 stats-card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <h6 class="card-title mb-0 text-white-50">Resolved Today</h6>
                                    <h2 class="mb-0 fw-bold">142</h2>
                                    <small class="text-white-50">
                                        <i class="bi bi-arrow-up"></i> +8% from yesterday
                                    </small>
                                </div>
                                <div class="stats-icon">
                                    <i class="bi bi-check-circle fs-1"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="card border-0 bg-warning text-white h-100 stats-card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <h6 class="card-title mb-0 text-white-50">Fleet Status</h6>
                                    <h2 class="mb-0 fw-bold">18/20</h2>
                                    <small class="text-white-50">
                                        <i class="bi bi-exclamation-triangle"></i> 2 in maintenance
                                    </small>
                                </div>
                                <div class="stats-icon">
                                    <i class="bi bi-truck fs-1"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="card border-0 bg-info text-white h-100 stats-card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <h6 class="card-title mb-0 text-white-50">Response Time</h6>
                                    <h2 class="mb-0 fw-bold">4.2m</h2>
                                    <small class="text-white-50">
                                        <i class="bi bi-arrow-down"></i> -0.8m improvement
                                    </small>
                                </div>
                                <div class="stats-icon">
                                    <i class="bi bi-stopwatch fs-1"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
           
            
          
        </div>
    </div>

    @push('scripts')
    <script>
        // Add some interactivity to stats cards
        document.querySelectorAll('.stats-card').forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.style.transform = 'translateY(-2px)';
                card.style.transition = 'transform 0.2s ease';
            });
            
            card.addEventListener('mouseleave', () => {
                card.style.transform = 'translateY(0)';
            });
        });
    </script>
    @endpush
</x-app-layout>