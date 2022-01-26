<template>
    <div class="Users">
        <h1> Users</h1>
        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Avatar</th>
                <th scope="col">View</th>
                <th scope="col">Delete</th>
                <th scope="col">Edit</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="user in users" :key="user.id">
                <th scope="row">{{user.id}}</th>
                <td>{{ user.name }}</td>
                <td>{{ user.email }}</td>
                <td> <img v-bind:src=" '/storage/images/users/' + user.profile_image" :alt="user.name" width="100px" height="100px"></td>
                <td><button class="btn btn-primary"  @click="viewUser(user.id)"> View</button></td>
                <td><form><button class="btn btn-danger" @click="deleteUser(user.id)"> Delete</button></form></td>
                <td><button class="btn btn-warning" @click="editUser(user.id)"> Edit</button></td>
            </tr>
            </tbody>
        </table>

    </div>
</template>

<script>
export default {
    name: "Users",

    data() {
        return {
            users: [],
        }
    },

    mounted() {
        axios.get('/dashboard/users')
            .then((response) => {
                this.users = response.data;
            })
    },

    methods: {
        deleteUser(id){
            axios.post(`/api/dashboard/delete-user/${id}`,{
            }).then((response) =>{
            })
        },
        viewUser(id){
            return this.$router.push(`/dashboard/view-user/${id}`)
        },
        editUser(id){
          return this.$router.push(`/dashboard/edit-user/${id}`)
        }
    },
}
</script>

<style scoped>

</style>
