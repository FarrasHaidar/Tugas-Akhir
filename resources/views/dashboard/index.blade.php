<x-dashboard>
    @slot('content')
        <div class="row">
            <!-- Grooming Card -->
            <div class="col-md-6">
                <div class="card mb-4">
                    <a href="{{ route('admin.grooming.index') }}">
                        <img src="{{ asset('media/adm-grooming.svg') }}" class="card-img-top mx-auto d-block" alt="Grooming">
                        <hr class="hr-view">
                    </a>
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">Grooming</h5>
                        <p class="card-text">Lihat Data Pemesanan Grooming</p>
                    </div>
                </div>
            </div>

            <!-- Pet Hotel Card -->
            <div class="col-md-6">
                <div class="card mb-4">
                    <a href="{{ route('admin.pethotel.index') }}">
                        <img src="{{ asset('media/adm-ph.svg') }}" class="card-img-top mx-auto d-block" alt="Pet Hotel">
                        <hr class="hr-view">
                    </a>
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">Pet Hotel</h5>
                        <p class="card-text">Lihat Data Pemesanan Pet Hotel</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <!-- Orders Card -->
            <div class="col-md-6">
                <div class="card mb-4">
                    <a href="{{ route('admin.order.index') }}">
                        <img src="{{ asset('media/adm-order.svg') }}" class="card-img-top mx-auto d-block" alt="Orders">
                        <hr class="hr-view">
                    </a>
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">Orders</h5>
                        <p class="card-text">Lihat Semua Data Order</p>
                    </div>
                </div>
            </div>

            <!-- Feedback Card -->
            <div class="col-md-6">
                <div class="card mb-4">
                    <a href="{{ route('admin.feedback.index') }}">
                        <img src="{{ asset('media/adm-feedback.svg') }}" class="card-img-top mx-auto d-block"
                            alt="Feedback">
                        <hr class="hr-view">
                    </a>
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">Feedback</h5>
                        <p class="card-text">Lihat Semua Data Feedback dari Pelanggan</p>
                    </div>
                </div>
            </div>
        </div>
    @endslot
</x-dashboard>
