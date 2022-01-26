
import ChatApp from "../components/ChatApp";
import Dashboard from "../Dashboard/Dashboard";
import createRoom from "../Dashboard/componentsd/Room/createRoom";
import EditRoom from "../Dashboard/componentsd/Room/EditRoom";
import ViewUser from "../Dashboard/componentsd/User/ViewUser";
import EditUser from "../Dashboard/componentsd/User/EditUser";
import ViewRoom from "../Dashboard/componentsd/Room/ViewRoom";

export default {
    mode: 'history',

    routes: [
        {
            path: '/',
            component: ChatApp
        },
        {
            path: '/dashboard',
            component: Dashboard
        },
        {
            path: '/dashboard/create-room',
            component: createRoom,
        },
        {
            path: '/dashboard/edit-room/:id',
            component: EditRoom,
        },
        {
            path: '/dashboard/view-user/:id',
            component: ViewUser,
        },
        {
            path: '/dashboard/edit-user/:id',
            component: EditUser,
        },
        {
            path: '/dashboard/view-room/:id',
            component: ViewRoom,
        } ,

    ]
}
