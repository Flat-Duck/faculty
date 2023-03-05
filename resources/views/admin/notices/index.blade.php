@extends('admin.layouts.app', ['page' => 'notices'])

@section('title', 'قائمة الاشعارات')

@section('content')
    <div class="container-xl">
        <div class="page-header d-print-none">
            <h2 class="page-title">
                {{ __('الاشعارات') }}
            </h2>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
<div class="row justify-content-center">
    <div class="col-8">
      <div class="card">
        <div class="card-body">
          <div class="divide-y">
            @foreach ($notices as $notice)
            <x-layout.notice :notice="$notice" />
            @endforeach                 
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection