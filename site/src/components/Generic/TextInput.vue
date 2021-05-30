<template>
    <div>
      <label 
        :for="name" 
        class="text-input-label">
        {{ label }}:
      </label>
      <input 
        :type="type ? type : 'text'" 
        :name="name" 
        class="text-input"
        :value="value"
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
    },
    type: {
      type: String,
      required: false,
      validator: value => {
        let acceptedValues = ['text', 'password']
        return acceptedValues.includes(value)
      }
    },
    value: {
      type: String,
      required: false
    }
  },
  data() {
    return {}
  },
  components: {},
  methods: {
    onChange: function(ev) {
      if (ev) {
        let data = {
          name: ev.target.name,
          value: ev.target.value
        }
        this.$emit('change-text', data)
      }
    },
  }
}
</script>

<style lang="scss" scoped>
.text-input {
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
.text-input-label {
  color: #000;
  font-size: 14px;
  margin-right: 5px;
  font-weight: bold;
}
</style>
