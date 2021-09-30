@extends('layouts.template')

@section('title', 'My データ | 金額')

@section('content')

<div id="books-graph" class="container">
    
    <h1>My データ</h1>
    
    <div class="col-md-8 mx-auto">
        
    <div class="row button">
        <div class="col">
            <a href="{{ url('admin/books/graph1') }}">量</a>
        </div>
        <div class="col">
            <a href="{{ url('admin/books/graph2') }}">金額</a>
        </div>
        <div class="col">
            <a href="{{ url('admin/books/graph3') }}">特徴</a>
        </div>
    </div>
    
    <div class="graph_col">
        <h2>金額合計（月単位）</h2>
        <div class="card card-body">
            <canvas id="myChart"></canvas>
            <!-- グラフを描画 -->
            <script>
            window.onload = function() {
                var ChartData;
                var ctx = document.getElementById('myChart').getContext('2d');
                ChartData = new Chart(ctx, {
                type: "line",    // ★必須　グラフの種類
                data: {
                        labels:  [
                                    @foreach($arrCount as $key => $month)
                                    "{{ $key }}",
                                    @endforeach
                                ],  //Ｘ軸のラベル
                        datasets: [{
                                    label: "金額",    // 系列名
                                    data: [
                                            @foreach($arrCount as $month)
                                            {{ $month }},
                                            @endforeach
                                    ],  // ★必須　系列Ａのデータ
                                    backgroundColor: 'rgba(183,85,85, 1.0)',
                                    borderColor: 'rgba(183,85,85, 1.0)',
                                    fill: false,
                                    lineTension: 0,
                                    borderWidth: 2
                                }]
                        },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                callback: function(value) {if (value % 1 === 0) {return value;}}
                                    }
                                }]
                            }
                        }
                });
            }
            </script>
            <!-- グラフを描画 -->
        </div>
    </div>
    
    <div class="data_col">
        <div class="card card-body">
                今月　<span>{{ $this_month }}</span>円
        </div>
        <div class="card card-body">
                先月　<span>{{ $last_month }}</span>円
        </div>
        <div class="card card-body">
                差額　<span>{{ $difference_month }}</span>円
        </div>
        <div class="card card-body">
                総額（今年）　<span>{{ array_sum($arrCount) }}</span>円
        </div>
    </div>
    
    </div>
    
</div>

@endsection