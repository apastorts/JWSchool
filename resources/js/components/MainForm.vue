<template>
    <div class="container">
       <datepicker></datepicker>
    </div>
</template>

<script>
  import Datepicker from 'vuejs-datepicker';

    export default {
        components: {
          Datepicker
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
