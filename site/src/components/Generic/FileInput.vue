<template>
  <div>
    <label 
      :for="name" 
      class="file-input-label">
      {{ label }}:
    </label>
    <input 
      type="file" 
      :name="name" 
      class="file-input"
      v-on:change="onChange" />
  </div>
</template>

<script>
export default {
  name: 'TextInput',
  props: {
    name: {
      type: String,
      required: true
    },
    label: {
      type: String,
      required: true
    }
  },
  data() {
    return {}
  },
  components: {},
  methods: {
    onChange: function(ev) {
      if (ev) {
        let file = ev.target.files[0]
        let reader = new FileReader()
        reader.readAsDataURL(file)
        reader.onloadend = () => {
          let data = {
            name: ev.target.name,
            value: reader.result
          }
          this.$emit('change-file', data)
        }
      }
    },
  }
}
</script>

<style lang="scss" scoped>
.file-input {
  border: none;
  border-bottom: 2px solid;
  background-color: transparent;
  border-color: #2c3e50;
  color: #000;
  padding-bottom: 3px;
  text-align: left;
  margin-bottom: 15px;
  font-size: 14px;
  outline: none;
  width: 100%;
  max-width: 220px;
}
.file-input-label {
  color: #000;
  font-size: 14px;
  margin-right: 5px;
  font-weight: bold;
}
</style>
