<template>
    <!--    <div class="container Users" id="Users">-->
    <!--        <div class="row">-->
    <!--            <b-alert show>{{users.length}}</b-alert>-->
    <!--            <table class="table table-striped">-->
    <!--                <thead>-->
    <!--                <tr>-->
    <!--                    <td>#</td>-->
    <!--                    <td>ID</td>-->
    <!--                    <td>Name</td>-->
    <!--                    <td>Age</td>-->
    <!--                </tr>-->
    <!--                </thead>-->
    <!--                <tbody>-->
    <!--                <tr v-for="user in users">-->
    <!--                    <td>{{ user.id }}</td>-->
    <!--                    <td>{{ user.name }}</td>-->
    <!--                    <td>{{ user.email }}</td>-->
    <!--                    <td>-->
    <!--                        lol-->
    <!--                    </td>-->
    <!--                </tr>-->
    <!--                </tbody>-->
    <!--            </table>-->
    <!--        </div>-->
    <!--    </div>-->
    <b-container fluid>
        <div class="row" style="position: relative; overflow: hidden;min-height: 500px">
            <b-alert v-model="showDismissibleAlert" variant="danger" class="delete-alert col-lg-5 col-sm-12"
                     dismissible>
                <h4 class="alert-heading alert-head font-italic">Delete User</h4>
                <div class="alert-body">
                    <p class="font-italic">Are you sure that you want to delete this User ?!</p>
                    <div class="user-info">
                        <p class="font-weight-bold">Username: <span
                            class="font-italic font-weight-light">Ahmed Ortega</span></p>
                    </div>
                </div>
                <div class="alert-footer">
                    <b-button variant="danger">YES</b-button>
                    <b-button variant="primary">NO</b-button>
                </div>
            </b-alert>
            <!-- User Interface controls -->
            <b-row>
                <b-col md="6" class="my-1">
                    <b-form-group label-cols-sm="3" label="Filter" class="mb-0">
                        <b-input-group>
                            <b-form-input v-model="filter" placeholder="Type to Search"></b-form-input>
                            <b-input-group-append>
                                <b-button :disabled="!filter" @click="filter = ''">Clear</b-button>
                            </b-input-group-append>
                        </b-input-group>
                    </b-form-group>
                </b-col>
                <b-col md="6" class="my-1">
                    <b-form-group label-cols-sm="3" label="Per page" class="mb-0">
                        <b-form-select v-model="perPage" :options="pageOptions"></b-form-select>
                    </b-form-group>
                </b-col>
            </b-row>

            <!-- Main table element -->
            <b-table
                show-empty
                hover
                stacked="md"
                :items="users"
                :fields="fields"
                :current-page="currentPage"
                :per-page="perPage">
                <template slot="name" slot-scope="row">
                    {{ row.value }}
                </template>

                <template slot="age" slot-scope="row">
                    {{ row.value ? row.value : 'empty :('}}
                </template>

                <template slot="actions" slot-scope="row">
                    <b-button size="sm" @click="info(row.item, row.index, $event.target)" class="mr-1"
                              variant="outline-primary">
                        Edit
                    </b-button>
                    <b-button size="sm" @click="info(row.item, row.index, $event.target)" class="mr-1"
                              variant="outline-success">
                        Profile
                    </b-button>
                    <b-button size="sm" @click="showDismissibleAlert=true,user_id = row.value.id" class="mr-1" variant="outline-danger">
                        Delete
                        <b-alert v-model="user_id">{{user_id}}</b-alert>
                    </b-button>
                    <b-button size="sm" @click="row.toggleDetails" variant="outline-dark">
                        {{ row.detailsShowing ? 'Hide' : 'Show' }} Details
                    </b-button>
                </template>

                <template slot="row-details" slot-scope="row">
                    <b-card>
                        <ul>
                            <li v-for="(value, key) in row.item" :key="key">{{ key }} : {{ value }}</li>
                        </ul>
                    </b-card>
                </template>
            </b-table>

            <b-row>
                <b-col md="6" class="my-1">
                    <b-pagination
                        v-model="currentPage"
                        :total-rows="totalRows"
                        :per-page="perPage"
                        class="my-0"
                    ></b-pagination>
                </b-col>
            </b-row>

        </div>
    </b-container>
</template>

<script>
    export default {
        props: {},
        mounted: function () {
            console.log('Component fired.');
            // this.totalRows = this.items.length;
        },
        data() {
            return {
                fields: [
                    {key: 'id', label: 'ID', sortable: true},
                    {key: 'name', label: 'Full Name', sortable: true, sortDirection: 'desc'},
                    {key: 'age', label: 'Age', sortable: true, class: 'text-center'},
                    {key: 'email', label: 'Email'},
                    {key: 'type', label: 'Type'},
                    {key: 'actions', label: 'Actions'}
                ],
                totalRows: 1,
                currentPage: 1,
                perPage: 5,
                pageOptions: [5, 50, 100, 1000],
                modalInfo: {title: '', content: ''},
                showDismissibleAlert: false,
                //DB
                users: [],
                user: [],
                user_id : 0,
                filter: null,
            }
        },
        created: function () {
            this.fetchUsers();
        },
        methods: {
            fetchUsers: function () {
                {
                    axios.get('../api/admin-dashboard/users').then(response => {
                        this.users = response.data.users;
                        console.log("************* This.users *****************");
                        console.log(this.users);
                        console.log(JSON.stringify(this.users[0]));
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
            },
            info(item, index, button) {
                this.modalInfo.title = `Row index: ${index}`
                this.modalInfo.content = JSON.stringify(item, null, 2)
                this.$root.$emit('bv::show::modal', 'modalInfo', button)
            },
            resetModal() {
                this.modalInfo.title = ''
                this.modalInfo.content = ''
            },
            onFiltered(filteredItems) {
                // Trigger pagination to update the number of buttons/pages due to filtering
                this.totalRows = filteredItems.length
                this.currentPage = 1
            }
        },
    }
</script>
<style scoped>
    .delete-alert {
        /*background-color: red;*/
        position: absolute;
        z-index: 1;
        top: 20%;
        left: 25%;
    }

    .alert-head {
        padding-bottom: 20px;
        padding-top: 10px;
        border-bottom: 1px solid #cccccc;
    }

    .alert-body {
        padding: 20px 0 10px 0;
        border-bottom: 1px solid #cccccc;
    }

    .alert-footer {
        padding: 20px 0;
        float: right;
    }
</style>
