<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JURNAL FTTI | Registration</title>
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
            margin-top: 300px;
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
            background-color: #807514;
            color: #ffffff;
        }
        .btn-custom:hover{
            background-color: #807514;
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
                    <form action="{{ route('auth.form') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <center>
                                <div>
                                    <label class="form-label">Enter Your Nip</label>
                                    <input type="text" class="form-control" name="nip" id="nip" required>
                                </div>
                                <div class="mt-2">
                                    <label class="form-label">Enter Your Name</label>
                                    <input type="text" class="form-control" name="nama" id="username" required>
                                </div>
                                <div class="mt-2">
                                    <label class="form-label">Please Select Your Assistant</label>
                                    <select name="asisten" class="form-control">
                                        <option value="">Pilih</option>
                                        @foreach ($asistens as $asisten)
                                            <option value="{{ $asisten->nip }}">{{ $asisten->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mt-2">
                                    <label class="form-label">Please Select Your Batch</label>
                                   <select name="angkatan" id="" class="form-control">
                                    <option value="50">50</option>
                                    <option value="51">51</option>
                                   </select>
                                </div>
                                <div class="mt-2">
                                    <label class="form-label">Please Select Your Semester</label>
                                   <select name="semester" id="" class="form-control">
                                    <option value="S1">Semester 1</option>
                                    <option value="S2">Semester 2</option>
                                    <option value="S3">Semester 3</option>
                                    <option value="S4">Semester 4</option>
                                 
                                   </select>
                                </div>
                                <div class="mt-2">
                                    <label class="form-label">Enter Your Password</label>
                                    <input type="text" class="form-control" name="sandi" id="username" required>
                                </div>
                            </center>
                        </div>
                        <button type="submit" name="daftar" class="btn btn-custom w-100">Register</button>
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
