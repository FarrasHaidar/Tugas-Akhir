<x-user-page>

    {{-- <body style="background: linear-gradient(to bottom, #fdf9e5, rgba(255, 242, 176, 0));"> --}}
    @slot('content')
        <img src="{{ asset('media/bg1.svg') }}" alt="bg1"
            style="margin-bottom: 0;
                        padding: 0;
                        width: 400px;
                        height: 500px;
                        z-index: -2;
                        position: absolute;
                        right: 0;
                        top:0;">

        <img src="{{ asset('media/rec-2.svg') }}" alt="rectangle2" class="persegi2 no-top">

        <section class="tentang-kami-container container">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-4 col-12 mt-2 mt-md-0 d-flex justify-md-content-center">
                        <div class="mx-auto circle-container">
                            <img src="{{ asset('media/cat-1.svg') }}" alt="Kucing Pertama"
                                style="width: 300px; height: 300px;" class=" animated-bounce">
                        </div>

                    </div>
                    <div class="col-lg-8 col-12 ">
                        <h1 class="fw-bold mb-3 animated-bounce" id="header" style="margin-left: 0;">
                            Penuhi Kebutuhan Hewan Peliharaan Anda!</h1>
                        <h3 class="animate__animated animate__bounce"
                            style="margin-left: 0;
                    max-width:680px; text-align:justify;">Selamat datang
                            di <strong class="fw-bold text-warning"> Orino
                                Petshop. </strong>
                            Temukan kehangatan dan perawatan yang tak terlupakan untuk teman berbulu anda.
                            Kami hadir untuk memastikan kebahagiaan dan kenyamanan maksimal
                            bagi hewan peliharaan anda.</h3>
                    </div>
                </div>
                <br><br>
                <a href="#tentang-kami"class="text-decoration-none arrow w-100 d-flex align-items-center flex-column mt-5">
                    <div class="text-dark">Find More</div>
                    <img src="{{ asset('media/arrow.svg') }}" alt="arrow icon">
                </a>
            </div>
        </section>

        <section id="tentang-kami" class="tentang-kami-container container">
            <img src="{{ asset('media/rec-1.svg') }}" alt="rectangle1" class="persegi1">
            <div style="text-align: center;">
                <h1 class="fw-bold mb-3">
                    Orino Petshop
                </h1>
                <div id="garis-bawah" class="garisbawah mb-4"></div>
                <br>
                <h4><strong class="fw-bold text-warning">Orino Petshop</strong> hadir untuk memenuhi kebutuhan hewan peliharaan Anda. Tersedia layanan grooming,
                    pet hotel dan pakan untuk hewan peliharaan. Dengan layanan grooming berkualitas tinggi
                    juga bervariasi dan penginapan yang nyaman
                    bagi anabul. Orino Petshop, tempat di mana kebahagiaan hewan
                    peliharaan dimulai. Layanan kami akan memberikan kenyamanan
                    dan keamanan untuk mereka.</h4>

                <div id="demo" class="carousel slide mt-4" data-bs-ride="carousel">

                    <!-- Indicators/dots -->
                    <div class="carousel-indicators mb-4">
                        <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                        <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                        <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                    </div>

                    <!-- The slideshow/carousel -->
                    <div class="carousel-inner">
                        <div class="carousel-item active" style="background-color: transparent !important">
                            <img src="{{ asset('media/kami-1.svg') }}" alt="syarat-1" class="d-inline w-50">
                            <div class="fw-bold text-secondary mt-2">Tersedia Makanan Kucing dan Anjing</div>
                        </div>
                        <div class="carousel-item pulse" style="background-color: transparent !important">
                            <img src="{{ asset('media/kami-2.svg') }}" alt="syarat-2" class="d-inline w-50">
                            <div class="fw-bold text-secondary mt-2">Tersedia Layanan Grooming Kucing</div>
                        </div>
                        <div class="carousel-item pulse" style="background-color: transparent !important">
                            <img src="{{ asset('media/kami-3.svg') }}" alt="syarat-3" class="d-inline w-50">
                            <div class="fw-bold text-secondary mt-2">Tersedia Layanan Pet Hotel Kucing</div>
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

        <section id="layanan-kami" class="layanan-kami-container container">
            <img src="{{ asset('media/rec-2.svg') }}" alt="rectangle2" class="persegi2">
            <div style="text-align: center;">
                <h1 class="fw-bold mb-3">
                    Layanan Kami
                </h1>
                <div id="garis-bawah" class="garisbawah mb-4"></div>
                <br>
                <h4 class="layanan-kami-text">
                    Jadikan pengalaman perawatan hewan peliharaan Anda istimewa
                    dengan layanan <strong>Grooming</strong> kami yang penuh kasih sayang, memberikan sentuhan
                    kecantikan dan kesehatan yang tak terlupakan. Berikan mereka kenyamanan tempat
                    dengan fasilitas <strong>Pet Hotel</strong> kami, tempat di mana kenyamanan dan
                    kebahagiaan hewan peliharaan menjadi prioritas utama.
                </h4>
            </div>
            <img src="{{ asset('media/bg3.svg') }}" alt="bg1"
                style="margin-bottom: 0;
                padding: 0;
                width: 400px;
                height: 500px;
                z-index: -2;
                position: absolute;
                left: 0;
                animation: fadeInAnimation 2s ease-in-out forwards">

            <div class="foto-container row">
                <div class="foto-item bounce col-xl-6 col-12">
                    <img src="{{ asset('media/g1.svg') }}" alt="grooming1" class="hidden fadeInOnScroll"
                        style="width: 160px; height: 160px; margin-top: 180px;">
                    <img src="{{ asset('media/cat-2.svg') }}" alt="Kucing Pertama" class="hidden fadeInOnScroll"
                        style="width: 180px; height: 180px; margin-top: 20px;">
                    <img src="{{ asset('media/g2.svg') }}" alt="grooming2" class="hidden fadeInOnScroll no-mt"
                        style="width: 160px; height: 160px; margin-top: 180px;">
                    <h4 class="teks-foto fw-bold">Grooming</h4>
                    <h5 style="max-width: 300px; text-align: center;">Tersedia berbagai
                        jenis layanan <strong>grooming</strong> dengan tingkatan yang berbeda</h5>
                    <button class="service-item btn button" style="margin-top:30px;"
                        onclick="toggleDetailGrooming(event)">Expand</button>
                    <div class="service-item-grooming-detail">
                        <h3 class="fw-bold" style="color: #0f65c6">Jenis Grooming</h3>
                        <h5 class="jenis-grooming fw-bold text-center">
                            <ul>
                                <li>Grooming Biasa</li>
                                <li>Grooming Kutu</li>
                                <li>Grooming Jamur</li>
                                <li>Grooming Komplit</li>
                                <a href="{{ route('grooming_page') }}">
                                    <img src="{{ asset('media/grooming-icon.svg') }}" alt="Grooming Icon"></a>
                            </ul>
                        </h5>
                    </div>
                </div>

                <div class="foto-item bounce col-xl-6 col-12">
                    <img src="{{ asset('media/ph1.svg') }}" alt="pethotel1" class="hidden fadeInOnScroll"
                        style="width: 160px; height: 160px; margin-top:160px;">
                    <img src="{{ asset('media/pet hotel.svg') }}" alt="Pet Hotel" class="hidden fadeInOnScroll"
                        style="width: 180px; height: 180px; margin-top:20px;">
                    <img src="{{ asset('media/ph2.svg') }}" alt="pethotel2" class="hidden fadeInOnScroll no-mt"
                        style="width: 160px; height: 160px; margin-top:180px;">
                    <h4 class="teks-foto fw-bold">Pet Hotel</h4>
                    <h5 style="max-width: 300px; text-align: center;">Tersedia layanan <strong>pet hotel</strong>
                        untuk tempat menginap sementara hewan peliharaan</h5>
                    <button class="service-item btn button" style="margin-top:30px;"
                        onclick="toggleDetailPh(event)">Expand</button>
                    <div class="service-item-ph-detail">
                        <h3 class="fw-bold text-warning">Fasilitas Pet Hotel</h3>
                        <h5 class="fasilitas-pethotel fw-bold text-center" style="max-width: 400px;">
                            <ul>
                                <li>Kandang Alumunium 2 Lantai</li>
                                <li>Medical Check Up</li>
                                <li>Litter Box & Pasir</li>
                                <li>Air Minum</li>
                                <li>Free Grooming Minimal 10 Hari</li>
                                <li>Pengawasan Setiap Hari</li>
                                <li>Kotoran Bekas Air Mata Selalu Dibersihkan</li>
                                <li>Laporan Kondisi Hewan Via Whatsapp</li>
                                <li>Bisa Request Jadwal Makan Kucing (Misalnya: Pagi Dry Food,
                                    Siang Wet Food, dll)
                                </li>
                                <a href="{{ route('pethotel_page') }}">
                                    <img src="{{ asset('media/ph-icon.svg') }}" alt="PH Icon"></a>
                            </ul>
                        </h5>
                    </div>
                </div>
            </div>
        </section>

        <section id="feedback" class="contact-container mt-4">
            <img src="{{ asset('media/rec-1.svg') }}" alt="rectangle1" class="persegi1">
            <div style="text-align: center;">
                <h1 class="fw-bold mb-3">
                    Feedback
                </h1>
                <div id="garis-bawah" class="garisbawah mb-4"></div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-6">
                    <form class="contact-form ms-4" action="{{ route('feedback.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="inp-email" class="form-label fw-bold">Email address</label>
                            <input type="email" name="email" class="form-control" id="inp-email"
                                placeholder="example@gmail.com" required>
                        </div>
                        <div class="mb-3">
                            <label for="inp-phone" class="form-label fw-bold">Phone Number</label>
                            <input type="text" name="phone_number" class="form-control" id="inp-phone"
                                placeholder="Nomor HP" required>
                        </div>
                        <div class="mb-3">
                            <label for="inp-password" class="form-label fw-bold">Subject</label>
                            <input type="text" class="form-control" name="subject" id="inp-password"
                                placeholder="Subject" required>
                        </div>
                        <div class="mb-3">
                            <label for="inp-message" class="form-label fw-bold">Message</label>
                            <input type="text" class="form-control" id="inp-message" name="message"
                                placeholder="Pesan" required>
                        </div>
                        <div class="d-flex justify-content-center mt-5">
                            <button type="submit" class="btn button">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="col-12 col-lg-5">
                    <p class="contact-detail mt-5 p-md-5 text-center fw-bold">Berikan Kami feedback atau masukkan
                        untuk membantu kami dalam meningkatkan kualitas layanan. Feedback yang Anda berikan sangat
                        berpengaruh bagi kami untuk kedepannya.</p>
                </div>
            </div>
        </section>
    @endslot

    @push('script')
        <script>
            function toggleDetailGrooming(ev) {
                const target = $(ev.target);
                const item = target.closest(".foto-item");
                const detailGrooming = item.find(".service-item-grooming-detail");

                if (target.hasClass("active")) {
                    target.html("Expand").removeClass("active");
                    detailGrooming.slideUp();
                } else {
                    target.html("Close").addClass("active");
                    detailGrooming.slideDown();
                }
            }

            $(document).ready(function() {
                $(".service-item-grooming-detail").hide();
            });

            function toggleDetailPh(ev) {
                const target = $(ev.target);
                const item = target.closest(".foto-item");
                const detailPh = item.find(".service-item-ph-detail");

                if (target.hasClass("active")) {
                    target.html("Expand").removeClass("active");
                    detailPh.slideUp();
                } else {
                    target.html("Close").addClass("active");
                    detailPh.slideDown();
                }
            }

            $(document).ready(function() {
                $(".service-item-ph-detail").hide();
            });

            let slideIndex = 1;
            showSlides(slideIndex);

            function plusSlides(n) {
                showSlides(slideIndex += n);
            }

            function currentSlide(n) {
                showSlides(slideIndex = n);
            }

            function showSlides(n) {
                let i;
                let slides = document.getElementsByClassName("mySlides");
                let dots = document.getElementsByClassName("dot");
                if (n > slides.length) {
                    slideIndex = 1
                }
                if (n < 1) {
                    slideIndex = slides.length
                }
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";
                }
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" active", "");
                }
                slides[slideIndex - 1].style.display = "block";
                dots[slideIndex - 1].className += " active";
            }
        </script>
    @endpush
</x-user-page>
