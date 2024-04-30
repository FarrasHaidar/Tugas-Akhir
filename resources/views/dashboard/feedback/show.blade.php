<x-dashboard>
    @slot('content')
        <div class="row">
            <div class="form-group mb-2">
                <label>Email</label>
                <input type="email" name="owner" placeholder="Nama" class="form-control" value="{{ $feedback->email }}"
                    readonly />
            </div>
            <div class="form-group mb-2">
                <label>Nomor Telepon</label>
                <input type="text" name="phone_number" placeholder="Alamat" class="form-control" readonly
                    value="{{ $feedback->phone_number }}" />
            </div>
            <div class="form-group mb-2">
                <label>Subject</label>
                <input type="text" name="subject" placeholder="0821..." class="form-control" readonly
                    value="{{ $feedback->subject }}" />
            </div>
            <div class="form-group mb-2">
                <label>Pesan</label>
                <textarea name="" class="form-control" id="" cols="30" rows="10" readonly>{{ $feedback->message }}</textarea>
            </div>
        </div>
    @endslot
</x-dashboard>
