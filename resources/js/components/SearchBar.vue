<template lang="html">
  <div class="w-full border-bottom">
    <i class="fas fa-search"></i>
    <input type="text" class="border-none" v-model="search" @keyup="filter" >
  </div>
</template>

<script>
import _ from 'lodash';

export default {
  props: ['value'],
  created(){
    this.original = this.value;
  },
  data(){
    return {
      search: '',
      original: '',
      filtered: ''
    }
  },
  methods:{
    filter(){
      let result = this.original;

      if(this.search != ''){
        this.filtered = _.filter(this.original, (user) => {
          return user.name.includes(this.search);
        });
        console.log(this.filtered);
        result = this.filtered.length > 0 ? this.filtered : [];
      }
      this.$emit('input', result);
    }
  }
}
</script>

<style lang="css">
</style>
