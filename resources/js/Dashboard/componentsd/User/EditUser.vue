<template>
    <div class="EditUser">
        <div class="container">
            <form  enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">User Name</label>
                    <input  v-model="user.name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">User Email</label>
                    <input v-model="user.email"  type="email" class="form-control" id="exampleInputPassword1" placeholder="Enter Email">
                </div>
                <div class="form-group">
                    <label for="image">User Image</label>
                    <input v-on:change="onFileChange" type="file" class="form-control" id="image" placeholder="Image">
                </div>
                <button  @click.prevent="editUser(userId)" class="btn btn-primary">Submit</button>
            </form>
        </div>

    </div>
</template>

<script>
export default {
    name: "EditUser",

    data() {
        return {
            user: {
                name: "",
                email: "",
            },
            avatar: "",
            userId: this.$route.params.id,
        }
    },
    methods: {
        onFileChange(e){
            console.log(e.target.files[0]);
            this.avatar = e.target.files[0];
        },
        editUser(id) {
            let data = new FormData();

            data.append('name', this.user.name)
            data.append('email', this.user.email)
            data.append('avatar', this.avatar)
            axios.post(`/api/dashboard/edit-user/${id}`,data).then((response) => {
                this.$router.push({path: '/dashboard'})
            })
        }
    },
}
</script>

<style scoped>
.EditUser {
    background-color: #6b7280;
}
</style>
