<template>
    <div class="ViewUser">
        <div class="user" >
            <div class="container">
                <p>{{user.name}}</p>
                <img :src=" '/storage/images/users/' + user.profile_image" :alt="user.name">
            </div>

        </div>
    </div>
</template>

<script>
export default {
    name: "ViewUser",

    data() {
      return {
          user: {},
          userId: this.$route.params.id,
      }
    },

    mounted() {
      this.getUser();
    },

    methods: {
        getUser() {
            axios.get(`/api/dashboard/view-user/${this.userId}`, {
            }).then((response) => {
                this.user = response.data
            })
        }
    }
}
</script>

<style scoped>

</style>
