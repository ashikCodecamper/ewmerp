@extends('layouts.apps')
@section('module-name','Leave Application')
@section('stylesheet')
<!-- <script src="https://cdn.jsdelivr.net/npm/vue"></script> -->
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
@endsection
@section('content')
<div id="app">
<table class="table table-striped table-border">
<thead>
  <th>Name</th>
  <th>Leave Type</th>
  <th>Description</th>
  <th>From Date</th>
  <th>To Date</th>
  <th>Status</th>
  <th>Action</th>
</thead>
<tbody>

  <tr v-for="(item,index) in items">

    <td>@{{item.name}}</td>
    <td>@{{item.leaveType}}</td>
    <td>@{{item.desc}}</td>
    <td>@{{item.from}}</td>
    <td>@{{item.to}}</td>
    <td>
      <button v-if="item.status === 1" class="btn btn-success">Approved</button>
      <button v-if="item.status === 2" class="btn btn-warning">Rejected</button>
      <button v-if="item.status === 0" class="btn btn-primary">Pending</button>
    </td>
    <td>
      <button @click="approve(index)" class="btn btn-success">Approve</button>
      <button @click="reject(index)" class="btn btn-danger">Reject</button>

    </td>
  </tr>


</tbody>
</table>
<!-- Modal -->
</div>

@endsection
@section('javascript')

<script type="text/javascript">
const app = new Vue({
  el: '#app',
  data: {
    active_id: '',
    items: [],
    status:0,
  },
  methods: {
    submitStatus: function(index) {

      let localthis = this;
        axios.post('/hr/viewleaveapp/api', {
        status: localthis.items[index].status,
        id: localthis.items[index].id
      })
      .then(function (response) {
        console.log(response);
      })
      .catch(function (error) {
        console.log(error);
      });
    },
    approve(index) {
      this.items[index].status = 1;
      this.submitStatus(index)
    },
    reject(index) {
      this.items[index].status = 2;
      this.submitStatus(index)
    }
  },

  created () {
    var self = this;
    axios.get('/hr/viewleaveapp/api')
    .then(function (response) {
      self.items = response.data.data;
      console.log(self.items)
    })
    .catch(function (error) {
     console.log(error);
    });
  }
});

</script>
@endsection
