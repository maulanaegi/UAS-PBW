@extends('admin.layouts.main')

@section('container')
  <div class="container">
    <div class="page-inner">
      <div
        class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
      >
        <div>
          <h3 class="fw-bold mb-3">Dashboard</h3>
        </div>
      </div>

      <div class="row">
        <!-- Statistik Pengguna -->
        <div class="col-sm-6 col-md-4">
          <div class="card card-stats card-round">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-icon">
                  <div
                    class="icon-big text-center icon-primary bubble-shadow-small"
                  >
                    <i class="fas fa-users"></i>
                  </div>
                </div>
                <div class="col col-stats ms-3 ms-sm-0">
                  <div class="numbers">
                    <p class="card-category">User</p>
                    <h4 class="card-title">{{ $userCount }}</h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Statistik Provider -->
        <div class="col-sm-6 col-md-4">
          <div class="card card-stats card-round">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-icon">
                  <div
                    class="icon-big text-center icon-info bubble-shadow-small"
                  >
                    <i class="fas fa-user-check"></i>
                  </div>
                </div>
                <div class="col col-stats ms-3 ms-sm-0">
                  <div class="numbers">
                    <p class="card-category">Provider</p>
                    <h4 class="card-title">{{ $providerCount }}</h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Statistik Layanan -->
        <div class="col-sm-6 col-md-4">
          <div class="card card-stats card-round">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-icon">
                  <div
                    class="icon-big text-center icon-success bubble-shadow-small"
                  >
                    <i class="fas fa-luggage-cart"></i>
                  </div>
                </div>
                <div class="col col-stats ms-3 ms-sm-0">
                  <div class="numbers">
                    <p class="card-category">Layanan</p>
                    <h4 class="card-title">{{ $serviceCount }}</h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Total Pendapatan -->
        <div class="col-sm-6 col-md-4 mt-4">
          <div class="card card-stats card-round">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-icon">
                  <div
                    class="icon-big text-center icon-warning bubble-shadow-small"
                  >
                    <i class="fas fa-dollar-sign"></i>
                  </div>
                </div>
                <div class="col col-stats ms-3 ms-sm-0">
                  <div class="numbers">
                    <p class="card-category">Total Pendapatan</p>
                    <h4 class="card-title">Rp. {{ number_format($totalRevenue, 0, ',', '.') }}</h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Total Pendapatan Admin -->
        <div class="col-sm-6 col-md-4 mt-4">
          <div class="card card-stats card-round">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-icon">
                  <div class="icon-big text-center icon-primary bubble-shadow-small">
                    <i class="fas fa-wallet"></i>
                  </div>
                </div>
                <div class="col col-stats ms-3 ms-sm-0">
                  <div class="numbers">
                    <p class="card-category">Pendapatan Admin</p>
                    <h4 class="card-title">Rp. {{ number_format($totalAdminEarnings, 0, ',', '.') }}</h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Total Pendapatan Provider -->
        <div class="col-sm-6 col-md-4 mt-4">
          <div class="card card-stats card-round">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-icon">
                  <div class="icon-big text-center icon-success bubble-shadow-small">
                    <i class="fas fa-hand-holding-usd"></i>
                  </div>
                </div>
                <div class="col col-stats ms-3 ms-sm-0">
                  <div class="numbers">
                    <p class="card-category">Pendapatan Provider</p>
                    <h4 class="card-title">Rp. {{ number_format($totalProviderEarnings, 0, ',', '.') }}</h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Statistik Transaksi -->
        <div class="col-sm-6 col-md-4">
          <div class="card card-stats card-round">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-icon">
                  <div
                    class="icon-big text-center icon-secondary bubble-shadow-small"
                  >
                    <i class="far fa-check-circle"></i>
                  </div>
                </div>
                <div class="col col-stats ms-3 ms-sm-0">
                  <div class="numbers">
                    <p class="card-category">Transaksi</p>
                    <h4 class="card-title">
                      Selesai: {{ $transactionsCompleted }}<br>
                      Dalam Proses: {{ $transactionsInProgress }}<br>
                      Pending: {{ $transactionsPending }}<br>
                      Dibatalkan: {{ $transactionsCancelled }}
                    </h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


        <!-- Statistik Ulasan -->
        <div class="col-sm-6 col-md-4 mt-4">
          <div class="card card-stats card-round">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-icon">
                  <div
                    class="icon-big text-center icon-danger bubble-shadow-small"
                  >
                    <i class="fas fa-star"></i>
                  </div>
                </div>
                <div class="col col-stats ms-3 ms-sm-0">
                  <div class="numbers">
                    <p class="card-category">Ulasan</p>
                    <h4 class="card-title">{{ $reviewCount }} Ulasan</h4>
                    <p class="card-category">Rata-rata Rating: {{ $averageRating }} / 5</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Filter Transaksi Harian -->
        <div class="col-md-12 mt-4">
          <div class="card">
              <div class="card-header">
                  <h4 class="card-title">Statistik Transaksi Harian</h4>
                  <form method="GET" action="{{ route('admin.dashboard') }}">
                      <div class="input-group">
                          <input type="date" name="daily_date" class="form-control" value="{{ request('daily_date') }}">
                          <button type="submit" class="btn btn-primary">Filter</button>
                      </div>
                  </form>
              </div>
              <div class="card-body">
                  <canvas id="dailyTransactionChart" height="100"></canvas>
              </div>
          </div>
        </div>

        <!-- Filter Pendapatan Harian -->
        <div class="col-md-12 mt-4">
          <div class="card">
              <div class="card-header">
                  <h4 class="card-title">Pendapatan Harian</h4>
                  <form method="GET" action="{{ route('admin.dashboard') }}">
                      <div class="input-group">
                          <input type="date" name="daily_revenue_date" class="form-control" value="{{ request('daily_revenue_date') }}">
                          <button type="submit" class="btn btn-primary">Filter</button>
                      </div>
                  </form>
              </div>
              <div class="card-body">
                  <canvas id="dailyRevenueChart" height="100"></canvas>
              </div>
          </div>
        </div>

        <!-- Filter Pendapatan Bulanan -->
        <div class="col-md-12 mt-4">
          <div class="card">
              <div class="card-header">
                  <h4 class="card-title">Pendapatan Bulanan</h4>
                  <form method="GET" action="{{ route('admin.dashboard') }}">
                      <div class="input-group">
                          <input type="month" name="monthly_revenue_month" class="form-control" value="{{ request('monthly_revenue_month') }}">
                          <button type="submit" class="btn btn-primary">Filter</button>
                      </div>
                  </form>
              </div>
              <div class="card-body">
                  <canvas id="monthlyRevenueChart" height="100"></canvas>
              </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    // Chart for daily transactions
    const dailyTransactionCtx = document.getElementById('dailyTransactionChart').getContext('2d');
    const dailyTransactionChart = new Chart(dailyTransactionCtx, {
        type: 'bar',
        data: {
            labels: @json($dailyTransactionDates), // Tanggal transaksi
            datasets: [
                {
                    label: 'Transaksi Selesai',
                    backgroundColor: '#28a745', // Hijau untuk completed
                    data: @json($dailyTransactionsCompleted), // Data transaksi selesai
                },
                {
                    label: 'Transaksi Pending',
                    backgroundColor: '#ffc107', // Kuning untuk pending
                    data: @json($dailyTransactionsPending), // Data transaksi pending
                },
                {
                    label: 'Transaksi Dibatalkan',
                    backgroundColor: '#dc3545', // Merah untuk canceled
                    data: @json($dailyTransactionsCancelled), // Data transaksi dibatalkan
                },
                {
                    label: 'Transaksi Dalam Proses',
                    backgroundColor: '#007bff', // Biru untuk in progress
                    data: @json($dailyTransactionsInProgress), // Data transaksi dalam proses
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });


    // Chart for daily revenue
    const dailyRevenueCtx = document.getElementById('dailyRevenueChart').getContext('2d');
    const dailyRevenueChart = new Chart(dailyRevenueCtx, {
      type: 'bar',
      data: {
        labels: @json($dailyRevenueDates),
        datasets: [
          {
            label: 'Pendapatan Admin',
            backgroundColor: '#007bff',
            data: @json($dailyAdminRevenue),
          },
          {
            label: 'Pendapatan Provider',
            backgroundColor: '#28a745',
            data: @json($dailyProviderRevenue),
          }
        ]
      },
      options: {
        responsive: true,
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });

    // Chart for monthly revenue
    const monthlyRevenueCtx = document.getElementById('monthlyRevenueChart').getContext('2d');
    const monthlyRevenueChart = new Chart(monthlyRevenueCtx, {
      type: 'line',
      data: {
        labels: @json($monthlyRevenueDates),
        datasets: [
          {
            label: 'Pendapatan Admin',
            borderColor: '#007bff',
            data: @json($monthlyAdminRevenue),
            fill: false,
          },
          {
            label: 'Pendapatan Provider',
            borderColor: '#28a745',
            data: @json($monthlyProviderRevenue),
            fill: false,
          }
        ]
      },
      options: {
        responsive: true,
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>
@endsection
