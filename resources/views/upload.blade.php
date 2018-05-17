@extends('layouts.dashboard')




@section('title')

<h3 class="text-primary">Upload Images</h3>

@endsection


@section('css')

{{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
<link href="{{ asset('css/mediamanager.css') }}" rel="stylesheet">
<style>


</style>

@endsection


@section('content')


<div id="upload"> 



    <div class="input-group">
        <input type="text" class="form-control" name="page_image" id="page_image" alt="Image thumbnail" placeholder="Page Image" v-model="pageImage">
        <span>
            <button type="button" class="btn btn-primary" @click="showMediaManager = true">Select Image</button>
        </span>
    </div>


    <media-modal v-if="showMediaManager" @media-modal-close="showMediaManager = false">
        <media-manager
        :is-modal="true"
        selected-event-name="editor"
        @media-modal-close="showMediaManager = false"
        >
    </media-manager>
</media-modal>
</div>




@endsection


@section('script')
<script src="{{asset('js/font-awesome.all.js')}}"></script>
<script src="{{ asset('js/mediamanager.js') }}"></script>
<script>

    function goBack() {
        window.history.back();
    }
</script>
@endsection