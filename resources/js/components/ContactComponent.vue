<template>   
        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start" :class="{'bg-info':active}">              
            <div class="row">
                <div class="col-3 col-md-3 col-lg-2 ">
                        <img src="https://picsum.photos/seed/picsum/500/500" alt="avatar"  class="rounded-circle" style="width: 50px;">
                </div>
                <div class="col-9 col-md-9 col-lg-10 ">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{ conversation.contactName }} </h5>
                        <small>{{ lastTime }}</small>
                    </div>
                    <p class="mb-0">{{ conversation.last_message }} </p>
                </div>
            </div>
        </a> 
</template>

<script>
    export default {
        props:{
            active: Boolean,
            conversation : Object
        },
        data() {
            return {
                    
            }
        },
        computed:{
          lastTime(){
              return moment(this.conversation.last_time,'YYYY-MM-DD hh:mm:ss')
                     .locale("es").fromNow();
          }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
