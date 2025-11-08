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
      pp.id = '$id'");
  }

  function get_plate_pldc($id)
  {
    return $this->db->query("WITH qty_done_per_lot AS (
        SELECT
            lot_id,
            SUM(quantity_done) AS total_qty_done
        FROM stock_move_lots
        GROUP BY lot_id
    )
    select
    	pt.id as prd_tmpl,
    	pt.name as nama_produk,
      pp.id,
      pp.default_code AS name,
      pt.x_length as panjang,
      pt.x_width as lebar,
      sq.qty,
      sq.location_id,
      sl.name AS lokasi,
      spl.id as id_lot,
      spl.name AS no_lot,
      COALESCE(qdl.total_qty_done, 0) AS pemakaian
    FROM
        product_product pp
    join product_template pt on pt.id = pp.product_tmpl_id
    JOIN stock_quant sq ON sq.product_id = pp.id
    JOIN stock_location sl ON sl.id = sq.location_id
    JOIN stock_production_lot spl ON spl.id = sq.lot_id
    LEFT JOIN qty_done_per_lot qdl ON qdl.lot_id = spl.id
    WHERE
        pt.id = '$id'
        AND sq.location_id IN ('23', '15')
    GROUP BY 
        pp.id,
        pp.default_code,
        sq.qty,
        sq.location_id,
        sl.name,
        spl.name,
        qdl.total_qty_done,
        pt.name,
        pt.id,
        spl.id
    ");
  }

  // function get_plate_pldc($id)
  // {
  //   return $this->db->query("SELECT
  //       pt.id,
  //       pt.name as prod_tmpl,
  //       pt.x_width,
  // 	    pt.x_length,
  //       pp.id as pp_id,
  //       pp.barcode,
  //       spl.name as no_lot,
  //       spl.id as id_lot,
  //       sum(sq.qty)  as qty_lot
  //     from
  //       product_template pt
  //     join product_product pp on
  //       pp.product_tmpl_id = pt.id
  //     join stock_production_lot spl on
  //       spl.product_id = pp.id
  //     join stock_quant sq on
  //       sq.lot_id = spl.id
  //     where pt.id = '$id' and sq.location_id in ('23','15')
  //     group by 
  //     pt.id,
  //     pt.name,
  //     pp.id,
  //     pp.barcode,
  //     spl.name,
  //     spl.id");
  // }

  function get_lot_id($id)
  {
    return $this->db->query("SELECT
      spl.id,
      spl.name as no_lot,
      sml.quantity_done, 
      sml.move_id, 
      sml.lot_id,
      sm.id, 
      sm.origin, 
      sm.product_qty, 
      sm.location_id,
      mp.x_type_mo,  
      mp.origin as keterangan, 
      mp.create_date,
      mp.x_trial_produksi as status_ok,
      mp.product_id,
      pt.name as produk
    from
      stock_production_lot spl
    join stock_move_lots sml on sml.lot_id = spl.id
    join stock_move sm on sm.id = sml.move_id
    join mrp_production mp on mp.name = sm.origin
    join product_product pp on pp.id = mp.product_id
    join product_template pt on pt.id = pp.product_tmpl_id
    where
      spl.id = '$id' and sm.location_id = '23'");
  }
}
