@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    {{--@if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('You are logged in!') }}--}}

                    <form method="POST" action="{{ route('search_result') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Google Search') }}</label>
                            <div class="col-md-6">
                                <input id="search" type="text" class="form-control" name="search" value="{{ old('search') }}" placeholder="Enter the text to search" required autocomplete="search" autofocus>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Search') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @if(count($old_results) > 0)
            <div>
                <table class="table">
                    <tr>
                        <th>Sr no.</th>
                        <th>Search param</th>
                        <th>At</th>
                        <th>Action</th>
                    </tr>
                    @foreach($old_results as $key=>$old_result)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$old_result->search_query}}</td>
                        <td>{{$old_result->created_at}}</td>
                        <td><a href="{{route("result_old",$old_result->id)}}">View</a></td>
                    </tr>
                    @endforeach
                </table>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
