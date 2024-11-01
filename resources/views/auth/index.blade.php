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
            background-image: url('https://media.licdn.com/dms/image/v2/C561BAQHZ1LsCADtjng/company-background_10000/company-background_10000/0/1622176031725/full_time_training_in_indonesia_cover?e=2147483647&v=beta&t=c__U5xw5XCMbanX3omcqcUGMuk0sOhSn0APMvbEt5mg');
            background-size: cover;
            background-position: center;
            height: 100vh;
        }
        .card {
            margin-top: 200px;
            background-color: rgba(255, 255, 255, 0.4);
            backdrop-filter: blur(2px);
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }
        .custom-title {
            font-family: 'Alike', sans-serif;
            font-weight: bold;
        }
        .btn-custom {
            background-color: #1756A0;
            color: #ffffff;
        }
        .btn-custom:hover {
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
                    <h1 class="card-title custom-title text-center">JURNAL <br> FTTI</h1>
                    <form action="{{ route('auth.login') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">NIP</label>
                            <input type="text" class="form-control" name="nip" id="nip" required>
                            @if ($errors->has('nip'))
                                <div class="text-danger">{{ $errors->first('nip') }}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" required>
                            @if ($errors->has('password'))
                                <div class="text-danger">{{ $errors->first('password') }}</div>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-custom w-100">Login</button>
                        <a class="btn btn-info w-100 mt-2" href="{{ route('auth.cek') }}">Cek Data</a>
                    </form>
                    
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
