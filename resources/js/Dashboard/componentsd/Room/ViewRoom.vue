<template>
    <div class="ViewRoom">
        <div class="container">
            <h1>#{{roomId}} Room </h1>
                    <table class="table table-dark">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Avatar</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-if="user.comments.length > 0 " v-for="user in users" :key="user.id">
                            <th scope="row">{{user.id}}</th>
                            <td>{{ user.name }}</td>
                            <td>{{ user.email }}</td>
                            <td> <img v-bind:src=" '/storage/images/users/' + user.profile_image" :alt="user.name" width="100px" height="100px"></td>
                        </tr>
                        </tbody>
                    </table>
        </div>
    </div>
</template>

<script>
export default {
    name: "ViewRoom",

    data() {
        return {
            users: {},
            roomId: this.$route.params.id,
            countMembers: 0,
        }
    },
    mounted() {
      this.getRoom(this.roomId);
      this.countRooms();
    },


    methods: {
        countRooms() {
          //   let count = 0;
          // for (let i = 0; i < this.users.length; i++){
          //     if(this.users[i].comment  > 0){
          //
          //     }
          // }
        },
        getRoom(id){
            axios.get(`/api/dashboard/view-room/${id}`,{
            }).then((response) => {
                this.users = response.data;
            })
        }
    }
}
</script>

<style scoped>

</style>
