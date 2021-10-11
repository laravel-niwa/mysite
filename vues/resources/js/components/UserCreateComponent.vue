<template>
     <div class="container">
         <div class="row justify-content-center">
             <div class="col-sm-6">
                  <form v-on:submit.prevent="submit">
                     <div class="form-group row">
                         <label for="title" class="col-sm-3 col-form-label">名前</label>
                          <input type="text" class="col-sm-9 form-control" id="title" v-model="user.name">
                     </div>
                     <div class="form-group row">
                         <label for="content" class="col-sm-3 col-form-label">メールアドレス</label>
                        <input type="text" class="col-sm-9 form-control" id="content" v-model="user.email">
                     </div>
                     <div class="form-group row">
                         <label for="person-in-charge" class="col-sm-3 col-form-label">パスワード</label>
                         <input type="text" class="col-sm-9 form-control" id="person-in-charge" v-model="user.password">
                     </div>
                     <button type="submit" class="btn btn-primary">送信</button>
                 </form>
             </div>
         </div>
     </div>
 </template>
 
 <script>
     export default {
        data: function () {
            return {
                user: {}
            }
        },
        methods: {
            submit() {
                axios.post('/api/users', this.user)
                    .then((res) => {
                        this.$router.push({name: 'user.list'});
                    });
            }
        }
    }
 </script>
