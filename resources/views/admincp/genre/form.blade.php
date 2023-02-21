@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <a class="btn btn-success" href="{{route('movie.index')}}">liệt kê phim</a>
            <div class="card">
                <div class="card-header">{{ __('quản lí thể loại') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(!isset($genre))
                        {!! Form::open(['route'=>'genre.store','method'=>'POST']) !!}
                    @else
                        {!! Form::open(['route'=>['genre.update',$genre->id],'method'=>'PUT']) !!}
                    @endif
                    
                    <div class="form-group">
                        {!! Form::label('title', 'title', []) !!}
                        {!! Form::text('title', isset($genre) ? $genre->title :'', ['class'=>'form-control','placeholder'=>'nhập vào dữ liệu','id'=>'slug','onkeyup' => 'ChangeToSlug()']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('slug', 'slug', []) !!}
                        {!! Form::text('slug', isset($genre) ? $genre->slug :'', ['class'=>'form-control','placeholder'=>'nhập vào dữ liệu','id'=>'convert_slug']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('description', 'description', []) !!}
                        {!! Form::textarea('description', isset($genre) ? $genre->description :'', ['class'=>'form-control','placeholder'=>'nhập vào dữ liệu','id'=>'title']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Active', 'active', []) !!}
                        {!! Form::select('status',['1'=>'hiển thị','0'=>'không'],isset($genre)? $genre->status : '', ['class'=>'form-control']) !!}
                    </div>
                    @if(!isset($genre))
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
