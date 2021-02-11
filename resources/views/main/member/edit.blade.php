@extends('layouts.admin.master')
@section('title','Edit data Member')
@section('page-title','Edit Data Member')
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
                <h3 class="card-title">Edit data Member</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{ route('member.update',['member' => $member->id]) }}">
              	@csrf
              	@method('put')
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="nama lengkap ..." value="{{ $member->nama }}">
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
                      <option value="L" @if ($member->jenis_kelamin == 'L') {{ 'selected' }} @endif>Laki - laki</option>
                      <option value="P" @if ($member->jenis_kelamin == 'P') {{ 'selected' }} @endif>Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="tlp">Nomor Telpon</label>
                    <input type="number" class="form-control @error('tlp') is-invalid @enderror" id="tlp" name="tlp" placeholder="081222333444" value="{{ $member->tlp }}12">
                    @error('tlp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat Lengkap</label>
                    <textarea class="form-control @error('alamat') is-invalid @enderror" placeholder="Alamat lengkap ..." name="alamat" id="alamat">{{ $member->alamat }}</textarea>
                    @error('alamat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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