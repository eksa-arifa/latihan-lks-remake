@extends("layout")

@section("content")
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Change Password:</h1>
                    </div>

                    <div class="mb-4">
                        <div class="card border-left-primary py-2 h-100">
                            <form class="p-4" method="post" action="userchangepasswordpost">
                                @csrf
                                @method("patch")
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Password lama:</label>
                                    <input type="password" name="passwordlama" class="form-control" id="exampleInputEmail1" required aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail2" class="form-label">Password Baru:</label>
                                    <input type="password" name="passwordbaru" class="form-control" id="exampleInputEmail2" required aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail3" class="form-label">Konfirmasi Password Baru:</label>
                                    <input type="password" name="password_conf" class="form-control" id="exampleInputEmail3" required aria-describedby="emailHelp">
                                </div>
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </form>
                        </div>
                    </div>
@endsection