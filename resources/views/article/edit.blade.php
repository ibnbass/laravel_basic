@extends('layouts.app')

@section('title', 'Modification de  l\'article')


@section('content')
	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	<form method="post">
		{{ csrf_field() }}
		<div class="form-group">
			<label for="title">Titre : </label>
			<input type="text" id="title" name="title" class="form-control"
			value="{{ $article->title }}">
		</div>
		<div class="form-group">
			<textarea rows="10" id="content" name="content" class="form-
			control">{{ $article->content }}</textarea>
		</div>
		<input type="submit" value="Publier" class="btn btn-default">
	</form>
@endsection