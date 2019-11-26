<template>
  <div>
    <div>
      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
            <span class="badge badge-secondary badge-pill">3</span>
          </h4>
          <div class="alert alert-success" v-if="customer.id" role="alert">
            Customer {{customer.name}} created successfully<a :href="'/customer/'+ customer.id" class="alert-link">     {{customer.name}}</a>
            </div>
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
          <h4 class="mb-3">New Customer</h4>
          <form class="needs-validation" novalidate>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="name">Name</label>
                <input
                  type="text"
                  class="form-control"
                  v-model="customer.name"
                  id="name"
                  placeholder
                  value
                  required
                />
                <div class="invalid-feedback">Valid first name is required.</div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="care_of">C/o</label>
                <input
                  type="text"
                  class="form-control"
                  v-model="customer.care_of"
                  id="care_of"
                  placeholder
                  value
                  required
                />
                <div class="invalid-feedback">Valid last name is required.</div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4 mb-3">
                <label for="village">Village</label>
                <input
                  type="text"
                  v-model="customer.village"
                  class="form-control"
                  id="village"
                  placeholder
                  value
                  required
                />
                <div class="invalid-feedback">Valid first name is required.</div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="block">Block</label>
                <input
                  type="text"
                  class="form-control"
                  v-model="customer.block"
                  id="block"
                  placeholder
                  value
                  required
                />
                <div class="invalid-feedback">Valid first name is required.</div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="tehshil">Tehshil</label>
                <input
                  type="text"
                  class="form-control"
                  v-model="customer.tehshil"
                  id="tehshil"
                  placeholder
                  value
                  required
                />
                <div class="invalid-feedback">Valid last name is required.</div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="contact_number">Contact Number</label>
                <input
                  type="number"
                  v-model="customer.number"
                  class="form-control"
                  id="contact_number"
                  placeholder
                  value
                  required
                />
                <div class="invalid-feedback">Valid first name is required.</div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="adhar_number">Adhar Number</label>
                <input
                  type="number"
                  class="form-control"
                  v-model="customer.adhar_number"
                  id="adhar_number"
                  placeholder
                  value
                  required
                />
                <div class="invalid-feedback">Valid last name is required.</div>
              </div>
            </div>

            <hr class="mb-4" />
            <button
              class="btn btn-primary btn-lg btn-block"
              @click.prevent="store()"
              type="submit"
            >Continue to add</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    console.log("Component mounted.");
  },
  data() {
    return {
      //   'name', 'village', 'block','tehshil','number','adhar_number'
      customer : {
          id : '',
      name: "",
      care_of: "",
      village: "",
      block: "",
      tehshil: "",
      number: "",
      adhar_number: "",
      errors : true,
      }
    };
  },
  methods: {
      store() {
        this.errors = false;
      this.validate_form();
      if (!this.errors) {
      axios
        .post("/customer", this.customer)
        .then(response => {
          this.customer = response.data;
          this.$toasted.success("Customer Created Sucessfully.");
        })
        .catch(response => {
          this.$toasted.error("Adhar number already exist.");
        });
      }
    },
    validate_form() {
    var _this = this;
    var fields = ["name","village","block","tehshil","number","adhar_number"];

    fields.forEach(element => {
      if (!_this.customer[element]) {
        _this.errors = true;
        _this.$toasted.error( element+" is required.");
      }
    });
    }
  },
};
</script>
