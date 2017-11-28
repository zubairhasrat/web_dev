<template>
    <div class="chat-log">
        <chat-message v-for="message in messages "  :key="message" :message='message'></chat-message>
    </div>
</template>
<<script>
export default {
    
   props:['messages']
}
</script>
