<?php
class M_SO extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  function getSO()
  {
    return $this->db->query("SELECT
      so.id,
      so.name as nama_so,
      rp4.name as nama_sales,
      rp3.name as nama_cust,
      apt.name as payment_term
    from
      sale_order so
    left join res_users ru on ru.id = so.create_uid 
    left join res_partner rp4 on rp4.id = ru.partner_id
    left join res_partner rp3 on rp3.id = so.partner_id
    left join account_payment_term apt on apt.id = so.payment_term_id
    where
      so.create_date BETWEEN NOW() - INTERVAL '12 months' AND NOW() order by so.name desc");
  }

  function cetak_so($so){
    return $this->db->query("SELECT
      so.id,
      so.name,
      so.date_order,
      so.amount_untaxed,
      so.amount_tax,
      so.amount_total,
      rp.street as inv_street,
      rp2.street as ship_street,
      rp3.name as nama_cust,
      rp4.name as nama_sales,
      apt.name as payment_term
    from
      sale_order so
    left join res_partner rp on rp.id = so.partner_invoice_id 
    left join res_partner rp2 on rp2.id = so.partner_shipping_id 
    left join res_partner rp3 on rp3.id = so.partner_id 
    left join res_users ru on ru.id = so.create_uid 
    left join res_partner rp4 on rp4.id = ru.partner_id
    left join account_payment_term apt on apt.id = so.payment_term_id 
    where
      so.id = '$so'");
  }

  function cetak_so_detail($so) {
    return $this->db->query("SELECT
      sol.name as produk_name,
      sol.product_id,
      sol.product_uom_qty,
      sol.x_duedate_kirim,
      sol.price_unit,
      sol.discount,
      pp.default_code
    from
      sale_order_line sol
    left join product_product pp on pp.id = sol.product_id 
    where
      order_id = '$so'");
  }

  // function cetak_harga($so)  {
  //   return $this->db->query()
  // }

  
}
