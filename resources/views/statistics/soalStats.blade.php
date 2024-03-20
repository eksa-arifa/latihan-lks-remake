@extends("layout")

@section("content")
<h1>Detail Statistics</h1>
<div class="card border-left-primary p-4 d-flex flex-wrap gap-3">
    <h2>{{$form->title}}</h2>
</div>

<div class="d-flex mt-3 p-2 card border-left-primary flex-wrap gap-3 w-100">
    @foreach($question as $q)
    @if($q["type"] == "multiple-answer")
    <a href="{{route("detailStats", ["id_soal"=>$q["id"]])}}" class="card p-2 border-left-success" style="width: 40%;">
        <h5>{{$loop->index + 1}}.{{$q["question"]}}</h5>
    </a>
    @endif
    @endforeach
</div>
@endsection