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



