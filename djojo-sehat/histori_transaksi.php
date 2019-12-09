<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
<style>

ul {
 list-style: none;
 padding: 0px;
}

.btn {
 background: none;
 -webkit-transition: all .3s ease;
 -moz-transition: all .3s ease;
 transition: all .3s ease;
 min-width: 155px;
}

.btn:hover {
 background: none;
 color: #fff;
 border-color: #3498db;
 background-color: #3498db;
}

.btn-primary {
 border-radius: 25px;
 display: inline-block;
 padding: 14px 28px 13px 28px;
 line-height: 1;
 border: 2px solid #3498db;
 font-family: "Raleway", "Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
 font-weight: bold;
 font-size: 11px;
 text-transform: uppercase;
 letter-spacing: 1px;
 color: #3498db;
}

.btn-primary.btn-filled {
 background: #3498db;
 color: #fff;
}

.btn-white {
 border-color: #fff;
 color: #fff;
}

.btn-white:hover {
 background: #fff;
 color: #333333;
 border-color: #fff;
}

.btn-white.btn-filled {
 background: #fff;
 color: #e74c3c;
}

.btn-grey {
 border-color: #777777;
 color: #333333;
}

.pricing-tables .col-md-3:first-child .pricing-table {
 border-radius: 25px 0px 0px 25px;
}

.pricing-tables .col-md-3:last-child .pricing-table {
 border-radius: 0px 25px 25px 0px;
 border-right: 2px solid rgba(255, 255, 255, 0.2);
}

.pricing-table {
 border-top: 2px solid rgba(255, 255, 255, 0.2);
 border-bottom: 2px solid rgba(255, 255, 255, 0.2);
 border-left: 2px solid rgba(255, 255, 255, 0.2);
 text-align: center;
 padding-bottom: 40px;
}

.pricing-table .price {
 padding: 40px 0px;
 font-weight: 600;
 border-bottom: 2px solid rgba(255, 255, 255, 0.2);
}

.pricing-table .price .sub {
 font-size: 16px;
 color: rgba(255, 255, 255, 0.3);
 position: relative;
 bottom: 10px;
}

.pricing-table .price .amount {
 color: #fff;
 font-size: 56px;
 display: inline-block;
 padding: 0px 8px;
}

.pricing-table .features {
 margin: 40px 0px;
}

.pricing-table .features li {
 color: #fff;
 font-size: 16px;
 text-align: center;
 margin-bottom: 16px;
}

.pricing-table .features li:last-child {
 margin-bottom: 0px;
}

.pricing-table .features li strong {
 font-weight: 600;
}

.pricing-table.emphasis {
 background-color: #e74c3c;
}

.pricing-2 .pricing-tables .col-md-3:first-child .pricing-table {
 border-radius: 25px 0px 0px 25px;
}

.pricing-2 .pricing-tables .col-md-3:last-child .pricing-table {
 border-radius: 0px 25px 25px 0px;
 border-right: 2px solid rgba(35, 35, 35, 0.2);
}

.pricing-2 .pricing-table {
 border-top: 2px solid rgba(35, 35, 35, 0.2);
 border-bottom: 2px solid rgba(35, 35, 35, 0.2);
 border-left: 2px solid rgba(35, 35, 35, 0.2);
 text-align: center;
 padding-bottom: 40px;
}

.pricing-2 .pricing-table .features {
 margin: 0px;
}

.pricing-2 .pricing-table .features li:first-child {
 border-top: none;
}

.pricing-2 .pricing-table .features li {
 color: #333333;
 border-top: 2px solid rgba(35, 35, 35, 0.2);
 padding: 24px 0px;
 margin: 0;
}

.pricing-2 .pricing-table .price {
 border-top: 2px solid rgba(35, 35, 35, 0.2);
 padding-bottom: 24px;
 border-bottom: none;
}

.pricing-2 .pricing-table .price .amount {
 color: #333333;
}

.pricing-2 .pricing-table .price .sub {
 color: #777777;
 opacity: 0.7;
}

