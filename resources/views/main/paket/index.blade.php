@extends('layouts.admin.master')
@section('title','Daftar Paket')
@section('page-title','Paket')
@section('breadcrumb','paket')
@section('header-script')
  <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endsection
@section('content')

@php
  $no = $pakets->firstItem()
@endphp
<section class="content">
      <div class="card overflow-auto">
        <div class="card-header">
          <h3 class="card-title">Daftar Paket</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped table-bordered" >
              <thead>
                  <tr>
                    <th style="width: 1%">No</th>
                    <th>Outlet</th>
                    <th>Jenis</th>
                    <th>Nama Paket</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                  </tr>
              </thead>
              <tbody>
              	@forelse($pakets as $paket)
                  <tr>
                  	<td>{{ $no }}</td>
                  	<td>{{ $paket->outlet->nama }}</td>
                    <td>{{ $paket->jenis }}</td>
                  	<td>{{ $paket->nama_paket }}</td>
                  	<td>{{ $paket->keterangan }}</td>
                    <td>
                      <a href="{{ route('paket.edit', ['paket' => $paket->id ]) }}" class="btn btn-warning">Edit</a>
                      
                      <form id="destroy-outlet" method="post" class="d-inline" action="{{ route('paket.destroy',['paket' => $paket->id  ]) }}">
                        @csrf
                        @method('delete')
                        <button type="button" class="btn btn-danger btn-outlet">Hapus</button>
                      </form>
                    </td>
                  </tr>
                  @php
                    $no++;
                  @endphp
                @empty
                  <tr>
                  	<td colspan="4" class="text-center">tidak ada data</td>
                  </tr>
                @endforelse
                
              </tbody>
          </table>

        </div>

        <!-- /.card-body -->
      </div>
      <!-- /.card -->
      {{ $pakets->links() }}

    </section>

@endsection

@section('footer-script')
<script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script type="text/javascript">
    $(".btn-outlet").click(function(){
      Swal.fire({
        title: 'Anda yakin ingin menghapus data paket',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Tidak',
        confirmButtonText: 'Ya, Hapus!'
      }).then((result) => {
        if (result.isConfirmed) {
          
          Swal.fire({
            title :'Terhapus',
            text: 'Data berhasil dihapus',
            icon :'success'
          })
          $(this).parent().submit()
        }
      })
    })
    @if(session('success'))
      Swal.fire(
        'Berhasil',
        '{{ session('success') }}',
        'success'
      )
    @elseif(session('update'))
    Swal.fire(
        'Berhasil',
        '{{ session('update') }}',
        'success'
      )
    @endif
</script>
@endsection