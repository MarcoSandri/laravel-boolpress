@extends('admin.layouts.base')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
          <h1>Nuovo Post</h1>

          <form method="POST" action="{{route('admin.posts.store')}}" enctype="multipart/form-data">

            @csrf

            <div class="form-group">
              <label for="image">Immagine di copertina</label>
              <input class="form-control" type="file" name="image" id="image">
            </div>

            <div class="form-group">
              <label for="title">Titolo</label>
              <input name="title" type="text" class="form-control" id="title" placeholder="Titolo" value="{{old('title')}}">
            </div>

            <div class="form-group">
              <label for="content">Contenuto</label>
              <textarea name="content" class="form-control" id="content" rows="10"> {{old('content')}} </textarea>
            </div>

            <select class="form-control" id="category_id" name="category_id">
              <option value="">Nessuna categoria</option>

              @foreach ($categories as $category)
                <option {{old('category_id') == $category->id ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
              @endforeach
              
              
              @foreach ($tags as $tag)

                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" value="{{$tag->id}}" id="tag_{{$tag->id}}" name="tags[]" {{in_array($tag->id, old('tags', []))?'checked':''}}>
                  <label class="custom-control-label" for="tag_{{$tag->id}}">
                    {{$tag->name}}
                  </label>
                </div>
                  
                @endforeach



            </select>

            <button type="submit" class="btn btn-primary my-3">Salva</button>
          
          </form>
        </div>
    </div>
</div>
@endsection