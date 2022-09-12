<!DOCTYPE html>
<HTML>
<head>
<meta content='width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0' name='viewport'/>
<meta content='text/html;charset=UTF-8' http-equiv='Content-Type'/>
<link href='https://rawgit.com/DeVoresyah/jinxprooo/master/assets/css/bootstrap.min.css' rel='stylesheet'/>
<link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel='stylesheet'/>
<!-- JS -->
<script src='https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/vue/dist/vue.js' type='text/javascript'></script>
<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js' type='text/javascript'></script>
<script src='https://cdn.rawgit.com/VoreCorporation/AdSafe/clientarea/assets/js/app.min.js'></script>
<script src='https://rawgit.com/DeVoresyah/jinxprooo/master/assets/js/all.min.js' type='text/javascript'></script>


<style name="" type="text/css"><!-- /* <style id='page-skin-1' type='text/css'><!--
/**
* Jinxprooo - Auto Jingling Visitor
*
* Built with
* @Bootstrap 4
* @Vuejs
*
* Fork on Github (https://github.com/DeVoresyah/jinxprooo/)
* This project under MIT License
*/
#navbar-iframe{height:0;visibility:hidden;display:none;}
.blog-feeds, #blog-pager, .blog-pager, .post-footer, h3.post-title, #main{display:none !important;}
#vueApp {
background: linear-gradient(to right top, #21c428, #00dcb7, #00e8ff, #c5eeff, #ffffff);
background: -webkit-linear-gradient(to left top, #21c428, #00dcb7, #00e8ff, #c5eeff, #ffffff);
background: -o-linear-gradient(to right top, #21c428, #00dcb7, #00e8ff, #c5eeff, #ffffff);
background: -moz-linear-gradient(to right top,#21c428, #00dcb7, #00e8ff, #c5eeff, #ffffff);
}
.header-section {
height: auto;
text-align: center;
padding:10% 0 10%;
}
#vueApp .card {
margin:30px 0;
}
.credit {
margin-top: 5px;
}
.footer {
position: relative;
left: 0;
bottom: 30;
width: 100%;
color: black;
text-align: center;
}

--></style>
</head>
<body>
<div id='vueApp'>
<div class='container'>
<header class='header-section'>
<h2>Script Safelink V 3</h2>
<span class='text-muted'>😈 Anti Banned 😈</span>
<div class='row'>
<div class='col-md-6'>
<div class='card'>
<div class='card-body'>
<form v-on:submit.prevent='goJinx'>
<div class='form-group'>
<label class='label-control' for='inputUrl'><i aria-hidden='true' class='fa fa-link'></i> Input URL Safelinku</label>
<input Placeholder='https://safelinku.com/inputUrl' class='form-control' id='inputUrl' name='url' required='true' type='url' v-model='target.url'/>
</div>
<div class='row'>
<div class='col-md-6'>
<div class='form-group'>
<label class='label-control' for='inputTraffic'><i aria-hidden='true' class='fa fa-rocket'></i> View / detik</label>
<select id='inputTraffic' name='traffic' required='true' type='number' v-model='target.traffic' class="form-control">
            <option value="10">10</option>
            <option value="50">50</option>
            <option value="100">100</option>
            <option value="200">200</option>
            <option value="500">500</option>
            <option value="1000">1000</option>
           	</select>
</div>
</div>
<div class='col-md-6'>
<div class='form-group'>
<label class='label-control' for='inputMsg'><i aria-hidden='true' class='fa fa-envelope'></i> Message</label>
<input class='form-control' id='inputMsg' name='message' required='true' type='text' v-model='target.msg'/>
</div>
</div>
</div>
<button class='btn btn-raised btn-primary' id='btn-send' type='submit' v-if='status.isState == false'>Mulai <i class='fas fa-plane'></i></button>
<a class='btn btn-danger' href='javascript:void(0)' id='btn-stop' v-else='' v-on:click='jinxStop'>Stop <i class='fa fa-power-off'></i></a>
</form>
</div>
</div>
</div>
<div class='col-md-6'>
<div class='card'>
<div class='card-body'>
<h3>Hasil</h3>
<table class='table table-striped table-hover'>
<tr>
<td><b class='text-warning'>Permintaan</b></td>
<td class='table-warning'>: <b>{{ status.requested }}</b></td>
</tr>
<tr>
<td><b class='text-success'>Sukses</b></td>
<td class='table-success'>: <b>{{ status.success }}</b></td>
</tr>
<tr>
<td><b class='text-danger'>Gagal</b></td>
<td class='table-danger'>: <b>{{ status.failed }}</b></td>
</tr>
</table>
</div>
</div>
</div>
</div>


<br/><br/>
</header>
</div>
<div class='footer'>
<p class='credit'><b>&copy; 2021 Script Safelinku V3</b><br />Powered By
<i class='fas fa-heart text-danger'></i> siapngoding.my.id</p>
</div>
</div>
<!-- END VUE APP -->
<script src='https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js' type='text/javascript'></script>
<script src='https://rawgit.com/DeVoresyah/jinxprooo/master/assets/css/bootstrap.min.js'></script>
<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
<!-- Main Script -->
<script>
//<![CDATA[
var jinxInt;

var vueJingling = new Vue({
  el: '#vueApp',
  data: {
    config: {
      'name': 'Script Safelinku V3',
      'description': 'Anti Banned'
    },
    target: {
      'url': '',
      'traffic': '',
      'msg': 'Script Safelinku'
    },
    status: {
      'isState': false,
      'requested': 0,
      'success': 0,
      'failed': 0
    },
    reqHash: []
  },
  methods: {
    onReq: function(rid) {
      this.status.requested++
    },
    onComplete: function(rid) {
      delete this.reqHash[rid];
    },
    onFail: function(rid) {
      this.status.success++
      delete this.reqHash[rid];
    },
    onSuccess: function(rid) {
      this.status.success++
      delete this.reqHash[rid];
    },
    goJinx: function() {
      var vm = this;

      this.status.isState = true;
      jinxInt = setInterval(this.httpReq, (10000 / parseInt(this.target.traffic) | 0));
    },
    jinxStop: function() {
      clearInterval(jinxInt);
      this.status.isState = false;
    },
    httpReq: function() {
      var vm = this;

      if (this.status.requested > this.status.success + this.status.failed + 10000) {
        return;
      }

      var rID = Number(new Date());
      var img = new Image();
      img.onerror =  function() {vm.onFail(rID)};
      img.onabort = function() {vm.onFail(rID)};
      img.onload = function() {vm.onSuccess(rID)};

      img.setAttribute("src", this.target.url + "?id=" + rID + ";msg=" + this.target.msg);
      this.reqHash[rID] = img;
      this.onReq(rID);
    }
  },
  mounted: function() {
    
  }
});
//]]>
</script>
</body>
</HTML>
