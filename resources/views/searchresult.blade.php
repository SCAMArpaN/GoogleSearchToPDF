@extends('layouts.app')

@section('content')
<div class="container h-100">
    <div class="row justify-content-center h-100">
        <div class="mb-1">
            <button type="button" onclick="download()" class="btn btn-primary">{{ __("Download as ")."PDF" }}</button>
            <a href="{{ route('home') }}" class="float-end"><button type="button" class="btn btn-secondary">{{ __("Back") }}</button></a>
        </div>
        <iframe class="w-100 h-75" src="{{ route('result_show',$usersearchid) }}" id="printf"></iframe>
    </div>
</div>
@endsection
@push("scriptBottom")
    <script>
        function download() {
            var frm = document.getElementById("printf").contentWindow;
            frm.focus();// focus on contentWindow is needed on some ie versions
            frm.print();
            return false;
        }
    </script>
@endpush
