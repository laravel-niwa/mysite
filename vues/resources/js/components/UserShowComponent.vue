<template>
     <div class="container">
         <div class="row justify-content-center">
             <div class="col-sm-6">
                 <form>
                     <div class="form-group row border-bottom">
                         <label for="id" class="col-sm-3 col-form-label">ID</label>
                         <input type="text" class="col-sm-9 form-control-plaintext" readonly id="id"
                                v-model="user.id">
                     </div>
                     <div class="form-group row border-bottom">
                         <label for="title" class="col-sm-3 col-form-label">Title</label>
                         <input type="text" class="col-sm-9 form-control-plaintext" readonly id="title"
                                v-model="user.name">
                     </div>
                     <div class="form-group row border-bottom">
                         <label for="content" class="col-sm-3 col-form-label">Content</label>
                         <input type="text" class="col-sm-9 form-control-plaintext" readonly id="content"
                                v-model="user.created_at">
                     </div>
                     <div class="form-group row border-bottom">
                         <label for="person-in-charge" class="col-sm-3 col-form-label">Person In Charge</label>
                         <input type="text" class="col-sm-9 form-control-plaintext" readonly id="person-in-charge"
                                v-model="user.updated_at">
                     </div>
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
            }
        },
        mounted() {
            this.getUser();
        }
     }
 </script>
