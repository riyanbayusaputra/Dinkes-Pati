<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('home') }}">SIRIWIL</a>
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

            <li class="nav-item">
                <a href="/import-data" class="nav-link" title="Import Data">
                    <i class="fas fa-store"></i><span>Import Data</span>
                </a>
            </li>

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

            @can('manage berita')
            <li class="nav-item">
                <a href="{{ route('berita.index') }}" class="nav-link" title="Berita">
                    <i class="fas fa-book-reader"></i><span>Berita</span>
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
            @can('manage pengumuman')
            <li class="nav-item">
                <a href="{{ route('datapengumuman.index') }}" class="nav-link" title="FAQs">
                    <i class="fas fa-bullhorn"></i><span>Pengumuman</span>
                </a>
            </li>
            @endcan
            <li class="nav-item">
                <a href="/kritikdansaran" class="nav-link" title="Kritik dan Saran">
                    <i class="fas fa-question"></i><span>Kritik dan Saran</span>
                </a>
            </li>

            <li class="dropdown {{ Request::is('banner*', 'activity-galleries*', 'video_banners*', 'videos*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-columns"></i>
                    <span>Manage</span>
                </a>
                <ul class="dropdown-menu">
                    @can('manage banner')
                    <li class="{{ Request::is('banner*') ? 'active' : '' }}">
                        <a href="{{ route('banner.index') }}" class="nav-link" title="Banner">
                            <i class="fas fa-image"></i>
                            <span>Banner</span>
                        </a>
                    </li>
                    @endcan

                    @can('manage gallery')
                    <li class="{{ Request::is('activity-galleries*') ? 'active' : '' }}">
                        <a href="{{ route('activity-galleries.index') }}" class="nav-link" title="Gallery">
                            <i class="fas fa-photo-video"></i>
                            <span>Gallery</span>
                        </a>
                    </li>
                    @endcan

                    @can('manage video banner')
                    <li class="{{ Request::is('video_banners*') ? 'active' : '' }}">
                        <a href="{{ route('video_banners.index') }}" class="nav-link" title="Video Banner">
                            <i class="fas fa-video"></i>
                            <span>Video Banner</span>
                        </a>
                    </li>
                    @endcan

                    @can('manage videos')
                    <li class="{{ Request::is('videos*') ? 'active' : '' }}">
                        <a href="{{ route('videos.index') }}" class="nav-link" title="Videos">
                            <i class="fas fa-video"></i>
                            <span>Videos</span>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>






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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const manageDropdown = document.querySelector('.nav-link.has-dropdown');

        manageDropdown.addEventListener('click', function(e) {
            e.preventDefault(); // Mencegah pengalihan tautan default
            const parent = this.parentElement; // Mendapatkan elemen induk (li.dropdown)

            // Toggle kelas "show" dan atur atribut "aria-expanded"
            const dropdownMenu = parent.querySelector('.dropdown-menu');
            dropdownMenu.classList.toggle('show');
            this.setAttribute('aria-expanded', dropdownMenu.classList.contains('show'));
        });
    });
</script>