@extends("layout")

@section("content")
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Edit Profile</h1>
                    </div>

                    <div class="mb-4">
                        <div class="card border-left-primary py-2 h-100">
                            <form class="p-4" method="post" action="usereditpost">
                                @csrf
                                @method("patch")
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">User Name</label>
                                    <input type="text" name="username" value="{{$username}}" class="form-control" id="exampleInputEmail1" required aria-describedby="emailHelp">
                                </div>
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </form>
                        </div>
                    </div>
@endsection