<template>
    <div class="edit-room">
        <div class="container">
        <form>
            <div class="form-group">
                <label for="exampleInputEmail1">Room Name</label>
                <input v-model="form.name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Room Description</label>
                <input v-model="form.description"  type="text" class="form-control" id="exampleInputPassword1" placeholder="Description">
            </div>
            <button  @click.prevent="edit(roomId)" class="btn btn-primary">Edit</button>
        </form>
        </div>
    </div>
</template>

<script>
export default {
    name: "EditRoom",
    data() {
      return {
        form: {
            name: '',
            description: '',
        },
          roomId: this.$route.params.id
      }
    },

    methods: {
        edit(id) {
            axios.post(`/api/dashboard/edit-room/${id}`, {
              name: this.form.name,
              description: this.form.description
          }).then((response) => {
                this.$router.push({path: '/dashboard'});

          })
        },
    },
}
</script>

<style scoped>
.edit-room {
    background-color: #6c757d;
}
</style>
