<!-- html5 url input -->
  <div class="form-group">
    <label>{{ $field['label'] }}</label>
    <input
    	type="url"
    	class="form-control"

    	@foreach ($field as $attribute => $value)
            @if (is_string($attribute) && is_string($value))
        		@if($attribute == 'value')
                    {{ $attribute }}="{{ old($field['name']) ? old($field['name']) : $value }}"
                @else
                    {{ $attribute }}="{{ $value }}"
                @endif
            @endif
    	@endforeach
    	>
  </div>