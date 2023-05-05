<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Medical Nspm</title>
   <!-- Font Awesome -->
<link
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
rel="stylesheet"
/>
<script src="//unpkg.com/alpinejs" defer></script>
<!-- Google Fonts -->
<link
href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
rel="stylesheet"
/>
<!-- MDB -->
<link
href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css"
rel="stylesheet"
/>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- include MDBootstrap CSS and JS files -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/css/mdb.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/js/mdb.min.js"crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<link rel="stylesheet" href="{{ asset('css/style.css') }}" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
   <!-- Include the required MDBootstrap CSS and JS files -->

   <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
   <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>


    @yield('content')





<!-- MDBootstrap JavaScript -->
<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"
>
</script>





<script>
    $(document).ready(function() {
    $('.js-example-basic-single').select2();
});


  </script>


<script>
    var ctx = document.getElementById('chart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [],
            datasets: [{
                label: '',
                backgroundColor: '',
                borderColor: '',
                borderWidth: 1,
                data: []
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    function getData() {
        fetch('/chart')
            .then(response => response.json())
            .then(data => {
                chart.data.labels = data.map(d => d.month);
                chart.data.datasets[0].data = data.map(d => d.sum);
                chart.update();
            });
    }

    getData();
</script>

</html>
