<template lang="html">
  <div>
    <button @click="show = true">Select</button>
    <div v-if="show" class="absolute z-10 bg-white shadow p-4 pin-x">
      <div class="p-2 font-bold text-lg">
        List of users
      </div>
      <div v-for="user in users" @click="$emit('input', user)" class="flex justify-between p-2 hover:bg-blue-light hover:text-white cursor-pointer shadow-inner-lg">
        <div>
          {{user.name}}
        </div>
        <div class="text-black" v-if="value.id == user.id">
          <i class="fas fa-check-circle"></i>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props:['value', 'users'],
  data(){
    return{
      show: false
    }
  }
}
</script>

<style lang="css">
</style>
