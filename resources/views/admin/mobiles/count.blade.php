 @extends('admin.layout')

 @section('content')
 
      {{Form::open([
        'route' => ['changeCount', $mobile->id],
        'files' => true,
        'method' => 'put'
      ])}}
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Змінити кількість телефонів</h3>
          @include('admin.errors')
        </div>
        <div class="box-body">
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">{{$mobile->name}}</label>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail99">Кількість</label>
              <input type="text" class="form-control" id="exampleInputEmail99" name="count" value="{{$mobile->count}}"
               placeholder="" pattern="^[ 0-9]+$">
          </div>
            
           
          </div>

           
          
      </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <a href="{{route('mobiles.index')}}" class="btn btn-default">Назад</a>
          <button class="btn btn-warning pull-right">Змінити</button>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
    {{Form::close()}}
 @endsection