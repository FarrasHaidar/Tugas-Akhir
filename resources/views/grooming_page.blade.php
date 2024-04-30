<x-user-page>
    @slot('content')
        <section class="container">
            <div class="row">
                <!-- Kolom Kiri (Gambar) -->
                <div class="col-lg-6 position-relative mb-4">
                    <img src="{{ asset('media/bg2.svg') }}" alt="bg2"
                        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: -1;">
                    <div class="row">
                        <div class="col-6 d-flex justify-content-center">
                            <div class="grooming-image">
                                <img src="{{ asset('media/grooming-cat.svg') }}" alt="Grooming Image 1" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-6 d-flex justify-content-center">
                            <div class="grooming-image">
                                <img src="{{ asset('media/grooming-cat-2.svg') }}" alt="Grooming Image 2" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-6 d-flex justify-content-center">
                            <div class="grooming-image">
                                <img src="{{ asset('media/grooming-cat-3.svg') }}" alt="Grooming Image 3" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-6 d-flex justify-content-center">
                            <div class="grooming-image">
                                <img src="{{ asset('media/grooming-cat-4.svg') }}" alt="Grooming Image 4" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kolom Kanan (Teks Penjelasan) -->
                <div class="col-lg-6 container mt-md-0">
                    <h1 class="judul fw-bold mb-3">
                        Apa itu Layanan Grooming?</h1>
                    <h4 class="animate__animated animate__headShake"
                        style="margin-left: 0;
                    max-width:680px; text-align:justify;">
                        <strong> Grooming </strong> merupakan praktik membersihkan, menata, dan merawat hewan peliharaan.
                        Perawatan ini adalah bagian penting dari memelihara hewan peliharaan karena bertujuan agar
                        hewan peliharaan tersebut tetap bersih dan sehat.
                    </h4>
                    <br>
                    <h4 class="animate__animated animate__bounce"
                        style="margin-left: 0;
                    max-width:680px; text-align:justify;">
                        <strong> Grooming </strong> juga dapat menjadi kesempatan yang baik bagi kamu dan hewan
                        peliharaan untuk menjalin ikatan batin dan mengajarinya beberapa kebiasaan perawatan yang penting.
                    </h4>
                    <br><br><br><br>
                    <button class="mx-auto btn btn-warning text-black fw-bold d-block judul pesan"
                        onclick="scrollToForm()">Pesan Sekarang</button>

                </div>
            </div>
        </section>


        <section id="jenis-grooming" class="jenis-grooming-container container">
            <div style="text-align: center;">
                <h1 class="fw-bold mb-3">
                    Jenis Grooming
                </h1>
                <div id="garis-bawah" class="garisbawah mb-4"></div>
                <br>
                <h4><strong class="fw-bold text-warning">Orino Petshop </strong> 
                    menyediakan berbagai jenis layanan grooming untuk memastikan kesehatan dan
                    kebersihan hewan peliharaan Anda. Pilihlah dari empat varian grooming berikut sesuai kebutuhan:</h4>

                <div id="demo" class="carousel slide mt-4" data-bs-ride="carousel">

                    <!-- Indicators/dots -->
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                        <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                        <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                        <button type="button" data-bs-target="#demo" data-bs-slide-to="3"></button>
                    </div>

                    <!-- The slideshow/carousel -->
                    <div class="carousel-inner">
                        <div class="carousel-item active" style="background-color: transparent !important">
                            <h4 class="fw-bold text-center mb-2">Rp 35.000</h4>
                            <img src="{{ asset('media/g-biasa.svg') }}" alt="grooming pertama" class="d-inline w-25">
                        </div>
                        <div class="carousel-item" style="background-color: transparent !important">
                            <h4 class="fw-bold text-center mb-2">Rp 50.000</h4>
                            <img src="{{ asset('media/g-kutu.svg') }}" alt="grooming kedua" class="d-inline w-25">
                        </div>
                        <div class="carousel-item" style="background-color: transparent !important">
                            <h4 class="fw-bold text-center mb-2">Rp 50.000</h4>
                            <img src="{{ asset('media/g-jamur.svg') }}" alt="grooming ketiga" class="d-inline w-25">
                        </div>
                        <div class="carousel-item" style="background-color: transparent !important">
                            <h4 class="fw-bold text-center mb-2">Rp 65.000</h4>
                            <img src="{{ asset('media/g-komplit.svg') }}" alt="grooming keempat" class="d-inline w-25">
                        </div>
                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>

                    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>

                </div>
            </div>
        </section>
        <section id="jenis-grooming" class="jenis-grooming-container">
            {{-- @if (Auth::user()) --}}
            <div style="text-align: center;">
                <h1 class="fw-bold mb-3" id="pesangrooming">
                    Pesan Grooming
                </h1>
                <div id="garis-bawah" class="garisbawah mb-4"></div>
                <br>
                <h4 class="text-center mb-4 justify-content-center fw-bold ">Untuk dapat memesan layanan grooming dapat
                    mengisi
                    form di bawah ini.</h4>
            </div>
            <x-form-grooming :services="$services" />
            <br><br>
           
        </section>
    @endslot
    @push('script')
        <script>
            function scrollToForm() {
                var element = document.getElementById('pesangrooming');
                element.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        </script>
        <script>
            document.getElementById('groomingForm').addEventListener('input', function() {
                var allFieldsFilled = true;
                var formFields = this.querySelectorAll('input[required], select[required]');
                formFields.forEach(function(field) {
                    if (!field.value.trim() || (field.type === 'checkbox' && !field.checked)) {
                        allFieldsFilled = false;
                    }
                });

                var setujuCheck = document.getElementById('setujuCheck');
                var submitBtn = document.getElementById('submitBtn');

                if (allFieldsFilled && setujuCheck.checked) {
                    submitBtn.removeAttribute('disabled');
                } else {
                    submitBtn.setAttribute('disabled', 'true');
                }
            });
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    selectable: true,
                    hiddenDays: [5], 
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                    },
                    dateClick: function(info) {
                        $('input[name=date]').val(info.dateStr)
                        $.ajax({
                            url: "{{ route('grooming.check-jadwal') }}",
                            type: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                                date: info.dateStr,
                            },
                            success: function(res) {
                                if (res.session.length == 0) {
                                    $(`.form-check label`).removeClass("disable");
                                    $(`input[name=sesi]`).prop("disabled", false);
                                }
                                res.session.forEach(element => {
                                    $(`label[for="${element.session}"]`).addClass(
                                        'disable');
                                    $(`input[value="${element.session}"]`).prop(
                                        "disabled", true);
                                });
                            }
                        })
                    },
                    selectAllow: function(selectInfo) {
                        //  create a day
                        var oneDay = 24 * 60 * 60 * 1000;
                        var startDay = selectInfo.start;
                        //  FullCalendar always gives next next day of select end day, so do minus one day
                        var endDay = selectInfo.end - oneDay;
                        var count = Math.round(Math.abs((startDay - endDay) / oneDay));
                        //  starts at 0, so add to start at 1
                        var dayCount = (count + 1);
                        if (dayCount < 2) {
                            return true;
                        } else {
                            return false;
                        }
                    },
                    validRange: {
                        start: Date.parse('{{ $date_start }}'),
                        end: Date.parse('{{ $date_end }}')
                    }
                });
                calendar.render();
            });
            $(document).ready(function() {
                $('input[type=radio][name=sesi]').change(function() {
                    time = this.value
                    $('input[name=session]').val(time)
                })
            })
        </script>
    @endpush


</x-user-page>
