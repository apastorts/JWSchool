<template lang="html">
  <div class="inline-block">
    <i class="fas fa-plus ml-2 cursor-pointer hover:text-grey-darker" @click="show = true"></i>
    <div v-if="show" v-click-outside="toggle" class="absolute z-10 bg-white shadow p-4 pin-x">
      <div class="flex justify-between">
        <div class="p-2 font-bold text-xl">
          List of users
        </div>
        <div>
          <search-bar v-model="allUsers"></search-bar>
        </div>
      </div>
      <div class="p-2 overflow-scroll h-64">
        <div v-for="user in allUsers" @click="$emit('input', user)" class="flex justify-between p-2 hover:bg-blue-lightest text-lg cursor-pointer shadow-inner-lg">
          <div>
            {{user.name}}
          </div>
          <div class="text-black">
            <div class="text-grey mr-2 inline-block">
              {{ user.role.name }}
            </div>
            <i class="fas fa-check-circle inline-block" v-if="value.id == user.id"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import ClickOutside from 'vue-click-outside'

export default {
  props:['value', 'users'],
  data(){
    return{
      show: false,
      allUsers: ''
    }
  },
  watch:{
    users: function(){
      this.allUsers = this.users;
    }
  },
  methods: {
    toggle() {
      this.show = false;
    }
  },
  mounted () {
    this.popupItem = this.$el;
    console.log(this.users);
  },
  directives: {
    ClickOutside
  }
}
</script>

<style lang="css">
</style>
