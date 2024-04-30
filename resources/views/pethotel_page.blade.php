<x-user-page>
    @slot('content')
        <section class="container">
            <div class="row flex-xl-row flex-column-reverse gap-xl-0 gap-3">
                <div class="col-xl-6 col-12 ">
                    <h1 class="judul fw-bold mb-3" style="margin-left: 0;">
                        Apa itu Layanan Pet Hotel?</h1>
                    <h4 class="animate__animated animate__headShake text-justify">
                        <strong> Pet Hotel </strong> adalah penginapan sementara untuk hewan peliharaan dengan fokus pada
                        kenyamanan dan perawatan optimal. Kami juga memberikan perawatan khusus demi kesejahteraan dan
                        kebahagiaan
                        hewan peliharaan Anda.
                    </h4>
                    <br>
                    <h4 class="animate__animated animate__bounce text-justify">
                        <strong> Pet Hotel </strong> memberikan pengalaman menginap yang aman dan menyenangkan bagi
                        hewan peliharaan.
                    </h4>
                    <br><br><br><br>
                    <button class="mx-auto btn btn-warning text-black fw-bold d-block judul pesan"
                        onclick="scrollToForm()">Pesan
                        Sekarang</button>
                </div>

                <div class="col-xl-6 col-12">
                    <img src="{{ asset('media/bg2.svg') }}" alt="bg2"
                        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: -1;">

                    <div class="row">
                        <div class="col-6 d-flex justify-content-center">
                            <div class="ph-image w-md-100 w-75">
                                <img src="{{ asset('media/ph-1.svg') }}" alt="Ph Image 1" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-6 d-flex justify-content-center">
                            <div class="ph-image w-md-100 w-75">
                                <img src="{{ asset('media/ph-2.svg') }}" alt="Ph Image 2" class="img-fluid">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-6 position-relative d-flex justify-content-center"
                            style="left: 50%; transform: translateX(-50%);">
                            <div class="ph-image w-md-100 w-75">
                                <img src="{{ asset('media/ph-3.svg') }}" alt="Ph Image 3" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <section id="fasilitas-ph" class="fasilitas-ph-container container">
            <div style="text-align: center;">
                <h1 class="fw-bold mb-3">
                    Syarat Pet Hotel
                </h1>
                <div id="garis-bawah" class="garisbawah mb-4"></div>
                <br>
                <h4>Hanya dengan<strong class="fw-bold text-warning"> Rp30.000 
                    </strong> per hari nya, Kami menawarkan penginapan khusus untuk hewan peliharaan Anda dengan
                    perhatian dan kenyamanan maksimal. Berikut persayaratan dalam layanan Kami:</h4>

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
                            <img src="{{ asset('media/syarat-1.svg') }}" alt="syarat-1" class="d-inline w-25">
                        </div>
                        <div class="carousel-item" style="background-color: transparent !important">
                            <img src="{{ asset('media/syarat-2.svg') }}" alt="syarat-2" class="d-inline w-25">
                        </div>
                        <div class="carousel-item" style="background-color: transparent !important">
                            <img src="{{ asset('media/syarat-3.svg') }}" alt="syarat-3" class="d-inline w-25">
                        </div>
                        <div class="carousel-item" style="background-color: transparent !important">
                            <img src="{{ asset('media/syarat-4.svg') }}" alt="syarat-4" class="d-inline w-25">
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

        <section id="pesan-ph" class="pesan-ph-container container">
            <div style="text-align: center;">
                <h1 class="fw-bold mb-3" id="pesanpethotel">
                    Pesan Pet Hotel
                </h1>
                <div id="garis-bawah" class="garisbawah mb-4"></div>
                <br>
                <h4 class="text-center mb-4 justify-content-center fw-bold ">Untuk dapat memesan layanan pet hotel dapat
                    mengisi
                    form di bawah ini.</h4>
            </div>
            <x-form-pet-hotel />
            <br><br>
        </section>
    @endslot
    @push('script')
        <script>
            function scrollToForm() {
                var element = document.getElementById('pesanpethotel');
                element.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
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
                var invalidDates = {!! json_encode($invalidDates) !!}
                var events = [];
                invalidDates.forEach(function(element) {
                    events.push({
                        start: element,
                        end: element,
                        display: "background",
                        overlap: false
                    })
                })
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    selectable: true,
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                    },
                    events: events,
                    select: function(selectInfo) {
                        $('input[name=start_date]').val(selectInfo.startStr)
                        var end_date = new Date(selectInfo.endStr)
                        var end_date_str = new Date(end_date.setDate(end_date.getDate() - 1))
                            .toLocaleDateString('en-CA')
                        $('input[name=end_date]').val(end_date_str)

                        invalidDates.forEach((element) => {
                            invalid = new Date(element).getTime()
                            start_date = new Date(selectInfo.startStr).getTime()
                            end_date = new Date(selectInfo.endStr).getTime()
                            if (start_date <= invalid && end_date >= invalid) {
                                Swal.fire({
                                    title: 'Hari yang anda pilih sudah penuh!',
                                    text: 'Silahkan Memilih Hari Lain',
                                    icon: 'error',
                                    confirmButtonText: 'Tutup'
                                })
                                $('input[name=start_date]').val("")
                                $('input[name=end_date]').val("")
                            }
                        })
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
