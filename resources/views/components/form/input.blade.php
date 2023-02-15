@props([
    'type'=>'text','name','placeholder','value'
    ])

<div {{$attributes->merge(['class'=>'mb-3'])}}>
    <label class="form-label" for="{{$name}}">{{$placeholder}}</label>
    <input type="{{$type}}"
        class="form-control @error($name) is-invalid @enderror"
        name="{{$name}}"
        placeholder="{{$placeholder}}"
        value="{{$value?? old($name) }}"
        id="{{$name}}"/>
        @error($name)
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror                                        
</div>