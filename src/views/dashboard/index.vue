<template>
    <div>
         <loading-icon></loading-icon>

        <div class="container" style="padding-left:15%">
            <div class="row d-flex">
                <div class="col-md-4" >
                    <div class="shadow mb-5 bg-white rounded">
                    <div class="cardTitle shadow-sm">
                        Total Product Uplaoded
                    </div>
                    <div class="cardBody">
                        <span>{{countData.totalProductUploaded}}</span>
                        <i class="fonts fa fa-upload"></i>
                    </div>
                    </div>
                </div>

                  <div class="col-md-4" >
                    <div class="shadow mb-5 bg-white rounded">
                    <div class="cardTitle shadow-sm">
                        Total of Goods Sold
                    </div>
                    <div class="cardBody">
                        <span>{{countData.totalGoodSold}}</span>
                        <i class="fonts fa fa-dolly"></i>
                    </div>
                    </div>
                </div>

                    <div class="col-md-4" >
                    <div class="shadow mb-5 bg-white rounded">
                    <div class="cardTitle shadow-sm">
                        My Client
                    </div>
                    <div class="cardBody">
                        <span>{{countData.myClient}}</span>
                        <i class="fonts fa fa-users"></i>
                    </div>
                    </div>
                </div>


            </div>
            <div class="row">
                <div class="col-md-12" style="display:flex;justify-content:center">
                    <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                       <span class="text-success input-group-text">SELECT YEAR</span>
                                    </div>
                                      <select @change="getGraphData" v-model="yearSelected" class="form-control">
                                          
                                        <!-- <option v-for="(year, index) in years" :key="index.id" :value="year" selected>{{year}}</option> -->
                                        <!-- <option v-for="(year,index) in getCurrentYear()" :key="index.id" v-if="year >= 1900" :value="year">{{ year }}</option> -->
                                        <option v-for="(year, index) in years" :key="index.id" :value="year">{{ year }}</option>
                              
                                     </select> 
                                </div>
                                
                            </div>

                    
                </div>
               
            <div class="w-100" style="overlow-y:scroll">
                <h5 class="text-muted shadow shadow-lg p-2 rounded">GRAPH FOR YEAR <b>{{yearSelected}}</b></h5>
                   <graph-line
                        :height="400"
                        :shape="'normal'"
                        :axis-min="0"
                        :axis-max="6"
                        :axis-full-mode="false"
                        :labels="['JANUARY','FEBRUARY','MARCH','APRIL','MAY','JUNE','JULY','AUGUST','SEPTEMBER','OCTOBER','NOVEMBER','DECEMBER']"
                        :names="names"
                        :values="values"
                        >
                    <!-- <note :text="'Product Uploaded / Sold Chart'"></note>
                    <tooltip :names="names" :position="'right'"></tooltip>
                    <legends :names="names"></legends>
                    <guideline :tooltip-x="true"></guideline>
                    <guideline :tooltip-y="true"></guideline> -->
                </graph-line>
            </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return{
            userSessionData:this.$session.get('user_id'),
            yearSelected:new Date().getFullYear(),
            // years:[2020,2011],
            countData:[],
            months:'',
            mt:[10, 5, 5, 5,7, 9,10,11,50,7,100,15],
              names: [ 'UPLOADS', 'SOLD' ],
                values: [[],[]],
            toggleBar:false,
            hoverShadow:false,
            menuTransition:{myProfile:false, myProduct:false},
            // toggleLoding:false,
        }
    },
     beforeCreate: function () {
    if (!this.$session.exists()) {
    
    //   this.$router.push('/')
    }
  },
  methods:{
      selectYear(){

      },
      getCount(){
             this.axios.post(this.$hostname+"api.php?action=count",{
                userId:this.userSessionData.user_id
            }).then((response)=>{
                this.countData = response.data;
            }).catch(err => {console.log(err)})
      },
      getGraphData(){
          this.axios.post(this.$hostname+"api.php?action=graphData",{
              userId:this.userSessionData.user_id,
              uploadYear:this.yearSelected
          }).then((response)=>{
            //   var result = Object.entries(response.data);
            //   console.log(response.data);
              this.values=[
                this.values= response.data[0],
                this.values= response.data[1]
              ]
              
            
          }).catch(err=>{ 
              console.log(err);
              })
      }
  },
  created() {
       this.getGraphData();
       this.getCount();
       

    },
      mounted(){
        //   this.toggleLoding=true;
    },
     computed : {
    years () {
      const year = new Date().getFullYear()
      return Array.from({length: year - 2018}, (value, index) => 2019 + index)
    }
  }
}
</script>