@extends('main')
@section('title', 'Dashboard')

@section('content')
<!-- HTML -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<div class="row">
    <div class="col-6">
        <figure class="highcharts-figure">
                <div id="containerProdi"></div>
        </figure>
    </div>
    <div class="col-6">
        <figure class="highcharts-figure">
            <div id="containerSma"></div>
        </figure>
    </div>
    <div class="col-6">
        <figure class="highcharts-figure">
            <div id="containerTahun"></div>
        </figure>
    </div>
    <div class="col-6">
        <figure class="highcharts-figure">
            <div id="containerKelas"></div>
        </figure>
    </div>
</div>


<!-- CSS -->
 <style>
.highcharts-figure,
.highcharts-data-table table {
    min-width: 310px;
    max-width: 800px;
    margin: 1em auto;
}

#container {
    height: 400px;
}

.highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #ebebeb;
    margin: 10px auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
}

.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}

.highcharts-data-table th {
    font-weight: 600;
    padding: 0.5em;
}

.highcharts-data-table td,
.highcharts-data-table th,
.highcharts-data-table caption {
    padding: 0.5em;
}

.highcharts-data-table thead tr,
.highcharts-data-table tbody tr:nth-child(even) {
    background: #f8f8f8;
}

.highcharts-data-table tr:hover {
    background: #f1f7ff;
}

.highcharts-description {
    margin: 0.3rem 10px;
}

 </style>

 <!-- js -->
  <script>
Highcharts.chart('containerProdi', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jumlah Mahasiswa Berdasarkan Program Studi'
    },
    subtitle: {
        text:
            'Source: Universitas MDP '
    },
    xAxis: {
        categories: [@foreach ($mahasiswaProdi as $item)
        '{{ $item->nama }}',
        @endforeach],
        crosshair: true,
        accessibility: {
            description: 'Program Studi'
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Mahasiswa'
        }
    },
    tooltip: {
        valueSuffix: ' Mahasiswa'
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [
        {
            name: 'Mahasiswa',
            data: [@foreach ($mahasiswaProdi as $item)
            {{ $item->jumlah }},
            @endforeach]
        }
    ]
});

Highcharts.chart('containerSma', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jumlah Mahasiswa Berdasarkan Asal Sma'
    },
    subtitle: {
        text:
            'Source: Universitas MDP '
    },
    xAxis: {
        categories:
        [
            @foreach ($mahasiswaSma as $item)
                '{{ $item->asal_sma }}',
            @endforeach
        ],
        crosshair: true,
        accessibility: {
            description: 'Asal SMA'
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Asal SMA'
        }
    },
    tooltip: {
        valueSuffix: ' Mahasiswa'
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [
        {
            name: 'Mahasiswa',
            data:
            [
                @foreach ($mahasiswaSma as $item)
                    {{ $item->jumlah }},
                @endforeach
            ]
        }
    ]
});

Highcharts.chart('containerTahun', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jumlah Mahasiswa Tahun Masuk'
    },
    subtitle: {
        text:
            'Source: Universitas MDP '
    },
    xAxis: {
        categories:
        [
            @foreach ($mahasiswaTahun as $item)
                '20{{ $item->tahun }}',
            @endforeach
        ],
        crosshair: true,
        accessibility: {
            description: 'Tahun Masuk'
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Tahun Masuk'
        }
    },
    tooltip: {
        valueSuffix: ' Mahasiswa'
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [
        {
            name: 'Mahasiswa',
            data:
            [
                @foreach ($mahasiswaTahun as $item)
                    {{ $item->jumlah }},
                @endforeach
            ]
        }
    ]
});
Highcharts.chart('containerKelas', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jumlah Kelas Program Studi'
    },
    subtitle: {
        text:
            'Source: Universitas MDP '
    },
    xAxis: {
        categories: {!! json_encode($tahunAkademik) !!},
        crosshair: true,
        accessibility: {
            description: 'Prodi'
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Kelas'
        }
    },
    tooltip: {
        valueSuffix: ' Kelas'
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [
        @foreach ($prodiData as $prodiName => $data){
            name: '{{ $prodiName }}',
            data: {!! json_encode($data) !!}
        }
        @endforeach
    ]
});
  </script>
@endsection
