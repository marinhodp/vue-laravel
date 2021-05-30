<template>
  <button 
    class="default"
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
      required: true
    },
    icon: {
      type: String,
      required: false
    },
    id: {
      type: String,
      required: false
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
button.default {
  background-color: #3e464c;
  border: none;
  padding: 8px 15px;
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
}
</style>
