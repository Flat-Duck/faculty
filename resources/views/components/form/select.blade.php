@props(['name', 'placeholder'])

<div {{$attributes->merge(['class'=>'mb-3'])}}>
    <label class="form-label" for="{{$name}}">{{$placeholder}}</label>
    <select class="form-control @error($name) is-invalid @enderror" 
        name="{{$name}}" id="{{$name}}">
        @foreach ($items as $item)
            <option value="{{ $item }}"
                {{ is_array(old($name)) && in_array($items, old($name)) ? 'selected' : '' }} >{{ $item }}
            </option>
        @endforeach
    </select>
    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror                                        
</div>