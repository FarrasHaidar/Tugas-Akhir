<x-dashboard>
    @slot('content')
        <div class="container">
            <h1 class="text-center pd-4">List Feedback</h1>
            <hr>

            <form action="{{ route('admin.feedback.index') }}" method="get">
                <div class="row pb-3">
                    
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
                            <th>Email</th>
                            <th>Nomor Telp.</th>
                            <th>Subject</th>
                            <th>Waktu Dikirim</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($feedbacks) == 0)
                            <tr>
                                <td colspan="6" class="text-center">Tidak Ada Data Yang Ditampilkan</td>
                            </tr>
                        @endif
                        @foreach ($feedbacks as $feedback)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $feedback->email }}</td>
                                <td>{{ $feedback->phone_number }}</td>
                                <td>{{ $feedback->subject }}</td>
                                <td>{{ $feedback->created_at }}</td>
                                <td class="">
                                    <a href="{{ route('admin.feedback.show', ['feedback' => $feedback->id]) }}"
                                        class="btn btn-success"><i class="bi bi-eye"></i></a>
                                    <form id="delete-form{{ $feedback->id }}"
                                        action="{{ route('admin.feedback.destroy', ['feedback' => $feedback]) }}"
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
                {{ $feedbacks->links('pagination::bootstrap-5') }}
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
