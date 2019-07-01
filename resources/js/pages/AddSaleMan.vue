<template>
  <div class="content">
    <div class="md-layout">
      <div class="md-layout-item md-medium-size-100 md-size-100">
        <form>
          <md-card>
            <md-card-header :data-background-color="dataBackgroundColor">
              <h4 class="title">Add Sale Man</h4>
            </md-card-header>
            <md-card-content>
              <div class="md-layout">
                <div class="md-layout-item md-small-size-100 md-size-50">
                  <md-field>
                    <label><sup>*</sup>Name</label>
                    <md-input v-model="name" type="text" maxlength="50" md-counter="50"></md-input>
                  </md-field>
                </div>
                <div class="md-layout-item md-small-size-100 md-size-50">
                  <md-field>
                    <label><sup>*</sup>Phone No.</label>
                    <md-input v-model="phone" type="text" maxlength="15" md-counter="15"></md-input>
                  </md-field>
                </div>
                
                <div class="md-layout-item md-size-100 text-right">
                  <md-button class="md-raised md-success" @click="validate">Add Sale Man</md-button>
                </div>
              </div>

            </md-card-content>
          </md-card>
        </form>
      </div>
    </div>
    <md-dialog-confirm
      :md-active.sync="confirm"
      md-title="Confirm"
      md-content="Are you sure to Add this Sale Man?"
      md-confirm-text="Yes"
      md-cancel-text="Cancel"
      @md-cancel="onCancel"
      @md-confirm="save" />
    <md-dialog-alert
      :md-active.sync="success"
      md-title="Success"
      md-content="SaleMan added succesfully." />
    <md-dialog-alert
      :md-active.sync="fail"
      md-title="Failed"
      md-content="SaleMan not added!" />
    <md-dialog-alert
      :md-active.sync="fill_fields"
      md-title="Warning"
      md-content="Please fill form fields properly!" />
  </div>
</template>

<script>
export default{
  name: 'add-saleman-form',
  props: {
    dataBackgroundColor: {
      type: String,
      default: 'green'
    }
  },
  data (){
    return{
      name:'',
      phone:'',
      fill_fields: false,
      confirm:false,
      success:false,
      fail:false,
    }
  },
  methods: {
    validate(){
        if(this.name||this.phone)
          this.confirm = true;
        else
          this.fill_fields = true;
    },
    save () {
        axios.post('/saleman',{'name':this.name,'phone':this.phone})
        .then(d => {
          if(d.data=="success")
            {
              this.success=true;
              this.name = null;
              this.phone = null;
            } else this.fail=true;
          })
        .catch(err => console.log(err));
        
      },
      onCancel(){

      },
  }
}
</script>
