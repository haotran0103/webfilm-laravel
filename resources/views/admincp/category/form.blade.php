@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <a class="btn btn-success" href="{{route('movie.index')}}">liệt kê phim</a>
            <div class="card">
                <div class="card-header">{{ __('danh sách loại') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(!isset($category))
                        {!! Form::open(['route'=>'category.store','method'=>'POST']) !!}
                    @else
                        {!! Form::open(['route'=>['category.update',$category->id],'method'=>'PUT']) !!}
                    @endif
                    
                    <div class="form-group">
                        {!! Form::label('title', 'title', []) !!}
                        {!! Form::text('title', isset($category) ? $category->title :'', ['class'=>'form-control','placeholder'=>'nhập vào dữ liệu','id'=>'slug','onkeyup' => 'ChangeToSlug()']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('slug', 'slug', []) !!}
                        {!! Form::text('slug', isset($category) ? $category->slug :'', ['class'=>'form-control','placeholder'=>'nhập vào dữ liệu','id'=>'convert_slug']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('description', 'description', []) !!}
                        {!! Form::textarea('description', isset($category) ? $category->description :'', ['class'=>'form-control','placeholder'=>'nhập vào dữ liệu','id'=>'convert_slug']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Active', 'active', []) !!}
                        {!! Form::select('status',['1'=>'hiển thị','0'=>'không'],isset($category)? $category->status : '', ['class'=>'form-control']) !!}
                    </div>
                    @if(!isset($category))
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
