@extends('layout')




@section('title')

<h3 class="text-primary">Upload Images</h3>

@endsection




@section('content')

<button class="btn btn-primary" onclick="goBack()"><i class="fas fa-cog"></i></button>

<div id="upload"> 
  <div>
    <media-modal v-if="showMediaManager" @media-modal-close="showMediaManager = false">
        <media-manager
        :is-modal="true"
        selected-event-name="editor"
        @media-modal-close="showMediaManager = false"
        >
    </media-manager>
</media-modal>

<div class="form-group" style="
    position: absolute;
    left: 50%;
    right: 50%;
">
    <div class="input-group">

        <span class="input-group-btn">
            <button type="button" class="btn btn-danger" @click="showMediaManager = true">Upload Image</button>
        </span>
    </div>
</div>


</div>
</div>




@endsection


@section('script')

<script>
    const app = new Vue({
        el: '#upload',
        data() {
            return {
                showMediaManager: false,
                pageImage: null,
            }
        },

        mounted() {
            window.eventHub.$on('media-manager-selected-editor', (file) => {
                // Do something with the file info...
                console.log(file.name);
                console.log(file.mimeType);
                console.log(file.relativePath);
                console.log(file.webPath);
                this.pageImage = file.webPath;

                // Hide the Media Manager...
                this.showMediaManager = false;
            });
        }
    });


    function goBack() {
        window.history.back();
    }
</script>
@endsection