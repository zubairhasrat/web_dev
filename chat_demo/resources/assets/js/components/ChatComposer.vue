<template>
  <div class="chat-composer">
      <input type="text" placeholder="start entering some text" v-model="MessageText" @keyup.enter="sendMessage">
      <button class="btn btn-primary" @click="sendMessage">Send</button>
  </div>
</template>
<script>
export default {
  data(){
      return{
           MessageText:"default"
           
      }   
  },
  methods:{
      sendMessage(){
          this.$emit('messagesent',{
              message:this.MessageText,
              user:'zubair'
          })
          this.MessageText=""
      }
  }
}
</script>

<style>
    .chat-composer{
        display: flex;
    }
    .chat-composer input{
        flex: 1 auto;
    }
    .chat-composer{
        border-radius: 0;
    }
</style>
