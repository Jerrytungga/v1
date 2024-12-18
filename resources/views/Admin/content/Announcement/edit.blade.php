@extends('Admin.layout.main')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Form Edit Announcement</h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header" style="background-color: #6A9C89;">
                        <a href="{{ route('Announcement.index') }}" class="btn text-light bg-dark ">
                        <i class="fas fa-arrow-left"></i>      
                        Back To View Announcement</a>
                    </div>
                    <!-- /.card-header --> 
                    <div class="card-body">
                        <form action="{{ route('Announcement.update', $announcement->id) }}" method="post">
                            @csrf
                            @method('PUT') <!-- Use PUT method for updating -->
                            <div class="modal-body">
                                <!-- Batch Field -->
                                <div class="form-group row">
                                    <label for="batch" class="col-sm-2 col-form-label">Batch</label>
                                    <div class="col-sm-10">
                                        <select name="angkatan" required class="form-control">
                                            <option value="">Select Batch</option>
                                            <option value="all" {{ $announcement->batch == 'all' ? 'selected' : '' }}>All</option>
                                            <option value="50" {{ $announcement->batch == '50' ? 'selected' : '' }}>50</option>
                                            <option value="52" {{ $announcement->batch == '52' ? 'selected' : '' }}>52</option>
                                            <option value="53" {{ $announcement->batch == '53' ? 'selected' : '' }}>53</option>
                                            <option value="54" {{ $announcement->batch == '54' ? 'selected' : '' }}>54</option>
                                            <option value="55" {{ $announcement->batch == '55' ? 'selected' : '' }}>55</option>
                                            <option value="56" {{ $announcement->batch == '56' ? 'selected' : '' }}>56</option>
                                            <option value="57" {{ $announcement->batch == '57' ? 'selected' : '' }}>57</option>
                                            <option value="58" {{ $announcement->batch == '58' ? 'selected' : '' }}>58</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Announcement Field -->
                                <div class="form-group row">
                                    <label for="Announcement" class="col-sm-2 col-form-label">Announcement</label>
                                    <div class="col-sm-10">
                                        <textarea name="announcement" required class="form-control">{{ $announcement->announcement }}</textarea>
                                    </div>
                                </div>

                                <!-- Status Field -->
                                <div class="form-group row">
                                    <label for="status" class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-sm-10">
                                        <select name="status" class="form-control" required>
                                            <option value="active" {{ $announcement->status == 'active' ? 'selected' : '' }}>Active</option>
                                            <option value="inactive" {{ $announcement->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <!-- Submit Button -->
                            <div class="modal-footer">
                                <button type="submit" class="btn" style="background-color: #006A67; color:floralwhite;"><i class="fas fa-pencil-alt"></i></button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>

@endsection
