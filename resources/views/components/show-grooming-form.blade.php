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
            <label>No.HP</label>
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

        <div class="form-group mb-3 align-items-center">
            <label>Jenis Grooming</label>
            <input readonly value="{{ $order->service->product->name }} - Rp.{{ $order->service->product->price }}" type="text" name="equipment"
                placeholder="Perlengkapan" class="form-control" required>
        </div>
    </div>
    <div class="col">

        <div class="form-group mb-3">
            <label>Usia (Dalam Bulan)</label>
            <input readonly value="{{ $order->service->pet_age }}" type="text" name="pet_age"
                placeholder="Usia Kucing" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label>Sinyalement</label>
            <input readonly value="{{ $order->service->sinyalement }}" type="text" name="sinyalement"
                placeholder="Ciri-Ciri " class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label>Perlengkapan yang Dibawa</label>
            <input readonly value="{{ $order->service->equipment }}" type="text" name="equipment"
                placeholder="Perlengkapan" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="jadwalTanggal">Tanggal Pemesanan</label>
            <input readonly value="{{ $order->service->date }}" type="date" id="jadwalTanggal" class="form-control"
                name="date" required readonly>
        </div>

        <div class="form-group mb-3">
            <label for="sesi-jadwal">Sesi Pemesanan</label>
            <input readonly value="{{ $order->service->session->format('H:i') }}" type="time" class="form-control"
                id="sesi-jadwal" name="session" required readonly>
        </div>

        <div class="form-group mb-3">
            <label>Catatan</label>
            <input type="text" name="pet_food" placeholder="Merk Makanan" class="form-control"
                value="{{ $order->service->note }}" readonly />
        </div>
    </div>

</div>
