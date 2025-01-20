<?php
class M_Plate extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  function getPlate()
  {
    return $this->db->query("SELECT
    pt.id,
    pt.default_code,
    pt.name as prod_tmpl,
    pt.x_width,
    pt.x_length,
    pt.x_width_m,
    pt.x_length_m,
    count(stock.qty)  as gd_stock,
    count(non_stock.qty)  as gd_pldc
  from
    product_template pt
  join 
      product_product pp on
    pt.id = pp.product_tmpl_id
  join 
      stock_production_lot spl on
    pp.id = spl.product_id
  left join (
    select
      sq.lot_id,
      sq.qty,
      sl.name as location
    from
      stock_quant sq
    join stock_location sl on
      sl.id = sq.location_id
    where
      sl.id = 15) stock on
    spl.id = stock.lot_id
  left join (
    select
      sq.lot_id,
      sq.qty,
      sl.name as location
    from
      stock_quant sq
    join stock_location sl on
      sl.id = sq.location_id
    where
      sl.id = 23) non_stock on
    spl.id = non_stock.lot_id
  where
    pt.categ_id = '255'
    and pt.active = true
  group by 
    pt.default_code,
    pt.name,
    pt.x_width,
    pt.x_length,
    pt.x_width_m,
    pt.x_length_m,
    pt.id");
  }

  function getPlate_copy()
  {
    return $this->db->query("SELECT
        pt.id,
        pt.uom_id,
        pt.default_code,
        pt.name as prod_tmpl,
        pt.categ_id,
        pt.x_width,
        pt.x_length,
        pt.x_width_m,
        pt.x_length_m,
        pp.id as prod_prod
      from
        product_template pt
      join product_product pp on pp.product_tmpl_id = pt.id
      where
        pt.categ_id = '255'
        and pt.active = true");
  }

  function get_lot_by_id($id)
  {
    return $this->db->query("SELECT
      pt.id,
      pt.default_code,
      pt.name as prod_tmpl,
      pt.categ_id,
      pp.id as prod_prod,
      spl.name as lot_name,
      sq.qty as qty_lot,
      sq.location_id,
      sl.name  
    from
      product_template pt
    join product_product pp on pp.product_tmpl_id = pt.id
    join stock_production_lot spl on spl.product_id = pp.id
    join stock_quant sq on spl.id = sq.lot_id 
    join stock_location sl on sl.id = sq.location_id 
    where
      pt.id = '$id'");
  }

  function get_plate_pldc($id)
  {
    return $this->db->query("SELECT
        pt.id,
        pt.name as prod_tmpl,
        pt.x_width,
		    pt.x_length,
        pp.id as pp_id,
        pp.barcode,
        spl.name as no_lot,
        sum(sq.qty)  as qty_lot
      from
        product_template pt
      join product_product pp on
        pp.product_tmpl_id = pt.id
      join stock_production_lot spl on
        spl.product_id = pp.id
      join stock_quant sq on
        sq.lot_id = spl.id
      where pt.id = '$id' and sq.location_id = '23'
      group by 
      pt.id,
      pt.name,
      pp.id,
      pp.barcode,
      spl.name");
  }
}
