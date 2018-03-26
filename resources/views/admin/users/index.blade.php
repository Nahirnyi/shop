 @extends('admin.layout')

 @section('content')
      <div class="box">
            

            <div class="box-body">
              <div class="form-group">
                <a href="{{route('users.create')}}" class="btn btn-success">Добавити</a>
              </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Прізвище</th>
                  <th>Ім'я</th>
                  <th>E-mail</th>
                  <th>Аватар</th>
                  <th>Дія</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                  <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->firstName}}</td>
                    <td>{{$user->lastName}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                      <img src="{{$user->getImage()}}" alt="" class="img-responsive" width="150">
                    </td>
                    <td>
                    @if($user->ban == 1)
                      <a href="/admin/users/toggle/{{$user->id}}"><i class="fa fa-unlock"></i></a>
                      
                    @else
                      <a href="/admin/users/toggle/{{$user->id}}"><i class="fa fa-lock"></i></a>
                    @endif

                    @if($user->is_admin == 1)
                      <a href="/admin/users/togglestatus/{{$user->id}}"><i class="fa fa-arrow-down"></i></a>
                      
                    @else
                      <a href="/admin/users/togglestatus/{{$user->id}}"><i class="fa fa-arrow-up"></i></a>
                    @endif
                      <a href="{{route('users.edit', $user->id)}}" class="fa fa-pencil"></a> 
                      {{Form::open(['route'=>['users.destroy', $user->id], 'method' => 'delete'])}}
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
  @endsection