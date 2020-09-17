<template>
    <div class="container">
        <div class="row">
            
            <form class="form-inline d-flex justify-content-center md-form form-sm active-pink active-pink-2 mt-2">
                <i class="fas fa-search fa-2x fa-spin fa-spinner loading_data hidden" aria-hidden="true"></i>
                <input class="form-control col-md-6 form-control-sm ml-3 w-75 " v-model="search.title" type="text" placeholder="Search" aria-label="Search">
            </form>
            <button type="button" @click="createSarch">
                <i class="fas fa-search fa-2x "   aria-hidden="true" ></i>
            </button >
            <hr/>
                

            <ol>
                <div v-for="result in results" :key="result.id">
                    <li>
                        <label>
                            <input type="checkbox"  name="related[]" v-model="checkedNames" :id="result.title " :value="result.id" > {{ result.title }}
                        </label>
                    </li>
                </div>
                        <span>Checked ID: {{ checkedNames }}</span>
            </ol>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            search:{
                title:'',
                id:''
            },
            results:{},
            relateds:{},
            checkedNames:[],
        }
    },
    methods: {
        
        createSarch(){
            axios.post('brands',this.search).then(respo=>{
                if(respo.data.status == true)
                {
                    if(respo.data.count > 0){
                        Toast.fire({
                            icon:'success',
                            title:'Search Successfull'
                        }),
                        this.results = respo.data.result
                        this.relateds = respo.data.related
                    }
                }
            })
        },
    },


    
}
</script>