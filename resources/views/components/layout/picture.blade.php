@props(['size'=>200,'url'])
{{-- @php --}}
{{-- // $url = $member->getAvatar($size)?? 'https://eu.ui-avatars.com/api/?name=' .urlencode(auth()->user()->name); --}}
{{-- @endphp --}}
<span {{$attributes->merge(['class'=>'avatar'])}} style="background-image: url({{ $url }})"></span>
