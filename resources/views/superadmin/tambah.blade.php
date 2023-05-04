@extends('layout.superadmin')

@section('title')
Tambah Akun
@endsection

@section('content')
<div class="row wht">
    <div class="col-12 px-4 pt-2">
        <form action="">
            <div class="row gy-2" data-aos="zoom-in" data-aos-duration="400">
                <label for="inputPassword" class="col-sm-2 col-form-label mt-3">username</label>
                <div class="col-sm-10">
                    <input type="text" name="username" class="form-control mt-sm-2" placeholder="username" required>
                </div>
                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" placeholder="password" required>
                </div>
                <label for="inputPassword" class="col-sm-2 col-form-label">Roles</label>
                <div class="col-sm-10">
                    <select class="form-select">
                        <option value="admin">admin</option>
                        <option value="superadmin">superadmin</option>
                    </select>
                </div>
                <div class="col-sm-12 my-3 text-center">
                    <button type="submit" name="tambah" class="btn btn-outline-success"><i class="fa-sharp fa-solid fa-circle-plus"></i> Tambah Akun</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
