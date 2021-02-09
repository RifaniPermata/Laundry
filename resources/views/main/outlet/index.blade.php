@extends('layouts.admin.master')
@section('title','Daftar Outlet')
@section('page-title','Outlet')
@section('breadcrumb','outlet')
@section('header-script')
  <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endsection
@section('content')
<section class="content">

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Daftar Outlet</h3>

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
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Nomor Telpon</th>
                    <th>Aksi</th>
                  </tr>
              </thead>
              <tbody>
              	@forelse($outlets as $outlet)
                  <tr>
                  	<td style="width: 1%">{{ $loop->iteration }}</td>
                  	<td>{{ $outlet->nama }}</td>
                  	<td>{{ $outlet->alamat }}</td>
                  	<td>{{ $outlet->tlp }}</td>
                    <td>
                      <a href="{{ route('outlet.edit', ['outlet' => $outlet->id ]) }}" class="btn btn-warning">Edit</a>
                      
                      <form id="destroy-outlet" method="post" class="d-inline" action="{{ route('outlet.destroy',['outlet' => $outlet->id  ]) }}">
                        @csrf
                        @method('delete')
                        <button type="button" class="btn btn-danger btn-outlet">Hapus</button>
                      </form>
                    </td>
                  </tr>
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

    </section>
@endsection

@section('footer-script')
<script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script type="text/javascript">
    $(".btn-outlet").click(function(){
      Swal.fire({
        title: 'Anda yakin ingin menghapus data outlet',
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
    @if(session('status'))
      Swal.fire(
        'Berhasil',
        '{{ session('status') }}',
        'success'
      )
    @endif
</script>
@endsection