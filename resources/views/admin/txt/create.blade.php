 @extends('admin.layout')

 @section('content')

      {{Form::open([
        'route' => 'txt.store',
        'files' => true
      ])}}
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Добавляєм txt</h3>
          @include('admin.errors')
        </div>
        <div class="box-body">
            
            
            <div class="form-group">
              <input type="file" name="name">

              <p class="help-block">Файли txt</p>
            </div>
            
          
      </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <a href="{{route('txt.index')}}" class="btn btn-default">Назад</a>
          <button class="btn btn-success pull-right">Добавити</button>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
      {{Form::close()}}
  @endsection