<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ArchangelsForm | {{$form->title}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Custom fonts for this template-->
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
    
    <!-- Custom styles for this template-->
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    
  </head>
  <body>
    <div class="card border-left-primary w-80 p-3 m-4">
        <h1>{{$form->title}}</h1>
        <h5>{{$form->description}}</h5>
    </div>
    <div class="card border-left-primary w-80 p-3 m-4">
        <p>Di buat oleh {{$creator->name}}</p>
    </div>
    <p class="mx-4">Kerjakan form ini!!!</p>
    <form action="/form/post" method="post">
        @csrf
        @foreach($soal as $s)
        <div class="card border-left-primary w-80 p-3 m-4">
            <h6>{{$s["question"]}}</h6>
            @if($s["type"] == "multiple-answer")
                @foreach($jawaban as $j)
                    @if($j["id_soal"] == $s["id"])
                        <div class="px-3">
                            <input type="radio" name="jawaban[{{$s["question"]}}]" required id="jawaban{{$loop->index}}" value="{{$j["answer"]}}">
                            <label for="jawaban{{$loop->index}}">{{$j["answer"]}}</label>
                        </div>
                    @endif
                @endforeach
            @else
            <input type="text" name="jawaban[{{$s["question"]}}]" class="form-control" required>
            @endif
        </div>
        <input type="hidden" name="id_form" value="{{$form->id}}">
        <input type="hidden" name="id_soal[]" value="{{$s["id"]}}">
        @endforeach
        <div class="card w-80 p-3 m-4">
            <button type="submit" class="btn btn-primary d-block w-25">Kirim</button>
        </div>
    </form>
    <div class="card w-80 p-3 m-4">
        <h6 class="text-center">Dibuat menggunakan ArchangelsForm</h6>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
  </body>
</html>
