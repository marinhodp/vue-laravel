<template>
  <div class="img-wrapper">
    <div class="img" :style="`background-image: url('${src}');`"></div>
  </div>
</template>

<script>
export default {
  name: 'Thumbnail',
  props: {
    src: {
      type: String,
      required: true
    }
  }
}
</script>

<style lang="scss" scoped>
.img-wrapper {
  .img {
    width: 100px;
    height: 100px;
    background-repeat: no-repeat, repeat;
    background-position: center;
    background-size: cover;
  }
}
</style>
