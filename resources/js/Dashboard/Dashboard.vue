<template>
    <div class="Dashboard">
        <div>
            <button class="btn btn-success" @click="storeRoom">Create Rooms</button>
        </div>
        <Users/>
        <Rooms/>
    </div>
</template>

<script>

import  Users from './componentsd/Users';
import  Rooms from './componentsd/Rooms';


export default {
    name: "Dashboard",

    methods: {
        storeRoom() {
            this.$router.push('/dashboard/create-room')
        },
    },
    components: {Users, Rooms},
}
</script>

<style scoped>

</style>
