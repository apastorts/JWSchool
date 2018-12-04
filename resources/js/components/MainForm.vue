<template>
    <div class="container">
      <div class="row">
        <datepicker></datepicker>
      </div>
       <div class="row">
         <div class="col-md-8">
           <div class="treasures p-2 text-center text-4xl">
             Treasures From God's Word
           </div>
           <div class="p-2 font-bold" >Bible Reading:</div>
         </div>
       </div>
       <div class="row">
         <div class="col-md-8">
           <div class="apply-yourself p-2 text-center text-4xl">
             Apply Yourself To The Field Ministry
           </div>
         </div>
       </div>

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
