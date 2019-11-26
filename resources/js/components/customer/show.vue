<template>
  <div>
    <div>
      <div class="row">
        <div class="col-md-3">
          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img
                  class="profile-user-img img-fluid img-circle"
                  src="/media/images/icon/gender/male200X200.png"
                  alt="User profile picture"
                />
              </div>

              <br />

              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>Name</b>
                  <a class="float-right">{{customer.name}}</a>
                </li>
                <li class="list-group-item">
                  <b>C/o</b>
                  <a class="float-right">{{customer.care_of}}</a>
                </li>

                <li class="list-group-item">
                  <b>Since</b>
                  <a class="float-right" :title="customer.created_at">{{customer.creared_human}}</a>
                </li>
              </ul>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- About Me Box -->
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item">
                  <a class="nav-link active" href="#new_purchage" data-toggle="tab">New Purchage</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#bills" data-toggle="tab">Bills</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#cards" data-toggle="tab">Documents</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#cantacts" data-toggle="tab">Contacts</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#addresses" data-toggle="tab">Address</a>
                </li>
              </ul>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane" id="new_purchage">
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
                      <select
                        class="custom-select d-block w-100"
                        @change="add_to_selected_accesses()"
                        id="selected_access"
                        v-model="selected_access"
                        required
                      >
                        <option value>Choose...</option>
                        <option
                          :value="item"
                          v-for="(item, index) in accesses"
                          :key="index"
                        >{{item.type}} - {{item.quantity}}</option>
                      </select>
                      <div class="invalid-feedback">Please select a valid country.</div>
                    </div>

                    <div class="col-md-6 mb-3">
                      <label for="selected_impl">Implements</label>
                      <select
                        class="custom-select d-block w-100"
                        @change="add_to_selected_imps()"
                        id="selected_impl"
                        v-model="selected_impl"
                        required
                      >
                        <option value>Choose...</option>
                        <option
                          :value="item"
                          v-for="(item, index) in impls"
                          :key="index"
                        >{{item.type}} - {{item.quantity}}</option>
                      </select>
                      <div class="invalid-feedback">Please select a valid country.</div>
                    </div>
                  </div>

                  <table v-if="total_price" class="table table-hover table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Chassis Number</th>
                        <th scope="col">Varient</th>
                        <th scope="col">NDP</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="(item, index) in selected_units" :key="index">
                        <th scope="row">{{item.unitmodel.model_name}}</th>
                        <td>{{item.chassis_number}}</td>
                        <td>{{item.clutch_type}} {{item.steering_type}} {{item.pto_type}}</td>
                        <td>₹ {{item.ndp}}</td>
                        <td>
                          <a href="#" @click.prevent="unit_pop(index)">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                          </a>
                        </td>
                      </tr>
                      <tr v-for="(item, index) in selected_accesses" :key="index">
                        <th scope="row">{{item.type}}</th>
                        <td></td>
                        <td>{{item.varient}}</td>
                        <td>₹ {{item.price}}</td>
                        <td>
                          <a href="#" @click.prevent="access_pop(index)">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                          </a>
                        </td>
                      </tr>
                      <tr v-for="(item, index) in selected_impls" :key="index">
                        <th scope="row">{{item.type}}</th>
                        <td></td>
                        <td>{{item.varient}}</td>
                        <td>₹ {{item.price}}</td>
                        <td>
                          <a href="#" @click.prevent="impl_pop(index)">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                          </a>
                        </td>
                      </tr>
                      <tr>
                        <td></td>
                        <td></td>
                        <th scope="row">Total</th>
                        <td>₹ {{total_price}}</td>
                        <td></td>
                      </tr>
                    </tbody>
                  </table>
                  <div class="custom-control custom-checkbox" v-if="selected_units[0]">
                    <input
                      type="checkbox"
                      v-model="fv.fi"
                      value="fi"
                      class="custom-control-input"
                      id="fi"
                    />
                    <label class="custom-control-label" for="fi">Finance required</label>
                  </div>
                  <br />

                  <div class="row" v-if="fv.fi">
                    <div class="col-md-6 mb-3">
                      <label for="finance_companey">Companey</label>
                      <input
                        type="text"
                        class="form-control"
                        v-model="payment.companey"
                        id="finance_companey"
                        placeholder
                        value
                        required
                      />
                      <div class="invalid-feedback">Valid last name is required.</div>
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="name">Finance Amount</label>
                      <input
                        type="number"
                        class="form-control"
                        v-model="payment.amount"
                        id="finance_amount"
                        placeholder
                        value
                        required
                      />
                    </div>
                  </div>

                  <div class="custom-control custom-checkbox" v-if="selected_units[0]">
                    <input
                      type="checkbox"
                      v-model="fv.in"
                      value="in"
                      class="custom-control-input"
                      id="in"
                    />
                    <label class="custom-control-label" for="in">Installments required</label>
                  </div>
                  <br />

                  <div class="row" v-if="fv.in">
                    <div class="col-md-5 mb-3">
                      <label for="installments_date">Installment Date</label>
                      <input
                        type="date"
                        class="form-control"
                        v-model="installment.date"
                        id="installments_date"
                        placeholder
                        value
                        required
                      />
                      <div class="invalid-feedback">Valid last name is required.</div>
                    </div>
                    <div class="col-md-5 mb-3">
                      <label for="installments_amount">Amount</label>
                      <input
                        type="number"
                        class="form-control"
                        v-model="installment.amount"
                        id="installments_amount"
                        placeholder
                        value
                        required
                      />
                      <div class="invalid-feedback">Valid first name is required.</div>
                    </div>
                    <div class="col-md-2 mb-3">
                      <label for="installments_amount">Action</label>
                      <button
                        class="btn btn-primary btn-block"
                        @click.prevent="add_installments()"
                        type="button"
                      >Add</button>
                    </div>
                  </div>

                  <table class="table table-hover table-striped" v-if="installments[0] && fv.in">
                    <thead>
                      <tr>
                        <th scope="col">Installment Date</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="(item, index) in installments" :key="index">
                        <th scope="row">{{item.date}}</th>
                        <td>₹ {{item.amount}}</td>
                        <td>
                          <a href="#" @click.prevent="pop_installment(index)">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                          </a>
                        </td>
                      </tr>

                      <tr>
                        <th scope="row"></th>
                        <td>Net Installment</td>
                        <th>₹ {{transection.installment}}</th>
                      </tr>
                    </tbody>
                  </table>

                  <div class="row" v-if="total_price">
                    <div class="col-md-6 mb-3">
                      <label for="through">Payment</label>
                      <input
                        type="text"
                        class="form-control"
                        v-model="payment.through"
                        id="through"
                        placeholder
                        required
                      />
                      <div class="invalid-feedback">Valid last name is required.</div>
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="through_amount"></label>
                      <br />
                      <h3>₹ {{payment_amount}}</h3>
                      <!-- <input
                        type="number"
                        class="form-control"
                        v-model="payment.through_amount"
                        id="through_amount"
                        placeholder
                        value
                        required
                      />-->
                      <div class="invalid-feedback">Valid first name is required.</div>
                    </div>

                    <div class="col-md-12 mb-3">
                      <label for="description">Description</label>
                      <input
                        type="text"
                        class="form-control"
                        v-model="payment.description"
                        id="finance_amount"
                        placeholder
                        value
                        required
                      />
                      <div class="invalid-feedback">Valid first name is required.</div>
                    </div>
                  </div>

                  <div class="row">
                    <button
                      class="btn btn-primary m-2"
                      @click="generatebillpdf()"
                      type="button"
                    >Generate Bill</button>
                    <button class="btn btn-success m-2" @click="checkout()" type="button">Checkout</button>
                  </div>
                </div>

                <div class="tab-pane" id="bills">
                  <div id="accordion">
                    <div v-for="(item, index) in this.old_bills" :key="index" class="card">
                      <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                          <button
                            class="btn btn-link"
                            data-toggle="collapse"
                            data-target="#collapseOne"
                            aria-expanded="true"
                            aria-controls="collapseOne"
                          >Bill number : {{item.id}}</button>
                          <span
                            style="font-size: 15px; float: right;"
                            :title="item.created_at"
                          >{{item.creared_human}}</span>
                        </h5>
                      </div>

                      <div
                        id="collapseOne"
                        class="collapse show"
                        aria-labelledby="headingOne"
                        data-parent="#accordion"
                      >
                        <div class="card-body">
                          <br />
                          <h4>
                            <u>Items</u>
                          </h4>
                          <table class="table table-hover table-striped">
                            <thead>
                              <tr>
                                <th scope="col">Model</th>
                                <th scope="col">GRN, Engine, Chassis Number</th>
                                <th scope="col">Varients</th>
                                <th scope="col">NDP</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr v-for="(item, index) in item.purchages" :key="index">
                                <th
                                  v-if="item.purchageable_type == 'App\\Unit'"
                                  scope="row"
                                >{{item.purchageable.model_name}}</th>
                                <th v-else scope="row">{{item.purchageable.supplier_name}}</th>
                                <td
                                  v-if="item.purchageable_type == 'App\\Unit'"
                                  scope="row"
                                >{{item.purchageable.grn_number}}, {{item.purchageable.engine_number}}, {{item.purchageable.chassis_number}}</td>
                                <td v-else scope="row">{{item.purchageable.type}}</td>
                                <td
                                  v-if="item.purchageable_type == 'App\\Unit'"
                                  scope="row"
                                >{{item.purchageable.clutch_type}}, {{item.purchageable.steering_type}}, {{item.purchageable.pto_type}}</td>
                                <td v-else scope="row">{{item.purchageable.varient}}</td>
                                <td
                                  v-if="item.purchageable_type == 'App\\Unit'"
                                >₹ {{item.purchageable.ndp}}</td>
                                <td v-else scope="row">₹ {{item.purchageable.price}}</td>
                              </tr>
                            </tbody>
                          </table>

                          <br />
                          <h4>
                            <u>Finance</u>
                          </h4>
                          <table class="table table-hover table-striped">
                            <thead>
                              <tr>
                                <th scope="col">Companey Name</th>
                                <th scope="col">Amount</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td scope="row">{{item.finance.companey}}</td>
                                <td scope="row">₹ {{item.finance.amount}}</td>
                              </tr>
                            </tbody>
                          </table>
                          <br />
                          <h4>
                            <u>Schedules</u>
                          </h4>
                          <table class="table table-hover table-striped">
                            <thead>
                              <tr>
                                <th scope="col">Schedule Date</th>
                                <th scope="col">Amount</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr v-for="(item, index) in item.schedules" :key="index">
                                <td scope="row">{{item.date}}</td>
                                <td scope="row">₹ {{item.amount}}</td>
                              </tr>
                            </tbody>
                          </table>
                          <br />
                          <h4>
                            <u>Payments</u>
                          </h4>
                          <table class="table table-hover table-striped">
                            <thead>
                              <tr>
                                <th scope="col">Mode</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Description</th>
                                <th scope="col">Date</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr v-for="(item, index) in item.payments" :key="index">
                                <td scope="row">{{item.mode}}</td>
                                <td scope="row">₹ {{item.amount}}</td>
                                <td scope="row">{{item.description}}</td>
                                <td scope="row" :title="item.created_at">{{item.creared_human}}</td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="tab-pane" id="cards">
                  <div>
                    <form class="form-inline" @submit.prevent="add_document">
                      <label class="sr-only" for="inlineFormInputName2name">Document Name</label>
                      <input
                        type="text"
                        class="form-control mb-2 mr-sm-2"
                        id="inlineFormInputName2name"
                        v-model="document.name"
                        placeholder="Card Name"
                      />

                      <label class="sr-only" for="inlineFormInputName2number">Document Number</label>
                      <input
                        type="text"
                        v-model="document.number"
                        class="form-control mb-2 mr-sm-2"
                        id="inlineFormInputName2number"
                        placeholder="Card Number"
                      />

                      <label class="sr-only" for="inlineFormInputName2file">File</label>
                      <input
                        type="file"
                        class="form-control mb-2 mr-sm-1"
                        id="inlineFormInputName2file"
                        v-on:change="onFileChange"
                      />
                      <div class="float-right">
                        <button type="submit" class="btn btn-primary mb-2">Add</button>
                      </div>
                    </form>
                  </div>

                  <div class="card-columns">
                    <div v-for="(item, index) in this.customer.documents" :key="index" class="card">
                      <div class="card-header">
                        {{item.name}} : {{item.number}}
                        <div class="float-right">
                          <a href="#" @click.prevent="delete_document(item.id)">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                          </a>
                        </div>
                      </div>
                      <img
                        v-if="item.url"
                        class="card-img-top"
                        :src="item.url"
                        alt="Card image cap"
                      />
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="cantacts">
                  <div>
                    <form class="form-inline">
                      <label class="sr-only" for="type">Type</label>
                      <input
                        type="text"
                        v-model="contact.type"
                        class="form-control mb-2 mr-sm-2"
                        id="type"
                        placeholder="Type"
                      />

                      <label class="sr-only" for="name">Card Number</label>
                      <input
                        type="text"
                        v-model="contact.name"
                        class="form-control mb-2 mr-sm-2"
                        id="name"
                        placeholder="Name"
                      />

                      <label class="sr-only" for="number">Number</label>
                      <input
                        type="text"
                        v-model="contact.number_email"
                        class="form-control mb-2 mr-sm-1"
                        id="number"
                        placeholder="Number / Email"
                      />
                      <div class="float-right">
                        <button
                          type="button"
                          @click.prevent="contact_add()"
                          class="btn btn-primary mb-2"
                        >Add</button>
                      </div>
                    </form>
                  </div>
                  <hr />

                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Phone / Email</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="(item, index) in this.customer.contacts" :key="index">
                        <td>{{item.name}}</td>
                        <td>{{item.number_email}}</td>
                        <td>
                          <a href="#" @click="contact_delate(item.id)">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                          </a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="tab-pane" id="addresses">
                  <div>
                    <form class="form-inline">
                      <label class="sr-only" for="village">Village</label>
                      <input
                        type="text"
                        class="form-control mb-2 mr-sm-2"
                        id="village"
                        v-model="address.village"
                        placeholder="Village"
                      />

                      <label class="sr-only" for="block">Block</label>
                      <input
                        type="text"
                        class="form-control mb-2 mr-sm-2"
                        id="block"
                        v-model="address.block"
                        placeholder="Block"
                      />

                      <label class="sr-only" for="tehshil">Tehshil</label>
                      <input
                        type="text"
                        placeholder="Tehshil"
                        class="form-control mb-2 mr-sm-1"
                        id="tehshil"
                        v-model="address.tehshil"
                      />
                      <div class="float-right">
                        <button
                          type="button"
                          @click.prevent="address_add()"
                          class="btn btn-primary mb-2"
                        >Add</button>
                      </div>
                    </form>
                  </div>
                  <hr />

                  <!-- <div class="card-columns">
                    <div v-for="(item, index) in this.customer.cards" :key="index" class="card">
                      <div class="card-header">
                        {{item.name}} : {{item.number}}
                        <div class="float-right">
                          <i class="fa fa-trash" aria-hidden="true"></i>
                        </div>
                      </div>
                      <img
                        v-if="item.documents['0']"
                        class="card-img-top"
                        :src="item.documents['0'].url"
                        alt="Card image cap"
                      />
                    </div>
                  </div>-->
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">Village</th>
                        <th scope="col">Block</th>
                        <th scope="col">Tehshil</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="(item, index) in this.customer.addresses" :key="index">
                        <td>{{item.village}}</td>
                        <td>{{item.block}}</td>
                        <td>{{item.tehshil}}</td>
                        <td>
                          <a href="#" @click="address_delate(item.id)">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                          </a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- /.tab-content -->
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
    </div>
  </div>
