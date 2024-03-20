@extends("layout")

@section("content")
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Profile</h1>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="d-flex flex-wrap">
                                        <img class="mr-4" src="img/undraw_profile.svg" alt="profile" width="200">
                                        <div>
                                            <h2>UserName: {{$username}}</h2>
                                            <h5>Email: {{$email}}</h5>
                                            <div class="d-flex">
                                                <a href="/useredit" class="btn btn-primary mt-4 mr-2">Edit Profile</a>
                                                <a href="/changepassword" class="btn btn-warning mt-4">Change Password</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
@endsection