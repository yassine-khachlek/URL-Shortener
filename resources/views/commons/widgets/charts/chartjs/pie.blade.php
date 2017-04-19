<canvas id="{{ camel_case($id) }}" width="400" height="400"></canvas>

@section('scripts')
<script type="text/javascript">
    $( document ).ready(function() {

        var {{ camel_case($id) }}Data = {
            labels: {!! $labels !!},
            datasets: [
                {
                    data: {!! $data !!},
                    backgroundColor: [
                        "#FF6384",
                        "#36A2EB",

                    ],
                    hoverBackgroundColor: [
                        "#FF6384",
                        "#36A2EB",
                    ]
                }]
        };

        var {{ camel_case($id) }}Chart = new Chart(document.getElementById("{{ camel_case($id) }}"),{
            type: 'pie',
            data: {{ camel_case($id) }}Data,
            //options: options
        });

    });
</script>
@append