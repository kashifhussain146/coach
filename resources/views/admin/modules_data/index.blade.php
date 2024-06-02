@extends('admin.layouts.app')

@section('title')
   <title>{{$module->name}}</title>
@endsection

@section('breadcrum')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">{{$module->term}} </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">{{$module->term}} </li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@stop

@section('content')

<section class="content">
   <div class="container-fluid">
     <div class="row">
       <div class="col-12">
         <div class="card">
           <div class="card-header">
             <h3 class="card-title">Add {{$module->name}}</h3>
             @if(auth()->guard('admin')->user()->can("Module_Add_{$module->slug}"))
              <a href="{{ route('admin.modules.data.add',$module->slug) }}" class="btn btn-sm btn-success btn-icon text-white float-right mr-2">
                <span>
                    <i class="fa fa-plus"></i>
                </span> Add {{$module->name}}
              </a>
              @endif

           </div>
           <!-- /.card-header -->
           <div class="card-body">

            <table id="fix-header" class="table table-striped table-bordered nowrap dataTable">

               <thead>

                  <tr>

                     @if($module->is_image)

                     <th>{{__('Image')}}</th>

                     @endif

                     <th>{{__('Title')}}</th>

                     <th>{{__('Created Date')}}</th>

                     <th>{{__('Status')}}</th>

                     <th>{{__('Action')}}</th>

                  </tr>

               </thead>

               <tbody>

                  @if($module->modules_data)

                  @foreach($module->modules_data as $data)

                  <tr>

                     @if($module->is_image)

                     <td width="12%"><img style="height: 50px" src="{{asset('/images/'.$data->image)}}" alt=""></td>

                     @endif

                     <td>{{$data->title}}</td>

                     

                     <td>{{ ($data->created_at) ? $data->created_at->format('d/m/Y H:i:s A'): "N/A"}}</td>

                     <td><a class="waves-effect btn-sm status waves-light" onclick="update_status({{$data->id}});" href="javascript:void(0);" id="sts_{{$data->id}}">@if($data->status=='active')<span class="btn btn-success">{{$data->status}}</span>@else <span class="btn btn-warning">{{$data->status}}</span> @endif </a></td>

                     <td>

                      @if(auth()->guard('admin')->user()->can("Module_Edit_{$module->slug}"))
                       <a href="{{route('admin.modules.data.edit',[$module->slug,$data->id])}}" class="btn-sm tabledit-edit-button btn btn-primary waves-effect waves-light"><span class="icofont icofont-ui-edit"></span>&nbsp {{__('Edit')}}</a>
                      @endif

                      @if(auth()->guard('admin')->user()->can("Module_Edit_{$module->slug}"))
                        <a href="{{route('admin.modules.data.delete',[$module->slug,$data->id])}}" class="btn-sm tabledit-delete-button btn btn-danger waves-effect waves-light deletebtn"><span class="icofont icofont-ui-delete"></span>&nbsp {{__('Delete')}}</a>
                      @endif
                     </td>

                  </tr>

                  @endforeach

                  @endif

               </tbody>

               </table>

           </div>
           <!-- /.card-body -->
         </div>
         <!-- /.card -->
       </div>
       <!-- /.col -->
     </div>
     <!-- /.row -->
   </div>
   <!-- /.container-fluid -->
 </section>



@endsection

@push('js')


@if(session()->has('message.added'))

<script type="text/javascript">

  var msg = '{!! session('message.content' )!!}';

</script>

<script type="text/javascript" src="{{asset('js/order.js')}}"></script>

@endif
<script type="text/javascript" src="{{asset('admin/assets/js/update_status.js')}}"></script>
<script>

   $(document).on('click','.deletebtn',function(){

      var con = confirm('Are you sure want to delete this college ?');
         if(!con){
            event.preventDefault();
            return false;
         }

   });
</script>
@endpush