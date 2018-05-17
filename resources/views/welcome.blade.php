@extends('layout')

@section('content')
    <h1>
        <a href="https://github.com/talvbansal/media-manager">
            Media-manager example laravel project
        </a>
    </h1>
    <hr>
  
    <div>
        <media-modal v-if="showMediaManager" @media-modal-close="showMediaManager = false">
            <media-manager
                    :is-modal="true"
                    selected-event-name="editor"
                    @media-modal-close="showMediaManager = false"
            >
            </media-manager>
        </media-modal>

        <div class="form-group">
            <div class="input-group">
                <input type="text" class="form-control" name="page_image" id="page_image" alt="Image thumbnail" placeholder="Page Image" v-model="pageImage">
                <span class="input-group-btn">
                <button type="button" class="btn btn-default" @click="showMediaManager = true">Select Image</button>
            </span>
            </div>

            <div>
                <img v-if="pageImage" class="img img-responsive" id="page-image-preview" style="margin-top: 3px; max-height:250px;" :src="pageImage"/>
                <span v-else class="text-muted small">No Image Selected</span>
            </div>
        </div>


    </div>

@endsection