@extends('layouts.default')

@section('content')
	<div class="table-responsive">
		<table class="table table-bordered table-hover">
		<thead>
			<th width="5%">No</th>
			<th>Merk</th>
			<th>Type</th>
			<th colspan="3" width="10%">Opsi</th>
		</thead>
		<tbody>
			<?php $count = $allsp->getFrom(); ?>
			@foreach($allsp as $a)
			<tr>
				<td>{{ $count }}</td>
				<td>{{ $a->brand }}</td>
				<td>{{ $a->type }}</td>
				<td><a href="{{ URL::to('dashboard/detail') }}/{{ $a->id_smartphone }}" title="Rincian"><i class='glyphicon glyphicon-list-alt'></i></a></td>
				<td><a href="" title="Ubah"><i class='glyphicon glyphicon-pencil'></i></a></td>
				<td><a href="" title="Hapus"><i class='glyphicon glyphicon-trash'></i></a></td>
			</tr>
			@endforeach
			<tr>
				<td colspan="6"><a href="{{ URL::to('dashboard/add') }}" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-plus"></i></a></td>
			</tr>
		</tbody>
		</table>
		<?php echo $allsp->links(); ?>
	</div>
@stop