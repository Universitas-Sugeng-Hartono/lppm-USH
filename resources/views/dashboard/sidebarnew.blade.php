<nav class="sidebar-nav">
    <ul id="sidebarnav">
        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/home"
            aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                class="hide-menu">Dashboard</span></a></li>
        <li class="list-divider"></li>
        <li class="nav-small-cap"><span class="hide-menu">Proposal</span></li>
        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
            aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span
                class="hide-menu">Proposal </span></a>
            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                <!--<li class="sidebar-item"><a href="/proposal" class="sidebar-link"><span-->
                <!--    class="hide-menu"> Proposal </span></a>-->
                <!--</li>-->
                <li class="sidebar-item"><a href="/proposalpenelitian" class="sidebar-link"><span
                    class="hide-menu"> Proposal Penelitian</span></a>
                </li>
                <li class="sidebar-item"><a href="/proposalpengabdian" class="sidebar-link"><span
                    class="hide-menu"> Proposal Pengabdian</span></a>
                </li>
                @can('isSuper')
                <li class="sidebar-item"><a href="/acc" class="sidebar-link"><span
                    class="hide-menu"> Accepted Proposal</span></a>
                </li>
                @elsecan('isReview')
                <li class="sidebar-item"><a href="/acc" class="sidebar-link"><span
                    class="hide-menu"> Accepted Proposal</span></a>
                </li>
                @elsecan('isAdmin')
                @endcan
            </ul>
        </li>
        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
            aria-expanded="false"><i data-feather="tag" class="feather-icon"></i><span
                class="hide-menu">Pelaporan </span></a>
            <ul aria-expanded="false" class="collapse  first-level base-level-line">
            <li class="sidebar-item"> <a class="sidebar-link"  href="/pelaporan"
                aria-expanded="false"><span
                    class="hide-menu">Pelaporan Penelitian</span></a>
            </li>
            <li class="sidebar-item"> <a class="sidebar-link"  href="/pelaporanpengabdian"
                aria-expanded="false"><span
                    class="hide-menu">Pelaporan Pengabdian</span></a>
            </li>
            </ul>
        </li>
        @can('isSuper')
        <li class="list-divider"></li>
        <li class="nav-small-cap"><span class="hide-menu">Karya Cipta</span></li>
        <li class="sidebar-item"> <a class="sidebar-link sidebar-link"
            href="/karya" aria-expanded="false"><i data-feather="file-plus"
            class="feather-icon"></i><span class="hide-menu">Karya Cipta</span></a>
        </li>
        @elsecan('isAdmin')
        <li class="list-divider"></li>
        <li class="nav-small-cap"><span class="hide-menu">Karya Cipta</span></li>
        <li class="sidebar-item"> <a class="sidebar-link sidebar-link"
            href="/karya" aria-expanded="false"><i data-feather="file-plus"
            class="feather-icon"></i><span class="hide-menu">Karya Cipta</span></a>
        </li>
        @elsecan('isReview')
        <li class="list-divider"></li>
        <li class="nav-small-cap"><span class="hide-menu">Karya Cipta</span></li>
        <li class="sidebar-item"> <a class="sidebar-link sidebar-link"
            href="/karya" aria-expanded="false"><i data-feather="file-plus"
            class="feather-icon"></i><span class="hide-menu">Karya Cipta</span></a>
        </li>
        @endcan
        @can('isSuper')
        <li class="list-divider"></li>
        <li class="nav-small-cap"><span class="hide-menu">Informasi</span></li>
        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/pengumuman"
            aria-expanded="false"><i data-feather="bell" class="feather-icon"></i><span
                class="hide-menu">Pengumuman</span></a>
        </li>

        <li class="sidebar-item"> <a class="sidebar-link sidebar-link"
            href="/formulir" aria-expanded="false"><i data-feather="file-plus"
            class="feather-icon"></i><span class="hide-menu">Formulir</span></a>
        </li>
        <li class="list-divider"></li>
        <li class="nav-small-cap"><span class="hide-menu">Pengguna</span></li>
        <li class="sidebar-item"><a class="sidebar-link sidebar-link"
            href="/user" aria-expanded="false"><i data-feather="user-check"
            class="feather-icon"></i><span class="hide-menu">Management User</span></a>
        </li>
        @elsecan('isAdmin')
        @elsecan('isReview')
        @endcan
    </ul>
</nav>