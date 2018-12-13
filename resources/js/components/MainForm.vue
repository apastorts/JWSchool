<template>
    <div class="md:w-1/2 sm:w-full m-auto p-2">
      <div>
        <datepicker input-class="m-4 bg-transparent p-2 font-bold text-lg border-bottom" v-model="today" ></datepicker>
      </div>
       <div>
         <div class="w-full">
           <div class="treasures p-2 text-center text-4xl">
             Treasures From God's Word
           </div>
           <div class="flex justify-between text-lg">
             <div class="p-2 font-bold block">Treasures Talk</div>
             <div class="p-2 font-bold block">
               <div class="bibleReading-selection inline-block">
                 {{talk.name}}
               </div>
               <select-user :users=users v-model="talk"></select-user>
             </div>
           </div>
           <div class="flex justify-between text-lg">
             <div class="p-2 font-bold block">Digging For Spiritual Gems</div>
             <div class="p-2 font-bold block">
               <div class="bibleReading-selection inline-block">
                 {{digging.name}}
               </div>
               <select-user :users=users v-model="digging"></select-user>
             </div>
           </div>
           <div class="flex justify-between text-lg">
             <div class="p-2 font-bold block">Bible Reading</div>
             <div class="p-2 font-bold block">
               <div class="bibleReading-selection inline-block">
                 {{bibleReading.name}}
               </div>
               <select-user :users=users v-model="bibleReading"></select-user>
             </div>
           </div>
         </div>
       </div>
       <div>
         <div class="w-full">
           <div class="apply-yourself p-2 text-center text-4xl">
             Apply Yourself To The Field Ministry
           </div>
           <div class="flex justify-between text-lg">
             <div class="p-2 font-bold block">Initial Call</div>
             <div class="p-2 font-bold block">
               <div class="bibleReading-selection inline-block">
                 {{initial.name}}
               </div>
               <select-user :users=users v-model="initial"></select-user>
             </div>
           </div>
           <div class="flex justify-between text-lg">
             <div class="p-2 font-bold block">First Return Visit</div>
             <div class="p-2 font-bold block">
               <div class="firstRV-selection inline-block">
                 {{firstRV.name}}
               </div>
               <select-user :users=users v-model="firstRV"></select-user>
             </div>
           </div>
           <div class="flex justify-between text-lg">
             <div class="p-2 font-bold block">Bible Study / Talk</div>
             <div class="p-2 font-bold block">
               <div class="talk-selection inline-block">
                 {{talk.name}}
               </div>
               <select-user :users=users v-model="talk"></select-user>
             </div>
           </div>
         </div>
       </div>
       <div>
         <div class="w-full">
           <div class="living p-2 text-center text-4xl">
             Living As Christians
           </div>
           <div class="flex justify-between text-lg">
             <div class="p-2 font-bold block">Local Needs / Talk</div>
             <div class="p-2 font-bold block">
               <div class="talk-selection inline-block">
                 {{localNeeds.name}}
               </div>
               <select-user :users=users v-model="localNeeds"></select-user>
             </div>
           </div>
           <div class="flex justify-between text-lg">
             <div class="p-2 font-bold block">2nd Part</div>
             <div class="p-2 font-bold block">
               <div class="talk-selection inline-block">
                 {{secondPart.name}}
               </div>
               <select-user :users=users v-model="secondPart"></select-user>
             </div>
           </div>
           <div class="flex justify-between text-lg">
             <div class="p-2 font-bold block">Congregation Bible Study</div>
             <div class="p-2 font-bold block">
               <div class="talk-selection inline-block">
                 {{congregationBible.name}}
               </div>
               <select-user :users=users v-model="congregationBible"></select-user>
             </div>
           </div>
         </div>
       </div>
    </div>
</template>

<script>
  import Datepicker from 'vuejs-datepicker';
  var moment = require('moment');
  
    export default {
        components: {
          Datepicker
        },
        data(){
          return{
            today: moment().format(),
            users: '',
            bibleReading: {
              name: 'Not Assigned'
            },
            talk: {
              name: 'Not Assigned'
            },
            digging: {
              name: 'Not Assigned'
            },
            initial: {
              name: 'Not Assigned'
            },
            firstRV: {
              name: 'Not Assigned'
            },
            talk: {
              name: 'Not Assigned'
            },
            congregationBible: {
              name: 'Not Assigned'
            },
            secondPart: {
              name: 'Not Assigned'
            },
            localNeeds: {
              name: 'Not Assigned'
            },
          }
        },
        mounted() {
          axios
            .get('/api/users')
            .then(response => (this.users = response.data.data));
        }
    }
</script>
