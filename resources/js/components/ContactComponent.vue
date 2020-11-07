<template>   
        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start" :class="{'bg-info':active}">              
            <div class="row">
                <div class=" col-lg-2 ">
                        <img src="http://lorempixel.com/g/500/500/people" alt="avatar"  class="rounded" style="width: 50px;">
                </div>
                <div class=" col-lg-10 ">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{ conversation.contactName }} </h5>
                        <small>{{ conversation.last_time }}</small>
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
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
