<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('home') }}">SIPALING SAPA</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('home') }}">St</a>
        </div>
        <ul class="sidebar-menu">
            <!-- Dashboard Section -->
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <i class="fas fa-tachometer-alt"></i><span>Dashboard</span>
                </a>
            </li>

            <!-- Master Section -->
            @can('manage merchant')
            <li class="nav-item">
                <a href="{{ route('merchant.index') }}" class="nav-link" title="Master Merchant">
                    <i class="fas fa-store"></i><span>Merchant</span>
                </a>
            </li>
            @endcan

            @can('manage users')
            <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link" title="Manage Users">
                    <i class="fas fa-users-cog"></i><span>Manage Users</span>
                </a>
            </li>
            @endcan

            @can('manage documents')
            <li class="nav-item">
                <a href="{{ route('documents.index') }}" class="nav-link" title="E-Library">
                    <i class="fas fa-book-reader"></i><span>E-Library</span>
                </a>
            </li>
            @endcan

            @can('manage faq')
            <li class="nav-item">
                <a href="{{ route('faqs.index') }}" class="nav-link" title="FAQs">
                    <i class="fas fa-question"></i><span>FAQs</span>
                </a>
            </li>
            @endcan

            @can('manage banner')
            <li class="nav-item">
                <a href="{{ route('banner.index') }}" class="nav-link" title="Management Banner">
                    <i class="fas fa-image"></i><span>Management Banner</span>
                </a>
            </li>
            @endcan

            @can('manage gallery')
            <li class="nav-item">
                <a href="{{ route('activity-galleries.index') }}" class="nav-link" title="Management Gallery">
                    <i class="fas fa-photo-video"></i><span>Management Gallery</span>
                </a>
            </li>
            @endcan

            @can('manage video banner')
            <li class="nav-item">
                <a href="{{ route('video_banners.index') }}" class="nav-link" title="Management Video Banner">
                    <i class="fas fa-video"></i><span>Management Video Banner</span>
                </a>
            </li>
            @endcan

            @can('manage videos')
            <li class="nav-item">
                <a href="{{ route('videos.index') }}" class="nav-link" title="Management Videos">
                    <i class="fas fa-video"></i><span>Management Videos</span>
                </a>
            </li>
            @endcan

            <!-- Kuesioner Section -->
            <li class="nav-item">
                <a href="{{ route('questionnaires.index') }}" class="nav-link" title="Daftar Kuisioner">
                    <i class="fas fa-list-alt"></i><span>Daftar Kuisioner</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('questionnaires.create') }}" class="nav-link" title="Buat Kuisioner">
                    <i class="fas fa-edit"></i><span>Buat Kuisioner</span>
                </a>
            </li>

            <li class="nav-item">
                @if($questionnaire)
                    <a href="/questionnaires/{{ $questionnaire->id }}/responses" class="nav-link" title="Analitik">
                        <i class="fas fa-chart-line"></i>
                        <span>Responden</span>
                    </a>
                @endif
            </li>
        </ul>
    </aside>
</div>
