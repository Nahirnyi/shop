 @extends('admin.layout')

 @section('content')

      {{Form::open([
        'route' => 'orders.store',
        'files' => true
      ])}}
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Добавляєм замовлення</h3>
          @include('admin.errors')
        </div>
        <div class="box-body">
          <div class="col-md-12">
            <div class="form-group">
              <label>Користувач</label>  
              {{Form::select('user_id',
                $users,
                null,
                ['class' => 'form-control select2']
              )}}
            </div>
            
            <div class="form-group">
              <label>Телефони</label>
              {{Form::select('mobiles[]',
                $mobiles,
                null,
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
      <!-- /.box -->
      {{Form::close()}}
  @endsection