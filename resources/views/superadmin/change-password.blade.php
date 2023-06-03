@extends('layout.superadmin')

@section('title')
Change Password
@endsection

@section('content')
<div class="row wht">
    <div class="col-12">
        <form action="/manajer/change-password/{{ Auth::user()->nik }}" method="POST">
            @csrf @method('put')
            <div class="row gy-2" data-aos="zoom-in" data-aos-duration="400">
                <label for="inputPassword" class="col-sm-2 col-form-label mt-3">Recent Password</label>
                <div class="col-sm-10">
                    <input type="password" name="password_lama" class="@error('password_lama') is-invalid @enderror form-control mt-sm-2" value="{{ old('password_lama') }}" placeholder="Recent password" required>
                    @error('password_lama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <label for="inputPassword" class="col-sm-2 col-form-label">New Password</label>
                <div class="col-sm-10">
                    <input type="password" name="password_baru" class="@error('password_baru') is-invalid @enderror form-control" value="{{ old('password_baru') }}" placeholder="New Password" required>
                    @error('password_baru')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <label for="inputPassword" class="col-sm-2 col-form-label">Repeat Password</label>
                <div class="col-sm-10">
                    <input type="password" name="konf_password" class="@error('konf_password') is-invalid @enderror form-control" value="{{ old('konf_password') }}" placeholder="Repeat New Password" required>
                    @error('konf_password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-sm-12 my-3 text-center">
                    <button type="submit" name="ganti" class="btn btn-outline-primary submit w-50">Change Password</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
