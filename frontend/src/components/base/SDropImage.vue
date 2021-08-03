<template>
  <v-flex>
    <vue-dropzone
      :id="`customdropzone_${id}`"
      class="customdropzone"
      :options="dropzoneOptions"
      :useCustomSlot="true"
    >
      <div class="dropzone-custom-content">
        <h3 class="dropzone-custom-title">Drag and drop to upload content!</h3>
        <div class="subtitle">
          ...or click to select a file from your computer
        </div>
      </div>
    </vue-dropzone>
  </v-flex>
</template>

<script>
import vue2Dropzone from "vue2-dropzone";
import "vue2-dropzone/dist/vue2Dropzone.min.css";

import { FILE_UPLOAD_FILEBIN, FILE_UPLOAD_CHUNKSIZE } from "@/utils/const";

export default {
  name: "SDropImage",
  props: {
    id: String,
    noLabel: Boolean,
    label: String,
    comment: String,
  },
  components: {
    vueDropzone: vue2Dropzone,
  },
  data() {
    return {
      dropzoneOptions: {
        paramName: "file",
        url: process.env.VUE_APP_API_FILE_UPLOAD_URL || FILE_UPLOAD_FILEBIN,
        thumbnailWidth: 200,
        addRemoveLinks: true,
        chunking: true,
        chunkSize:
          process.env.VUE_APP_API_FILE_UPLOAD_CHUNKSIZE ||
          FILE_UPLOAD_CHUNKSIZE,
        // previewTemplate: this.template(),
      },
    };
  },
  methods: {
    template: function () {
      return `
            <div class="dz-preview dz-file-preview">
                <div class="dz-image">
                    <div data-dz-thumbnail-bg></div>
                </div>
                <div class="dz-details">
                    <div class="dz-size"><span data-dz-size></span></div>
                    <div class="dz-filename"><span data-dz-name></span></div>
                </div>
                <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
                <div class="dz-error-message"><span data-dz-errormessage></span></div>
                <div class="dz-success-mark"><i class="fa fa-check"></i></div>
                <div class="dz-error-mark"><i class="fa fa-close"></i></div>
            </div>
        `;
    },
    thumbnail: function (file, dataUrl) {
      var j, len, ref, thumbnailElement;
      if (file.previewElement) {
        file.previewElement.classList.remove("dz-file-preview");
        ref = file.previewElement.querySelectorAll("[data-dz-thumbnail-bg]");
        for (j = 0, len = ref.length; j < len; j++) {
          thumbnailElement = ref[j];
          thumbnailElement.alt = file.name;
          thumbnailElement.style.backgroundImage = 'url("' + dataUrl + '")';
        }
        return setTimeout(
          (function () {
            return function () {
              return file.previewElement.classList.add("dz-image-preview");
            };
          })(this),
          1
        );
      }
    },
  },
};
</script>

<style lang="sass" scope>

.customdropzone
  position: relative

  .dropzone-custom-content
    position: absolute
    top: 50%
    left: 50%
    transform: translate(-50%, -50%)
    text-align: center

  .dropzone-custom-title
    margin-top: 0
    color: #00b782

  .dz-image
    img
      border-radius: 100%
      object-fit: contain

  .subtitle
    color: #314b5f
</style>
