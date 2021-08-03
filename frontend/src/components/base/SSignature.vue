<template>
  <v-flex class="signature-container">
    <VueSignaturePad
      class="signature-canvas"
      width="100%"
      height="200px"
      ref="signaturePad"
      :options="{ onBegin, onEnd }"
    />
    <div>
      <button class="signature-control-button" @click="save">Save</button>
      <button class="signature-control-button" @click="undo">Undo</button>
    </div>
  </v-flex>
</template>

<script>
export default {
  name: "SSignature",
  props: {
    noLabel: Boolean,
    label: String,
    comment: String,
  },
  data() {
    return {};
  },
  methods: {
    undo() {
      this.$refs.signaturePad.undoSignature();
    },
    save() {
      const { isEmpty, data } = this.$refs.signaturePad.saveSignature();
      console.log(isEmpty);
      console.log(data);
    },
    onBegin() {},
    onEnd() {},
  },
};
</script>

<style lang="sass" scope>

.signature-container
    display: flex
    flex-direction: column
    align-items: center

    .signature-canvas
        border-radius: 15px
        background-color: #efefef
        cursor: pencil

    .signature-control-button
        display: none
        width: 100px
        height: 50px
        background-color: lightgray
        border-radius: 3px
        margin: 10px

        &:hover
            background-color: #cfcfcf
            color: white
</style>
