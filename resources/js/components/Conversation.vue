<template>
    <div class="conversation">
        <h1> {{contact ? contact.name : "Select a Contact"}}</h1>
        <h2> {{room ? room.name : ""}}</h2>
        <MessagesFeed :user="user" :contact="contact" :messages="messages" />
        <MessagesComposer  @send="sendMessage"/>

    </div>
</template>

<script>
import  MessagesFeed from './MessagesFeed';
import  MessagesComposer from './MessagesComposer';

export default {
    name: "Conversation",

    props: {
        contact: {
            type: Object,
            default: null
        },
        messages: {
            type: Array,
            default: [],
        },
        user: {
            type: Object,
            required: true,
        },
        room: {
            type: Object,
            default: null,
        }
    },
    methods: {
        sendMessage(text) {
            if(!this.contact){
                return;
            }
            if(this.contact.description) {
                axios.post(`/posts/${this.contact.id}/comment`, {
                    text: text,
                    user_id: this.user.id
                }).then((response) => {
                    this.$emit('new', response.data)
                })
            } else {
                axios.post('/conversation/send', {
                    contact_id: this.contact.id,
                    text: text,
                }).then((response) => {
                    this.$emit('new', response.data)
                })
            }
        }
    },
    components: {MessagesFeed,MessagesComposer}
}
</script>

<style lang="scss" scoped>
.conversation {
    flex: 5;
    display: flex;
    flex-direction: column;
    justify-content: space-between;

    h1 {
        font-size: 20px;
        padding: 10px;
        margin: 0;
        border-bottom: 1px dashed lightgrey ;
    }
}

</style>
