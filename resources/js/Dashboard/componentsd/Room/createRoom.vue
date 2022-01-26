<template>
    <div class="create-room">
        <div class="container">


        <form>
            <div class="form-group">
                <label for="exampleInputEmail1">Room Name</label>
                <input v-model="form.name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Room Description</label>
                <input v-model="form.description"  type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Description">
            </div>
            <button  @click.prevent="store" class="btn btn-primary">Submit</button>
        </form>
        </div>
    </div>
</template>

<script>

export default {
    name: "create-room",
    data() {
        return {
            form: {
                name: "",
                description: "",
            },
        }
    },
    methods: {
        store() {
            axios.post('/api/dashboard/create-room', {
                name: this.form.name,
                description: this.form.description
            }).then((response) => {
                this.$router.push('/dashboard')
            })

        },
    }
}
</script>

<style scoped>
.create-room{
    background-color: lightslategrey;
}
</style>
