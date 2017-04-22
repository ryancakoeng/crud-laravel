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
		<a href="{{ URL('mahasiswa') }}" class="btn btn-raised btn-danger pull-left">Kembali</a>
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
					<form class="form-horizontal" action="{{ URL('mahasiswa/update/'. $showById->id) }}" method="POST">
					{{ csrf_field() }}
					  <fieldset>
					    <legend>FORM UPDATE DATA MAHASISWA</legend>
						    <div class="form-group label-floating">
							  <label class="control-label" for="focusedInput2">Nama Mahasiswa</label>
							  <input class="form-control" id="focusedInput2" type="text" name="nama" value="{{ $showById->nama }}">
							  <p class="help-block">Masukan data kendaraan dengan benar.</p>
							</div>
							<div class="form-group label-floating">
							  <label class="control-label" for="focusedInput2">Jenis Kelamin</label> <br>
							  <input type="radio" name="jenis_kelamin" value="laki-laki" checked=""> Laki - Laki<br>
                <input type="radio" name="jenis_kelamin" value="perempuan" > Perempuan
							  <p class="help-block">Masukan data kendaraan dengan benar.</p>
							</div>
							<div class="form-group label-floating">
							  <label class="control-label" for="focusedInput2">Alamat</label>
							  <input class="form-control" id="focusedInput2" type="text" name="alamat" value="{{ $showById->alamat }}">
							  <p class="help-block">Masukan data kendaraan dengan benar.</p>
							</div>
							<div class="form-group label-floating">
							  <label class="control-label" for="select111">Jurusan</label>
							  <div class="col-md-12">
						        <select id="select111" class="form-control" name="jurusan">
						          <option value=""></option>
						          {{-- loop all jurusans as jurusan --}}

						          @foreach ($jurusans as $jurusan)
						          {{-- cek jika jurusan_id pd tabel mahasiswas sama dengan id jurusan pd tabel jurusans, set menjadi selected --}}
						          	@if ($jurusan->id == $showById->jurusan_id)
						          		<option value="{{ $jurusan->id }}" selected="selected">{{ strtoupper($jurusan->nama_jurusan) }}</option>
						          		@else
						          		<option value="{{ $jurusan->id }}">{{ strtoupper($jurusan->nama_jurusan) }}</option>
						          	@endif
						          @endforeach
						          {{-- end loop --}}
						        </select>
						      </div>
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
