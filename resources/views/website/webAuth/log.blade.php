@extends('website.layouts.layout')

@section('content')
    <section id="contact">
        <div class="container droid-arabic-kufi">
            <h2 class="text-uppercase text-center text-secondary mb-0 droid-arabic-kufi">تسجيل الدخول</h2>
            <hr class="star-dark mb-5">
            <div dir="rtl" class="row">
                <div class="col-lg-8 mx-auto">
                    <form method="POST" action="{{url('Weblogin/user')}}">
                        @csrf
                             <div class="control-group">
                            <div class="mb-0 form-floating controls pb-2"><input class="form-control" type="tel" name="identity" id="phone" required="" placeholder=" الهوية"><label class="form-label"> الهوية </label><small class="form-text text-danger help-block"></small></div>
                        </div>
                        <br>
                        <div class="control-group">
                            <div class="mb-0 form-floating controls pb-2"><input class="form-control" type="password" name="password" id="name" required="" placeholder="كلمة المرور"><label class="form-label">كلمة المرور</label><small class="form-text text-danger help-block"></small></div>
                        </div>
                        <div id="success"></div>
                        <br>
                        <div><button class="btn btn-primary p-2 btn-xl" id="sendMessageButton" type="submit">دخول</button></div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@stop
