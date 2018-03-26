 @extends('admin.layout')

 @section('content')

      {{Form::open([
        'route' => 'mobiles.store',
        'files' => true
      ])}}
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Добавляєм телефон</h3>
          @include('admin.errors')
        </div>
        <div class="box-body">
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Назва</label>
              <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="{{old('name')}}" placeholder="">
            </div>
            
            
            <div class="form-group">
              <label for="exampleInputFile">Картинка</label>
              <input type="file" id="exampleInputFile" name="image">

              <p class="help-block">Картинки тільки у таких форматах: jpeg, png, bmp, gif, або svg</p>
            </div>
            <div class="form-group">
              <label>Категорія</label>  
              {{Form::select('category_id',
                $categories,
                null,
                ['class' => 'form-control']
              )}}
            </div>
            <div class="form-group">
              <label for="description">Опис</label>
              <textarea style="resize: none;" rows="10" class="form-control" name="description">{{old('description')}}</textarea>
          </div>

           <!-- <div class="form-group">
              <label for="exampleInputEmail1111">Опис</label>
              <input type="text" class="form-control" id="exampleInputEmail1111" name="description" value="{{old('description')}}" placeholder="">
            </div> -->

         

            

            <!-- checkbox -->
            
          </div>
          <div class="col-md-6">
          <div class="form-group">
              <label for="exampleInputEmail1">Ціна</label>
              <input type="text" class="form-control" id="exampleInputEmail1" name="price" value="{{old('price')}}" placeholder="" pattern="\d+(\.\d{1,2})?">
            </div>

             <div class="form-group">
              <label for="exampleInputEmail100">Кількість</label>
              <input type="text" class="form-control" id="exampleInputEmail100" name="count" value=
              @if(old('count'))
                "{{old('count')}}"
              @else
              1
              @endif
               placeholder="" pattern="^[ 0-9]+$">
          </div>
          <div class="form-group">
              <label for="exampleInputEmail11">Пам'ять</label>
              <input type="text" class="form-control" id="exampleInputEmail11" name="memory" value="{{old('memory')}}" placeholder="">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail12">Батарея</label>
              <input type="text" class="form-control" id="exampleInputEmail12" name="battery" value="{{old('battery')}}" placeholder="">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail13">Дисплей</label>
              <input type="text" class="form-control" id="exampleInputEmail13" name="display" value="{{old('display')}}" placeholder="">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail14">Вага</label>
              <input type="text" class="form-control" id="exampleInputEmail14" name="weight" value="{{old('weight')}}" placeholder="">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail15">Розміри</label>
              <input type="text" class="form-control" id="exampleInputEmail15" name="size" value="{{old('size')}}" placeholder="">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail16">Камера</label>
              <input type="text" class="form-control" id="exampleInputEmail16" name="camera" value="{{old('camera')}}" placeholder="">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail17">Процесор</label>
              <input type="text" class="form-control" id="exampleInputEmail17" name="cpu" value="{{old('cpu')}}" placeholder="">
            </div>
          </div>
          
      </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <a href="{{route('mobiles.index')}}" class="btn btn-default">Назад</a>
          <button class="btn btn-success pull-right">Добавити</button>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
      {{Form::close()}}
  @endsection