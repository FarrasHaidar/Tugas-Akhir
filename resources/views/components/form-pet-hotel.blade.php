<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-12">
            <div class="card text-gray fw-bold">
                <div class="card-header h4 fw-bold" style="background-color: #FFEFB0">{{ __('Form Pet Hotel') }}</div>
                <div class="card-body">
                    <h4 class="fw-bold">Pilih Hari Pemesanan</h4>
                    <div class="my-3" id="calendar"></div>
                    <form id="groomingForm" action="{{ route('pethotel.store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col">
                                <div class="form-group">
                                    <label>Tanggal Mulai Pemesanan</label>
                                    <input type="date" name="start_date" placeholder="" class="form-control" required
                                        readonly><br>
                                </div>
                            </div>
                            <div class="col-lg-6 col">
                                <div class="form-group">
                                    <label>Tanggal Akhir Pemesanan</label>
                                    <input type="date" name="end_date" placeholder="" class="form-control" required
                                        readonly><br>
                                </div>
                            </div>
                        </div>
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
                            <label>Nama Kucing</label>
                            <input type="text" name="pet_name" placeholder="Nama Kucing Peliharaan"
                                class="form-control" required><br>
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select name="pet_gender" class="form-control" required>
                                <option value="jantan">Jantan</option>
                                <option value="betina">Betina</option>
                            </select><br>
                        </div>
                        <div class="form-group">
                            <label>Usia (Dalam Bulan)</label>
                            <input type="number" name="pet_age" placeholder="Usia Kucing" class="form-control"
                                required><br>
                        </div>
                        <div class="form-group">
                            <label>Merk Pakan</label>
                            <input type="text" name="pet_food" placeholder="Merk Makanan" class="form-control"
                                required><br>
                        </div>
                        <div class="form-group">
                            <label>Catatan</label>
                            <input type="text" name="note" placeholder="Catatan" class="form-control"
                                required><br>
                        </div>

                        <div class="form-group">
                            <label>Sertifikat Vaksin</label>
                            <input type="file" name="vaccine_image" class="form-control" required><br>
                        </div>

                        <div class="form-group">
                            <label>File Medical Check Up H-1</label>
                            <input type="file" name="medcheck_image" class="form-control" required><br>
                        </div>

                        <div class="container text-center">
                            <h2 class="fw-bold mt-3">PERSETUJUAN LAYANAN PET HOTEL</h2>
                            <ul class="mx-auto" style="max-width: 680px;">
                                <li class="mt-3 mx-auto">Dengan ini saya menyatakan bahwa saya
                                    menyetujui kucing saya dititipkan, ditangani, dan dirawat oleh ORINO PET
                                    SHOP
                                    dalam keadaan sehat,
                                    tidak berkutu dan sudah/belum divaksin, tidak sedang hamil, dan tidak
                                    agresif
                                    kepada manusia atau
                                    hewan lain.</li>

                                <li class="mt-3 mx-auto">Saya menyetujui hewan peliharaan saya dititipkan,
                                    ditangani, dan dirawat oleh ORINO PET SHOP tanpa membebankan tanggung jawab
                                    dan
                                    ganti rugi apapun
                                    kepada ORINO PET SHOP jika terjadi kerugian, sakit, dan kematian terhadap
                                    hewan
                                    peliharaan saya yang
                                    disebabkan oleh bencana alam, gempa bumi, kebakaran yang bersifat tidak bisa
                                    dicegah atau force majour.</li>

                                <li class="mt-3 mx-auto">Jika hewan peliharaan saya selama dalam masa penitipan
                                    mengalami gejala sakit
                                    dan atau tidak mampu beradaptasi, maka saya selaku pemilik bersedia
                                    dihubungi
                                    selama 1x24 jam,
                                    dan jika lebih dari jangka waktu tersebut saya tidak bisa dihubungi dan jika
                                    dirasa perlu tindakan
                                    medis maka dokter hewan di ORINO PETSHOP boleh melakukan tindakan medis
                                    sesuai
                                    SOP yang berlaku tanpa
                                    sepersetujuan saya terlebih dahulu, serta saya bersedia menanggung semua
                                    biaya
                                    yang timbul dari semua
                                    tindakan medis yang dilakukan.</li>

                                <li class="mt-3 mx-auto">Saya bersedia untuk membayar DP sebesar 50% dari
                                    perkiraan
                                    total biaya
                                    titip sehat di ORINO PET SHOP.</li>
                            </ul>

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
