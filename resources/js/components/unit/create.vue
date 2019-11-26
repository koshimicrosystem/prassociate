<template>
  <div>
    <div class="row">
      <div class="col-md-4 order-md-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted">Your cart</span>
          <span class="badge badge-secondary badge-pill">3</span>
        </h4>
        <ul class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0">Product name</h6>
              <small class="text-muted">Brief description</small>
            </div>
            <span class="text-muted">$12</span>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0">Second product</h6>
              <small class="text-muted">Brief description</small>
            </div>
            <span class="text-muted">$8</span>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0">Third item</h6>
              <small class="text-muted">Brief description</small>
            </div>
            <span class="text-muted">$5</span>
          </li>
          <li class="list-group-item d-flex justify-content-between bg-light">
            <div class="text-success">
              <h6 class="my-0">Promo code</h6>
              <small>EXAMPLECODE</small>
            </div>
            <span class="text-success">-$5</span>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <span>Total (USD)</span>
            <strong>$20</strong>
          </li>
        </ul>

        <form class="card p-2">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Promo code" />
            <div class="input-group-append">
              <button type="submit" class="btn btn-secondary">Redeem</button>
            </div>
          </div>
        </form>
      </div>
      <div class="col-md-8 order-md-1">
        <h4 class="mb-3">UNIT / ADD</h4>
        <form class="needs-validation" novalidate>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="model_id">Model Name</label>
                 <select class="custom-select d-block w-100" id="model_id" v-model="unit.model_id" required>
                  <option v-for="(item, index) in unitmodels" :key="index" :value="item.id">{{item.model_name}}</option>
                </select>
              </div>
              <div class="col-md-6 mb-3">
                <label for="grn_number">GRN Number</label>
                <input type="text" class="form-control" id="grn_number" v-model="unit.grn_number" placeholder="" value="" required>
              </div>
            </div>


            <div class="row">
             <div class="col-md-6 mb-3">
                <label for="received_date">Received Date</label>
                <input type="date" class="form-control" id="received_date" v-model="unit.received_date" placeholder="" value="" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="invoice_number">Invoive Number</label>
                <input type="text" class="form-control" id="invoice_number" v-model="unit.invoice_number" placeholder="" value="" required>
              </div>
            </div>


            <div class="row">
             <div class="col-md-6 mb-3">
                <label for="steering_type">Steering Type</label>
                <input type="text" class="form-control" id="steering_type" v-model="unit.steering_type" placeholder="" value="" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="clutch_type">Clutch Type</label>
                <input type="text" class="form-control" id="clutch_type" v-model="unit.clutch_type" placeholder="" value="" required>
              </div>
            </div>


            <div class="row">
             <div class="col-md-6 mb-3">
                <label for="pto_type">PTO Type</label>
                <input type="text" class="form-control" id="pto_type" v-model="unit.pto_type" placeholder="" value="" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="material_code">Material Code</label>
                <input type="text" class="form-control" id="material_code" v-model="unit.material_code" placeholder="" value="" required>
              </div>
            </div>

            <div class="row">
             <div class="col-md-6 mb-3">
                <label for="tr_sr_number">TR SR Number</label>
                <input type="text" class="form-control" id="tr_sr_number" v-model="unit.tr_sr_number" placeholder="" value="" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="engine_number">Engine Number</label>
                <input type="text" class="form-control" id="engine_number" v-model="unit.engine_number" placeholder="" value="" required>
              </div>
            </div>

            <div class="row">
             <div class="col-md-6 mb-3">
                <label for="chassis_number">Chassis Number</label>
                <input type="text" class="form-control" id="chassis_number" v-model="unit.chassis_number" placeholder="" value="" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="ndp">NDP</label>
                <input type="number" class="form-control" id="ndp" v-model="unit.ndp" placeholder="" value="" required>
              </div>
            </div>

            <div class="row">
             <div class="col-md-6 mb-3">
                <label for="order_number">Order Number</label>
                <input type="text" class="form-control" id="order_number" v-model="unit.order_number" placeholder="" value="" required>
              </div>

               <div class="col-md-6 mb-3">
                <label for="invoice_amount">Invoice Amount</label>
                <input type="text" class="form-control" id="invoice_amount" v-model="unit.invoice_amount" placeholder="" value="" required>
              </div>
            </div>

           




            <div class="d-block my-3">
            <h5>GST Applicable</h5>
            <div class="custom-control custom-radio">
              <input
                id="credit"
                name="gst"
                type="radio"
                 v-model="unit.gst"
                class="custom-control-input"
                value="1"
                required
              />
              <label class="custom-control-label" for="credit">Yes</label>
            </div>
            <div class="custom-control custom-radio">
              <input
                id="debit"
                name="gst"
                type="radio"
                v-model="unit.gst"
                value="0"
                class="custom-control-input"
                required
              />
              <label class="custom-control-label" for="debit">NO</label>
            </div>
          </div>
          

            <hr class="mb-4">
             <button
            class="btn btn-primary btn-lg btn-block"
            @click.prevent="store()"
          >Continue to Add</button>
          </form>
      </div>
    </div>
  </div>
</template>

<script>
import Toasted from "vue-toasted";

export default {
  mounted() {
    this.get_models();
  },
  data() {
    return {
      unit_id: "",
      unit: {},
      unitmodels : [],
      errors: false,
    };
  },
  methods: {
    get_models(){
      var _this = this;
      axios.get('/unitmodel/get_models').then(function(response){
            _this.unitmodels=response.data,
          console.log(response.data);
          // console.log('hi');
      }).catch(response => {
          this.get_models();
      });
    },
    store() {
        this.errors = false;
      this.validate_form();
      if (!this.errors) {
      axios
        .post("/unit", this.unit)
        .then(response => {
          this.unit_it = response.data;
          this.$toasted.success("Unit Created Sucessfully.");
        })
        .catch(response => {
          this.$toasted.error("Grn Number already exist.");
        });
      }
    },
    validate_form() {
    var _this = this;
    var fields = ["model_id","grn_number","received_date","invoice_number","steering_type","clutch_type","pto_type","material_code","tr_sr_number","engine_number","chassis_number","ndp","order_number","gst","invoice_amount"];

    fields.forEach(element => {
      if (!_this.unit[element]) {
        _this.errors = true;
        _this.$toasted.error( element+" is required.");
      }
    });
    }
  },
};
</script>
