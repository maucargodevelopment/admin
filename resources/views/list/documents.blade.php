@extends('layouts.app')

@section('style')
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/css/bootstrap3/bootstrap-switch.min.css">
@endsection


@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Documents</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Documents</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-ban"></i> Error!</h4>
                        There's some errors processing your request.
                    </div>
                @endif

                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-info"></i> Success!</h4>
                        {{ session('success') }}
                    </div>
                @endif

                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Data Documents</h3>
                                <div class="float-right">
                                    <div class="section-header-button">
                                        <a href="{{ route('documents.create') }}" class="btn btn-primary"><i
                                                class="fas fa-plus"></i> Create New</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="dataTable" class="table table-bordered table-striped">

                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Job</th>
                                            <th>Customer</th>
                                            <th>Shipper</th>
                                            <th>Stuffin</th>
                                            <th>Etd</th>
                                            <th>Created Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($documents as $index => $document)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $document->job }}</td>
                                                <td>{{ $document->customer }}</td>
                                                <td>{{ $document->shipper }}</td>
                                                <td>{{ $document->stuffin }}</td>
                                                <td>{{ $document->etd }}</td>
                                                <td>{{ $document->created_at->format('d F Y') }}</td>
                                                <td align="center">
                                                    <a href="{{ route('documents.detail', $document->id) }}"
                                                        class="btn btn-success btn-sm"><i class="fas fa-search"></i>
                                                        Detail</a>

                                                    {{-- <a href="{{ route('documents.download', $document->id) }}"
                                                        class="btn btn-primary btn-sm"><i class="fas fa-file-pdf"></i>
                                                        Download</a> --}}

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/js/bootstrap-switch.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.2/sweetalert2.all.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.switch').bootstrapSwitch();

            $('.switch').on('switchChange.bootstrapSwitch', function(event, state) {
                $.ajax({
                    url: '{{ route('documents.index') }}/' + this.dataset.id + '/activate',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    method: 'PUT',
                    data: 'state=' + state,
                    success: function(data) {},
                });
            });


            $('.x-delete').click(function() {
                let id = $(this).data('id');

                swal({
                    title: 'Are you sure?',
                    text: 'You won\'t be able to revert this!',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: '{{ route('documents.index') }}/' + id,
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                    'content'),
                            },
                            method: 'DELETE',
                            success: function(data) {
                                $('#row-id-' + id).remove();
                                swal(
                                    'Deleted!',
                                    'Your data has been deleted.',
                                    'success',
                                );
                                location.reload();
                            },
                        });
                    }
                });
            });
        });
    </script>
@endsection
