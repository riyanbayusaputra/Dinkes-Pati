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

            <!-- Master Section -->
            <li class="nav-item has-submenu">
                <a href="#" class="nav-link">
                    <i class="fas fa-cogs"></i><span>Master</span>
                    <i class="fas fa-chevron-down submenu-icon"></i>
                </a>
                <ul class="sidebar-submenu">

                    
                    <!-- Master Merchant -->
                    @can('manage merchant')
                    <li>
                        <a href="{{ route('merchant.index') }}" class="nav-link" title="Master Merchant">
                            <i class="fas fa-store"></i><span>Merchant</span>
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

                  


                    <!-- Banner Management -->
                    @can('manage banner')
                    <li>
                        <a href="{{ route('banner.index') }}" class="nav-link" title="Management Banner">
                            <i class="fas fa-image"></i><span>Management Banner</span>
                        </a>
                    </li>
                    @endcan

                    <!-- Gallery Management -->
                    @can('manage gallery')
                    <li>
                        <a href="{{ route('activity-galleries.index') }}" class="nav-link" title="Management Gallery">
                            <i class="fas fa-photo-video"></i><span>Management Gallery</span>
                        </a>
                    </li>
                    @endcan

                      <!-- Gallery Management -->
                      @can('manage video banner')
                      <li>
                          <a href="{{ route('video_banners.index') }}" class="nav-link" title="Management Gallery">
                              <i class="fas fa-photo-video"></i><span>Management video banner</span>
                          </a>
                      </li>
                      @endcan

                    <!-- Videos Management -->
                    @can('manage videos')
                    <li>
                        <a href="{{ route('videos.index') }}" class="nav-link" title="Management Videos">
                            <i class="fas fa-video"></i><span>Management Videos</span>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>


          

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

            <li class="nav-item">
                <a href="/questionnaires/{{ $questionnaire->id }}/responses" class="nav-link" title="Analitik">
                    <i class="fas fa-chart-line"></i><span>Responden</span>
                </a>
            </li>
        </ul>
    </aside>
</div>

<style>
    .sidebar-menu {
        padding: 0;
        list-style: none;
    }

    .nav-item {
        position: relative;
    }

    .nav-link {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px 15px;
        color: #333;
        text-decoration: none;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

 

    .sidebar-submenu {
        list-style: none;
        padding-left: 20px;
        display: none;
        background-color: #f8f9fa;
        border-left: 3px solid #007bff;
        transition: all 0.3s ease;
    }

    .has-submenu:hover .sidebar-submenu {
        display: block;
    }

    .sidebar-submenu li {
        margin: 5px 0;
    }

    .sidebar-submenu li a {
        color: #333;
        transition: background-color 0.3s ease;
    }

    .sidebar-submenu li a:hover {
        background-color: #e3e3e3;
    }

    .submenu-icon {
        margin-left: auto;
        font-size: 12px;
        transition: transform 0.3s ease;
    }

    .has-submenu:hover .submenu-icon {
        transform: rotate(180deg);
    }
</style>
