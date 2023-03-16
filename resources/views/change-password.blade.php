@extends('layout.user')

@section('title')
Change Password
@endsection

@section('content')
<div class="row wht">
    <div class="col-12">
        <form action="">
            <div class="row gy-2" data-aos="zoom-in" data-aos-duration="400">
                <label for="inputPassword" class="col-sm-2 col-form-label mt-3">Recent Password</label>
                <div class="col-sm-10">
                    <input type="password" name="password_lama" class="form-control mt-sm-2" id="inputpassword" placeholder="Recent password" required>
                </div>
                <label for="inputPassword" class="col-sm-2 col-form-label">New Password</label>
                <div class="col-sm-10">
                    <input type="password" name="password_baru" class="form-control" id="inputpassword" placeholder="New Password" required>
                </div>
                <label for="inputPassword" class="col-sm-2 col-form-label">Repeat Password</label>
                <div class="col-sm-10">
                    <input type="password" name="konf_password" class="form-control" id="inputpassword" placeholder="Repeat New Password" required>
                </div>
                <div class="col-sm-12 my-3 text-center">
                    <button name="ganti" class="btn btn-success">Change Password</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
