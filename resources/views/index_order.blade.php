<x-user-page>
    @slot('content')
        <section class="container">
            <div class="row gap-lg-0 gap-4">
                <div class="col-lg-6 col-12">
                    <!-- Grooming Orders -->
                    <div class="card">
                        <div class="card-header fw-bold" style="background-color: #FFEFB0">{{ __('Pet Hotel Orders') }}</div>
                        <x-order-card :orders="$pethotelOrders"></x-order-card>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <!-- Pet Hotel Orders -->
                    <div class="card">
                        <div class="card-header fw-bold" style="background-color: #FFEFB0">{{ __('Grooming Orders') }}</div>
                        <x-order-card :orders="$groomingOrders"></x-order-card>
                    </div>
                </div>
            </div>
        </section>
    @endslot
</x-user-page>
