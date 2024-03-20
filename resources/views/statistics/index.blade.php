@extends("layout")

@section("content")
<h1>Statistics</h1>
<div class="card border-left-primary p-4 d-flex flex-wrap gap-3">
    @if(count($form) > 0)
    @foreach($form as $f)
    <a href="{{route("listSoalStats", ["id_form"=>$f["id"]])}}" class="card p-2 border-left-success w-50">
        <h2>{{$f["title"]}}</h2>
        <p>Lihat statistics dari form {{$f["title"]}}</p>
    </a>
    @endforeach
    @else
    <h4 class="text-center">Stats masih kosong</h4>
    @endif
</div>
{{$form->links()}}
@endsection