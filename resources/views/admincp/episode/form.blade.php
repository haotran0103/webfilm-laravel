@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
             <a class="btn btn-success col-12" href="{{route('episode.index')}}">liệt kê tập phim</a>
            <div class="card">
                <div class="card-header">{{ __('danh sách loại') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(!isset($episode))
                        {!! Form::open(['route'=>'episode.store','method'=>'POST','enctype'=>'multipart/form-data']) !!}
                    @else
                        {!! Form::open(['route'=>['episode.update',$episode->id],'method'=>'PUT','enctype'=>'multipart/form-data']) !!}
                    @endif
                    
                    
                    <div class="form-group">
                        {!! Form::label('movie', 'chọn phim', []) !!}
                        {!! Form::select('movie_id',['0'=>'chọn phim','danh sách tên phim'=>$list_movie],isset($episode)? $episode->movie_id : '', ['class'=>'form-control select-movie']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('link', 'link phim', []) !!}
                        {!! Form::textarea('link', isset($episode) ? $episode->link :'', ['class'=>'form-control','placeholder'=>'nhập vào dữ liệu']) !!}
                    </div>
                    @if(!isset($episode))
                    <div class="form-group">
                        {!! Form::label('movie', 'tập phim', []) !!}
                        <select class="form-control" name="episode" id="episode_movie">
                            
                        </select>
                    </div>
                    @else
                    <div class="form-group">
                        {!! Form::label('episode', 'tập phim', []) !!}
                        {!! Form::text('episode', isset($episode) ? $episode->episode :'', ['class'=>'form-control','placeholder'=>'nhập vào dữ liệu','readonly']) !!}
                    </div>
                    @endif
                    @if(!isset($movie))
                        {!! Form::submit('Thêm dữ liệu', ['class'=>'btn btn-success']) !!}
                    @else
                         {!! Form::submit('Cập nhật dữ liệu', ['class'=>'btn btn-success']) !!}
                    @endif
                    
                    {!! Form::close() !!}
                </div>
            </div>
            
        </div>
    </div>
</div>

@endsection
