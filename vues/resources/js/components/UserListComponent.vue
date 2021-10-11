 <template>
     <div class="container">
         <table class="table table-hover">
             <thead class="thead-light">
             <tr>
                 <th scope="col">#</th>
                 <th scope="col">名前</th>
                 <th scope="col">メールアドレス</th>
                 <th scope="col">パスワード</th>
                 <th scope="col">詳細</th>
                 <th scope="col">変更</th>
                 <th scope="col">削除</th>
             </tr>
             </thead>
             <tbody>

            <tr v-for="(user,index) in users" :key="index">
                <th scope="row">{{user.id}}</th>
                <td>{{user.name}}</td>
                <td>{{user.email}}</td>
                <td>{{user.password}}</td>
                <td>
         <router-link v-bind:to="{name: 'user.show', params: {userId: user.id }}">
             <button class="btn btn-primary">詳細</button>
         </router-link>
     </td>
     <td>
         <router-link v-bind:to="{name: 'user.edit', params: {userId: user.id}}">
             <button class="btn btn-success">変更</button>
         </router-link>

     </td>
     <td>
         <button class="btn btn-danger" v-on:click="deleteUser(user.id)">Delete</button>
     </td>
 </tr>
             </tbody>
         </table>
     </div>
 </template>
 
 <script>
 export default {
        data: function () {
            return {
                users: []
            }
        },
        methods: {
            getUsers() {
                const token=localStorage.getItem("jwt-token");
                axios.get('/api/users' , {headers: {              
                 Authorization: `Bearer ${token}`}}
                 )
                    .then((res) => {
                        this.users = res.data;
                    });
                },
            deleteUser(id) {
            axios.delete('/api/users/' + id)
                .then((res) => {
                    this.getUsers();
                });
            }
        },
        mounted() {
            this.getUsers();
        }
    }

 </script>
