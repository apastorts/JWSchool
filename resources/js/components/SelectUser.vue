<template lang="html">
  <div>
    <button @click="show = true">Select</button>
    <div v-if="show">
      List of users
      <div v-for="user in users" @click="$emit('input', user.id)">{{user.name}}</div>
    </div>
  </div>
</template>

<script>
export default {
  props:['value', 'users'],
  data(){
    return{
      show: false,
      talk: this.value
    }
  }
}
</script>

<style lang="css">
</style>
