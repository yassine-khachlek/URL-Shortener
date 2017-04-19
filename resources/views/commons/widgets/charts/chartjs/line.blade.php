<canvas id="{{ camel_case($id) }}" width="400" height="150"></canvas>

@section('scripts')
<script type="text/javascript">
	$( document ).ready(function() {

        var {{ camel_case($id) }}ChartData = {
            labels: {!! $labels !!},
            datasets: [
                {
                    label: "{{ $label }}",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "rgba(75,192,192,0.4)",
                    borderColor: "rgba(75,192,192,1)",
                    borderCapStyle: 'butt',
                    borderDash: [],
                    borderDashOffset: 0.0,
                    borderJoinStyle: 'miter',
                    pointBorderColor: "rgba(75,192,192,1)",
                    pointBackgroundColor: "#fff",
                    pointBorderWidth: 1,
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: "rgba(75,192,192,1)",
                    pointHoverBorderColor: "rgba(220,220,220,1)",
                    pointHoverBorderWidth: 2,
                    pointRadius: 1,
                    pointHitRadius: 10,
                    data: {!! $data !!},
                    spanGaps: false,
                }
            ]
        };

        var {{ camel_case($id) }}ChartChart = new Chart(document.getElementById("{{ camel_case($id) }}"), {
            type: 'line',
            data: {{ camel_case($id) }}ChartData,
            options: {
                scales: {
                  xAxes: [{
                    ticks: {
                      autoSkip: false,
                      maxRotation: 90,
                      minRotation: 90
                    }
                  }]
                }
            }
        });

	});
</script>
@append