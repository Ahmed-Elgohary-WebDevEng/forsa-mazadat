
@extends('layouts.app')
@section('content')
{{-- message --}}
{!! Toastr::message() !!}
<div class="row justify-content-center h-100 align-items-center ">
    <div class="col-md-6 ">
        <div class="authincation-content">
            <div class="row no-gutters">
                <div class="col-xl-12">
                    <div class="auth-form">
                        <div class="text-center mb-3">
                            <a href="#">
                                <img src="{{ URL::to('assets/images/logo-full.png') }}" alt="">
                            </a>
                        </div>

                        <h4 class="text-center mb-4">دخول للوحة التحكم</h4>
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="mb-1"><strong>اسم المستخدم</strong></label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username">
                            </div>
                            <div class="mb-3">
                                <label class="mb-1"><strong>كلمة المرور</strong></label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                            </div>
                            <div class="row d-flex justify-content-between mt-4 mb-2">
                                <div class="mb-3">
                                    <a href="#">Forgot Password?</a>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-block">سجل دخول</button>
                            </div>
                        </form>
                       {{-- <div class="new-account mt-3">
                            <p>Don't have an account? <a class="text-primary" href="{{ route('register') }}">Sign up</a></p>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#run-command-btn').click(function() {
    $.ajaxSetup({
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
         });
    $.ajax({
        url: '{{ route('run-command') }}',
        
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            console.log(response.output);
            // Handle the response as needed
        }
    });
});

    </script>
@endsection
