@extends('dashboard.indexnew')
@section('inti')
<style>
    .custom-card {
        position: relative;
        border-radius: 15px; 
        overflow: hidden; 
    }
    
    .card-list {
        background: linear-gradient(to left, #a2c2e0, #f0f8ff);
    }
    
    .card-accepted {
        background: linear-gradient(to left, #d4edda, #f0f8ff);
    }
    
    .card-review {
        background: linear-gradient(to left, #ffeeba, #faf3dc);
    }
    
    .card-declined {
        background: linear-gradient(to left, #f5c6cb, #f7e9ea);
    }
    
    .custom-header {
        background: inherit;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
    }
    
    .custom-card::before {
        content: '';
        position: absolute;
        top: -70px;
        right: -70px;
        width: 250px;
        height: 250px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.3);
        z-index: 0;
    }
    
    .custom-card::after {
        content: '';
        position: absolute;
        bottom: -70px;
        right: -70px;
        width: 250px; 
        height: 250px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.3);
        z-index: 0;
    }
        .table-container {
            overflow-x: auto;
            margin: 20px 0;
        }
        
        .btn-view {
            display: inline-block;
            background-color: #06B6D4;
            color: white;
            padding: 8px 16px;
            border-radius: 15px;
            font-size: 0.875rem;
            text-decoration: none;
            text-align: center;
            transition: background-color 0.3s, transform 0.3s;
        }
        
        .btn-view:hover {
            background-color: #0398C0;
            transform: scale(1.05);
        }
        
        .btn-view:active {
            background-color: #0286A1;
            transform: scale(1);
        }
        
        .btn {
            display: inline-block;
            padding: 0.375rem 0.75rem;
            border: none;
            border-radius: 0.25rem;
            font-size: 0.875rem;
            
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }
        
        .custom-btn-info {
            background-color: #1E90FF;
            color: #fff;
        }
        
        .custom-btn-info:hover {
            background-color: #1C86EE;
        }
        
        .custom-btn-light {
            background-color: #F0F8FF;
            color: #333; 
        }
        
        .custom-btn-light:hover {
            background-color: #E6E6FA; 
        }
        
        .custom-btn-success {
            background-color: #32CD32;
            color: #fff;
        }
        
        .custom-btn-success:hover {
            background-color: #2E8B57;
        }
        
        .custom-btn-danger {
            background-color: #FF4500;
            color: #fff;
        }
        
        .custom-btn-danger:hover {
            background-color: #FF0000;
        }
        
        .top-cat-list {
            list-style-type: none;
            padding: 0;
        }
        
        .top-cat-list li {
            margin: 10px 0;
        }
        
        .top-cat-list__subtitle {
            display: flex;
            align-items: center;
        }
        
        .circle-container {
            width: 50px;
            height: 50px;
            overflow: hidden;
            border-radius: 50%;
            margin-right: 15px;
        }
        
        .circle-image {
            width: 100%;
            height: auto;
            object-fit: cover;
        }
        
        .info-container {
            display: flex;
            flex-direction: column;
        }
        
        
        .btn {
            margin-top: 5px;
        }
        
        .progress-wrapper {
            display: flex;
            align-items: center;
            margin-top: 1px;
        }
        
        .progress-container {
            width: 100%;
            height: 10px;
            background-color: #e0e0e0;
            border-radius: 5px;
            margin-left: 10px;
            overflow: hidden;
        }
        
        .progress-bar {
            height: 100%;
            background-color: #4caf50;
            transition: width 0.3s ease;
        }
        
        /* Responsive Design */
        @media (max-width: 576px) {
            .btn {
                display: block;
                width: 100%;
                margin-bottom: 0.5rem;
            }
        }
</style>
<div class="container-fluid">
    @can('isReview')
    <div class="row">
        <div class="col-md-4">
            <div class="card custom-card card-list">
                    <div class="card-header custom-header">
                    <h4 class="card-title">Total Proposal</h4>
                    <p class="card-category">Proposal yang masuk</p>
                </div>
                <div class="card-body" style="font-size: 40px; color: black; text-align: left; padding-left: 30%;">
                    <img src="{{asset('assets/img/proposalmasuk.png')}}" alt="" width="25%" />
                    <span><b>{{$proposalmasuk}}</b></span>
                </div>
                <div class="card-footer ">
                    <div class="legend">
                        <i class="fa fa-circle text-info"></i> Masuk
                    </div>
                    <hr>
                </div>
            </div>
        </div>
        <div class="col-md-4">
                <div class="card custom-card card-accepted">
                    <div class="card-header custom-header">
                        <h4 class="card-title">Total Proposal Accepted</h4>
                        <p class="card-category">Total Proposal Diterima</p>
                    </div>
                    <div class="card-body" style="font-size: 40px; color: black; text-align: left; padding-left: 30%;">
                        <img src="{{asset('assets/img/proposalacc.png')}}" alt="" width="25%" />
                        <span><b>{{$proposalterima}}</b></span>
                    </div>
                    <div class="card-footer">
                        <div class="legend">
                            <i class="fa fa-circle text-success"></i> Diterima
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card custom-card card-review">
                    <div class="card-header custom-header">
                        <h4 class="card-title">Total Proposal On Review</h4>
                        <p class="card-category">Total Proposal Review</p>
                    </div>
                    <div class="card-body" style="font-size: 40px; color: black; text-align: left; padding-left: 30%;">
                        <img src="{{asset('assets/img/proposal.png')}}" alt="" width="25%" />
                        <span><b>{{$proposalreview}}</b></span>
                    </div>
                    <div class="card-footer">
                        <div class="legend">
                            <i class="fa fa-circle text-warning"></i> Review
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
    </div>
    <div class="row">
         <div class="col-md-4">
            <div class="card custom-card card-declined">
                <div class="card-header custom-header">
                    <h4 class="card-title">Total Proposal Decline</h4>
                    <p class="card-category">Proposal yang ditolak</p>
                </div>
                <div class="card-body" style="font-size: 40px; color: black; text-align: left; padding-left: 30%;">
                    <img src="{{asset('assets/img/proposaldec.png')}}" alt="" width="25%" />
                    <span><b>{{$proposaltolak}}</b></span>
                </div>
                <div class="card-footer">
                    <div class="legend">
                        <i class="fa fa-circle text-danger"></i> Tolak
                    </div>
                    <hr>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card custom-card card-accepted">
                <div class="card-header custom-header">
                    <h4 class="card-title">Total Penelitian Accepted</h4>
                    <p class="card-category">Total Penelitian Diterima</p>
                </div>
                <div class="card-body" style="font-size: 40px; color: black; text-align: left; padding-left: 30%;">
                    <img src="{{asset('assets/img/proposalacc.png')}}" alt="" width="25%" />
                    <span><b>0</b></span>
                </div>
                <div class="card-footer ">
                    <div class="legend">
                        <i class="fa fa-circle text-success"></i> Diterima
                    </div>
                    <hr>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card custom-card card-accepted">
                <div class="card-header custom-header">
                    <h4 class="card-title">Total Pengabdian Accepted</h4>
                    <p class="card-category">Total Pengabdian Diterima</p>
                </div>
                <div class="card-body" style="font-size: 40px; color: black; text-align: left; padding-left: 30%;">
                    <img src="{{asset('assets/img/proposalacc.png')}}" alt="" width="25%" />
                    <span><b>0</b></span>
                </div>
                <div class="card-footer ">
                    <div class="legend">
                        <i class="fa fa-circle text-success"></i> Diterima
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-7">
            <div class="card custom-card">
                <div class="card-header custom-header">
                    <h4 class="card-title">Total Proposal</h4>
                    <canvas id="chartJSContainer" width="550" height="193"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card custom-card">
                <div class="card-header custom-header">
                    <h4 class="card-title">Visitor Insight</h4>
                    <canvas id="line-chart" width="700" height="450"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card custom-card">
                <div class="card-header custom-header">
                    <h4 class="card-title">Total Proposal Program Studi</h4>
                    <div class="table-container">
                    <table class="table" style="width:100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($proposalCounts as $count)
                               <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $count->progdi }}</td>
                                    <td>
                                         <span class="{{ $loop->iteration === 1 ? 'btn custom-btn-success' : ($loop->iteration === 2 ? 'btn custom-btn-info' : ($loop->iteration === 3 ? 'btn custom-btn-danger' : 'btn custom-btn-light')) }}">
                                            {{ $count->total }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
            <div class="col-md-4">
            <div class="card custom-card">
                <div class="card-header custom-header">
                    <h4 class="card-title">Top Person</h4>
                    <div class="table-container">
                    <ul class="top-cat-list">
                        @foreach($adminProposalCounts as $count)
                        <li>
                            <a href="##">
                                <div class="top-cat-list__subtitle">
                                    <picture class="circle-container">
                                        <source srcset="{{ asset('/eterna/cms/avatar-illustrated-04.png') }}" type="image/webp">
                                        <img class="circle-image" src="{{ asset('/elegan/img/avatar/avatar-illustrated-01.png') }}" alt="User name">
                                    </picture>
                                    <div class="info-container">
                                        <span class="warning">{{ $count->userId->name }}</span>
                                        <div class="progress-wrapper">
                                            <span class="btn">{{ $count->total }}</span>
                                            <div class="progress-container">
                                                <div class="progress-bar" style="width: {{ min($count->total, 10) }}%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @elsecan('isAdmin')
    @endcan
    @can('isSuper')
    <div class="row">
        <div class="col-md-4">
            <div class="card custom-card card-list">
                    <div class="card-header custom-header">
                    <h4 class="card-title">Total Proposal</h4>
                    <p class="card-category">Proposal yang masuk</p>
                </div>
                <div class="card-body" style="font-size: 40px; color: black; text-align: left; padding-left: 30%;">
                    <img src="{{asset('assets/img/proposalmasuk.png')}}" alt="" width="25%" />
                    <span><b>{{$proposalmasuk}}</b></span>
                </div>
                <div class="card-footer ">
                    <div class="legend">
                        <i class="fa fa-circle text-info"></i> Masuk
                    </div>
                    <hr>
                </div>
            </div>
        </div>
        <div class="col-md-4">
                <div class="card custom-card card-accepted">
                    <div class="card-header custom-header">
                        <h4 class="card-title">Total Proposal Accepted</h4>
                        <p class="card-category">Total Proposal Diterima</p>
                    </div>
                    <div class="card-body" style="font-size: 40px; color: black; text-align: left; padding-left: 30%;">
                        <img src="{{asset('assets/img/proposalacc.png')}}" alt="" width="25%" />
                        <span><b>{{$proposalterima}}</b></span>
                    </div>
                    <div class="card-footer">
                        <div class="legend">
                            <i class="fa fa-circle text-success"></i> Diterima
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        <div class="col-md-4">
                <div class="card custom-card card-review">
                    <div class="card-header custom-header">
                        <h4 class="card-title">Total Proposal On Review</h4>
                        <p class="card-category">Total Proposal Review</p>
                    </div>
                    <div class="card-body" style="font-size: 40px; color: black; text-align: left; padding-left: 30%;">
                        <img src="{{asset('assets/img/proposal.png')}}" alt="" width="25%" />
                        <span><b>{{$proposalreview}}</b></span>
                    </div>
                    <div class="card-footer">
                        <div class="legend">
                            <i class="fa fa-circle text-warning"></i> Review
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
    </div>
    <div class="row">
         <div class="col-md-4">
            <div class="card custom-card card-declined">
                <div class="card-header custom-header">
                    <h4 class="card-title">Total Proposal Decline</h4>
                    <p class="card-category">Proposal yang ditolak</p>
                </div>
                <div class="card-body" style="font-size: 40px; color: black; text-align: left; padding-left: 30%;">
                    <img src="{{asset('assets/img/proposaldec.png')}}" alt="" width="25%" />
                    <span><b>{{$proposaltolak}}</b></span>
                </div>
                <div class="card-footer">
                    <div class="legend">
                        <i class="fa fa-circle text-danger"></i> Tolak
                    </div>
                    <hr>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card custom-card card-accepted">
                <div class="card-header custom-header">
                    <h4 class="card-title">Total Penelitian Accepted</h4>
                    <p class="card-category">Total Penelitian Diterima</p>
                </div>
                <div class="card-body" style="font-size: 40px; color: black; text-align: left; padding-left: 30%;">
                    <img src="{{asset('assets/img/proposalacc.png')}}" alt="" width="25%" />
                    <span><b>0</b></span>
                </div>
                <div class="card-footer ">
                    <div class="legend">
                        <i class="fa fa-circle text-success"></i> Diterima
                    </div>
                    <hr>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card custom-card card-accepted">
                <div class="card-header custom-header">
                    <h4 class="card-title">Total Pengabdian Accepted</h4>
                    <p class="card-category">Total Pengabdian Diterima</p>
                </div>
                <div class="card-body" style="font-size: 40px; color: black; text-align: left; padding-left: 30%;">
                    <img src="{{asset('assets/img/proposalacc.png')}}" alt="" width="25%" />
                    <span><b>0</b></span>
                </div>
                <div class="card-footer ">
                    <div class="legend">
                        <i class="fa fa-circle text-success"></i> Diterima
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="card custom-card">
                <div class="card-header custom-header">
                    <h4 class="card-title">Total Proposal</h4>
                    <canvas id="chartJSContainer" width="550" height="165"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card custom-card">
                <div class="card-header custom-header">
                    <h4 class="card-title">Visitor Insight</h4>
                    <canvas id="line-chart" width="700" height="450"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card custom-card">
                <div class="card-header custom-header">
                    <h4 class="card-title">Total Proposal Program Studi</h4>
                    <div class="table-container">
                    <table class="table" style="width:100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($proposalCounts as $count)
                               <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $count->progdi }}</td>
                                    <td>
                                         <span class="{{ $loop->iteration === 1 ? 'btn custom-btn-success' : ($loop->iteration === 2 ? 'btn custom-btn-info' : ($loop->iteration === 3 ? 'btn custom-btn-danger' : 'btn custom-btn-light')) }}">
                                            {{ $count->total }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card custom-card">
                <div class="card-header custom-header">
                    <h4 class="card-title">Top Person</h4>
                    <div class="table-container">
                    <ul class="top-cat-list">
                        @foreach($adminProposalCounts as $count)
                        <li>
                            <a href="##">
                                <div class="top-cat-list__subtitle">
                                    <picture class="circle-container">
                                        <source srcset="{{ asset('/eterna/cms/avatar-illustrated-04.png') }}" type="image/webp">
                                        <img class="circle-image" src="{{ asset('/elegan/img/avatar/avatar-illustrated-01.png') }}" alt="User name">
                                    </picture>
                                    <div class="info-container">
                                        <span class="warning">{{ $count->userId->name }}</span>
                                        <div class="progress-wrapper">
                                            <span class="btn">{{ $count->total }}</span>
                                            <div class="progress-container">
                                                <div class="progress-bar" style="width: {{ min($count->total, 10) }}%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                    <!--<table>-->
                    <!--    <thead>-->
                    <!--        <tr>-->
                    <!--            <th></th>-->
                    <!--            <th></th>-->
                    <!--            <th></th>-->
                    <!--        </tr>-->
                    <!--    </thead>-->
                    <!--    <tbody>-->
                    <!--        @foreach($adminProposalCounts as $count)-->
                    <!--           <tr>-->
                    <!--                <td>{{ $loop->iteration }}</td>-->
                    <!--                <td>{{ $count->userId->name }}</td>-->
                    <!--                <td>-->
                    <!--                     <span class="{{ $loop->iteration === 1 ? 'btn custom-btn-success' : ($loop->iteration === 2 ? 'btn custom-btn-info' : ($loop->iteration === 3 ? 'btn custom-btn-danger' : 'btn custom-btn-light')) }}">-->
                    <!--                        {{ $count->total }}-->
                    <!--                    </span>-->
                    <!--                </td>-->
                    <!--            </tr>-->
                    <!--        @endforeach-->
                    <!--    </tbody>-->
                    <!--</table>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    @elsecan('isAdmin')
    @endcan
    @can('isAdmin')
    <div class="row">
        <div class="col-md-4">
            <div class="card custom-card card-list">
                    <div class="card-header custom-header">
                    <h4 class="card-title">Total Proposal</h4>
                    <p class="card-category">Proposal yang masuk</p>
                </div>
                <div class="card-body" style="font-size: 40px; color: black; text-align: left; padding-left: 30%;">
                    <img src="{{asset('assets/img/proposalmasuk.png')}}" alt="" width="25%" />
                    <span><b>{{$proposalmasukuser}}</b></span>
                </div>
                <div class="card-footer ">
                    <div class="legend">
                        <i class="fa fa-circle text-info"></i> Masuk
                    </div>
                    <hr>
                </div>
            </div>
        </div>
        <div class="col-md-4">
                <div class="card custom-card card-accepted">
                    <div class="card-header custom-header">
                        <h4 class="card-title">Total Proposal Accepted</h4>
                        <p class="card-category">Total Proposal Diterima</p>
                    </div>
                    <div class="card-body" style="font-size: 40px; color: black; text-align: left; padding-left: 30%;">
                        <img src="{{asset('assets/img/proposalacc.png')}}" alt="" width="25%" />
                        <span><b>{{$proposalterimauser}}</b></span>
                    </div>
                    <div class="card-footer">
                        <div class="legend">
                            <i class="fa fa-circle text-success"></i> Diterima
                        </div>
                        <hr>
                    </div>
                </div>
        </div>
        <div class="col-md-4">
                <div class="card custom-card card-review">
                    <div class="card-header custom-header">
                        <h4 class="card-title">Total Proposal On Review</h4>
                        <p class="card-category">Total Proposal Review</p>
                    </div>
                    <div class="card-body" style="font-size: 40px; color: black; text-align: left; padding-left: 30%;">
                        <img src="{{asset('assets/img/proposal.png')}}" alt="" width="25%" />
                        <span><b>{{$proposalreviewuser}}</b></span>
                    </div>
                    <div class="card-footer">
                        <div class="legend">
                            <i class="fa fa-circle text-warning"></i> Review
                        </div>
                        <hr>
                    </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card custom-card card-declined">
                <div class="card-header custom-header">
                    <h4 class="card-title">Total Proposal Decline</h4>
                    <p class="card-category">Proposal yang ditolak</p>
                </div>
                <div class="card-body" style="font-size: 40px; color: black; text-align: left; padding-left: 30%;">
                    <img src="{{asset('assets/img/proposaldec.png')}}" alt="" width="25%" />
                    <span><b>{{$proposaltolakuser}}</b></span>
                </div>
                <div class="card-footer">
                    <div class="legend">
                        <i class="fa fa-circle text-danger"></i> Tolak
                    </div>
                    <hr>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card custom-card card-accepted">
                <div class="card-header custom-header">
                    <h4 class="card-title">Total Penelitian Accepted</h4>
                    <p class="card-category">Total Penelitian Diterima</p>
                </div>
                <div class="card-body" style="font-size: 40px; color: black; text-align: left; padding-left: 30%;">
                    <img src="{{asset('assets/img/proposalacc.png')}}" alt="" width="25%" />
                    <span><b>0</b></span>
                </div>
                <div class="card-footer ">
                    <div class="legend">
                        <i class="fa fa-circle text-success"></i> Diterima
                    </div>
                    <hr>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card custom-card card-accepted">
                <div class="card-header custom-header">
                    <h4 class="card-title">Total Pengabdian Accepted</h4>
                    <p class="card-category">Total Pengabdian Diterima</p>
                </div>
                <div class="card-body" style="font-size: 40px; color: black; text-align: left; padding-left: 30%;">
                    <img src="{{asset('assets/img/proposalacc.png')}}" alt="" width="25%" />
                    <span><b>0</b></span>
                </div>
                <div class="card-footer ">
                    <div class="legend">
                        <i class="fa fa-circle text-success"></i> Diterima
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
    @elsecan('isReview')
    @endcan
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script>
    const visitorData = @json($visitorCounts);
    
    new Chart(document.getElementById("line-chart"), {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'],
            datasets: [{ 
                data: visitorData,
                label: "Jumlah Visitor 2024",
                borderColor: "#3e95cd",
                fill: false
            }]
        },
        options: {
            title: {
                display: true,
                text: ''
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        display: false
                    }
                }],
                yAxes: [{
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.0/chart.js"></script>
<script>
    var years = @json(array_keys($counts));
    var dataCounts = @json(array_values($counts));

    var options = {
        type: 'bar',
        data: {
            labels: years,
            datasets: [{
                label: 'Jumlah Per Tahun Proposal',
                data: dataCounts,
                backgroundColor: 'rgb(0, 119, 190)',
                borderRadius: Number.MAX_VALUE,
                borderSkipped: false,
                barThickness: 30, // Thinner bars
            }]
        },
        options: {
            scales: {
                x: {
                    grid: {
                        display: false
                    },
                    categoryPercentage: 0.5
                },
                y: {
                    beginAtZero: true,
                    grid: {
                        display: false
                    }
                }
            }
        }
    }

    var ctx = document.getElementById('chartJSContainer').getContext('2d');
    new Chart(ctx, options);
</script>
@endsection