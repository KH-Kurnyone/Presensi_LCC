@extends('master.indexadmin')
<title>Scan Barcode Kehadiran - E-Presence LCC</title>
@section('content')
    <video id="preview" style="width: 400px;"></video>
    <div id="notification" style="display:none; color: green;">Data kehadiran telah diperbarui!</div>
    <audio id="notification-sound" src="/assetsadmin/notification.mp3" preload="auto"></audio>
@endsection
@section('js_scaner')
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script>
        let scanner = new Instascan.Scanner({
            video: document.getElementById('preview')
        });

        scanner.addListener('scan', function(content) {
            // alert('Scanned content: ' + content);
            statusKehadiran(content);
        });

        Instascan.Camera.getCameras().then(function(cameras) {
            if (cameras.length > 0) {
                scanner.start(cameras[0]);
            } else {
                console.error('No cameras found.');
            }
        }).catch(function(e) {
            console.error(e);
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script>
        function statusKehadiran(nim) {
            $('#status-kehadiran-' + nim).val('Hadir').change();
            var audio = document.getElementById('notification-sound');
            audio.play();
        }
    </script>
    
    {{-- <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        let scanner = new Instascan.Scanner({
            video: document.getElementById('preview')
        });

        scanner.addListener('scan', function(content) {
            // Menyimpan data yang di-scan ke local storage
            localStorage.setItem('scannedContent', content);
            localStorage.setItem('scannedTime', new Date().getTime()); // Menyimpan waktu scan

            // Menampilkan notifikasi dan memainkan suara
            document.getElementById('notification').style.display = 'block';
            var audio = document.getElementById('notification-sound');
            audio.play();

            // Mengirim data ke halaman kehadiran dengan CSRF token
            $.ajax({
                url: '/kehadiran',
                type: 'POST',
                data: {
                    tanggal: '{{ now()->toDateString() }}', // Contoh tanggal, sesuaikan dengan format tanggal yang diinginkan
                    kegiatan_id: 1, // Ganti dengan id kegiatan yang sesuai
                    ket_kegiatan: 'Kegiatan ini adalah kegiatan yang dihadiri secara otomatis',
                    status_kehadiran: {
                        nim: content,
                        status_kehadiran: 'Hadir' // Contoh status kehadiran, sesuaikan dengan logika Anda
                    },
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    console.log('Data kehadiran berhasil diperbarui.');
                },
                error: function(xhr, status, error) {
                    console.error('Terjadi kesalahan: ' + error);
                    console.log(xhr.responseText); // Tampilkan response dari server untuk debug
                }
            });
        });

        Instascan.Camera.getCameras().then(function(cameras) {
            if (cameras.length > 0) {
                scanner.start(cameras[0]);
            } else {
                console.error('No cameras found.');
            }
        }).catch(function(e) {
            console.error(e);
        });
    </script> --}}
@endsection