</template>

<script>
import jsPDF from "jspdf";
export default {
  mounted() {
    this.get_customer();
    this.get_models();
    this.get_access();
    this.get_impl();
    this.get_bills();
  },
  data() {
    return {
      errors: false,
      customer: {},
      unitmodels: [],
      unit_model: "",
      units: [],
      selected_units: [],
      selected_unit: {},
      accesses: [],
      impls: [],
      selected_access: {},
      selected_impl: {},
      selected_accesses: [],
      selected_impls: [],
      transection_bundle: {},
      user: {},
      payment: {},
      installments: [],
      installment: {},
      bill: {},
      bills: [],
      contact: {},
      address: {},
      old_bills: [],
      fv: {},
      transection: {},
      document: {
        name: "",
        number: "",
        file_: ""
      }
    };
  },
  methods: {
    validate_form() {
      var _this = this;
      if (!_this.payment.through) {
        _this.errors = true;
        _this.$toasted.error("Payment Mode is required");
      }
    },

    access_pop(index) {
      this.selected_accesses.splice(index, 1);
      ++this.accesses[index].quantity;
    },
    pop_installment(index) {
      this.installments.splice(index, 1);
    },
    impl_pop(index) {
      this.selected_impls.splice(index, 1);
      ++this.impls[index].quantity;
    },
    unit_pop(index) {
      this.selected_units.splice(index, 1);
    },
    onFileChange(e) {
      console.log(e.target.files[0]);
      var fileReader = new FileReader();
      fileReader.readAsDataURL(e.target.files[0]);
      fileReader.onload = e => {
        this.document.file_ = e.target.result;
      };
      console.log(this.document);
    },
    add_document(e) {
      axios
        .post("/document/" + this.customer_id + "/store", this.document)
        .then(response => {
          this.$toasted.success("Document uploaded Successfully");
          this.get_documents();
        })
        .catch(error => {
          this.$toasted.error("Error while upload.");
        });
    },

    delete_document(id) {
      var _this = this;
      if (confirm("are you sure?"))
        axios
          .post("/document/delete_document/" + id)
          .then(function(response) {
            _this.get_documents();
            _this.$toasted.success("Document deleted successfully");
          })
          .catch(function(error) {
            _this.$toasted.error("Something went wrong. Try again");
          });
    },

    get_documents() {
      var _this = this;
      axios
        .get("/document/get_documents/" + _this.customer_id)
        .then(function(response) {
          _this.customer.documents = response.data;
          console.log(response.data);
        })
        .catch(function(error) {
          _this.$toasted.error("Something went wrong. Try again!");
        });
    },

    cleardata() {
      (this.unit_model = ""),
        (this.units = []),
        (this.selected_units = []),
        (this.selected_unit = {}),
        (this.selected_access = {}),
        (this.selected_impl = {}),
        (this.selected_accesses = []),
        (this.selected_impls = []),
        (this.transection_bundle = {}),
        (this.user = {}),
        (this.payment = {}),
        (this.installments = []),
        (this.installment = {}),
        (this.bill = {}),
        (this.bills = []);
        (this.fv = {});
    },
    generatebillpdf() {
      var doc = new jsPDF();
      doc.text(10, 10, "This is test pdf for confirmation");
      doc.autoPrint({ variant: "non-conform" });
      doc.save("autoprint.pdf");
    },
    get_customer() {
      axios
        .post("show_/" + this.customer_id, this.customer_id)
        .then(response => {
          (this.customer = response.data), console.log(response);
        })
        .catch(function(error) {
          this.get_customer();
          console.log(error);
        });
    },

    remove_from_selected_accesses($item) {
      ++this.accesses[this.accesses.findIndex(obj => obj.id === $item.id)]
        .quantity;
      this.selected_accesses.pop($item);
    },
    remove_from_selected_impls($item) {
      ++this.impls[this.impls.findIndex(obj => obj.id === $item.id)].quantity;
      this.selected_impls.pop($item);
    },

    add_to_selected_accesses() {
      if (
        this.accesses[
          this.accesses.findIndex(obj => obj.id === this.selected_access.id)
        ].quantity > 0
      ) {
        this.selected_accesses.push(this.selected_access);
        --this.accesses[
          this.accesses.findIndex(obj => obj.id === this.selected_access.id)
        ].quantity;
        this.selected_access = "";
      } else {
        this.$toasted.error(
          ":-( " + this.selected_access.type + "is not in stock."
        );
        this.selected_access = "";
      }
    },
    add_to_selected_imps() {
      if (
        this.impls[
          this.impls.findIndex(obj => obj.id === this.selected_impl.id)
        ].quantity > 0
      ) {
        this.selected_impls.push(this.selected_impl);
        --this.impls[
          this.impls.findIndex(obj => obj.id === this.selected_impl.id)
        ].quantity;
        this.selected_impl = "";
      } else {
        this.$toasted.error(
          ":-( " + this.selected_impl.type + " is not in stock."
        );
        this.selected_impl = "";
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
    add_installments() {
      if (this.installment.amount && this.installment.date) {
        this.installments.push({ ...this.installment });
        this.installment.amount = "";
        this.installment.date = "";
        this.payment_amount;
      } else {
        this.$toasted.error("Fields cannot be empty.");
        this.payment_amount;
      }
    },
    gst($gst) {
      if ($gst == 1) {
        return "Yes";
      } else {
        return "No";
      }
    },
    get_bills() {
      axios
        .get("/bill/get_models/" + this.customer_id)
        .then(response => {
          this.old_bills = response.data;
          //console.log(response.data);
          // console.log('hi');
        })
        .catch(response => {
          //this.get_bills();
        });
    },
    checkout() {
      this.errors = false;
      this.validate_form();
      if (!this.errors) {
        if (!this.fv.in) {
          this.installments = [];
        }

        if (!this.fv.fi) {
          this.payment.amount = 0;
          this.payment.companey = "";
        }

        axios
          .post("/customer/checkout", {
            units: this.selected_units,
            impls: this.selected_impls,
            accesses: this.selected_accesses,
            payment: this.payment,
            installments: this.installments,
            total_amount: this.total_price,
            customer: this.customer,
            transection: this.triangle,
            fv: this.fv
          })
          .then(response => {
            this.old_bills = response.data;
            this.$toasted.success("Bill generated .");
            this.cleardata();
          })
          .catch(response => {
            this.$toasted.error(
              "Finace amount / Installment amount / Payment is not valid."
            );
          });
      }
    },
    contact_add() {
      axios
        .post("/contact/" + this.customer_id + "/store", this.contact)
        .then(response => {
          this.contact_get();
          this.$toasted.success("Contact added successfully");
          this.contact = {};
        })
        .catch(response => {
          this.$toasted.error("Something Went wrong. Try again !");
        });
    },
    contact_delate(id) {
      var _this = this;
      if (confirm("are you sure?"))
        axios
          .post("/contact/delete_contact/" + id)
          .then(function(response) {
            _this.contact_get();
            _this.$toasted.success("Contact deleted successfully");
          })
          .catch(function(error) {
            _this.$toasted.error("Something went wrong. Try again");
          });
    },
    contact_get() {
      var _this = this;
      axios
        .get("/contact/get_contacts/" + _this.customer_id)
        .then(function(response) {
          _this.customer.contacts = response.data;
          console.log(response.data);
        })
        .catch(function(error) {
          _this.$toasted.error("Something went wrong. Try again!");
        });
    },

    address_add() {
      axios
        .post("/address/" + this.customer_id + "/store", this.address)
        .then(response => {
          this.address_get();
          this.$toasted.success("address added successfully");
          this.address = {};
        })
        .catch(response => {
          this.$toasted.error("Something Went wrong. Try again !");
        });
    },
    address_delate(id) {
      var _this = this;
      if (confirm("are you sure?"))
        axios
          .post("/address/delete_address/" + id)
          .then(function(response) {
            _this.address_get();
            _this.$toasted.success("Address deleted successfully");
          })
          .catch(function(error) {
            _this.$toasted.error("Something went wrong. Try again");
          });
    },
    address_get() {
      var _this = this;
      axios
        .get("/address/get_addresses/" + _this.customer_id)
        .then(function(response) {
          _this.customer.addresses = response.data;
          console.log(response.data);
        })
        .catch(function(error) {
          _this.$toasted.error("Something went wrong. Try again!");
        });
    }
  },
  props: {
    customer_id: ""
  },
  computed: {
    total_npayable: function() {
      var total = 0;
      this.selected_units.forEach(element => {
        total += element.ndp;
      });

      this.selected_impls.forEach(element => {
        total += element.price;
      });

      this.selected_accesses.forEach(element => {
        total += element.price;
      });
      if (this.payment.amount) {
        total = total - this.payment.amount;
      }

      return total;
    },

    payment_amount: function() {
      var installment_amount_ = 0;
      this.installments.forEach(element => {
        installment_amount_ += parseInt(element.amount, 10);
      });
      this.transection.installment = installment_amount_;

      var amount = this.transection.total;
      if (this.fv.in) {
        amount -= installment_amount_;
      }
      if (this.fv.fi && this.payment.companey) {
        amount -= parseInt(this.payment.amount);
      }

      if (amount > 0) {
        this.payment.through_amount = amount;
        return amount;
      } else if (isNaN(amount)) {
        return "Processing";
      } else {
        this.$toasted.error("Amount cannot be zero or less.");
        this.errors=true;
        return "Invalid amount";
      }
    },


    total_price: function() {
      var total = 0;
      this.selected_units.forEach(element => {
        total += element.ndp;
      });

      this.selected_impls.forEach(element => {
        total += element.price;
      });

      this.selected_accesses.forEach(element => {
        total += element.price;
      });
      this.transection.total = total;
      return total;
    }
  }
};
</script>

<style >
.card-columns {
  column-count: 2;
}
</style>
