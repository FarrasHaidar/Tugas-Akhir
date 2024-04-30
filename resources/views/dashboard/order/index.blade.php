<x-dashboard>
    @slot('content')
        <div class="container">
            <h1 class="text-center pd-4">List Order</h1>
            <hr>

            <form action="{{ route('admin.order.index') }}" method="get">
                <div class="row pb-3">
                    <div class="col-md-5 pt-4">
                        <a href="{{ route('index_order') }}" class="btn btn-success">Go To Order</a>
                    </div>
                    <div class="col-md-3">
                        <label>Start Date:</label>
                        <input type="date" name="start_date" class="form-control" required value={{ $start_date ?? '' }}>
                    </div>
                    <div class="col-md-3">
                        <label>End Date:</label>
                        <input type="date" name="end_date" class="form-control" required value={{ $end_date ?? '' }}>
                    </div>
                    <div class="col-md-1 pt-4">
                        <button type="submit" class="btn btn-warning fw-bold">Filter</button>
                    </div>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped table-dark w-100">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Waktu Order</th>
                            <th>Jenis Layanan</th>
                            <th>Payment Status</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($orders) == 0)
                            <tr>
                                <td colspan="7" class="text-center">Tidak Ada Data Yang Ditampilkan</td>
                            </tr>
                        @endif
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $order->service->owner ?? 'tidak ada' }}</td>
                                <td>{{ $order->user->email }}</td>
                                <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
                                <td>{{ $order->service->product->name ?? 'tidak ada' }}</td>
                                <td>
                                    @switch($order->confirmation)
                                        @case('confirm')
                                        @case('accept_form')
                                            <span class="badge bg-success">Form Diterima</span>
                                            <span
                                                class="fw-bold badge {{ $order->is_paid ? 'bg-success' : 'bg-danger' }}">{{ $order->is_paid ? 'Paid' : 'Unpaid' }}</span>
                                            <span
                                                class="fw-bold badge {{ $order->payment_receipt != null ? 'bg-success' : 'bg-danger' }}">{{ $order->payment_receipt == null ? 'Belum Bayar' : 'Sudah Bayar' }}</span>
                                        @break

                                        @case('waiting')
                                            <span class="badge bg-warning">Menunggu Konfirmasi</span>
                                        @break
                                        
                                        @case('reject_form')
                                            <span class="badge bg-danger">Form Ditolak</span>
                                        @break

                                        @default
                                            <span class="badge bg-danger">Ditolak</span>
                                    @endswitch
                                </td>
                                <td>
                                    <p>{{ $order->price }}</p>
                                </td>
                                <td class="">
                                    <a href="{{ route('admin.order.show', ['order' => $order->id]) }}"
                                        class="btn btn-success"><i class="bi bi-eye"></i></a>
                                    <form id="delete-form{{ $order->id }}"
                                        action="{{ route('admin.order.destroy', ['order' => $order]) }}" method="post"
                                        class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <button type="button" class="btn btn-danger confirm-delete"><i
                                                class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $orders->links('pagination::bootstrap-5') }}
            </div>
        </div>
    @endslot
    @push('script')
        <script>
            $(document).ready(function() {
                $('.confirm-delete').on('click', function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Apakah Anda Yakin Menghapus Data?',
                        text: "Anda Tidak Akan Dapat Mengembalikannya!",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $(this).parent('form').trigger('submit')
                        } else if (result.isDenied) {
                            Swal.fire('Changes are not saved', '', 'info')
                        }
                    });
                })
            });
        </script>
    @endpush
</x-dashboard>
