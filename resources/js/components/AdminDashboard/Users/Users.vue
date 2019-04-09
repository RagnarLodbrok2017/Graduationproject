<template>
    <div class="container Users" id="Users">
        <div class="row">
            <b-alert show>{{users.length}}</b-alert>
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>#</td>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Age</td>
                </tr>
                </thead>
                <tbody>
                <tr v-for="user in users">
                    <td>{{ user.id }}</td>
                    <td>{{ user.name }}</td>
                    <td>{{ user.email }}</td>
                    <td>
                        lol
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
        },
        mounted: function() {
            console.log('Component fired.');
        },
        data() {
            return {
                users: [],
                // user: {
                //     id: '',
                //     name: '',
                //     username: '',
                //     password: '',
                //     email: '',
                //     age: ''
                // },
                user:[],
            }
        },
        created: function () {
            this.fetchUsers();
        },
        methods: {
            fetchUsers:function() {
                {
                    axios.get('/admin-dashboard/user').then(response => {
                        this.users = response.data.users;
                        // console.log("************* This.users *****************");
                        // console.log(this.users);
                        // console.log(JSON.stringify(this.users[0]));
                    });
                    // this.users = [{
                    //     age: null,
                    //     created_at: "2019-04-06 23:20:15",
                    //     email: "ahmedrmohamed2017@gmail.com",
                    //     email_verified_at: null,
                    //     id: 1,
                    //     location: null,
                    //     name: "ahmedortega",
                    //     photo: "avatar.jpg",
                    //     reports_num: 0,
                    //     status: 1,
                    //     type: "admin",
                    //     updated_at: "2019-04-06 23:20:15",
                    //     username: null,
                    // },
                    //     {
                    //         age: null,
                    //         created_at: "2019-04-06 23:20:15",
                    //         email: "ahmedrmohamed2017@gmail.com",
                    //         email_verified_at: null,
                    //         id: 1,
                    //         location: null,
                    //         name: "Mazen Ali",
                    //         photo: "avatar.jpg",
                    //         reports_num: 0,
                    //         status: 1,
                    //         type: "admin",
                    //         updated_at: "2019-04-06 23:20:15",
                    //         username: null,
                    //     }
                    // ]
                }
            }
        }
    }
</script>
