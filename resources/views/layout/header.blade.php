<style>
    .header {
        height: 40px;
        display: flex;
        align-items: center;
    }

    .logo {
        height: 100%;
        display: flex;
        align-items: center;
    }

    .logo img {
        width: 60%;
        height: 50%;
        max-height: 100%;
        object-fit: contain;
        margin-top: 12px;
    }

    .span3, .span7 {
        flex: 1; /* Membagi ruang secara merata */
    }
</style>

<div class="row nomargin header">
    <div class="span4">
        <div class="logo">
            <a href="/"><img src="{{ asset('img/itsk.png') }}" alt="Logo" /></a>
        </div>
    </div>
    <div class="span8">
        <div class="navbar navbar-static-top">
            <div class="navigation">
                <nav>
                    <ul class="nav topnav">
                        <li class="dropdown active">
                            <a href="/"><i class="icon-home"></i> Home </a>
                        </li>
                        <li class="dropdown">
                            <a href="#">Profile <i class="icon-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Sejarah</a></li>
                                <li><a href="#">Visi & Misi</a></li>
                                <li><a href="#">Program Kebijakan</a></li>
                                <li><a href="#">Struktur</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Layanan</a>
                        </li>
                        <li>
                            <a href="/indexhki">HKI</a>
                        </li>
                        <li class="dropdown">
                            <a href="#">Pengumuman <i class="icon-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Panduan</a></li>
                                <li><a href="#">Prosedur</a></li>
                                <li><a href="/indexformulir">Formulir</a></li>
                                <li><a href="/indexpengumuman">Pengumuman</a></li>
                            </ul>
                        </li>
                        <li class="dropdown active">
                            <a href="/loginn"><i class="icon-pencil"></i> Ajuan </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <!-- end navigation -->
        </div>
    </div>
</div>
