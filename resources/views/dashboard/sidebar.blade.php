<style>
    .logo-container {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px;
    }
    
    .logo-card {
        background-color: ;
        border-radius: 10px;
        padding: 10px;
        width: 80px;
        height: 80px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .logo-text {
        color: white;
        margin: 0 10px;
    }

</style>
<div class="logo-container">
    <div class="logo-card left-card">
        <a href="/home" class="simple-text">
            <img src="{{asset('img/cropped-LOGO-USH-NEW-150x150.png')}}" alt="" width="100%" />
        </a>
    </div>
    <span class="logo-text">
        <b style="color: white;">LPPM Universitas Sugeng Hartono</b>
    </span>
</div>
<ul class="nav">
    <li class="nav-item active">
        <a class="nav-link" href="/home">
            <i class="nc-icon nc-chart-pie-35"></i>
            <p>Dashboard</p>
        </a>
    </li>
    <li>
        <a class="nav-link" href="/proposal">
            <i class="nc-icon nc-notes"></i>
            <p>Proposal List</p>
        </a>
    </li>
    <li>
        <a class="nav-link" href="/proposalpenelitian">
            <i class="nc-icon nc-notes"></i>
            <p>Proposal Penelitian</p>
        </a>
    </li>
    <li>
        <a class="nav-link" href="/proposalpengabdian">
            <i class="nc-icon nc-notes"></i>
            <p>Proposal Pengabidan</p>
        </a>
    </li>
    @can('isAdmin')
    <li>
        <a class="nav-link" href="/pelaporan">
            <i class="nc-icon nc-cloud-upload-94"></i>
            <p>Pelaporan</p>
        </a>
    </li>
    @elsecan('isSuper')
    @endcan
    @can('isSuper')
    <li>
        <a class="nav-link" href="/record">
            <i class="nc-icon nc-paper-2"></i>
            <p>Record List</p>
        </a>
    </li>
    <li>
        <a class="nav-link" href="/acc">
            <i class="nc-icon nc-paper-2"></i>
            <p>Accepted Proposal</p>
        </a>
    </li>
    <li>
        <a class="nav-link" href="/pengumuman">
            <i class="nc-icon nc-paper-2"></i>
            <p>Pengumuman</p>
        </a>
    </li>
    <li>
        <a class="nav-link" href="/formulir">
            <i class="nc-icon nc-paper-2"></i>
            <p>Formulir</p>
        </a>
    </li>
    <li>
        <a class="nav-link" href="/pelaporan">
            <i class="nc-icon nc-cloud-upload-94"></i>
            <p>Pelaporan</p>
        </a>
    </li>
    <li class="nav-item active active-pro">
        <a class="nav-link active" href="/user">
            <i class="nc-icon nc-alien-33"></i>
            <p>Management User</p>
        </a>
    </li>
    @elsecan('isAdmin')
    @endcan
    @can('isReview')
    <li>
        <a class="nav-link" href="/pelaporan">
            <i class="nc-icon nc-cloud-upload-94"></i>
            <p>Pelaporan</p>
        </a>
    </li>
    <li>
        <a class="nav-link" href="/acc">
            <i class="nc-icon nc-paper-2"></i>
            <p>Accepted Proposal</p>
        </a>
    </li>
    @elsecan('isAdmin')
    @endcan
    <!--<li>-->
    <!--    <a class="nav-link" href="/pp">-->
    <!--        <i class="nc-icon nc-chart-pie-35"></i>-->
    <!--        <p>Penelitian Pengabdian</p>-->
    <!--    </a>-->
    <!--</li>-->
</ul>
</div>