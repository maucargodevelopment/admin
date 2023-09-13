@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-4">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $doc }}</h3>

                                <p>Active Document</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="{{ route('documents.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-4">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $doc_today }}</h3>

                                <p>Inputs Today</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="{{ route('documents.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-4">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $doc_all }}</h3>

                                <p>Total Document</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="{{ route('documents.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('documents.create') }}" class="btn btn-primary mb-3 float-right"><i
                                class="fas fa-plus"></i>
                            Input
                            Document</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-4">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $inv }}</h3>

                                <p>Active Invoice</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="{{ route('invoices.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-4">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $inv_today }}</h3>

                                <p>Inputs Today</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="{{ route('invoices.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-4">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $inv_all }}</h3>

                                <p>Total Invoice</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="{{ route('invoices.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('invoices.create') }}" class="btn btn-primary mb-3 float-right"><i
                                class="fas fa-plus"></i>
                            Input
                            Invoice</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-4">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $shp }}</h3>

                                <p>Active Shipping</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="{{ route('shippings.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-4">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $shp_today }}</h3>

                                <p>Inputs Today</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="{{ route('shippings.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-4">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $shp_all }}</h3>

                                <p>Total Shipping</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="{{ route('shippings.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('shippings.create') }}" class="btn btn-primary  mb-3 float-right"><i
                                class="fas fa-plus"></i>
                            Input Shipping</a>
                    </div>
                </div>
        </section>
    </div>
@endsection
