<template>
    <div class="chat-app">
        <div v-if="!user.is_admin" class="templ">
        <Conversation :rooms="selectedRoom" :contact="selectedContact" :messages="messages" @new="saveNewMessage" :user="user"/>
        <ContactsList :usersRoom="usersRoom" :rooms="rooms" :contacts="contacts" @selected="startConversationWith"/>
        </div>
        <div v-else>
            <Dashboard/>
        </div>
    </div>
</template>

<script>
    import  Conversation from './Conversation';
    import  ContactsList from './ContactsList';
    import Dashboard from "../Dashboard/Dashboard";

    export default {
        props: {
          user: {
              type: Object,
              required: true,
          },
        },
        data() {
            return {
                selectedContact: null,
                messages: [],
                contacts: [],
                rooms: [],
                selectedRoom: null,
                room: 0,
                usersRoom: [],
            };
        },
        watch: {
            selectedContact() {
                if(this.selectedContact.description){
                    this.room = this.selectedContact.id;
                    this.listen();
                    this.getUsersRoom();
                }else this.usersRoom = []
            },
        },
        mounted() {
            // this.listenForNewMessage();
            // this.listen();
            Echo.private(`messages.${this.user.id}`)
                .listen('.NewMessage', (e) => {
                    this.hanleIncoming(e.message);
                });

            axios.get('/rooms')
                .then((response) => {
                    this.rooms = Object.values(response.data);
                })

           axios.get('/contacts')
               .then((response) => {
                   this.contacts = response.data;
               })
        },

        methods: {
            getUsersRoom() {
                axios.get(`/api/room/users/${this.selectedContact.id}`)
                .then((response) => {
                    this.usersRoom = Object.values(response.data)
                })
            },
            listen() {
                Echo.private(`post.${this.room}`)
                    .listen('.NewGroupMessage', (e) => {
                        this.hanleIncoming(e.comment);

                    });
            },
            startConversationWith(contact) {
                if(contact.description){
                    axios.get(`/posts/${contact.id}/comments`)
                        .then((response) => {
                            this.messages = response.data;
                            this.selectedContact = contact;

                        })
                    return;
                }
                this.updateUnreadCount(contact,true);
                axios.get(`/conversation/${contact.id}`)
                    .then((response) => {
                        this.messages = response.data;
                        this.selectedContact = contact;
                    })
            },
            saveNewMessage(message) {
                this.messages.push(message);
            },

            hanleIncoming(message) {
                if(message.room){
                    this.saveNewMessage(message);
                    return;
                }
                if (this.selectedContact && message.from === this.selectedContact.id){
                    this.saveNewMessage(message);
                    return;
                }
                this.updateUnreadCount(message.from_contact, false);
            },

            updateUnreadCount(contact, reset) {
                this.contacts = this.contacts.map((single) => {
                    if (single.id !== contact.id) {
                        return single;
                    }
                    if (reset)
                        single.unread = 0;
                    else
                        single.unread += 1;
                    return single;
                })
            }
        },
        components: {Dashboard, Conversation,ContactsList},
    }
</script>


<style lang="css" scoped>
  .templ {
      display: flex;
  }
  .chat-app {
      background-color: #6b7280;
  }

</style>
