@extends('admin.master')
@section('content')
    <h1 class="h3 mb-4 text-gray-800">All Notifications</h1>
    <div class="lest-group">
        @foreach (Auth::user()->notifications as $item)
            <a href="" class="list-group-item list-group-item-action {{ $item->read_at ? '' : 'bg-light' }}" aria-current="true">
                {{ $item->data['message'] }}
            </a>
        @endforeach



    </div>
@endsection


@section('title', 'Dashboard')
