@extends('layouts.admin.master')
@section('title','Tambah data Transaksi')
@section('page-title','Tambah Data Transaksi')
@section('breadcrumb','transaksi')

@section('content')
	<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah data Transaksi</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{ route('transaksi.store') }}" class="form-horizontal">
              	@csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="outlet_id">Nama Outlet</label>
                      <select class="form-control @error('outlet_id') is-invalid @enderror" name="outlet_id" id="outlet_id">
                        @forelse($outlets as $outlet)
                          <option value="{{ $outlet->id }}" @if ( old('outlet_id') == $outlet->id) {{ 'selected' }} @endif>{{ $outlet->nama }} </option>
                        @empty
                        @endforelse
                      </select>
                    @error('outlet_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="member_id">Nama Member</label>
                      <select class="form-control @error('member_id') is-invalid @enderror" name="member_id" id="member_id">
                          <option value="">Pilih Member</option>
                        @forelse($members as $member)
                          <option value="{{ $member->id }}" @if ( old('member_id') == $member->id) {{ 'selected' }} @endif>{{ $member->nama }} </option>
                        @empty
                        @endforelse
                      </select>
                    @error('member_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="row">
                    <div class="form-group col-4">
                      <label for="pajak">Pajak</label>
                      <input type="number" class="form-control @error('pajak') is-invalid @enderror" id="pajak" name="pajak" placeholder="nilai pajak" value="0">
                      @error('pajak')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                    <div class="form-group col-4">
                      <label for="diskon">Diskon</label>
                      <input type="number" class="form-control @error('diskon') is-invalid @enderror" id="diskon" name="diskon" placeholder="potongan harga" value="0">
                      @error('diskon')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                    <div class="form-group col-4">
                      <label for="biaya_tambahan">Biaya Tambahan</label>
                      <input type="number" class="form-control @error('biaya_tambahan') is-invalid @enderror" id="biaya_tambahan" name="biaya_tambahan" placeholder="biaya tambahan" value="0">
                      @error('biaya_tambahan')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="status">Status</label>
                      <select class="form-control @error('status') is-invalid @enderror" name="status" id="status">
                        <option value="">Pilih Status Pengerjaan</option>
                        <option value="baru" @if ( old('status') == 'baru') {{ 'selected' }} @endif>Baru</option>
                        <option value="proses" @if ( old('status') == 'proses') {{ 'selected' }} @endif>Proses</option>
                        <option value="selesai" @if ( old('status') == 'selesai') {{ 'selected' }} @endif>Selesai</option>
                        <option value="diambil" @if ( old('status') == 'diambil') {{ 'selected' }} @endif>Diambil</option>
                      </select>
                      @error('status')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                    <div class="form-group col-6">
                      <label for="dibayar">Pembayaran</label>
                      <select class="form-control @error('status') is-invalid @enderror" name="dibayar" id="dibayar">
                        <option value="">Pilih Status Pembayaran</option>
                        <option value="dibayar" @if ( old('dibayar') == 'dibayar') {{ 'selected' }} @endif>Dibayar</option>
                        <option value="belum_dibayar" @if ( old('dibayar') == 'belum_dibayar') {{ 'selected' }} @endif>Belum Dibayar</option>
                      </select>
                      @error('status')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
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