<template>
    <div class="contacts-list">
        <ul >
            <p style="color:red" v-if="rooms"> Your Rooms</p>
            <li  v-for="(room, index) in rooms" :key="`${index}+${room.room.name}`" @click="selectRoom(room.room)" :class="{ 'selected': room == selectedRoom }">
                <div class="contact">
                    <p class="name">{{ room.room.name }}</p>
                    <p class="email">{{ room.room.description }}</p>
                </div>
            </li>
            <p style="color:red" v-if="usersRoom.length > 0">Users in THis Room</p>
            <li  v-for="(user, index) in usersRoom" :key="`${index}+${user.name}`" >
                <div class="avatar">
                    <img v-bind:src=" '/storage/images/users/' + user.user.profile_image " :alt="user.name" >
                </div>
                <div class="contact">
                    <h4 class="name">{{ user.user.name }}</h4>
                </div>
            </li>
            <h3 style="color: darkgreen"> All Users</h3>
            <li v-for="(contact, index) in sortedContacts" :key="`${index}+${contact.name}`"@click="selectContact(contact)" :class="{ 'selected': contact == selected }">
                <div class="avatar">
                    <img v-bind:src=" '/storage/images/users/' + contact.profile_image" :alt="contact.name" >
                </div>
                <div class="contact">
                    <p class="name">{{ contact.name }}</p>
                    <p class="email">{{ contact.email }}</p>
                </div>
                <span class="unread" v-if="contact.unread">{{ contact.unread }}</span>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    props: {
        contacts: {
            type: Array,
            default: []
        },

        rooms: {
            type: Array,
            default: [],
        },
        usersRoom: {
            type: Array,
            default() {
                return  []
            },
        }

    },
    data() {
        return {
            selected: this.contacts.length ? this.contacts[0] : null,
            selectedRoom: this.rooms.length ? this.rooms[0] : null,

        };
    },
    methods: {

        selectContact(contact) {
            this.selected = contact;
            this.$emit('selected', contact);
        },
        selectRoom(room) {
            // console.log(room)
            this.selectedRoom = Object.values(room);
            this.$emit('selected', room);
        }
    },
    computed: {
        sortedContacts() {
            return _.sortBy(this.contacts, [(contact) => {
                if (contact == this.selected) {
                    return Infinity;
                }
                return contact.unread;
            }]).reverse();
        }
    }
}
</script>

<style lang="scss" scoped>
.contacts-list {
    flex: 2;
    max-height: 100%;
    height: 600px;
    overflow: scroll;
    border-left: 1px solid #a6a6a6;

    ul {
        list-style-type: none;
        padding-left: 0;

        li {
            display: flex;
            padding: 2px;
            border-bottom: 1px solid #aaaaaa;
            height: 80px;
            position: relative;
            cursor: pointer;

            &.selected {
                background: cadetblue;
            }

            span.unread {
                background: #82e0a8;
                color: #fff;
                position: absolute;
                right: 11px;
                top: 20px;
                display: flex;
                font-weight: 700;
                min-width: 20px;
                justify-content: center;
                align-items: center;
                line-height: 20px;
                font-size: 12px;
                padding: 0 4px;
                border-radius: 3px;
            }

            .avatar {
                flex: 1;
                display: flex;
                align-items: center;

                img {
                    width: 35px;
                    border-radius: 50%;
                    margin: 0 auto;
                }
            }

            .contact {
                flex: 3;
                font-size: 10px;
                overflow: hidden;
                display: flex;
                flex-direction: column;
                justify-content: center;

                p {
                    margin: 0;

                    &.name {
                        font-weight: bold;
                    }
                }
            }
        }
    }
}
</style>
