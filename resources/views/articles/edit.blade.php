@extends ('layout.app')


@section('title')
  Edition {{ $article->id }}
  @endSection


@section('content')
  <div class="content">

    <h5 class="alert alert-info noDeco"><a href="{{ url ('articles') }}">Retour à la liste</a></h5>

    <div class="title">

      <h1>Edition : {{ $article->title }}</h1>

      <p>{{$article->published_at}}</p>


      @if ($errors->any())

        <ul class="alert alert-danger noDeco">
          @foreach($errors->all() as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>

      @endif


      {{ Debugbar::addMessage($article, date('Y-m-d H:i:s')) }}
      {{ debug(['ttt',$article], $errors, date('Y-m-d H:i:s')) }}


      {!! Form::model($article, ['method' => 'PATCH', 'action'=>['ArticlesController@update', $article->id]]) !!}

      <div class=" form-group">
        {!! form::label('title', 'Title: ', ['class' => 'control-label']) !!}
        {!! form::text('title', null, ['class' => 'form-control']) !!}
      </div>

      <div class="form-group">
        {!! form::label('body', 'Body: ', ['class' => 'control-label']) !!}
        {!! form::textarea('body', null, ['class' => 'form-control']) !!}
      </div>

      <div class="form-group">
        {!! form::label('published_at', 'Publish On: ', ['class' => 'control-label']) !!}
        {!! form::date('published_at', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
      </div>

      <div class="form-group">
        {!! form::submit('Update Article', ['class' => 'btn btn-primary form-control']) !!}
      </div>


      {!! Form::close() !!}

    </div>

  </div>
  </div>

@endsection
