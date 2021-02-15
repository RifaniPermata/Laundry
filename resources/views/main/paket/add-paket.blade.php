@extends('layouts.admin.master')
@section('title','Tambah Paket')
@section('page-title','Tambah Paket')
@section('breadcrumb','paket')

@section('content')
	<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Paket</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{ route('paket.store') }}">
              	@csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama">Nama Outlet</label>
                      <select name="outlet_id" class="form-control @error('outlet_id') is-invalid @enderror">
                        <option value="">Pilih Outlet</option>
                    @forelse($outlets as $outlet)
                        <option value="{{ $outlet->id }}" @if( old('outlet_id') == $outlet->id ) {{ 'selected' }} @endif>{{ $outlet->nama }}</option>
                    @empty
                        <option value="">Tidak ada outlet</option>
                    @endforelse
                      </select>
                    @error('outlet_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="nama">Jenis Paket</label>
                    <select class="form-control @error('jenis') is-invalid @enderror" name="jenis">
                      <option value="">Pilih Jenis Paket</option>
                      <option value="kiloan" @if (old('jenis') == 'kiloan') {{ 'selected' }} @endif>Kiloan</option>
                      <option value="selimut" @if (old('jenis') == 'selimut') {{ 'selected' }} @endif>Selimut</option>
                      <option value="bed_cover" @if (old('jenis') == 'bed_cover') {{ 'selected' }} @endif>Bed Cover</option>
                      <option value="kaos" @if (old('jenis') == 'kaos') {{ 'selected' }} @endif>Kaos</option>
                      <option value="lain" @if (old('jenis') == 'lain') {{ 'selected' }} @endif>Lain - lain</option>
                    </select>
                    @error('jenis')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="nama">Nama Paket</label>
                    <input type="text" name="nama_paket" class="form-control @error('nama_paket') is-invalid @enderror" placeholder="nama paket ..." value="{{ old('nama_paket')}}">
                    @error('nama_paket')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="nama">Keterangan <span class="text-muted">Optional</span class="text-muted"></label>
                    <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" placeholder="keterangan ....">{{ old('keterangan') }}</textarea>
                    @error('keterangan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
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