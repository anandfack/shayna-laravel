@extends('layouts.default')

@section('content')

    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Daftar Barang</h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Number</th>
                                        <th>Name</th>
                                        <th>type</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @forelse ($items as $item)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        {{-- <td>{{ $item->id }}</td> --}}
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->type }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>
                                            <a href="{{ route('product.show', $item->id) }}" class="btn btn-info btn-sm">
                                                <i class="fa fa-picture-o"></i>
                                            </a>
                                            <a href="{{ route('product.edit', $item->id) }}" class="btn btn-primary btn-sm">
                                                <i class="fa fa-pencil"></i>
                                            </a>                                            
                                            {{-- <a  href="#" 
                                                data-id="{{ $item->id }}" 
                                                class="btn btn-danger btn-sm delete-confirm">
                                                    <i class="fa fa-trash"></i>
                                                        <form   action="{{ route('product.destroy', $item->id) }}" 
                                                                id="delete{{ $item->id }}" 
                                                                method="post" 
                                                                class="d-inline">
                                                            @csrf
                                                            @method('delete')
                                                        </form>
                                            </a> --}}
                                            <form action="{{ route('product.destroy', $item->id) }}" method="post" class="d-inline swal-confirm">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Apakah anda yakin?')">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center p-5">Data Tidak Tersedia</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="{{ ('vendor/sweetalert/sweetalert.all.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    // $(document).ready(function() {
        $('.delete-confirm').on('click',function(e){
            id = e.target.dataset.id;
            swal.fire({
                        title: 'Apakah anda yakin?',
                        icon: 'warning',
                        text: 'Hapus Data?',
                        html: true,
                        buttons: true,
                        showCancelButton: true,
                    })
                    .then((willDelete) => {
                        if(willDelete) {
                            // swal.fire({
                            //     title: 'poof mantap',
                            //     icon: 'success',
                            // });
                            $(`#delete${id}`).submit();
                        } else {
                            // swal.fire('Mantap');
                        }
                    });
            });
        // });
    </script>
@endsection