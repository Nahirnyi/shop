 @extends('admin.layout')

 @section('content')

      <!-- Default box -->
      <div class="box">
              @include('admin.errors')
            <div class="box-body">
              <div class="form-group">
                <a href="{{route('txt.create')}}" class="btn btn-success">Добавити</a>
              </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Назва</th>
                  <th>Категорія</th>
                  <th>Дія</th>
                </tr>
                </thead>
                <tbody>
                @foreach($txts as $txt)
                  <tr>
                    <td>{{$txt->id}}</td>
                    <td>{{$txt->name}}</td>
                    <td>{{$txt->status}}</td>
                    <td><a href="{{route('success', $txt->id)}}" class="fa fa-check"></a>
                    {{Form::open(['route'=>['txt.destroy', $txt->id], 'method' => 'delete'])}}
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