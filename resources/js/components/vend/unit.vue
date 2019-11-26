<template>
  <div>
    <div class="row">
      <div class="col-md-12 order-md-1">
        <h4 class="mb-3">VEND / UNIT</h4>
        <form class="needs-validation" novalidate>
          <div class="row">
            <div class="col-md-4 mb-3">
              <label for="firstName">Unit Model</label>
              <select
                class="custom-select d-block w-100"
                @change="loadunits()"
                id="unit_model"
                v-model="unit_model"
                required
              >
                <option value>Choose...</option>
                <option
                  v-for="(item, index) in unitmodels"
                  :key="index"
                  :value="item.id"
                >{{item.model_name}}</option>
              </select>
            </div>
            <div class="col-md-8 mb-3">
              <label for="lastName">Unit</label>
              <select
                class="custom-select d-block w-100"
                v-model="selected_unit"
                @change="add_to_selected_units()"
                id="state"
                required
              >
                <option value>Choose...</option>
                <option
                  v-for="(item, index) in units"
                  :key="index"
                  :value="item"
                >₹ {{item.ndp}} {{item.grn_number}} {{item.engine_number}} {{item.chassis_number}}</option>
              </select>
            </div>
          </div>

          
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="selected_access">Accessories</label>
              <select class="custom-select d-block w-100" @change="add_to_selected_accesses()" id="selected_access" v-model="selected_access" required>
                <option value>Choose...</option>
                <option :value="item" v-for="(item, index) in accesses" :key="index">{{item.type}} - {{item.quantity}}</option>
              </select>
              <div class="invalid-feedback">Please select a valid country.</div>
            </div>

            <div class="col-md-6 mb-3">
              <label for="selected_impl">Implements</label>
              <select class="custom-select d-block w-100" @change="add_to_selected_imps()" id="selected_impl" v-model="selected_impl" required>
                <option value>Choose...</option>
                <option :value="item" v-for="(item, index) in impls" :key="index">{{item.type}} - {{item.quantity}}</option>
              </select>
              <div class="invalid-feedback">Please select a valid country.</div>
            </div>
          </div>

          <div class="row">
            <div v-for="(item, index) in selected_units" :key="index" class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">model_name : {{item.grn_number}}</h5>
                  <table class="table table-borderless">
                    <tbody>
                      <tr>
                        <td>Engine Number</td>
                        <td>{{item.engine_number}}</td>
                      </tr>
                      <tr>
                        <td>Chessis Number</td>
                        <td>{{item.chassis_number}}</td>
                      </tr>
                      <tr>
                        <td>NDP</td>
                        <td>₹ {{item.ndp}}</td>
                      </tr>
                      <tr>
                        <td>Varient</td>
                        <td>{{item.steering_type}}, {{item.clutch_type}}, {{item.pto_type}}</td>
                      </tr>
                      <tr>
                        <td>Gst Applicable</td>
                        <td>{{gst(item.gst_applicable)}}</td>
                      </tr>
                    </tbody>
                  </table>
                  <a href="#" class="btn btn-primary right">Detail</a>
                  <a
                    href="#"
                    @click.prevent="remove_from_selected_units(item)"
                    class="btn btn-danger right"
                  >Remove</a>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div v-for="(item, index) in selected_accesses" :key="index" class="alert alert-warning alert-dismissible fade show col-3 m-2" role="alert">
              <strong>{{item.type}}</strong><br> <strong>{{item.varient}}</strong> <br> <strong>₹ {{item.price}}</strong>
              <button type="button" @click="remove_from_selected_accesses(item)" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div v-for="(item, index) in selected_impls" :key="index" class="alert alert-info alert-dismissible fade show col-3 m-2" role="alert">
             <strong>{{item.type}}</strong><br> <strong>{{item.varient}}</strong> <br> <strong>₹ {{item.price}}</strong>
              <button type="button" @click="remove_from_selected_impls(item)" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>


          <h4 class="mt-5">User Detail</h4>
          <hr  />


          <div class="row">
            <div class="col-md-4 mb-3">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" v-model="user.name" placeholder="Username" required />
            </div>

            <div class="col-md-4 mb-3">
              <label for="careof">Care of</label>
              <input type="text" class="form-control" id="careof" v-model="user.careof" placeholder="Username" required />
            </div>
            <div class="col-md-4 mb-3">
              <label for="mobile">Mobile Number</label>
              <input type="number" class="form-control" id="mobile" v-model="user.mobile"  placeholder="Username" required />
            </div>
          </div>

          <div class="row">
            <div class="col-md-4 mb-3">
              <label for="village">Village</label>
              <input type="text" class="form-control" id="village" v-model="user.village" placeholder="Username" required />
            </div>

            <div class="col-md-4 mb-3">
              <label for="block">Block</label>
              <input type="text" class="form-control" id="block" v-model="user.block" placeholder="Username" required />
            </div>
            <div class="col-md-4 mb-3">
              <label for="tehshil">Tehshil</label>
              <input type="text"  class="form-control" v-model="user.tehshil" id="tehshil" placeholder="Username" required />
            </div>
            
          </div>


          
          <hr class="mb-4" />
          <div class="row">
          <button class="btn btn-primary btn-lg  col-3" @click.prevent="bill()"  type="submit">Continue to checkout</button>
          <button class="btn btn-danger btn-lg  col-3 ml-2" type="button">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    console.log("Component mounted.");
    this.get_models();
    this.get_access();
    this.get_impl();    
  },
  data() {
    return {
      unitmodels: [],
      unit_model: "",
      units: [],
      selected_units: [],
      selected_unit: {},
      accesses : [],
      impls : [],
      selected_access : {},
      selected_impl : {},
      selected_accesses : [],
      selected_impls : [],
      transection_bundle :{},
      user : {},
      errors : false,
    };
  },
  methods: {

    bill(){
      this.transection_bundle.selected_units = this.selected_units;
      this.transection_bundle.selected_accesses = this.selected_accesses;
      this.transection_bundle.selected_impls = this.selected_impls;
      this.transection_bundle.user = this.user;

      this.errors = false;
      this.validate_form();
      if (!this.errors) {
      axios
        .post("/vend/purchage", this.transection_bundle)
        .then(response => {
        })
        .catch(response => {
          this.$toasted.error("Something went");
        });
      }
    },


    validate_form() {
    var _this = this;
    var fields = ['name','careof','mobile','village','block','tehshil'];

    fields.forEach(element => {
      if (!_this.user[element]) {
        _this.errors = true;
        _this.$toasted.error( element+" is required.");
      }
    });
    },


    remove_from_selected_accesses($item){
      ++this.accesses[this.accesses.findIndex(obj => obj.id === $item.id)].quantity;
      this.selected_accesses.pop($item);
    },
    remove_from_selected_impls($item){
     ++this.impls[this.impls.findIndex(obj => obj.id === $item.id)].quantity;
     this.selected_impls.pop($item);
    },

    add_to_selected_accesses(){
      if(this.accesses[this.accesses.findIndex(obj => obj.id === this.selected_access.id)].quantity > 0){
        this.selected_accesses.push(this.selected_access);
        --this.accesses[this.accesses.findIndex(obj => obj.id === this.selected_access.id)].quantity;
         this.selected_access = '';
      }else{
         this.$toasted.error(":-( "+this.selected_access.type + "is not in stock.");
         this.selected_access = '';
      }
    },
    add_to_selected_imps(){
        if(this.impls[this.impls.findIndex(obj => obj.id === this.selected_impl.id)].quantity > 0){
        this.selected_impls.push(this.selected_impl);
        --this.impls[this.impls.findIndex(obj => obj.id === this.selected_impl.id)].quantity;
        this.selected_impl = '';
      }else{
         this.$toasted.error(":-( "+this.selected_impl.type + " is not in stock.");
         this.selected_impl = '';
      }
    },
    add_to_selected_units() {
      if (this.selected_units.find(o => o.id === this.selected_unit.id)) {
        this.$toasted.error(
          "GRN Number " + this.selected_unit.grn_number + " already selected."
        );
        this.selected_unit = "";
      } else {
        this.selected_units.push(this.selected_unit);
        this.selected_unit = "";
      }
    },
    remove_from_selected_units($unit) {
      this.selected_units.pop(this.selected_unit);
    },
    get_models() {
      var _this = this;
      axios
        .get("/unitmodel/get_models")
        .then(function(response) {
          (_this.unitmodels = response.data), console.log(response.data);
          // console.log('hi');
        })
        .catch(response => {
          this.get_models();
        });
    },

    get_access() {
      var _this = this;
      axios
        .get("/access/get_models")
        .then(function(response) {
          (_this.accesses = response.data), console.log(response.data);
          // console.log('hi');
        })
        .catch(response => {
          this.get_access();
        });
    },

    get_impl() {
      var _this = this;
      axios
        .get("/impl/get_models")
        .then(function(response) {
          (_this.impls = response.data), console.log(response.data);
          // console.log('hi');
        })
        .catch(response => {
          this.get_impl();
        });
    },

    loadunits() {
      var _this = this;
      _this.$toasted.success(this.unit_model + "Unit Created Sucessfully.");

      axios
        .get("/unit/get_models/" + _this.unit_model)
        .then(function(response) {
          _this.units = response.data;
          //console.log(response.data);
          // console.log('hi');
        })
        .catch(response => {
          this.loadunits();
        });
    },
    gst($gst) {
      if ($gst == 1) {
        return "Yes";
      } else {
        return "No";
      }
    }
  }
};
</script>
