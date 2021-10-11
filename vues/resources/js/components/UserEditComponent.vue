 <template>
     <div class="container">
         <div class="row justify-content-center">
             <div class="col-sm-6">
                 <form v-on:submit.prevent="submit">
                     <div class="form-group row">
                         <label for="id" class="col-sm-3 col-form-label">ID</label>
                         <input type="text" class="col-sm-9 form-control-plaintext" readonly id="id" v-bind:value="userId">
                     </div>
                     <div class="form-group row">
                         <label for="name" class="col-sm-3 col-form-label">名前</label>
                         <input type="text" class="col-sm-9 form-control" id="name" v-model="user.name">
                     </div>
                     <div class="form-group row">
                         <label for="password" class="col-sm-3 col-form-label">パスワード</label>
                        <input type="text" class="col-sm-9 form-control" id="password" v-model="user.password">
                     </div>
                     <button type="submit" class="btn btn-primary">送信</button>
                 </form>
             </div>
         </div>
     </div>
 </template>
 
 <script>
     export default {
         props: {
             userId: String
         },
          data: function () {
            return {
                user: {}
            }
        },
        methods: {
            getUser() {
                axios.get('/api/users/' + this.userId)
                    .then((res) => {
                        this.user = res.data;
                    });
            },
            submit() {
                axios.put('/api/users/' + this.userId, this.user)
                    .then((res) => {
                        this.$router.push({name: 'user.list'})
                    });
            }
        },
        mounted() {
            this.getUser();
        }
     }
 </script>
