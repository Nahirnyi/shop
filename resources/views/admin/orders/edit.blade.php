 @extends('admin.layout')

 @section('content')
  
      {{Form::open([
        'route' => ['orders.update', $order->id],
        'method' => 'put'
      ])}}
     
       <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Зміна замовлення</h3>
          @include('admin.errors')
        </div>
        <div class="box-body">
          
        <div class="col-md-12">
            <div class="form-group">
              <label for="exampleInputEmail1">Прізвище</label>
              <input type="text" class="form-control" id="exampleInputEmail1" name="firstName" value="{{$order->firstName}}" placeholder="">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">І'мя</label>
              <input type="text" class="form-control" id="exampleInputEmail1" name="lastName" value="{{$order->lastName}}" placeholder="">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">По-батькові</label>
              <input type="text" class="form-control" id="exampleInputEmail1" name="anotherName" value="{{$order->anotherName}}" placeholder="">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Номер телефону</label>
              <input type="text" class="form-control" id="exampleInputEmail1" name="phoneNumber" value="{{$order->phoneNumber}}" placeholder="">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Місто</label>
              <input type="text" class="form-control" id="exampleInputEmail1" name="city" value="{{$order->city}}" placeholder="">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Номер відділу</label>
              <input type="text" class="form-control" id="exampleInputEmail1" name="numberDepartment" value="{{$order->numberDepartment}}" placeholder="">
            </div>
            
            
            <div class="form-group">
              <label>Телефони</label>
              {{Form::select('mobiles[]',
                $mobiles,
                $order->mobiles,
                ['class' => 'form-control select2', 'multiple' => 'multiple', 'data-placeholder' => 'Виберіть телефони']
              )}}
            </div>
            
          </div>
          
      </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <a href="{{route('orders.index')}}" class="btn btn-default">Назад</a>
          <button class="btn btn-success pull-right">Добавити</button>
        </div>
        <!-- /.box-footer-->
      </div>

    {{Form::close()}}
 @endsection