@extends('layouts.admin.master')
@section('title','Edit data Transaksi')
@section('page-title','Edit Data Transaksi')
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
                <h3 class="card-title">Edit data Transaksi</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{ route('transaksi.update',['transaksi' => $transaksi->id]) }}" class="form-horizontal">
              	@csrf
              	@method('put')
                <div class="card-body">
                  <div class="form-group">
                    <label for="outlet_id">Nama Outlet</label>
                      <select class="form-control @error('outlet_id') is-invalid @enderror" name="outlet_id" id="outlet_id">
                        @forelse($outlets as $outlet)
                          <option value="{{ $outlet->id }}" @if ( $transaksi->outlet->id == $outlet->id) {{ 'selected' }} @endif>{{ $outlet->nama }} </option>
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
                          <option value="{{ $member->nama }}" @if ( $transaksi->member->id == $member->id) {{ 'selected' }} @endif>{{ $member->nama }} </option>
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
                      <input type="number" class="form-control @error('pajak') is-invalid @enderror" id="pajak" name="pajak" placeholder="nilai pajak" value="{{ $transaksi->pajak }}">
                      @error('pajak')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                    <div class="form-group col-4">
                      <label for="diskon">Diskon</label>
                      <input type="number" class="form-control @error('diskon') is-invalid @enderror" id="diskon" name="diskon" placeholder="potongan harga" value="{{ $transaksi->diskon }}">
                      @error('diskon')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                    <div class="form-group col-4">
                      <label for="biaya_tambahan">Biaya Tambahan</label>
                      <input type="number" class="form-control @error('biaya_tambahan') is-invalid @enderror" id="biaya_tambahan" name="biaya_tambahan" placeholder="biaya tambahan" value="{{ $transaksi->biaya_tambahan }}">
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
                        <option value="baru" @if ( $transaksi->status == 'baru') {{ 'selected' }} @endif>Baru</option>
                        <option value="proses" @if ( $transaksi->status == 'proses') {{ 'selected' }} @endif>Proses</option>
                        <option value="selesai" @if ( $transaksi->status == 'selesai') {{ 'selected' }} @endif>Selesai</option>
                        <option value="diambil" @if ( $transaksi->status == 'diambil') {{ 'selected' }} @endif>Diambil</option>
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
                        <option value="dibayar" @if ( $transaksi->dibayar == 'dibayar') {{ 'selected' }} @endif>Dibayar</option>
                        <option value="belum_dibayar" @if ( $transaksi->dibayar == 'belum_dibayar') {{ 'selected' }} @endif>Belum Dibayar</option>
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