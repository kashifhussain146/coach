@if (session()->has('success'))

<div class="alert alert-success alert-block" style="margin: 0 20px">

    <button type="button" class="close" data-dismiss="alert">×</button>

        <strong>{{session()->get('success')}}</strong>

</div>

@endif


@if (session()->has('error'))

<div class="alert alert-danger alert-block" style="margin: 0 20px">

    <button type="button" class="close" data-dismiss="alert">×</button>

        <strong>{{ session()->get('error') }}</strong>

</div>

@endif

@if (session()->has('warning'))

<div class="alert alert-warning alert-block" style="margin: 0 20px">

    <button type="button" class="close" data-dismiss="alert">×</button>

    <strong>{{ session()->get('warning') }}</strong>

</div>

@endif


@if (session()->has('info'))

<div class="alert alert-info alert-block" style="margin: 0 20px">

    <button type="button" class="close" data-dismiss="alert">×</button>

    <strong>{{ session()->get('info') }}</strong>

</div>

@endif


@if (session()->has('ValidatorError'))
<div class="alert alert-danger alert-block" style="margin: 0 20px">

    <button type="button" class="close" data-dismiss="alert">×</button>

        <strong>{{ session()->get('ValidatorError') }}</strong>

</div>

@else

@if ($errors->any())

 <div class="alert alert-danger">

    <button type="button" class="close" data-dismiss="alert">×</button>
    <ul>
        @foreach ($errors->all() as $error)
                <li>{!! $error !!}</li>
            @endforeach
    </ul>
</div> 

@endif

@endif
