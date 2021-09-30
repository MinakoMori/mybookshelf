@extends('layouts.template')

@section('title', 'My データ | 特徴')

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
        <h2>ジャンルグラフ</h2>
        <div class="card card-body">
            <canvas id="myChart" style="height:400px;"></canvas>
            <script src="{{ secure_asset('js/chart_label.js') }}"></script>
            <!-- グラフを描画 -->
            <script>
            window.onpageshow = function() {
                var ChartData;
                var ctx = document.getElementById('myChart').getContext('2d');
                ChartData = new Chart(ctx, {
                type: "pie",    // ★必須　グラフの種類
                data: {
                        labels: ["友情", "恋愛", "アクション", "SF・ホラー", "ミステリー", "ファンタジー", "ヒストリー", "ノンフィクション", "エッセイ", "ビジネス"],
                        datasets: [{
                            backgroundColor: ["#f1c122","#df1b63","#c94444","#594684","#50998f","#d47faa","#ea6044","#b59e98","#7fc8ca","#4f6594"],
                            data: [{{ $genre_friendship_ratio }}, {{ $genre_love_ratio }}, {{ $genre_action_ratio }}, {{ $genre_sf_horror_ratio }}, {{ $genre_mystery_ratio }}, {{ $genre_fantasy_ratio }}, {{ $genre_history_ratio }}, {{ $genre_nonfiction_ratio }}, {{ $genre_essay_ratio }}, {{ $genre_business_ratio }}]
                                }]
                        },
                options: {
                            plugins: {
                                labels: {
                                    render: "label",
                                    fontSize: 13,
                                    fontColor: "#fff",
                                    position: "inside"
                                }
                            }
                        }
                });
            }
            </script>
            <!-- グラフを描画 -->
            
            @if ($genre_all_count == '0')
            <p class="txt-no-data">NO DATA</p>
            @endif
            
        </div>
    </div>
    
    <div class="graph_col">
        <h2>カテゴリグラフ</h2>
        <div class="card card-body">
            <canvas id="myChart2" style="height:400px;"></canvas>
            <!-- グラフを描画 -->
            <script>
            window.onload = function() {
                var ChartData;
                var ctx = document.getElementById('myChart2').getContext('2d');
                ChartData = new Chart(ctx, {
                type: "pie",    // ★必須　グラフの種類
                data: {
                        labels: ["小説", "漫画", "雑誌", "図鑑", "その他"],
                        datasets: [{
                            backgroundColor: ["#e87676","#ebce5c","#a0ab7b","#435477","#b59e98"],
                            data: [{{ $status1_ratio }}, {{ $status2_ratio }}, {{ $status3_ratio }}, {{ $status4_ratio }}, {{ $status5_ratio }}]
                                }]
                        },
                options: {
                            plugins: {
                                labels: {
                                    render: "label",
                                    fontSize: 13,
                                    fontColor: "#fff",
                                    position: "inside"
                                }
                            }
                        }
                });
            }
            </script>
            <!-- グラフを描画 -->
            
            @if ($status_all_count == '0')
            <p class="txt-no-data">NO DATA</p>
            @endif
            
        </div>
    </div>
    
    </div>
    
</div>

@endsection