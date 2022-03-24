<style type="text/css">
    .orange {
  background: #F8971D !important;
}
.card-content > a > .card {
  margin: 1%;
  width: calc(96% / 2);
  background: #1a92b7cc;
  border-radius: 7px;
  box-sizing: border-box;
  text-align: center;
  font-size: 20px;
  text-transform: uppercase;
  padding: 10px 0;
  float: left;
  color: #fff;
  transition: 0.5s;
  cursor: pointer; 
  box-shadow: 10px 10px 5px 0px rgba(0, 0, 0, 0.11);
}
.card-content > a > .card p {
    font-size: 15px;
    margin: 5px 0 0;
}
.card-content > a > .card .cardpara {
    background: #FE9100;
    padding: 10px;
}
.card-content > .card:active {
  background-color: #F8971D;
  user-select: none;
  transition: 0s;
  -webkit-transition: 0s;
}

.card-header-title {
  background: #f4f4f4;
}

.card-element-title {
  text-transform: uppercase;
  text-align: center;
  font-size: 33px;
  color: #7f7f7f;
}
</style>

<div class="card-content clearfix">
    <?php if(isset($branches) && !empty($branches)) {
        foreach ($branches as $branch) {
           ?>

    <a href="<?php echo base_url('product-details/'.$branch['model_id'].'/'.$branch['city_id']); ?>">
    <div  class="card right-half"><?php echo ucwords($branch['branch_name']) ?>
          <p>Station timing : 9 AM - 7 PM</p>
          <p><?php echo $branch['address']; ?></p>
          <p class="cardpara"><?php echo $branch['available_qty']; ?> Available</p>
     </div> </a>
     <?php  
        }
    } else { echo "Bikes not available at Branch"; } ?>
 </div>