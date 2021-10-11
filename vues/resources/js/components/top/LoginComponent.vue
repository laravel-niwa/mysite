<template>
   <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                  

                    <div class="container">
                        <div class="row">   
                            <form v-on:submit.prevent="submit">
                                <div class="col-md-12 box-1">
                                    <div class="input-group mb-3">
                                       <input type="text" class="col-sm-12 form-control" id="content" placeholder="email" v-model="user.email">
                                    </div>
                                </div> 
                                <div class="col-md-12 box-1">
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" placeholder="passwod" aria-label="Recipient's username" aria-describedby="button-addon2" v-model="user.password">
                                    </div>
                                </div> 
                                <button type="submit" class="put col-md-6 mt-5 offset-3 box-2">
                                    ログイン
                                    </button>   
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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
                axios.post('/api/logins', this.user)
                    .then((res) => {
                        localStorage.setItem('jwt-token',res.data);
                        this.$router.push({name: 'user.list'});
                    });
            }
        }
    }

 </script>