.pricing-2 .pricing-table.emphasis {
 background-color: #2c3e50;
}

.pricing-2 .pricing-table.emphasis .features li {
 color: #fff;
 background-color: #2c3e50 !important;
}

.pricing-2 .pricing-table.emphasis .price .amount,
.pricing-2 .pricing-table.emphasis .sub {
 color: #fff;
}

.pricing-2 .feature-list {
 padding-bottom: 0px;
}

.pricing-2 .pricing-table .features li:nth-child(even) {
 background: #f4f4f4;
}

.pricing-tables .no-pad {
 padding: 0px 15px;
}

.pricing-tables .no-pad-left {
 padding-left: 15px;
}

.pricing-tables .no-pad-right {
 padding-right: 15px;
}

.pricing-table {
 margin-bottom: 16px;
 border-radius: 25px !important;
 border: 2px solid rgba(255, 255, 255, 0.2) !important;
}

.pricing-2 .hidden-sm:first-child {
 display: none;
}

.pricing-2 .pricing-table.emphasis .features li {
 border-radius: 25px;
}

.pricing-2 .pricing-table .features li:first-child {
 font-size: 24px;
}

.pricing-tables .no-pad {
 padding: 0px 15px;
}

.pricing-tables .no-pad-left {
 padding-left: 15px;
}

.pricing-tables .no-pad-right {
 padding-right: 15px;
}

.pricing-table {
 margin-bottom: 30px;
 border-radius: 25px !important;
 border: 2px solid rgba(255, 255, 255, 0.2) !important;
}
</style>

<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,400,300,600,700%7CRaleway:700' rel='stylesheet' type='text/css'>
<div class="main-container">
<section class="pricing-2">
 <div class="container">
  <div class="row pricing-tables">
   <div class="col-md-3 no-pad-right hidden-sm">
    <div class="pricing-table feature-list">
     <ul class="features">
      <li><strong>&nbsp;</strong></li>
      <li><strong>Storage Space</strong></li>
      <li><strong>Unique Logins</strong></li>
      <li><strong>Offsite Backup</strong></li>
      <li><strong>Support Hours</strong></li>
      <li><strong>Bandwidth</strong></li>
     </ul>
    </div>
   </div>
   <div class="col-md-3 no-pad hidden-sm">
    <div class="pricing-table">
     <ul class="features">
      <li><strong>No Invoice</strong></li>
      <li><strong>Nama</strong></li>
     </ul>
     <div class="price">
      <span class="sub">Rp.</span>
      <span class="amount">90.000,-</span>
      <span class="sub"></span>
     </div>
     <a href="#" class="btn btn-primary">Detail</a>
    </div>
   </div>
   <div class="col-md-3 no-pad hidden-sm">
    <div class="pricing-table emphasis">
     <ul class="features">
      <li><strong>Business</strong></li>
      <li><strong>200</strong>GB</li>
      <li><strong>400</strong>Users</li>
      <li><strong>2TB</strong></li>
      <li><strong>Standard Support</strong></li>
      <li><strong>40</strong>GB</li>
     </ul>
     <div class="price">
      <span class="sub">$</span>
      <span class="amount">49</span>
      <span class="sub">/mo</span>
     </div>
     <a href="#" class="btn btn-primary btn-white">Sign Me Up</a>
    </div>
   </div>
   <div class="col-md-3 no-pad-left hidden-sm">
    <div class="pricing-table">
     <ul class="features">
      <li><strong>Corporate</strong></li>
      <li><strong>400</strong>GB</li>
      <li><strong>800</strong> Users</li>
      <li><strong>4TB</strong></li>
      <li><strong>24/7</strong></li>
      <li><strong>90</strong>GB</li>
     </ul>
     <div class="price">
      <span class="sub">$</span>
      <span class="amount">69</span>
      <span class="sub">/mo</span>
     </div>
     <a href="#" class="btn btn-primary">Sign Me Up</a>
    </div>
   </div>
  </div>
 </div>
</section>
</div>