<x-dashboard>
    @slot('content')
        <div class="container">
            <h1 class="text-center pd-4">List Grooming</h1>
            <hr>

            <form action="{{ route('admin.grooming.index') }}" method="get">
                <div class="row pb-3">
                    <div class="col-lg-3 col-12 pt-4">
                        <a href="{{ route('grooming_page') }}" class="btn btn-success">Tambah Jadwal Grooming</a>
                    </div>
                    <div class="col-lg-3 col-12">
                        <label>Start Date:</label>
                        <input type="date" name="start_date" class="form-control" required value={{ $start_date ?? '' }}>
                    </div>
                    <div class="col-lg-3 col-12">
                        <label>End Date:</label>
                        <input type="date" name="end_date" class="form-control" required value={{ $end_date ?? '' }}>
                    </div>
                    <div class="col-md-3 col-12 pt-4">
                        <button type="submit" class="btn btn-warning fw-bold">Filter</button>
                        <a href="{{ route('admin.grooming.index') }}" class="btn btn-success">Cari Semua Data</a>
                    </div>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped table-dark w-100">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Owner</th>
                            <th>Nama Hewan</th>
                            <th>Layanan</th>
                            <th>Status Pembayaran</th>
                            <th>Tanggal Grooming</th>
                            <th>Sesi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($groomings) == 0)
                            <tr>
                                <td colspan="8" class="text-center">Tidak Ada Data Yang Ditampilkan</td>
                            </tr>
                        @endif
                        @foreach ($groomings as $grooming)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $grooming->owner }}</td>
                                <td>{{ $grooming->pet_name }}</td>
                                <td>{{ $grooming->product->name }}</td>
                                <td>
                                    @switch($grooming->order->confirmation)
                                        @case('confirm')
                                            @case('accept_form')
                                                <span class="badge bg-success">Form Diterima</span>
                                                <span
                                                    class="fw-bold badge {{ $grooming->order->is_paid ? 'bg-success' : 'bg-danger' }}">{{ $grooming->order->is_paid ? 'Paid' : 'Unpaid' }}</span>
                                                <span
                                                    class="fw-bold badge {{ $grooming->order->payment_receipt != null ? 'bg-success' : 'bg-danger' }}">{{ $grooming->order->payment_receipt == null ? 'Belum Bayar' : 'Sudah Bayar' }}</span>
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
                                <td>{{ $grooming->date }}</td>
                                <td>{{ $grooming->session->format('H:i') }}</td>
                                <td class="">
                                    <a href="{{ route('admin.grooming.show', ['grooming' => $grooming->id]) }}"
                                        class="btn btn-success"><i class="bi bi-eye"></i></a>
                                    <a href="{{ route('admin.grooming.edit', ['grooming' => $grooming]) }}"
                                        class="btn btn-warning text-white"><i class="bi bi-pencil"></i></a>
                                    <form id="delete-form{{ $grooming->id }}"
                                        action="{{ route('admin.grooming.destroy', ['grooming' => $grooming]) }}"
                                        method="post" class="d-inline">
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
                {{ $groomings->links('pagination::bootstrap-5') }}
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
