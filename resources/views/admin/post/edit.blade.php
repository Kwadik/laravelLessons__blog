@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование поста</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.post.index') }}">Посты</a></li>
                            <li class="breadcrumb-item active">{{ $post->title }}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('admin.post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group w-25">
                                <input type="text" name="title" class="form-control" value="{{ $post->title }}" placeholder="название поста">
                                @error('title')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <textarea id="summernote" name="content">{{ $post->content }}</textarea>
                                @error('content')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="is_featured" id="is_featured"
                                    {{ intval($post->is_featured) ? ' checked' : '' }}
                                >
                                <label class="form-check-label" for="is_featured">Отобразить в топе на главной</label>
                            </div>
                            <div class="form-group w-50">
                                <label>Превью</label>
                                <div class="w-50">
                                    <img src="{{ url('storage/'.$post->preview_image) }}" alt="preview_image" class="w-50 mb-2">
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="preview_image" class="custom-file-input">
                                        <label class="custom-file-label">Изображение не выбрано</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Добавить</span>
                                    </div>
                                </div>
                                @error('preview_image')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group w-50">
                                <label>Главное изображение</label>
                                <div class="w-50">
                                    <img src="{{ url('storage/'.$post->main_image) }}" alt="main_image" class="w-50 mb-2">
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="main_image" class="custom-file-input">
                                        <label class="custom-file-label">Изображение не выбрано</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Добавить</span>
                                    </div>
                                </div>
                                @error('main_image')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group w-50">
                                <label for="category">Категории</label>
                                <select class="form-control" id="category" name="category_id">
                                    @foreach($categories as $category)
                                        <option
                                            {{ $category->id == $post->category_id ? ' selected' : '' }}
                                            value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group w-50">
                                <label>Теги</label>
                                <select class="select2" name="tag_ids[]" multiple="multiple" data-placeholder="выберите теги" style="width: 100%;">
                                    @foreach($tags as $tag)
                                        <option
                                            {{ is_array($post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray()) ? ' selected' : '' }}
                                            value="{{ $tag->id }}">{{ $tag->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Обновить" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
