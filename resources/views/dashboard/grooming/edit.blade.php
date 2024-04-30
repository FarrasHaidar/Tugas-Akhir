<x-dashboard>
    @slot('content')
        <div class="row my-2">
            <div class="col">
                <a href="{{ route('admin.order.show', ['order' => $grooming->order->id]) }}" class="btn btn-primary">Lihat 
                    Order</a>
                @if ($grooming->order->confirmation == 'waiting')
                    <a id="accept-grooming" href="{{ route('admin.order.accept', ['order' => $grooming->order->id]) }}" 
                        class="btn btn-success confirm-accept-grooming">Terima Pesanan</a>
                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#reject">Tolak Pesanan</button>
                @endif
            </div>
                       
        </div>
        <form action="{{ route('admin.grooming.update', ['grooming' => $grooming]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="form-group mb-2">
                        <label>Layanan Grooming</label>
                        <select name="product_id" class="form-control form-select" required>
                            <option value="{{ $grooming->product->id }}" selected>{{ $grooming->product->name }}</option>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group mb-2">
                                <label>Tanggal Grooming</label>
                                <input type="date" name="date" value="{{ $grooming->date }}" class="form-control"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group mb-2">
                                <label>Sesi</label>
                                <select name="session" class="form-control form-select" required>
                                    <option value="{{ $grooming->session->format('H:i') }}" selected>
                                        {{ $grooming->session->format('H:i') }}</option>
                                    <option value="09:00">09:00</option>
                                    <option value="10:00">10:00</option>
                                    <option value="11:00">11:00</option>
                                    <option value="12:00">12:00</option>
                                    <option value="13:00">13:00</option>
                                    <option value="14:00">14:00</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <label>Nama Pemilik</label>
                        <input type="text" name="owner" placeholder="Nama" class="form-control" required
                            value="{{ $grooming->owner }}" />
                    </div>
                    <div class="form-group mb-2">
                        <label>Alamat</label>
                        <input type="text" name="address" placeholder="Alamat" class="form-control" required
                            value="{{ $grooming->address }}" />
                    </div>
                    <div class="form-group mb-2">
                        <label>No.HP</label>
                        <input type="text" name="phone_number" placeholder="0821..." class="form-control" required
                            value="{{ $grooming->phone_number }}" />
                    </div>

                </div>
                <div class="col-lg-6 col-12">
                    <div class="form-group mb-2">
                        <label>Nama Kucing</label>
                        <input type="text" name="pet_name" placeholder="Nama Kucing Peliharaan" class="form-control"
                            required value="{{ $grooming->pet_name }}" />
                    </div>
                    <div class="form-group mb-2">
                        <label>Jenis Kelamin</label>
                        <select name="pet_gender" class="form-control form-select" required>
                            <option value="jantan" {{ $grooming->pet_gender == 'jantan' ? 'selected' : '' }}>Jantan
                            </option>
                            <option value="betina" {{ $grooming->pet_gender == 'betina' ? 'selected' : '' }}>Betina
                            </option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label>Sinyalement</label>
                        <input type="text" name="pet_food" placeholder="Merk Makanan" class="form-control" required
                            value="{{ $grooming->sinyalement }}" />
                    </div>
                    <div class="form-group mb-2">
                        <label>Catatan</label>
                        <input type="text" name="note" placeholder="Catatan" class="form-control" required
                            value="{{ $grooming->note }}" />
                    </div>
                    <input type="submit" value="Simpan Data" class="btn btn-success mt-4">
                </div>
            </div>
        </form>

        <div class="modal fade" id="reject" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form action="{{ route('admin.order.reject', ['order' => $grooming->order->id]) }}" method="POST">
                @csrf
                <div class="modal-dialog">
                    <div class="modal-content" style="background: #fdf9e5;">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Penolakan Form Grooming</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Alasan Penolakan</label>
                                <textarea class="form-control" name="reject_message" id="" cols="30" rows="10"
                                    placeholder="Masukkan Alasan Penolakan"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-warning text-white">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @endslot
</x-dashboard>
