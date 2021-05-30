<template>
  <button 
    :class="bStyle"
    type="button"
    :data-id="id"
    v-on:click="onClick">
    <Icon :name="icon" class="icon" v-if="icon"/>
    <span class="label">{{ label }}</span>
</button>
</template>

<script>
import Icon from './Icon'

export default {
  name: 'Button',
  props: {
    label: {
      type: String,
      required: false
    },
    icon: {
      type: String,
      required: false
    },
    id: {
      type: String,
      required: false
    },
    bStyle: {
      type: String,
      required: false,
      default: 'default',
      validator: value => {
        let acceptedValues = [
          'default',
          'icon-only'
        ]
        return acceptedValues.includes(value)
      }
    }
  },
  components: {
    Icon  
  },
  methods: {
    onClick: function(ev) {
      let id = ev.target.getAttribute('data-id');
      this.$emit('click', id)
    }
  }
}
</script>

<style lang="scss" scoped>
button {
  background-color: #3e464c;
  border: none;
  cursor: pointer;
  .label {
    color: #fff;
    font-size: 14px;
    pointer-events: none;
  }
  .icon {
    width: 11px;
    float: left;
    margin-right: 7px;
    margin-top: 3.5px;
    pointer-events: none;
  }
  &.default {
    padding: 8px 15px;
  }
  &.icon-only {
    padding: 5px;
    .icon { 
      width: 15px;
      margin-right: 0;
      margin-top: 2.5px;
      padding: 0 2px;
    }
  }
}
</style>
