@extends('layouts.app')

@section('title', 'Chart')

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            {{-- <h1>Tambah FAQ Baru</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">FAQ</div>
            </div> --}}
        </div>

        <div class="section-body">
            <h2 class="section-title">Chart</h2>

            <div class="card">
                <div class="card-body">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    const ctx = document.getElementById('myChart');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [
                {
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    borderWidth: 1
                },
                {
                    label: '# of Votes 2',
                    data: [11, 12, 13, 14, 15, 16],
                    borderWidth: 1
                },
                {
                    label: '# of Votes 3',
                    data: [21, 22, 23, 24, 25, 26],
                    borderWidth: 1
                },
            ]
        },
        options: {
            plugins: {
                title: {
                    display: true,
                    text: 'Chart.js Bar Chart - Stacked'
                },
            },
            responsive: true,
            scales: {
                x: {
                    stacked: true,
                },
                y: {
                    stacked: true
                }
            }
        }
    });
</script>
@endsection