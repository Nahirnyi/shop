 @extends('admin.layout')

 @section('content')

      <!-- Default box -->
      <div class="box">
              @include('admin.errors')
            <div class="box-body">
              <div class="form-group">
                <a href="{{route('orders.create')}}" class="btn btn-success">Добавити</a>
                <h1 class="pull-right">{{$name}}</h1>
              </div>
              
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Прізвище</th>
                  <th>Ім'я</th>
                  <th>По-батькові</th>
                  <th>Номер телефону</th>
                  <th>Місто</th>
                  <th>Відділ</th>
                  <th>Телефони</th>
                  <th>Дата замовлення</th>
                  <th>Дія</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                  <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->user->firstName}}</td>
                    <td>{{$order->user->lastName}}</td>
                    <td>{{$order->user->anotherName}}</td>
                    <td>{{$order->user->phoneNumber}}</td>
                    <td>{{$order->user->city}}</td>
                    <td>{{$order->user->numberDepartment}}</td>
                    <td>{{$order->getMobiles()}}</td>
                    <td>{{$order->created_at}}</td>
                    <td><a href="{{route('orders.edit', $order->id)}}" class="fa fa-pencil"></a>

                    @if($order->status == "delivered")
                      {{Form::open(['route'=>['saw', $order->id], 'method' => 'put'])}}
                        <button  type="submit" class="delete">
                          <i class="fa fa-envelope"></i>
                        </button>
                      {{Form::close()}}

                      {{Form::open(['route'=>['road', $order->id], 'method' => 'put'])}}
                        <button  type="submit" class="delete">
                          <i class="fa fa-road"></i>
                        </button>
                      {{Form::close()}}

                      {{Form::open(['route'=>['successOrder', $order->id], 'method' => 'put'])}}
                        <button  type="submit" class="delete">
                          <i class="fa fa-check"></i>
                        </button>
                      {{Form::close()}}

                    @endif

                    @if($order->status == "saw")

                      {{Form::open(['route'=>['road', $order->id], 'method' => 'put'])}}
                        <button  type="submit" class="delete">
                          <i class="fa fa-road"></i>
                        </button>
                      {{Form::close()}}

                      {{Form::open(['route'=>['successOrder', $order->id], 'method' => 'put'])}}
                        <button  type="submit" class="delete">
                          <i class="fa fa-check"></i>
                        </button>
                      {{Form::close()}}

                      

                    @endif

                     @if($order->status == "road")

                      {{Form::open(['route'=>['successOrder', $order->id], 'method' => 'put'])}}
                        <button  type="submit" class="delete">
                          <i class="fa fa-check"></i>
                        </button>
                      {{Form::close()}}

                      

                    @endif
                    
                    

                      {{Form::open(['route'=>['orders.destroy', $order->id], 'method' => 'delete'])}}
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