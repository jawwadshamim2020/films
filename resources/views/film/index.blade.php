@extends('layouts.app')
@section('content')
	@if(session()->has('success'))
		<div class="success-alert">
			<span class="close-error"></span>
			<ul>
				<li>
						{{ session()->get('success') }}
				</li>
			</ul>
		</div>
	@endif


@if(session()->has('error'))
    <div class="error-alert">
        <span class="close-error"></span>
    	<ul>
				<li>
						{{ session()->get('error') }}
				</li>
		</ul>
       
    </div>
@endif

<link href="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<div class="container">

    <div class="panel panel-primary">

     <div class="panel-heading">Flims List <span class="pull-right"><a class="text-white" href="{{route('film.create.from')}}">Add</a><sapn></div>

      <div class="panel-body">

          <table class="table table-bordered" id="product-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
					<th>Image</th>
                </tr>
            </thead>
          </table>

     </div>

    </div>

</div>


<script>



$(function() {
    $('#product-table').DataTable({
        processing: true,
		serverSide: true,
		"pageLength": "{{config('constants.per-page')}}",
		"lengthChange": false,
        ajax: '{!! route('film.data') !!}',
        columns: [
			{ data: 'name', name: 'name' },
			{ data: 'ticket_price', name: 'price' },
            { data: 'image', name: 'image' }
            
        ]
    });
});
</script>




@endsection