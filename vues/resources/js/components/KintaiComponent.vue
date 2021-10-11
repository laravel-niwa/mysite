<template>
   <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                  

                    <div class="container">
                        <div class="row">
                        <div class="col-md-12 box-1">
                            <div class="input-group mb-3">
                                <input type="text" name="kintai_id" class="form-control" placeholder="削除したいID" aria-label="Recipient's username" aria-describedby="button-addon2">
                                <input type = "submit" class="delete btn btn-outline-secondary"  id="button-addon2" value="削除" > 
                            </div>
                        </div> 

                            <button v-on:click="getTime" class="work col-md-5 mt-5 box-2">
                               出勤
                            </button>

                             <button v-on:click="outTime" class="put col-md-5 mt-5 offset-2 box-2">
                              退勤【更新】
                            </button>   
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

 </template>
 
 <script>


 </script>
