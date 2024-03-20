@extends("layout")



@section("content")
<h1>Respondens Grouping</h1>
<div class="card border-left-primary p-4 d-flex flex-wrap gap-3">
    @if(count($group) > 0)
    @foreach($group as $f)
    <a href="{{route("detailResponden", ["group" => $f["group"]])}}" class="card p-2 border-left-success w-50">
        <h2>{{$f["group"]}}(Anonymous)</h2>
        <p>Lihat responden {{$f["group"]}}</p>
    </a>
    @endforeach
    @else
    <h4 class="text-center">Belum ada penjawab</h4>
    @endif
</div>
{{$group->links()}}
@endsection
