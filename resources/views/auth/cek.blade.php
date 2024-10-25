<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Alike&display=swap" rel="stylesheet">

    <style>
        body {
            background-image: url('https://media.licdn.com/dms/image/v2/C561BAQHZ1LsCADtjng/company-background_10000/company-background_10000/0/1622176031725/full_time_training_in_indonesia_cover?e=2147483647&v=beta&t=c__U5xw5XCMbanX3omcqcUGMuk0sOhSn0APMvbEt5mg'); /* Ganti dengan URL gambar Anda */
            background-size: cover;
            background-position: center;
            height: 100vh;
        }
        .card {
            margin-top: 200px;
            margin-bottom: auto;
            background-color: rgba(255, 255, 255, 0.4); /* Warna putih dengan transparansi 80% */
            backdrop-filter: blur(2px); /* Efek blur di belakang card */
            border-radius: 15px; /* Sudut bulat 4px */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }
        .custom-title {
            font-family: 'Alike', sans-serif; /* Menggunakan font Dent */
            font-weight: bold; /* Menetapkan font tebal */
        }
        .btn-custom{
            background-color: #1756A0;
            color: #ffffff;
        }
        .btn-custom:hover{
            background-color: #1756A0;
            color: #ffffff;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title custom-title text-capitalize text-bold text-center">JURNAL <BR> FTTI</BR></h1>
                    <form action="{{ route('trainee.cek') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <center>
                                <div>
                                    <label class="form-label">Nip</label>
                                    <input type="text" class="form-control" name="Cek_nip" value="{{ old('Cek_nip') }}" id="nip" required>
                                </div>
                               
                            </center>
                        </div>
                        <button type="submit" class="btn btn-custom w-100">Cek data</button>
                    </form>
                    <p></p>
                    @if (session('success'))
                    <div class="alert alert-success">
                            {{ session('success') }}
                            <a href="{{ url('/') }}">Login</a>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                            <a href="{{ url('/register') }}">Daftar</a>
                        </div>
                    @endif
                    <div class="text-center mt-3">
                        <p>FULL TIME TRAINING INDONESIA</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
