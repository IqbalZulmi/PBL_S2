@extends('layout.user')

@section('title')
Verifikasi Email
@endsection

@section('content')
<div class="row wht">
    <div class="col-12">
        <h4>Before proceeding, please check your email for a verification link. If you did not receive the email,
            <form action="{{ route('verification.send') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="d-inline btn btn-link p-0">
                    click here to request another
                </button>.
            </form>
        </h4>
    </div>
</div>
@endsection
