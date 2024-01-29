@extends('website.layouts.layout')

@section('content')

<section id="contact">
        <div class="container droid-arabic-kufi">
            <h2 class="text-uppercase text-center text-secondary mb-0 droid-arabic-kufi">تسجيل عضوية</h2>
            <hr class="star-dark mb-5">
            <div dir="rtl" class="row">
                <div class="col-lg-8 mx-auto">
                    <form action="{{ route('registerWeb') }}" method="POST">
                        @csrf
                                                <div class="control-group">
                            <div class="mb-0 form-floating controls pb-2"><input class="form-control" type="tel" id="phone" name="Firstname" required="" placeholder="الاسم الأول"><label class="form-label">الاسم الأول</label><small class="form-text text-danger help-block"></small></div>
                        </div>
                        <br>
                           <div class="control-group">
                            <div class="mb-0 form-floating controls pb-2"><input class="form-control" type="tel" id="phone" name="lastname" required="" placeholder="الاسم الأخير"><label class="form-label">الاسم الأخير</label><small class="form-text text-danger help-block"></small></div>
                        </div>
                        <br>
                        <div class="control-group">
                            <div class="mb-0 form-floating controls pb-2"><input class="form-control" type="tel" id="phone" name="identity" required="" placeholder="رقم الهوية"><label class="form-label">رقم الهوية</label><small class="form-text text-danger help-block"></small></div>
                        </div>
                        <div class="control-group">
                            <div class="mb-0 form-floating controls pb-2"><input class="form-control" type="tel" id="phone" name="email" required="" placeholder=" البريد الالكتروني"><label class="form-label"> البريد الالكتروني</label><small class="form-text text-danger help-block"></small></div>
                        </div>
                          <br>
                        <div class="control-group">
                            <div class="mb-0 form-floating controls pb-2"><input class="form-control" type="tel" id="phone" name="Location" required="" placeholder="العنوان"><label class="form-label">العنوان</label><small class="form-text text-danger help-block"></small></div>
                        </div>
                        <br>
                        <div class="control-group">
                            <div class="mb-0 form-floating controls pb-2">
                            <select class="form-select" aria-label="Default select example" name="Region">
                                <option value="all" dir="ltr">المنطقه</option>
                                <option value="riyadh" >الرياض </option>
                                <option value="makka" >مكة المكرمة </option>
                                <option value="almadina" >المدينة المنورة </option>
                                <option value="alsharqia" >المنظقة الشرقية </option>
                                <option value="aljuof" >الجوف </option>
                                <option value="tabuk" >تبوك </option>
                                <option value="haael" >حائل </option>
                                <option value="qassim" >القصيم </option>
                                <option value="najran" >نجران </option>
                                <option value="jazan" >جازان </option>
                                <option value="albaha" >الباحة </option>
                                <option value="shmaleah" >المنطقة الشمالية </option>
                                <option value="asser" >عسير </option>
                            </select>
                            </div>
                        </div>
                        <br>
                        <div class="control-group">
                            <div class="mb-0 form-floating controls pb-2"><input class="form-control" type="tel" id="phone" name="phone" required="" placeholder="Phone Number"><label class="form-label">رقم الجوال</label><small class="form-text text-danger help-block"></small></div>
                        </div>
                        <br>
                        <div class="control-group">
                            <div class="mb-0 form-floating controls pb-2"><input class="form-control" type="text" name="password" id="name" required="" placeholder="الاسم"><label class="form-label">كلمة المرور</label><small class="form-text text-danger help-block"></small></div>
                        </div>
                        <div id="success"></div>
                        <br>
                        <div><button class="btn btn-primary p-2 btn-xl" id="sendMessageButton" type="submit">تسجيل</button></div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@stop
