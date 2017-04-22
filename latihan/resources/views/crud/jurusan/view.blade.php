@extends('layouts.app')

@section('content')

<div class="panel panel-info">
	<div class="panel-heading">
		<center>
		<h1>
		Data Table Jurusan with Laravel 5.3
		</h1>
		</center>
	</div>
	<div class="panel-body">
		<a href="{{ URL('jurusan/create') }}" class="btn btn-raised btn-primary pull-right">Tambah</a>
		{{-- part alert --}}

			{{-- Kita cek, jika sessionnya ada maka tampilkan alertnya, jika tidak ada maka tidak ditampilkan alertnya --}}

		@if (Session::has('after_update'))
			<div class="row">
				<div class="col-md-12">
					<div class="alert alert-dismissible alert-{{ Session::get('after_update.alert') }}">
					  <button type="button" class="close" data-dismiss="alert">×</button>
					  <strong>{{ Session::get('after_update.title') }}</strong>
					  <a href="javascript:void(0)" class="alert-link">{{ Session::get('after_update.text-1') }}</a> {{ Session::get('after_update.text-2') }}
					</div>
				</div>
			</div>
		@endif
		{{-- end part alert --}}
		<table class="table table-bordered table-hover ">
			<thead>
				<tr>
					<th align="center">#</th>
					<th align="center">Nama Jurusan</th>
					<th align="center">Aksi</th>
				</tr>
			</thead>
			<tbody>
				@php(
					$no = 1 {{-- buat nomor urut --}}
					)
				{{-- loop all jurusan --}}
				@foreach ($jurusans as $jurusan)
					<tr>
						<td>{{ $no++ }}</td>
						<td>{{ $jurusan->nama_jurusan }}</td>
						<td>
							<center>

								<form method="POST" action="{{ URL('jurusan/destroy') }}/{{ $jurusan->id }}" accept-charset="UTF-8">
		                <input name="_method" type="hidden" value="DELETE">
		                <input name="_token" type="hidden" value="{{ csrf_token() }}">
								    <a href="{{ URL('jurusan/show') }}/{{ $jurusan->id }}" class="btn btn-sm btn-raised btn-info">Edit</a>
		                <input type="submit" class="btn btn-sm btn-raised btn-danger" onclick="return confirm('Anda yakin akan menghapus data ?');" value="Delete">
		            </form>
							</center>
						</td>
					</tr>
				@endforeach
				{{-- // end loop --}}
			</tbody>
		</table>
	</div>
</div>

@stop
