@extends("layout")

@section("content")
<h1>Detail Respondens {{$group}}</h1>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Soal</th>
                    <th>Jawaban</th>
                </tr>
            </thead>
            <tbody>
                @foreach($responden as $r)
                <tr>
                    <td>{{$loop->index + 1}}</td>
                    <td>{{$soal[$loop->index]}}</td>
                    <td>{{$r["jawaban"]}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$responden->links()}}
    </div>
</div>
@endsection