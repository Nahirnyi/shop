 @extends('admin.layout')

 @section('content')
 
      <div class="box">
      {!! Form::open(['route' => 'categories.store']) !!}
        <div class="box-header with-border">
          <h3 class="box-title">Добавляєм категорію</h3>
          @include('admin.errors')
        </div>
        <div class="box-body">
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Назва</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="name">
            </div>
        </div>
      </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button class="btn btn-default">Назад</button>
          <button class="btn btn-success pull-right">Добавити</button>
        </div>
      {!! Form::close() !!}
        
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

  @endsection