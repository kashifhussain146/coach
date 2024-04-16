@extends('admin.layouts.app')

@push('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-switch@3.4.0/dist/css/bootstrap3/bootstrap-switch.min.css" rel="stylesheet">
@endpush


@section('breadcrum')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Email Template </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Email Template </li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@stop

@section('content')

<div class="content-header">
    <!-- Main content -->
    <section class="side-app">
        <div class=" ">

             @include('layouts.flash.alert')

        </div>
        <!-- Default box -->
        <div class="card">
            
            <div class="card-header with-border">
                
                <div class="card-tools float-right">
                    @if (auth()->user()->can('access', 'emailtemplates-edit'))
                        <a href="{{route('emailtemplates.add')}}" class="btn btn-primary btn-sm ">Add Email Template</a>
                    @endif
                </div>

                <div class="row">
                    <div class="col-md-1">
                        <label>Status</label>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">

                            <select name="status" class="form-control" id="status">
                                <option value="">Select</option>
                                <option value="1">Active</option>
                                <option value="0">InActive</option>
                            </select>
                        </div>
                    </div>


                </div>



            </div>
            <div class="card-body">
                @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
                @endif

                <table class="table table-bordered w-100" id="emailtemplates-datatable" data-table="email_templates">
                    <thead>
                        <tr>
                        <th class="no-sort">Sr No.</th>
                        <th>Email Type</th>
                        <th>Subject</th>
                        <th>Status</th>

                        <th class="no-sort">Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <!-- /.box-body -->
            <div class="card-footer">
                <div class="float-right"></div>
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>

@endsection


@push('js')
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-switch@3.4.0/dist/js/bootstrap-switch.min.js"></script>

<script type="text/javascript">



    $(document).ready(function () {


        var t = $('#emailtemplates-datatable').DataTable({
            "pageLength": 50,
            processing: true,
            serverSide: true,
             "order": [[ 1, "ASC" ]],
            ajax: {
                url: "{{ route('emailtemplates.ajax.list') }}",
                type: 'GET',
                data: function (d) {

                    d.status = $('#status').val();
                }
            },

            columns: [
                {data: 'id', name: 'id'},
                {data: 'type', name: 'type'},
                {data: 'subject', name: 'subject'},
                {data: 'status', name: 'status'},

                {data: 'action', name: 'status'}
            ],
            "deferRender": true,
            "columnDefs": [{
                    "targets": 'no-sort',
                    "orderable": false,
                },
                {"targets": 0, "visible"  :false},
                {
                    "targets": 3,
                    "data": "status",
                    "render": function (data, type, full, meta) {
                        console.log("data",data);
                        if(full.status==1){
                            return '<input id="status" class=" change-request" data-id="'+full.id+'" data-field="status" data-size="mini" checked="checked" name="status" type="checkbox">';
                        }else{
                            return '<input id="status" class=" change-request" data-id="'+full.id+'" data-field="status" data-size="mini" name="status" type="checkbox">';
                        }

                    }
                }
                ],
                "fnDrawCallback": function(settings) {

                        //$('input.switch-status').not('[data-switch-no-init]')     .bootstrapSwitch();
                        //$('[data-toggle="tooltip"]').tooltip();

                        $('.change-request').on('change', function (e, state) {
                            var _this = $(this);
                            var _id = _this.data("id")
                            var table = _this.closest("table").data("table");
                            if (e.target.checked == true) {
                                var changedval = 1;
                            } else {
                                var changedval = 0;
                            }
                            changeStatus(table , _id,  changedval, _this);
                        });
                }


        });
        $('#status').on('change', function () {
            $('#emailtemplates-datatable').DataTable().draw(true);
        });
        // t.on('order.dt search.dt', function () {
        //     t.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
        //         cell.innerHTML = i + 1;
        //     });
        // }).draw();
    });



</script>
@endpush