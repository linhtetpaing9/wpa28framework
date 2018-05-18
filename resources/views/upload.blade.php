@extends('layout')




@section('title')

<h3 class="text-primary">Upload Images</h3>

@endsection


@section('css')

<link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
<link href="{{ asset('css/mediamanager.css') }}" rel="stylesheet">

@endsection


@section('content')


<div id="upload">
	<button class="btn btn-primary" onclick="goBack()"><i class="fas fa-cog"></i></button>

        <media-manager
        :is-modal="true"
        selected-event-name="editor"
        @media-modal-close="showMediaManager = false"
        >
    </media-manager>

</div>




@endsection


@section('script')

<script src="{{asset('js/font-awesome.all.js')}}"></script>
<script src="{{asset('js/dashboard.js')}}"></script>
<script src="{{ asset('js/mediamanager.js') }}"></script>
<script>

    function goBack() {
        window.history.back();
    }
</script>
@endsection