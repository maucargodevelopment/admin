@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Detail Documents</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Detail Documents</li>
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
                        {{ $errors }}
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
                                <h3 class="card-title">Edit Documents</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <!-- form start -->
                                <form role="form" method="post" action="{{ route('documents.update', $document->id) }}">
                                    @method('PUT')
                                    @csrf
                                    <div class="row">
                                        <div class="col-6">

                                            <div class="form-group @if ($errors->has('job')) has-error @endif">
                                                <label for="job">Job</label>
                                                <input type="text" class="form-control" disabled id="job"
                                                    name="job" placeholder="Enter job"
                                                    value="{{ old('job') ?? $document->job }}">
                                                @if ($errors->has('job'))
                                                    <span class="help-block">{{ $errors->first('job') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group @if ($errors->has('customer')) has-error @endif">
                                                <label for="customer">Customer</label>
                                                <input type="text" class="form-control" id="customer" name="customer"
                                                    placeholder="Enter customer"
                                                    value="{{ old('customer') ?? $document->customer }}">
                                                @if ($errors->has('customer'))
                                                    <span class="help-block">{{ $errors->first('customer') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group @if ($errors->has('consignee')) has-error @endif">
                                                <label for="consignee">Consigne</label>
                                                <input type="text" class="form-control" id="consignee" name="consignee"
                                                    placeholder="Enter consignee"
                                                    value="{{ old('consignee') ?? $document->consignee }}">
                                                @if ($errors->has('consignee'))
                                                    <span class="help-block">{{ $errors->first('consignee') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group @if ($errors->has('shipper')) has-error @endif">
                                                <label for="shipper">Shipper</label>
                                                <input type="text" class="form-control" id="shipper" name="shipper"
                                                    placeholder="Enter shipper"
                                                    value="{{ old('shipper') ?? $document->shipper }}">
                                                @if ($errors->has('shipper'))
                                                    <span class="help-block">{{ $errors->first('shipper') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group @if ($errors->has('pod')) has-error @endif">
                                                <label for="pod">POD</label>
                                                <input type="text" class="form-control" id="pod" name="pod"
                                                    placeholder="Enter pod" value="{{ old('pod') ?? $document->pod }}">
                                                @if ($errors->has('pod'))
                                                    <span class="help-block">{{ $errors->first('pod') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group @if ($errors->has('country')) has-error @endif">
                                                <label for="country">Country</label>
                                                <input type="text" class="form-control" id="country" name="country"
                                                    placeholder="Enter country"
                                                    value="{{ old('country') ?? $document->country }}">
                                                @if ($errors->has('country'))
                                                    <span class="help-block">{{ $errors->first('country') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-6">

                                            <div class="form-group @if ($errors->has('freight')) has-error @endif">
                                                <label for="freight">Freight</label>
                                                <input type="text" class="form-control" id="freight" name="freight"
                                                    placeholder="Enter freight"
                                                    value="{{ old('freight') ?? $document->freight }}">
                                                @if ($errors->has('freight'))
                                                    <span class="help-block">{{ $errors->first('freight') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group @if ($errors->has('emk')) has-error @endif">
                                                <label for="emk">EMK</label>
                                                <input type="text" class="form-control" id="emk" name="emk"
                                                    placeholder="Enter emk" value="{{ old('emk') ?? $document->emk }}">
                                                @if ($errors->has('emk'))
                                                    <span class="help-block">{{ $errors->first('emk') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group @if ($errors->has('carrier')) has-error @endif">
                                                <label for="carrier">Carrier</label>
                                                <input type="text" class="form-control" id="carrier" name="carrier"
                                                    placeholder="Enter carrier"
                                                    value="{{ old('carrier') ?? $document->carrier }}">
                                                @if ($errors->has('carrier'))
                                                    <span class="help-block">{{ $errors->first('carrier') }}</span>
                                                @endif
                                            </div>


                                            <div class="form-group @if ($errors->has('no_bl')) has-error @endif">
                                                <label for="no_bl">No BL</label>
                                                <input type="text" class="form-control" id="no_bl" name="no_bl"
                                                    placeholder="Enter no_bl"
                                                    value="{{ old('no_bl') ?? $document->no_bl }}">
                                                @if ($errors->has('no_bl'))
                                                    <span class="help-block">{{ $errors->first('no_bl') }}</span>
                                                @endif
                                            </div>

                                            <h5><b> Date And Time</b></h5>
                                            <span> Tell event-goers when your event starts and ends so they can make a plans
                                                to
                                                attend</span>

                                            <div class="form-group @if ($errors->has('stuffin')) has-error @endif">
                                                <label for="stuffin">Stuffing</label>
                                                <input type="date" class="form-control" id="stuffin" name="stuffin"
                                                    placeholder="Enter stuffin"
                                                    value="{{ old('stuffin') ?? \Carbon\Carbon::parse($document->stuffin)->format('Y-m-d') }}">
                                                @if ($errors->has('stuffin'))
                                                    <span class="help-block">{{ $errors->first('stuffin') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group @if ($errors->has('etd')) has-error @endif">
                                                <label for="etd">ETD</label>
                                                <input type="date" class="form-control" id="etd" name="etd"
                                                    placeholder="Enter etd"
                                                    value="{{ old('etd') ?? \Carbon\Carbon::parse($document->etd)->format('Y-m-d') }}">
                                                @if ($errors->has('etd'))
                                                    <span class="help-block">{{ $errors->first('etd') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <input type="hidden" name="job" value="{{ $document->job }}">

                                        <div class="box-footer">
                                            <a href="{{ route('documents.index') }}" class="btn btn-danger">Back</a>
                                            <button type="submit" class="btn btn-primary">Update Documents</button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">Data Containers</h3>
                                    <div class="float-right">
                                        <div class="section-header-button">
                                            <a href="javascript.void(0)" class="btn btn-primary" data-target="#ModalAdd"
                                                data-toggle="modal"><i class="fas fa-plus"></i> Add Containers</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="dataTable" class="table table-bordered table-striped">

                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>No Container</th>
                                                <th>No Seal</th>
                                                <th>Volume</th>
                                                <th>Vessel</th>
                                                <th>Created Date</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($containers)
                                                @foreach ($containers as $index => $container)
                                                    <tr>
                                                        <td>{{ $index + 1 }}</td>
                                                        <td>{{ $container->no_container }}</td>
                                                        <td>{{ $container->no_seal }}</td>
                                                        <td>{{ $container->volume }}</td>
                                                        <td>{{ $container->vessel }}</td>
                                                        <td>{{ $container->created_at->format('d F Y') }}</td>
                                                        <td align="center">

                                                            {{-- <a href="#edit{{ $container->id }}" data-toggle="modal" 
                                                                class="btn btn-primary btn-sm"><i class="fas fa-edit"></i>
                                                                Edit</a> --}}
                                                            <a class="btn btn-danger btn-sm x-delete"
                                                                data-id="{{ $container->id }}">
                                                                <i class="fas fa-trash"></i>
                                                                Delete</a>
                                                        </td>
                                                    </tr>

                                                    @include('documents.modal')
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>


    <!-- Modal Popup untuk Add-->
    <div id="ModalAdd" class="modal  fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog  modal-lg">
            <div class="modal-content text-dark">
                <div class="modal-header">
                    <h5 class="modal-title">Add Containers</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-dark">
                    <form action="{{ route('containers.store') }}" method="POST">
                        @csrf

                        <div class="form-group col-md-12">
                            <label>Select No Container</label>
                            {{-- <input type="text" class="form-control" placeholder="No Container" name="no_container"
                                value="" required> --}}
                            <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" id="tipecontainer" onchange="selectVolume()" name="container"
                            value="" required>
                                    @foreach($tipecontainers as $tipecontainer)
                                        <option data-select2-id="34" value="{{ $tipecontainer }}">{{  $tipecontainer->no_container }}</option>    
                                    @endforeach
                            </select>
                            
                        </div>
                        <div class="form-group col-md-12">
                            <label>No Container</label>
                            <input type="text" class="form-control" placeholder="No Container" name="no_container"
                                value="" id= "no_container" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label>No Seal</label>
                            <input type="text" class="form-control" placeholder="No Seal" name="no_seal"
                                value="" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Volume</label>
                            <input type="volume" id="volume" class="form-control" placeholder="Volume" name="volume"
                                value="" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Vessel</label>
                            <input type="text" class="form-control" id="vessel" placeholder="Vessel"
                                name="vessel" required>
                        </div>

                        <input type="hidden" name="document_id" value="{{ $document->id }}">
                        <div class="modal-footer">
                            <button class="btn btn-primary " type="submit">
                                Save
                            </button>

                            <button type="reset" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">
                                Cancel
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- /.modal -->
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/js/bootstrap-switch.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.2/sweetalert2.all.min.js"></script>
    <script>
        $(document).ready(function() {


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
                            url: '{{ route('containers.index') }}/' + id,
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

        function selectVolume() {
        
        let tipecontainer = document.getElementById('tipecontainer');
        let volume = document.getElementById('volume');
        let vessel = document.getElementById('vessel');
        let no_container = document.getElementById('no_container');

        if(tipecontainer.value === '') {
            volume.value = '';
            vessel.value = '';
        } else {
            volume.value = JSON.parse(tipecontainer.value).volume;
            vessel.value = JSON.parse(tipecontainer.value).vessel;
            no_container.value = JSON.parse(tipecontainer.value).no_container;
            volume.setAttribute('readonly', '');
            vessel.setAttribute('readonly', '');
            no_container.setAttribute('readonly', '');
        }
    }

    
    </script>
@endsection
