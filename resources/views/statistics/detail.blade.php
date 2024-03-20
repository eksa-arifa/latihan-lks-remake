@extends("layout")

@section("content")
<h2>{{$question["question"]}}</h2>

<div>
  <canvas id="myChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart');


  let label = "<?= collect($label)->implode(",") ?>"
  let data = "<?= collect($data)->implode(",") ?>"

  label = label.split(",")
  data = data.split(",")

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: label,
      datasets: [{
        label: '# of Votes',
        data: data,
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>






@endsection