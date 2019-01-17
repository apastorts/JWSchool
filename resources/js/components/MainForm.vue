<template>
    <div class="md:w-1/2 sm:w-full m-auto p-2">
      <div class="flex flex-row justify-between">
        <div>
          <datepicker input-class="m-4 bg-transparent p-2 font-bold text-lg border-bottom" v-model="meetingDate" @input="updateDate" ></datepicker>
        </div>
        <div>
          <div class="rounded py-2 px-4 text-white text-xl font-bold bg-blue hover:bg-blue-darker cursor-pointer" @click="saveMeeting">
            <i class="fas fa-save inline-block mr-2"></i>
            Save
          </div>
        </div>
      </div>
       <div>
         <div class="w-full">
           <div class="treasures p-2 text-center text-4xl">
             Treasures From God's Word
           </div>
           <div class="flex justify-between text-lg" v-for="(talk, index) in treasures">
             <input class="p-2 font-bold block" v-model="treasures[index].title" />
             <div class="p-2 font-bold block">
               <div class="bibleReading-selection inline-block">
                 {{talk.user.name}}
               </div>
               <select-user :users="users" v-model="treasures[index].user"></select-user>
             </div>
           </div>
           <div class="text-center p-2 text-4xl">
             <i class="fas fa-plus-circle cursor-pointer text-blue" @click="newField('treasures')"></i>
           </div>
         </div>
       </div>
       <div>
         <div class="w-full">
           <div class="apply-yourself p-2 text-center text-4xl">
             Apply Yourself To The Field Ministry
           </div>
           <div class="flex justify-between text-lg" v-for="(talk, index) in ministry">
             <input class="p-2 font-bold block" v-model="ministry[index].title" />
             <div class="p-2 font-bold block">
               <div class="bibleReading-selection inline-block">
                 {{talk.user.name}}
               </div>
               <select-user :users="users" v-model="ministry[index].user"></select-user>
             </div>
           </div>
           <div class="text-center p-2 text-4xl">
             <i class="fas fa-plus-circle cursor-pointer text-blue" @click="newField('ministry')"></i>
           </div>
         </div>
       </div>
       <div>
         <div class="w-full">
           <div class="living p-2 text-center text-4xl">
             Living As Christians
           </div>
           <div class="flex justify-between text-lg" v-for="(talk, index) in christianLiving">
             <input class="p-2 font-bold block" v-model="christianLiving[index].title" />
             <div class="p-2 font-bold block">
               <div class="bibleReading-selection inline-block">
                 {{talk.user.name}}
               </div>
               <select-user :users="users" v-model="christianLiving[index].user"></select-user>
             </div>
           </div>
           <div class="text-center p-2 text-4xl">
             <i class="fas fa-plus-circle cursor-pointer text-blue" @click="newField('christianLiving')"></i>
           </div>
       </div>
     </div>
    </div>
</template>

<script>
  import Datepicker from 'vuejs-datepicker';
  var moment = require('moment');

    export default {
        props: {
          meeting:{
            type: Object,
            default: null
          }
        },
        components: {
          Datepicker
        },
        data(){
          return{
            meetingDate: moment().day(3).toDate(),
            users: '',
            treasures: [],
            ministry: [],
            christianLiving: []
          }
        },
        mounted() {
          axios
            .get('/api/users')
            .then(response => (this.users = response.data.data));

            if(this.meeting){
              this.meeting.talks.forEach((talk) => {
                console.log(talk + ' done');
                this[talk.type].push(talk);
              });
              this.meetingDay = this.meeting.date;
            }
        },
        methods:{
          saveMeeting(){
            axios
              .post('/api/meeting/create',{
                treasures: this.treasures,
                ministry: this.ministry,
                christianLiving: this.christianLiving,
                meetingDate: this.meetingDate ,
                meeting_id: this.meeting ? this.meeting.id : null
              })
              .then(response => (
                window.location.replace('/')
              ));
          },
          updateDate(){
            this.meetingDate = moment(this.meetingDate).day(3).toDate();
          },
          newField(type){
            console.log(type);
            let emptyTalk = {
                title: 'Introduce Titulo',
                user: {
                  name: 'Sin Asignar'
                }
              };
            this[type].push(emptyTalk);
            console.log(this[type]);
          }
        }
    }
</script>
