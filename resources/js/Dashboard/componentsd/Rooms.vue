<template>
    <div class="Rooms">
        <h1> Rooms</h1>
        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">View</th>
                <th scope="col">Delete</th>
                <th scope="col">Edit</th>

            </tr>
            </thead>
            <tbody>
            <tr v-for="room in rooms" :key="room.id">
                <th scope="row">{{room.id}}</th>
                <th scope="row">{{room.name}}</th>
                <th scope="row">{{room.description}}</th>
                <td><button class="btn btn-primary" @click="viewRoom(room.id)"> View</button></td>
                <td><form ><button  type="submit" class="btn btn-danger" @click="deleteRoom(room.id)"> Delete</button></form></td>
                <td><button class="btn btn-warning" @click="editRoom(room.id)"> Edit</button></td>

<!--                <td> <img v-bind:src=" 'storage/' + user.profile_image" :alt="user.name" width="100px" height="100px"></td>-->
            </tr>

            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    name: "Rooms",

    data() {
        return {
            rooms: [],
        }
    },

    mounted() {
        axios.get('/dashboard/rooms')
            .then((response) => {
                this.rooms = response.data;
            })
    },

    methods: {
        viewRoom(id) {
            return this.$router.push(`/dashboard/view-room/${id}`);
        },

        editRoom(id) {
            this.$router.push(`/dashboard/edit-room/${id}`)
        },

        deleteRoom(id) {
            axios.post(`/api/dashboard/delete-room/${id}`, {
            }).then((response) =>{
            })
        }
    },
}
</script>

<style scoped>

</style>
