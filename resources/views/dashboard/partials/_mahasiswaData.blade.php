<div class="d-flex mt-3">
    <div class="my-auto card-icon rounded-circle d-flex align-items-center justify-content-center"
        style="background-color: #9C0000">
        <i class="bi bi-mortarboard-fill text-white"></i>
    </div>
    <h1 class="my-auto ms-3">{{ $mahasiswa }}</h1>
</div>

<div class="border my-3"></div>
<div class="row">
    @foreach ($kelas as $item)
        <div class="col-4">
            <div class="row">
                <div class="col-lg-6">
                    <p class="fw-bold">{{ $item->kelas }}</p>
                </div>
                {{-- <div class="col-lg-1 titik-mobile">
                    <p>:</p>
                </div> --}}
                <div class="col-lg-6">
                    <p>: {{ $item->mahasiswa->count() }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>
