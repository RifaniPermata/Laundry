@extends('layouts.admin.master')
@section('title','Tambah data Member')
@section('page-title','Tambah Data Member')
@section('breadcrumb','member')

@section('content')
	<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah data Member</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{ route('member.store') }}">
              	@csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="nama lengkap ..." value="{{ old('nama') }}">
                    @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="nama">Jenis Kelamin</label>
                    <select class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin">
                      <option value="">Pilih Jenis Kelamin</option>
                      <option value="L" @if (old('jenis_kelamin') == 'L') {{ 'selected' }} @endif>Laki - laki</option>
                      <option value="P" @if (old('jenis_kelamin') == 'P') {{ 'selected' }} @endif>Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="tlp">Nomor Telpon</label>
                    <input type="number" class="form-control @error('tlp') is-invalid @enderror" id="tlp" name="tlp" placeholder="081222333444" value="{{ old('tlp') }}">
                    @error('tlp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat Lengkap</label>
                    <textarea class="form-control @error('alamat') is-invalid @enderror" placeholder="Alamat lengkap ..." name="alamat" id="alamat">{{ old('alamat') }}</textarea>
                    @error('alamat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Tambah Data</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
@endsection

@section('footer-script')

@endsection