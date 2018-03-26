 @extends('admin.layout')

 @section('content')

      <!-- Default box -->
      <div class="box">
              @include('admin.errors')
            <div class="box-body">
              <div class="form-group">
                <a href="{{route('mobiles.create')}}" class="btn btn-success">Добавити</a>
              </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Назва</th>
                  <th>Категорія</th>
                  <th>Ціна</th>
                  <th>Кількість</th>
                  <th>Картинка</th>
                  <th>Дія</th>
                </tr>
                </thead>
                <tbody>
                @foreach($mobiles as $mobile)
                  <tr>
                    <td>{{$mobile->id}}</td>
                    <td>{{$mobile->name}}</td>
                    <td>{{$mobile->getCategoryTitle()}}</td>
                    <td>{{$mobile->price}} грн</td>
                    <td>{{$mobile->count}}</td>
                    <td>
                      <img src="{{$mobile->getImage()}}" alt="" width="100">
                    </td>
                    <td><a href="{{route('mobiles.edit', $mobile->id)}}" class="fa fa-pencil"></a>
                    <a href="{{route('count', $mobile->id)}}" class="fa fa-exchange"></a>
                    {{Form::open(['route'=>['mobiles.destroy', $mobile->id], 'method' => 'delete'])}}
                      <button onclick="return confirm('Are you sure?')" type="submit" class="delete">
                        <i class="fa fa-remove"></i>
                      </button>
                    {{Form::close()}}
                      </td>
                  </tr>

                      
                @endforeach
                
                
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
      <!-- /.box -->
  @endsection