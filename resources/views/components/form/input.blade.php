@props([
    'type'=>'text','name','placeholder','value','disabled'=>false
    ])

<div {{$attributes->merge(['class'=>'mb-3'])}}>
    <label class="form-label" for="{{$name}}">{{$placeholder}}</label>
    <input type="{{$type}}"
        class="form-control @error($name) is-invalid @enderror"
        name="{{$name}}"
        {{$disabled}}
        placeholder="{{$placeholder}}"
        value="{{$value?? old($name) }}"
        id="{{$name}}"
        {{-- @if($name=="phone")
        data-mask="0000000000" data-mask-visible="true" autocomplete="off" spellcheck="false" data-ms-editor="true"
        @endif --}}
        />
        @error($name)
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror                                        
</div>