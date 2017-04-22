@extends('layouts.app')

@section('content')

<div class="panel panel-info">
	<div class="panel-heading">
		<center>
		<h1>
		CRUD Laravel 5.3
		</h1>
		</center>
	</div>
	<div class="panel-body">
		<a href="{{ URL('jurusan') }}" class="btn btn-raised btn-danger pull-left">Kembali</a>
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
		<div class="row">
			<div class="col-md-12"><hr>
				<div class="col-md-2"></div>
				<div class="col-md-8">
				{{-- form membawa id untuk di jadikan parameter ketika update data, biasanya di buat menjadi input type="hidden" --}}
					<form class="form-horizontal" action="{{ URL('jurusan/update/'. $showById->id) }}" method="POST">
					{{ csrf_field() }}
					  <fieldset>
					    <legend>FORM UPDATE DATA JURUSAN</legend>
						    <div class="form-group label-floating">
							  <label class="control-label" for="focusedInput2">Nama Jurusan</label>
							  <input class="form-control" id="focusedInput2" type="text" name="nama_jurusan" value="{{ $showById->nama_jurusan }}">
							  <p class="help-block">Masukan data jurusan dengan benar.</p>
							</div>
							<div class="form-group">
						      <div class="col-md-12">
						        <button type="submit" class="btn btn-raised btn-primary pull-right">Submit</button>
						        <button type="reset" class="btn btn-raised btn-warning pull-right">Reset</button>
						      </div>
						    </div>
						</fieldset>
					</form>
				</div>
				<div class="col-md-2"></div>
			</div>
		</div>
	</div>
</div>

@stop
