 @extends('admin.layout')

 @section('content')

      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Змінюємо категорію</h3>
          @include('admin.errors')
        </div>
        <div class="box-body">
        {{Form::open(['route'=>['categories.update',$category->id],'method'=>'put'])}}
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Назва</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="name" value="{{$category->name}}">
            </div>
        </div>
      </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button class="btn btn-default">Назад</button>
          <button class="btn btn-warning pull-right">Змінити</button>
        </div>
        <!-- /.box-footer-->
        {{Form::close()}}
      </div>
      <!-- /.box -->
      
  @endsection