@props(['size'=>200])
@php
$url = Auth::user()->getAvatar($size)?? 'https://eu.ui-avatars.com/api/?name=' .urlencode(auth()->user()->name);
@endphp
<span {{$attributes->merge(['class'=>'avatar'])}} style="background-image: url({{ $url }})"></span>
