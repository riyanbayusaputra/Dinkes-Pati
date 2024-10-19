<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('home') }}">SIPALING SAPA</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <!-- Dashboard Section -->
        
            <li class="nav-item">
                <a href="" class="nav-link">
                    <i class="fas fa-tachometer-alt"></i><span>Dashboard</span>
                </a>
            </li>

         

           <!-- Master Users -->
@can('manage merchant')
<li class="nav-item">
    <a href="{{ route('merchant.index') }}" class="nav-link" title="Master Merchant">
        <i class="fas fa-store"></i><span>Master Merchant</span>
    </a>
</li>
@endcan

<!-- Master Banner -->
@can('manage banner')
<li class="nav-item">
    <a href="{{ route('banner.index') }}" class="nav-link" title="Management Banner">
        <i class="fas fa-image"></i><span>Management Banner</span>
    </a>
</li>
@endcan



<!-- Master Gallery -->
@can('manage gallery')
<li class="nav-item">
    <a href="{{ route('activity-galleries.index') }}" class="nav-link" title="Management Gallery">
        <i class="fas fa-photo-video"></i><span>Management Gallery</span>
    </a>
</li>
@endcan

<!-- Master Videos -->
@can('manage videos')
<li class="nav-item">
    <a href="{{ route('videos.index') }}" class="nav-link" title="Management Videos">
        <i class="fas fa-video"></i><span>Management Videos</span>
    </a>
</li>
@endcan

<!-- Kuesioner -->
<li class="nav-item">
    <a href="{{ route('questionnaires.index') }}" class="nav-link" title="Daftar Kuisioner">
        <i class="fas fa-list-alt"></i><span>Daftar Kuisioner</span>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('questionnaires.create') }}" class="nav-link" title="Buat Kuisioner">
        <i class="fas fa-edit"></i><span>Create Kuisioner</span>
    </a>
</li>

<!-- E-Library -->
@can('manage documents')
<li class="nav-item">
    <a href="{{ route('documents.index') }}" class="nav-link" title="E-Library">
        <i class="fas fa-book-reader"></i><span>E-Library</span>
    </a>
</li>
@endcan

<!-- FAQs -->
@can('manage faq')
<li class="nav-item">
    <a href="{{ route('faqs.index') }}" class="nav-link" title="FAQs">
        <i class="fas fa-question"></i><span>FAQs</span>
    </a>
</li>
@endcan

<!-- Users Section -->
@can('manage users')

<li class="nav-item">
    <a href="{{ route('users.index') }}" class="nav-link" title="Manage Users">
        <i class="fas fa-users-cog"></i><span>Manage Users</span>
    </a>
</li>
@endcan

            
        </ul>
    </aside>
</div>

<style>
    .sidebar-menu .nav-item:hover .nav-link {
        background-color: #e3e3e3; /* Warna latar belakang saat hover */
        color: #007bff; /* Warna teks saat hover */
    }
    
    .sidebar-menu .nav-link {
        display: flex; /* Flex untuk membuat ikon dan teks sejajar */
        align-items: center; /* Vertikal tengah */
    }

    .sidebar-menu .nav-link i {
        margin-right: 10px; /* Spasi antara ikon dan teks */
    }
</style>
