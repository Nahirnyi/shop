 @extends('admin.layout')

 @section('content')

      {{Form::open(['route' => 'users.store', 'files' => true])}}
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Добавляем пользователя</h3>
          @include('admin.errors')
        </div>
        <div class="box-body">
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Прізвище</label>
              <input type="text" name="firstName" class="form-control" value="{{old('firstName')}}" id="exampleInputEmail1" placeholder="">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">І'мя</label>
              <input type="text" name="lastName" class="form-control" value="{{old('lastName')}}" id="exampleInputEmail1" placeholder="">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">По-батькові</label>
              <input type="text" name="anotherName" class="form-control" value="{{old('anotherName')}}" id="exampleInputEmail1" placeholder="">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">E-mail</label>
              <input type="email" name="email" class="form-control" value="{{old('email')}}" id="exampleInputEmail1" placeholder="">
            </div>
            <div class="form-group">
              <label for="exampleInputFile">Аватар</label>
              <input type="file" name="avatar" id="exampleInputFile">

              <p class="help-block">Картинки тільки у таких форматах: jpeg, png, bmp, gif, або svg</p>
            </div>
        </div>
         <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Номер телефону</label>
              <input type="text" name="phoneNumber" class="form-control" value="{{old('phoneNumber')}}" id="tel" placeholder="">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Місто</label>
              <input type="text" name="city" class="form-control" value="{{old('city')}}" id="exampleInputEmail1" placeholder="">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Номер відділу</label>
              <input type="text" name="numberDepartment" class="form-control" value="{{old('numberDepartment')}}" id="exampleInputEmail1" placeholder="">
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
          <button class="btn btn-success pull-right">Добавить</button>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
    {{Form::close()}}
  @endsection