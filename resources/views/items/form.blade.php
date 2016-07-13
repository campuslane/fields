<div class="form-group">
	<label for="title">Title</label>
	<input type="text" name="title" class="form-control" value="{{ old('title', $item->title) }}">
</div>

<div class="form-group">
	<label for="content">Content</label>
	<textarea name="content" class="form-control">{{ old('content', $item->content) }}</textarea>
</div>

@foreach($fields as $field)
	<div class="form-group">
		<label for="{{ $field['name'] }}">{{ $field['label'] }}</label>
		<input type="text" name="{{ $field['name'] }}" class="form-control" value="{{ old($field['name'], $item->field($field['name'])) }}">
	</div>
@endforeach

<input type="hidden" name="type" value="{{ $type }}">