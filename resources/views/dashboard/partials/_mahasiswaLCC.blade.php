<div class="d-flex mt-3">
    <div class="my-auto card-icon rounded-circle d-flex align-items-center justify-content-center"
        style="background-color: #9C0000">
        <i class="bi bi-mortarboard-fill text-white"></i>
    </div>
    <h1 class="my-auto ms-3">{{ $mahasiswaLCC }}</h1>
</div>

<div class="border my-3"></div>
<div class="row">
    @foreach ($kelasLCC as $item)
        <div class="col-4">
            <div class="row">
                <div class="col-lg-6">
                    <h5 class="fw-bold ">{{ $item->kelas }}</h5>
                </div>
                <div class="col-lg-1 titik-mobile">
                    <h5>:</h5>
                </div>
                <div class="col-lg-3">
                    <h5>
                        {{ $item->mahasiswa->filter(function ($mahasiswa) {
                                return $mahasiswa->status_ukm == 'Anggota LCC' || $mahasiswa->status_ukm == 'BPH';
                            })->count() }}
                    </h5>
                </div>
            </div>
        </div>
    @endforeach
</div>