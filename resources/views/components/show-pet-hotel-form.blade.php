<div class="row">
    <div class="col">
        <div class="form-group mb-3">
            <label>Nama Pemilik</label>
            <input readonly value="{{ $order->service->owner }}" type="text" name="owner" placeholder="Nama"
                class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label>Alamat</label>
            <input readonly value="{{ $order->service->address }}" type="text" name="address" placeholder="Alamat"
                class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label>No. HP</label>
            <input readonly value="{{ $order->service->phone_number }}" type="text" name="phone_number"
                placeholder="0821..." class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label>Nama Hewan</label>
            <input readonly value="{{ $order->service->pet_name }}" type="text" name="pet_name"
                placeholder="Nama Hewan Peliharaan" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label>Jenis Kelamin</label>
            <input readonly value="{{ $order->service->pet_gender }}" type="text" name="pet_gender"
                placeholder="Nama Hewan Peliharaan" class="form-control" required>
        </div>

        <div class="div">
            <p>Sertifikat Vaksin</p>
            <img src="{{ Storage::url($order->service->vaccine) }}" alt="" class="img-fluid">
        </div>
    </div>
    <div class="col">
        <div class="form-group mb-3">
            <label>Merk Pakan</label>
            <input type="text" name="pet_food" placeholder="Merk Makanan" class="form-control"
                value="{{ $order->service->pet_food }}" readonly />
        </div>

        <div class="form-group mb-3">
            <label for="jadwalTanggal">Tanggal Mulai</label>
            <input readonly value="{{ $order->service->start_date }}" type="date" id="jadwalTanggal"
                class="form-control" name="start_date" required readonly>
        </div>
        
        <div class="form-group mb-3">
            <label for="sesi-jadwal">Tanggal Selesai</label>
            <input readonly value="{{ $order->service->end_date }}" type="date" class="form-control" id="sesi-jadwal"
                name="end_date" required readonly>
        </div>

        <div class="form-group mb-3">
            <label>Catatan</label>
            <input type="text" name="pet_food" placeholder="Merk Makanan" class="form-control"
                value="{{ $order->service->note }}" readonly />
        </div>
        
        <div class="form-group mb-3">
            <label>Harga</label>
            <input readonly value="Rp.{{ $order->price }}" type="text" name="price"
               placeholder="Price" class="form-control" required>
        </div>

        <div class="div">
            <p>Medical Check</p>
            <img src="{{ Storage::url($order->service->medcheck) }}" alt="" class="img-fluid">
        </div>
    </div>
</div>
