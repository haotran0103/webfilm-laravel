@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
          <a class="btn btn-success col-12 justify-content-center" href="{{route('movie.create')}}">thêm phim</a>
            <table class="table" id="tablefilm">
              <thead>
                <tr>
                  <th scope="col">id</th>
                  <th scope="col">title</th>
                  <th scope="col">slug</th>
                  <th scope="col">category</th>
                  <th scope="col">genre</th>
                  <th scope="col">image</th>
                  <th scope="col">status</th>
                  <th scope="col">quality</th>
                  <th scope="col">số Tập</th>
                  <th scope="col">ngày cập nhật</th>
                  <th scope="col">Thời lượng</th>
                  <th scope="col">season</th>
                  <th scope="col">Top Views</th>
                  <th scope="col">delete</th>
                  <th scope="col">update</th>
                </tr>
              </thead>
              <tbody>
                @foreach($list as $key =>$movie)
                <tr>
                  <th scope="row">{{$movie->id}}</th>
                  <td>{{$movie->title}}</td>
                  <td>{{$movie->slug}}</td>
                  <td>{{$movie->category->title}}</td>
                 
                  <td>
                     @foreach($movie->movie_genre as $gen)
                     <span class="badge badge-dark">{{$gen->title}}</span>
                     @endforeach
                   </td>
                  
                  <td><img width="50%" src="{{asset('uploads/movie/'.$movie->image)}}"></td>
                  <td>
                    @if($movie->status)
                    hiển thị
                    @else
                    không hiển thị
                  @endif
                 </td>
                 <td>
                    @if($movie->resolution==0)
                    HD
                    @elseif($movie->resolution==1)
                    SD
                    @else
                    FullHD
                  @endif
                 </td>
                 <td>{{$movie->sotap}}</td>
                 <td>{{$movie->ngayCapNhat}}</td>
                 <td>{{$movie->thoiLuong}}</td>
                  <td>
                    @php
                    $array = range(0, 30);
                    @endphp
                     {!! Form::select('season', $array,isset($movie)? $movie->season : '', ['class'=>'select-season','id'=> $movie->id ]) !!}
                 </td>
                 <td>
                   {!! Form::select('topView', [0=>'Ngày',1=>'tuần',2=>'tháng',3=>'năm'], isset($movie)? $movie->topViews : '', ['class'=>'select-top-views','id'=> $movie->id ]) !!}
                 </td>
                 <td>
              {!! Form::open(['method'=>'DELETE','route'=>['movie.destroy',$movie->id],'onsubmit'=>'return confirm("xóa")'])!!}
              {!! Form::submit('Xóa', ['class'=>'btn btn-danger']) !!}
              {!! Form::close() !!}
                 </td>
                 <td>
                     <a href="{{route('movie.edit',$movie->id)}}" class="btn btn-warning">sửa</a>
                 </td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
