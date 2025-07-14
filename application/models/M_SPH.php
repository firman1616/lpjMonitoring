<?php
class M_SPH extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  function getSPH()
  {
    return $this->db->query("SELECT
      xpq.id,
      xpq.name as no_sph,
      rp.name as nama_cust,
      xpq.start_date,
      xpq.x_payment_term,
      xpq.x_hari_pengiriman,
      xpq.create_date 
    from
      x_print_quo xpq
    join res_partner rp on rp.id = xpq.x_cust
    where xpq.create_date >= CURRENT_DATE - INTERVAL '1 year'
    order by xpq.name desc");
  }

  function cetak_sph($sph)
  {
    return $this->db->query("SELECT
      xpq.id,
      xpq.name as no_sph,
      xpq.x_keterangan,
      rp.name as nama_cust,
      rp.street,
      rp.phone,
      rp2.name as admin_name
    from
      x_print_quo xpq 
    join res_partner rp on rp.id = xpq.x_cust
    join res_users ru on ru.id = xpq.x_user_id
    join res_partner rp2 on rp2.id = ru.partner_id 
    where
      xpq.id = '$sph'");
  }

  function det_sph($sph)
  {
    return $this->db->query("SELECT
      xpql.x_quo as id_sph_head,
      xsq.name as sq,
      xsq.x_product,
      pp.default_code,
      pt.name as nama_produk,
      xsq.x_manufacturing_type,
      xsq.x_planning_type,
      xsq.x_length,
      xsq.x_width,
      xcb.name as nama_bahan,
      xsq.x_satuan as packing_layout,
      xsq.x_qty,
      xsq.x_harga_renego_sales as harga_pcs,
      at2.description as tax 
    from
      x_print_quo_line xpql
    join x_sales_quotation xsq on xsq.id = xpql.x_sq 
    join product_product pp on pp.id = xsq.x_product
    join product_template pt on pt.id = pp.product_tmpl_id 
    join x_config_bahan xcb on xcb.id = xsq.x_material_type_id2 
    join account_tax at2 on at2.id = xpql.x_tax_id 
    where
      xpql.x_quo = '$sph'");
  }
}
