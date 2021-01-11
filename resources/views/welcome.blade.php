@extends('layouts.app')
@section('content')



<div class="container mt-3">
    <div class="row">
        <div class="col-md-6">
            <div class="alert alert-primary text-center" role="alert">
            <h5>Current online players:</h5>
            <?= $games['allCurrentOnline'][0]?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="alert alert-primary text-center" role="alert">
            <h5>Peak Today:</h5>
            <?= $games['allCurrentOnline'][1]?>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <table class="table table-hover table-bordered table-dark" style="background-color: #282e39;">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Current Players</th>
                    <th scope="col">Peak Players Today</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($games['topGamesNames'] as $key => $value) {
                    echo '<tr>';
                    echo '<td>' . $value . '</td>';
                    echo '<td>' . $games['currentPlayers'][$key] . '</td>';
                    echo '<td>' . $games['peakPlayers'][$key] . '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php




?>
<canvas id="SteamChart"></canvas>

<script>
    var Onlinedatastats = [];
    Onlinedatastats.push("<?=$games['allCurrentOnline'][0]?>")


    var ctx = document.getElementById('SteamChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [{
            label: 'My First dataset',
            borderColor: 'rgb(255, 99, 132)',
            data: Onlinedatastats
        }]
    },

    // Configuration options go here
    options: {}
});
console.log(Onlinedatastats);
</script>








@endsection
