<template>
    <div class="md:w-1/2 sm:w-full m-auto p-2">
      <div class="flex flex-row justify-between">
        <div>
          <datepicker input-class="m-4 bg-transparent p-2 font-bold text-lg border-bottom" v-model="meetingDate" @input="updateDate" ></datepicker>
        </div>
        <div class="save-button">
          <div class="rounded py-2 px-4 text-white text-xl font-bold bg-blue hover:bg-blue-darker cursor-pointer" @click="saveMeeting">
            <i class="fas fa-save inline-block mr-2"></i>
            Save
          </div>
        </div>
      </div>
       <div>
           <div class="w-full">
               <div class="flex justify-between text-lg">
                   <div>
                       <input class="p-2 font-bold inline-block bg-grey-lightest" value="Oración de apertura" disabled />
                   </div>
                   <div class="p-2 font-bold block">
                       <div class="bibleReading-selection inline-block">
                           {{ open ? open.name : ''}}
                       </div>
                       <select-user :users="users" v-model="open"></select-user>
                   </div>
               </div>
           </div>
       </div>
        <div>
         <div class="w-full">
           <div class="treasures p-2 text-center text-4xl">
             Tesoros de la Biblia
           </div>
           <div class="flex justify-between text-lg" v-for="(talk, index) in treasures">
             <div>
               <div class="text-red text-left inline-block w-auto">
                 <i class="fas fa-minus-circle cursor-pointer text-left w-auto" @click="removeField('treasures',index)"></i>
               </div>
               <input class="p-2 font-bold inline-block bg-grey-lightest" v-model="treasures[index].title" />
             </div>
             <div class="p-2 font-bold block">
               <div class="bibleReading-selection inline-block">
                 {{ talk.user ? talk.user.name : ''}}
               </div>
               <select-user :users="users" v-model="treasures[index].user"></select-user> /
               <div class="bibleReading-selection inline-block">
                 {{ talk.partner ? talk.partner.name : ''}}
               </div>
               <select-user :users="users" v-model="treasures[index].partner"></select-user>
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
             Seamos Mejores Maestros
           </div>
           <div class="flex justify-between text-lg" v-for="(talk, index) in ministry">
             <div>
               <div class="text-red text-left inline-block w-auto">
                 <i class="fas fa-minus-circle cursor-pointer text-left w-auto" @click="removeField('ministry',index)"></i>
               </div>
               <input class="p-2 font-bold inline-block bg-grey-lightest" v-model="ministry[index].title" />
             </div>
             <div class="p-2 font-bold block">
               <div class="bibleReading-selection inline-block">
                 {{ talk.user ? talk.user.name : ''}}
               </div>
               <select-user :users="users" v-model="ministry[index].user"></select-user> /
               <div class="bibleReading-selection inline-block">
                 {{ talk.partner ? talk.partner.name : ''}}
               </div>
               <select-user :users="users" v-model="ministry[index].partner"></select-user>
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
             Nuestra Vida Cristiana
           </div>
           <div class="flex justify-between text-lg" v-for="(talk, index) in christianLiving">
             <div>
               <div class="text-red text-left inline-block w-auto">
                 <i class="fas fa-minus-circle cursor-pointer text-left w-auto" @click="removeField('christianLiving',index)"></i>
               </div>
               <input class="p-2 font-bold inline-block bg-grey-lightest" v-model="christianLiving[index].title" />
             </div>
             <div class="p-2 font-bold block">
               <div class="bibleReading-selection inline-block">
                 {{ talk.user ? talk.user.name : ''}}
               </div>
               <select-user :users="users" v-model="christianLiving[index].user"></select-user> /
               <div class="bibleReading-selection inline-block">
                 {{ talk.partner ? talk.partner.name : ''}}
               </div>
               <select-user :users="users" v-model="christianLiving[index].partner"></select-user>
             </div>
           </div>
           <div class="text-center p-2 text-4xl">
             <i class="fas fa-plus-circle cursor-pointer text-blue" @click="newField('christianLiving')"></i>
           </div>
       </div>
       <div>
           <div class="w-full">
               <div class="flex justify-between text-lg">
                   <div>
                       <input class="p-2 font-bold inline-block bg-grey-lightest" value="Oración de conclusión" disabled />
                   </div>
                   <div class="p-2 font-bold block">
                       <div class="bibleReading-selection inline-block">
                           {{ close ? close.name : ''}}
                       </div>
                       <select-user :users="users" v-model="close"></select-user>
                   </div>
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
              open: this.meeting.open_pray,
              close: this.meeting.close_pray,
            meetingDate: this.meeting  ? this.meeting.date : moment().day(3).toDate(),
            users: '',
            treasures: [],
            ministry: [],
            christianLiving: []
          }
        },
        created() {
          axios
            .get('/api/users')
            .then(response => (this.users = response.data.data));

            if(this.meeting){
              this.meeting.talks.forEach((talk) => {
                console.log(talk + ' done');
                this[talk.type].push(talk);
              });
            }
        },
        methods:{
          saveMeeting(){
            axios
              .post('/api/meeting/create', {
                  talks:{
                      treasures: this.treasures,
                      ministry: this.ministry,
                      christianLiving: this.christianLiving
                  },
                  meetingDate: this.meetingDate ,
                  meeting_id: this.meeting ? this.meeting.id : null,
                  open: this.open,
                  close: this.close
              })
              .then(response => (
                window.location.replace('/')
              ));
          },
          updateDate(){
            this.meetingDate = moment(this.meetingDate).day(3).toDate();
            let date = moment(this.meetingDate).day(3).format('YYYY-MM-DD');
            axios
              .post('/schedule/' + date)
              .then(response => {
                this.treasures = [];
                this.ministry = [];
                this.christianLiving = [];
                response.data.data.talks.forEach((talk) => {
                  console.log(talk + ' done');
                  this[talk.type].push(talk);
                });
              });
          },
          removeField(type,index){
            this[type].splice(index,1);
          },
          newField(type){
            console.log(type);
            let emptyTalk = {
                title: 'Introduce Titulo',
                user: {
                  id: null,
                  name: 'Sin Asignar'
                },
                partner: {
                  id: null,
                  name:''
                }
              };
            this[type].push(emptyTalk);
            console.log(this[type]);
          }
        }
    }
</script>
