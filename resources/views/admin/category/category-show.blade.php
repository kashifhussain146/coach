
<div class="col-lg-12">
    <div class="row">
        
        <div class="card-body p-0">
            

            <table class="table table-bordered data-table" id="data">
                <tbody>

                     <tr>
                       <th>Industry</th>
                       <td colspan="12"><span class="badge badge-success text-capitalize"><b>{{ (isset($loan->industry))?$loan->industry->title:'N/A'}}</b></span></td>
                     </tr>

                     <tr>
                       <th>Title</th>
                       <td colspan="12"> {{$loan->title}}</td>
                     </tr>

                      <tr>
                       <th>Image </th>
                       <td colspan="12"><img style="height: 60px;" src="{{url('/public'.$loan->image)}}" /> </td>
                     </tr>

                     <tr>
                       <th>Note</th>
                       <td colspan="12">{!! $loan->note !!}</td>
                     </tr>

                    </tbody>
              </table>

           
        </div>
        
    </div>
</div>
        
      



