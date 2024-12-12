@extends('Admin.layout.main')

@section('content')

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1>Trainee Dashboard</h1>
        </div>
      </div>
    </div>
  </section>

  <!-- Main content -->
  <div class="container-fluid">
    <div class="row">
      <!-- Profil Card -->
      <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title text-bold">{{$trainee->name}}</h5> <br>
            <ul class="list-unstyled">
              <li><strong>Batch:</strong> {{$trainee->batch}}</li>
              <li><strong>Nip:</strong> {{$trainee->nip}}</li>
              <li><strong>Asisten Sekarang:</strong> {{$trainee->asisten_id}}</li>
            </ul>
            <a href="mailto:{{$trainee->nip}}" class="btn btn-primary">Hubungi</a>
            <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#traineeHistoryModal">Lihat Riwayat</button>
          </div>
        </div>

        <div class="card">
          <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs" id="traineeTabs" role="tablist">
              <li class="nav-item" role="presentation">
                <a class="nav-link active" id="semester1Tab" data-bs-toggle="tab" href="#semester1" role="tab" aria-controls="semester1" aria-selected="true">Semester 1</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="semester2Tab" data-bs-toggle="tab" href="#semester2" role="tab" aria-controls="semester2" aria-selected="false">Semester 2</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="semester3Tab" data-bs-toggle="tab" href="#semester3" role="tab" aria-controls="semester3" aria-selected="false">Semester 3</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="semester4Tab" data-bs-toggle="tab" href="#semester4" role="tab" aria-controls="semester4" aria-selected="false">Semester 4</a>
              </li>
            </ul>
          </div>
          <div class="card-body">
            <div class="tab-content" id="traineeTabsContent">
              <div class="tab-pane fade show active" id="semester1" role="tabpanel" aria-labelledby="semester1Tab">
                <a href="#" class="btn btn-primary m-1" onclick="updateChart('semester1', 'bibleReading')">Bible Reading</a>
                <a href="#" class="btn btn-primary m-1" onclick="updateChart('semester1', 'memorizingVerses')">Memorizing Verses</a>
                <a href="#" class="btn btn-primary m-1" onclick="updateChart('semester1', 'hymns')">Hymns</a>
                <!-- Tambahkan tombol lainnya sesuai kebutuhan -->
              </div>
              <div class="tab-pane fade" id="semester2" role="tabpanel" aria-labelledby="semester2Tab">
                <a href="#" class="btn btn-primary m-1" onclick="updateChart('semester2', 'bibleReading')">Bible Reading</a>
                <a href="#" class="btn btn-primary m-1" onclick="updateChart('semester2', 'memorizingVerses')">Memorizing Verses</a>
                <a href="#" class="btn btn-primary m-1" onclick="updateChart('semester2', 'hymns')">Hymns</a>
                <!-- Tambahkan tombol lainnya sesuai kebutuhan -->
              </div>
              <!-- Tambahkan tab untuk semester lainnya sesuai kebutuhan -->
            </div>
          </div>
        </div>
      </div>

      <!-- Grafik Kemajuan -->
      <div class="col-lg-8 col-md-12 col-sm-12 mb-4">
        <div class="card">
          <div class="card-header">
            <h5>Grafik Kemajuan Trainee</h5>
          </div>
          <div class="card-body">
            <canvas id="progressChart" width="400" height="200"></canvas>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Riwayat Trainee -->
    <div class="modal fade" id="traineeHistoryModal" tabindex="-1" aria-labelledby="traineeHistoryModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="traineeHistoryModalLabel">Riwayat Trainee</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <ul>
              <li>Task 1: Selesai - 80%</li>
              <li>Task 2: Selesai - 60%</li>
              <li>Task 3: Sedang dikerjakan - 40%</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Script untuk Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    let chart = null;

    // Dummy data untuk setiap semester dan aktivitas
    const dataSemester1 = {
      bibleReading: [10, 20, 30, 40, 50, 60, 70, 80, 90, 100, 90, 80],
      memorizingVerses: [15, 25, 35, 45, 55, 65, 75, 85, 95, 100, 90, 70],
      hymns: [5, 15, 25, 35, 45, 55, 65, 75, 85, 95, 90, 80],
    };

    // Fungsi untuk mengupdate grafik
    function updateChart(semester, activity) {
      let data = [];
      if (semester === 'semester1') {
        data = dataSemester1[activity];
      }
      
      // Cek jika grafik sudah ada, jika ada maka kita update
      if (chart) {
        chart.destroy();
      }

      const ctx = document.getElementById('progressChart').getContext('2d');
      chart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4', 'Week 5', 'Week 6', 'Week 7', 'Week 8', 'Week 9', 'Week 10', 'Week 11', 'Week 12'],
          datasets: [{
            label: activity.replace(/([A-Z])/g, ' $1').trim(),
            data: data,
            borderColor: '#006A67',
            backgroundColor: 'rgba(0, 106, 103, 0.2)',
            fill: true,
            tension: 0.4
          }]
        },
        options: {
          responsive: true,
          plugins: {
            legend: {
              position: 'top',
            },
            tooltip: {
              callbacks: {
                label: function(tooltipItem) {
                  return tooltipItem.raw + '%';
                }
              }
            }
          },
          scales: {
            y: {
              beginAtZero: true,
              ticks: {
                stepSize: 10
              }
            }
          }
        }
      });
    }
  </script>

  <!-- Bootstrap 5 JavaScript Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

@endsection
