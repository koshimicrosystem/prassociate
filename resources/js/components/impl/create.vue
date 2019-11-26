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
        <h4 class="mb-3">IMPL / ADD</h4>
        <form class="needs-validation">
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="type">Implement Type</label>
              <input
                type="text"
                class="form-control"
                id="type"
                v-model="impl.type"
                placeholder
                value
                required
              />
              <div class="invalid-feedback">Valid first name is required.</div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="varient">Varient</label>
              <input
                type="text"
                class="form-control"
                id="varient"
                v-model="impl.varient"
                placeholder
                value
                required
              />
              <div class="invalid-feedback">Valid last name is required.</div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="received">Received Date</label>
              <input
                type="date"
                class="form-control"
                id="received"
                v-model="impl.received"
                placeholder
                value
                required
              />
              <div class="invalid-feedback">Valid first name is required.</div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="supplier_name">Supplier Name</label>
              <input
                type="text"
                class="form-control"
                id="supplier_name"
                v-model="impl.supplier_name"
                placeholder
                value
                required
              />
              <div class="invalid-feedback">Valid last name is required.</div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="invoice_number">Invoice Number</label>
              <input
                type="text"
                class="form-control"
                id="invoice_number"
                v-model="impl.invoice_number"
                placeholder
                value
                required
              />
              <div class="invalid-feedback">Valid first name is required.</div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="quantity">Quantity</label>
              <input
                type="number"
                class="form-control"
                id="quantity"
                v-model="impl.quantity"
                placeholder
                value
                required
              />
              <div class="invalid-feedback">Valid last name is required.</div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="price">Price</label>
              <input
                type="number"
                class="form-control"
                id="price"
                v-model="impl.price"
                placeholder
                value
                required
              />
              <div class="invalid-feedback">Valid first name is required.</div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="invoive_amount">Invoice Amount</label>
              <input
                type="number"
                class="form-control"
                id="invoive_amount"
                v-model="impl.invoive_amount"
                placeholder
                value
                required
              />
              <div class="invalid-feedback">Valid last name is required.</div>
            </div>
          </div>

          <div class="d-block my-3">
            <h5>GST Applicable</h5>
            <div class="custom-control custom-radio">
              <input
                id="credit"
                name="gst"
                type="radio"
                 v-model="impl.gst"
                class="custom-control-input"
                value="1"
                checked
                required
              />
              <label class="custom-control-label" for="credit">Yes</label>
            </div>
            <div class="custom-control custom-radio">
              <input
                id="debit"
                name="gst"
                type="radio"
                v-model="impl.gst"
                value="0"
                class="custom-control-input"
                required
              />
              <label class="custom-control-label" for="debit">NO</label>
            </div>
          </div>
          <hr class="mb-4" />
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
    console.log("Component mounted.");
  },
  data() {
    return {
      impl_id: "",
      impl: {},
      errors: false
    };
  },
  methods: {
    store() {
        this.errors = false;
      this.validate_form();
      if (!this.errors) {
      axios
        .post("/impl", this.impl)
        .then(response => {
          this.impl_id = response.data;
          this.$toasted.success("User Created Sucessfully.");
        })
        .catch(response => {
          this.$toasted.error("User Created Sucessfully.");
        });
      }
    },
    validate_form() {
      var _this = this;
      if (!_this.impl.type) {
        _this.errors = true;
        _this.$toasted.error("Type field is required.");
      }
      if (!_this.impl.varient) {
        _this.errors = true;
        _this.$toasted.error("Varient field is required.");
      }
      if (!_this.impl.received) {
        _this.errors = true;
        _this.$toasted.error("Received date field is required.");
      }
      if (!_this.impl.supplier_name) {
        _this.errors = true;
        _this.$toasted.error("Supplier Name field is required.");
      }
      if (!_this.impl.invoice_number) {
        _this.errors = true;
        _this.$toasted.error("Invoice Number field is required.");
      }
      if (!_this.impl.quantity) {
        _this.errors = true;
        _this.$toasted.error("Quantity field is required.");
      }
      if (!_this.impl.invoive_amount) {
        _this.errors = true;
        _this.$toasted.error("Invoice amount field is required.");
      }
      if (!_this.impl.price) {
        _this.errors = true;
        _this.$toasted.error("Price field is required.");
      }
      if (!_this.impl.gst) {
        _this.errors = true;
        _this.$toasted.error("GST field is required.");
      }
    },
  },
};
</script>
