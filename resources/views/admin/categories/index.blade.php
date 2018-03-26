 @extends('admin.layout')

 @section('content')
 
      <div class="box">
            <div class="box-body">
              <div class="form-group">
                <a href="{{route('categories.create')}}" class="btn btn-success">Добавити</a>
              </div>
              
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Назва</th>
                  <th>Дія</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                  <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}} </td>
                    <td><a href="{{route('categories.edit', $category->id)}}" class="fa fa-pencil"></a> 

                    {{Form::open(['route'=>['categories.destroy', $category->id], 'method' => 'delete'])}}
                      <button type="submit" class="delete">
                        <i class="fa fa-remove"></i>
                      </button>
                    {{Form::close()}}
                    </td>
                  </tr>
                @endforeach
                
               
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
      <!-- /.box -->

  @endsection