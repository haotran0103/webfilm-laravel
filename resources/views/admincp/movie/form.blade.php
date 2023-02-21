@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
             <a class="btn btn-success col-12" href="{{route('movie.index')}}">liệt kê phim</a>
            <div class="card">
                <div class="card-header">{{ __('danh sách loại') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(!isset($movie))
                        {!! Form::open(['route'=>'movie.store','method'=>'POST','enctype'=>'multipart/form-data']) !!}
                    @else
                        {!! Form::open(['route'=>['movie.update',$movie->id],'method'=>'PUT','enctype'=>'multipart/form-data']) !!}
                    @endif
                    
                    <div class="form-group">
                        {!! Form::label('title', 'title', []) !!}
                        {!! Form::text('title', isset($movie) ? $movie->title :'', ['class'=>'form-control','placeholder'=>'nhập vào dữ liệu','id'=>'slug','onkeyup' => 'ChangeToSlug()']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('slug', 'slug', []) !!}
                        {!! Form::text('slug', isset($movie) ? $movie->slug :'', ['class'=>'form-control','placeholder'=>'nhập vào dữ liệu','id'=>'convert_slug']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('sotap', 'số tập phim', []) !!}
                        {!! Form::text('sotap', isset($movie) ? $movie->sotap :'', ['class'=>'form-control','placeholder'=>'nhập vào dữ liệu']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('thoiLuong', 'thời lượng', []) !!}
                        {!! Form::text('thoiLuong', isset($movie) ? $movie->thoiLuong :'', ['class'=>'form-control','placeholder'=>'nhập vào dữ liệu','id'=>'thoiLuong']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('description', 'description', []) !!}
                        {!! Form::textarea('description', isset($movie) ? $movie->description :'', ['class'=>'form-control','placeholder'=>'nhập vào dữ liệu','id'=>'description']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('trailer', 'Trailer', []) !!}
                        {!! Form::text('trailer', isset($movie) ? $movie->trailer :'', ['class'=>'form-control','placeholder'=>'nhập vào dữ liệu']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('tags', 'Tags', []) !!}
                        {!! Form::textarea('tags', isset($movie) ? $movie->tags :'', ['class'=>'form-control','placeholder'=>'nhập vào dữ liệu']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('category', 'category', []) !!}
                        {!! Form::select('category_id',$category,isset($movie)? $movie->category_id : '', ['class'=>'form-control']) !!}
                    </div>
                   <div class="form-group">
                        {!! Form::label('genre', 'genre: ', []) !!}
                        @foreach($list_genre as $key => $gen)
                            @if(isset($movie))
                            {!! Form::checkbox('genre[]', $gen->id,isset($movie_genre)&& $movie_genre->contains($gen->id)? true:false) !!}
                            @else
                            {!! Form::checkbox('genre[]', $gen->id) !!}
                            @endif
                            {!! Form::label('genre', $gen->title) !!}
                        @endforeach
                    </div>

                    <div class="form-group">
                        {!! Form::label('Active', 'active', []) !!}
                        {!! Form::select('status',['1'=>'hiển thị','0'=>'không'],isset($movie)? $movie->status : '', ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('resolution', 'quality', []) !!}
                        {!! Form::select('resolution',['0'=>'HD','1'=>'SD',2=>'FullHD'],isset($movie)? $movie->resolution : '', ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('phuDe', 'Phụ đề', []) !!}
                        {!! Form::select('phuDe',['0'=>'phụ đề','1'=>'Thuyết minh',2=>'FullHD'],isset($movie)? $movie->phuDe : '', ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                    {!! Form::label('image', 'image') !!}
                    {!! Form::file('image', ['class'=>'form-control-file']) !!}
                    @if(isset($movie))
                        <img width="20%" src="{{asset('uploads/movie/'.$movie->image)}}">
                    @endif
                </div>

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
