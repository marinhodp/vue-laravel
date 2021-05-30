<template>
  <div>
    <img v-if="name == 'edit'" :src="Edit" />
    <img v-if="name == 'delete'" :src="Delete" />
  </div>
</template>

<script>
export default {
  name: 'Icon',
  props: {
    name: {
      type: String,
      required: true,
      validator: value => {
        let acceptedValues = [
          'edit',
          'delete'
        ]
        return acceptedValues.includes(value)
      }
    },
  },
  data() {
    return {
      Edit: require('../../assets/pencil-white.svg'),
      Delete: require('../../assets/delete-white.svg')
    }
  }
}
</script>

<style lang="scss" scoped>
</style>
