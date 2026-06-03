@extends('dashboard.indexnew')
@section('inti')
<div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Pelaporan</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="" class="text-muted">List</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Pelaporan</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-5 align-self-center">
                        <div class="customize-input float-end">
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>Status</th>
                                                <th>Title</th>
                                                <th>ID</th>
                                                <th>Product</th>
                                                <th>Created by</th>
                                                <th>Date</th>
                                                <th>Agent</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><span class="fs-6">In Progress</span></td>
                                                <td><a href="javascript:void(0)" class="font-weight-medium link">Elegant
                                                        Theme
                                                        Side Menu Open OnClick</a></td>
                                                <td><a href="javascript:void(0)" class="font-bold link">276377</a></td>
                                                <td>Elegant Admin</td>
                                                <td>Eric Pratt</td>
                                                <td>2018/05/01</td>
                                                <td>Fazz</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection