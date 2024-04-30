<div class="container">
    <div class="row">
        <div class="col">
            <h3 class="fw-bold">Pilih Hari Pemesanan</h3>
            <div class="bg-white p-4 rounded">
                <div class="" id="calendar"></div>
            </div>
            <h3 class="fw-bold mt-3">Jadwal Tersedia</h3>
            <div class="sesi mt-3 d-lg-block d-flex justify-content-center">
                <div class="row my-3">
                    <div class="col d-flex flex-lg-row flex-column justify-content-evenly gap-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sesi" id="09:00" value="09:00">
                            <label class="" for="09:00">09:00</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sesi" id="10:00" value="10:00">
                            <label class="" for="10:00">10:00</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sesi" id="11:00" value="11:00">
                            <label class="" for="11:00">11:00</label>
                        </div>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col d-flex flex-lg-row flex-column justify-content-evenly gap-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sesi" id="12:00" value="12:00">
                            <label class="" for="12:00">12:00</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sesi" id="13:00" value="13:00">
                            <label class="" for="13:00">13:00</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sesi" id="14:00" value="14:00">
                            <label class="" for="14:00">14:00</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-8 col-12">
            <div class="card fw-bold text-gray">
                <div class="card-header" style="background-color: #FFEFB0">{{ __('Form Grooming') }}
                </div>

                <div class="card-body">
                    <form id="groomingForm" action="{{ route('grooming.store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Nama Pemilik</label>
                            <input type="text" name="owner" placeholder="Nama" class="form-control" required><br>
                        </div>

                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" name="address" placeholder="Alamat" class="form-control" required><br>
                        </div>

                        <div class="form-group">
                            <label>No.HP</label>
                            <input type="text" name="phone_number" placeholder="08..." class="form-control"
                                required><br>
                        </div>

                        <div class="form-group">
                            <label>Nama Hewan</label>
                            <input type="text" name="pet_name" placeholder="Nama Hewan Peliharaan"
                                class="form-control" required><br>
                        </div>

                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select name="pet_gender" class="form-control form-select" required>
                                <option value="jantan">Jantan</option>
                                <option value="betina">Betina</option>
                            </select><br>
                        </div>

                        <div class="form-group">
                            <label>Usia (Dalam Bulan: Minimal <span class="text-danger"> 3 Bulan)</span></label>
                            <input min="3" type="number" name="pet_age" placeholder="Usia Kucing Minimal 3 Bulan"
                                class="form-control" required><br>
                        </div>

                        <div class="form-group">
                            <label>Sinyalement</label>
                            <input type="text" name="sinyalement" placeholder="Ciri-ciri Kucing Anda"
                                class="form-control" required><br>
                        </div>

                        <div class="form-group">
                            <label>Perlengkapan yang Dibawa</label>
                            <input type="text" name="equipment" placeholder="Perlengkapan" class="form-control"
                                required><br>
                        </div>
                        <div class="form-group mb-3">
                            <label for="jadwalTanggal">Tanggal Pemesanan</label>
                            <input type="date" id="jadwalTanggal" class="form-control" name="date" required
                                readonly>
                        </div>
                        <div class="form-group mb-3">
                            <label for="sesi-jadwal">Sesi Pemesanan</label>
                            <input type="time" class="form-control" id="sesi-jadwal" name="session" required
                                readonly>
                        </div>

                        <div class="form-group">
                            <label>Jenis Grooming</label>
                            <select name="product_id" class="form-select" required>
                                <option value="">Pilih Layanan Grooming</option>
                                @foreach ($services as $s)
                                    <option value="{{ $s->id }}"> {{ $s->name }} - Rp.{{ $s->price}}</option>
                                @endforeach
                            </select><br>
                        </div>

                        <div class="form-group">
                            <label>Catatan Groomer</label>
                            <input type="text" name="note" placeholder="Catatan Untuk Groomer"
                                class="form-control" required><br>
                        </div>
                        <div class="container text-center">
                            <h2 class="fw-bold mt-3">PERSETUJUAN LAYANAN GROOMING</h2>
                            <p class="mt-3 mx-auto" style="max-width: 525px;">Dengan ini saya menyatakan bahwa
                                hewan peliharaan saya yang tersebut di atas
                                <strong> tidak sedang sakit, baru sembuh sakit atau tidak sedang
                                    hamil/menyusui.</strong>
                            </p>

                            <p class="mx-auto" style="max-width: 525px;"><strong>Saya menyetujui dan memberi
                                    kuasa
                                    penuh kepada
                                    Orino Petshop untuk melakukan prosedur grooming hewan yang dianggap perlu
                                    dan
                                    sesuai dengan paket
                                    grooming yang saya pilih untuk hewan tersebut di atas.</strong></p>

                            <div class="form-group form-check d-flex align-items-center gap-2 justify-content-center">
                                <input type="checkbox" class="form-check-input" id="setujuCheck" required
                                    style="margin-right: 5px;">
                                <label class="form-check-label mt-1" for="setujuCheck">Setuju</label>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3" id="submitBtn" disabled>Submit
                                Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
