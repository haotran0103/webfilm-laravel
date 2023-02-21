@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
          <a class="btn btn-success col-12 justify-content-center" href="{{route('episode.create')}}">thêm tập phim</a>
            <table class="table" id="tablefilm">
              <thead>
                <tr>
                  <th scope="col">tên phim</th>
                  <th scope="col">ảnh phim</th>
                  <th scope="col">tập phim</th>
                  <th scope="col">link</th>
                  
                  <th scope="col">delete</th>
                  <th scope="col">update</th>
                </tr>
              </thead>
              <tbody>
                @foreach($list_ep as $key =>$mov)
                    
                <tr>
                  <td>{{$mov->movie->title}}</td>
                  <td><img style="width: 50%; height: 50%" src="{{asset('uploads/movie/'.$mov->movie->image)}}"></td>
                  <td>{{$mov->episode}}</td>
                  <td style="width: 30% ;height:30%">{!! $mov->link !!}</td>

                 <td>
              {!! Form::open(['method'=>'DELETE','route'=>['episode.destroy',$mov->id],'onsubmit'=>'return confirm("xóa")'])!!}
              {!! Form::submit('Xóa', ['class'=>'btn btn-danger']) !!}
              {!! Form::close() !!}
                 </td>
                 <td>
                     <a href="{{route('episode.edit',$mov->id)}}" class="btn btn-warning">sửa</a>
                 </td>
                </tr>
                
                @endforeach
              </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
