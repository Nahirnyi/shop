 @extends('layout')

 @section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="leave-comment mr0"><!--leave comment-->
                    
                    <h3 class="text-uppercase">Register</h3>
                    @include('admin.errors')
                    <br>
                    <form class="form-horizontal contact-form" role="form" method="post" action="{{route('register')}}">
                    {{csrf_field()}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="firstName"
                                       placeholder="Прізвище" value="{{old('firstName')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="lastName"
                                       placeholder="Ім'я" value="{{old('lastName')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="anotherName"
                                       placeholder="По-батькові" value="{{old('anotherName')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="tel" class="form-control" id="tel" name="phoneNumber"
                                       placeholder="Номер телефону" value="{{old('phoneNumber')}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="city"
                                       placeholder="Місто" value="{{old('city')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="numberDepartment"
                                       placeholder="Номер відділення" value="{{old('numberDepartment')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="email" class="form-control" name="email"
                                       placeholder="Email" value="{{old('email')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="password" class="form-control" name="password" placeholder="password">
                            </div>
                        </div>
                    </div>
                        
                        
                        <button type="submit" class="btn send-btn">Register</button>

                    </form>
                </div><!--end leave comment-->
            </div>
        </div>
    </div>
@endsection