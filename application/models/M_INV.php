<?php
class M_INV extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  function getINV()
  {
    return $this->db->query("SELECT
        ai.id,
        ai.create_date,
        ai.date_invoice,
        ai.date_due,
        ai.number,
        ai.partner_id,
        ai.amount_untaxed,
        ai.amount_tax,
        ai.origin,
        ai.payment_term_id,
        ai.amount_total
      from
        account_invoice ai
      where
        number like '%INV%' and
      ai.create_date BETWEEN NOW() - INTERVAL '12 months' AND NOW() order by ai.number desc");
  }

  function cetak_inv($inv)  {
    return $this->db->query("SELECT
      ai.id,
      ai.number,
      ai.partner_id,
      ai.partner_shipping_id,
      ai.date_invoice,
      ai.date_due,
      ai.origin,
      rp.name as nama_cust,
      rp.x_npwp,
      rp.street,
      apt.name as payment_term,
      sp.name as no_sjk,
      so.x_po_cust 
    from
      account_invoice ai
    left join res_partner rp on rp.id = ai.partner_id
    left join account_payment_term apt on apt.id = ai.payment_term_id
    left join stock_picking sp on sp.id = ai.x_no_sjk 
    left join sale_order so on so.name = ai.origin
    where
      number like '%INV%' and ai.id = '$inv'");
  }

  // function cetak_so_detail($so) {
  //   return $this->db->query("SELECT
  //     sol.name as produk_name,
  //     sol.product_id,
  //     sol.product_uom_qty,
  //     sol.x_duedate_kirim,
  //     sol.price_unit,
  //     sol.discount,
  //     pp.default_code
  //   from
  //     sale_order_line sol
  //   left join product_product pp on pp.id = sol.product_id 
  //   where
  //     order_id = '$so'");
  // }

  // function cetak_harga($so)  {
  //   return $this->db->query()
  // }

  
}
