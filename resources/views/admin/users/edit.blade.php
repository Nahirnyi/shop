 @extends('admin.layout')

 @section('content')

    {{Form::open([
      'route' => ['users.update', $user->id],
      'method' => 'put',
      'files' => true
    ])}}
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Добавити користувача</h3>
          @include('admin/errors')
        </div>
        <div class="box-body">
        <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Прізвище</label>
              <input type="text" name="firstName" class="form-control" value="{{$user->firstName}}" id="exampleInputEmail1" placeholder="">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">І'мя</label>
              <input type="text" name="lastName" class="form-control" value="{{$user->lastName}}" id="exampleInputEmail1" placeholder="">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">По-батькові</label>
              <input type="text" name="anotherName" class="form-control" value="{{$user->anotherName}}" id="exampleInputEmail1" placeholder="">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">E-mail</label>
              <input type="email" name="email" class="form-control" value="{{$user->email}}" id="exampleInputEmail1" placeholder="">
            </div>
            <div class="form-group">
              <img src="{{$user->getImage()}}" alt="" width="200" class="img-responsive">
              <label for="exampleInputFile">Аватар</label>
              <input type="file" name="avatar"  id="exampleInputFile">

              <p class="help-block">Картинки тільки у таких форматах: jpeg, png, bmp, gif, або svg</p>
            </div>
        </div>
         <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Номер телефону</label>
              <input type="text" name="phoneNumber" class="form-control" value="{{$user->phoneNumber}}" id="tel" placeholder="">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Місто</label>
              <input type="text" name="city" class="form-control" value="{{$user->city}}" id="exampleInputEmail1" placeholder="">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Номер відділу</label>
              <input type="text" name="numberDepartment" class="form-control" value="{{$user->numberDepartment}}" id="exampleInputEmail1" placeholder="">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Пароль</label>
              <input type="password" name="password" class="form-control" id="exampleInputEmail1" placeholder="">
            </div>

        </div>
         
      </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <a href="{{route('mobiles.index')}}" class="btn btn-default">Назад</a>
          <button class="btn btn-warning pull-right">Змінити
          </button>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
    {{Form::close()}}


  @endsection