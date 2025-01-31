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
        ai.amount_total,
        ai.user_id, 
        rp.name as nama_cus,
        rp2.name as nama_sales,
        apt.name as termin
      from
        account_invoice ai
      left join res_partner rp on rp.id = ai.partner_id 
      left join res_users ru on ru.id = ai.user_id
      left join res_partner rp2 on rp2.id = ru.partner_id 
      left join account_payment_term apt on apt.id = ai.payment_term_id 
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
      so.x_po_cust,
      ai.amount_untaxed as bruto,
      ai.amount_tax,
      rp.npwp,
      ai.x_no_faktur
    from
      account_invoice ai
    left join res_partner rp on rp.id = ai.partner_id
    left join account_payment_term apt on apt.id = ai.payment_term_id
    left join stock_picking sp on sp.id = ai.x_no_sjk 
    left join sale_order so on so.name = ai.origin
    where
      number like '%INV%' and ai.id = '$inv'");
  }

  function det_inv($inv) {
    return $this->db->query("SELECT
      name,
      quantity,
      price_unit,
      price_subtotal
    from
      account_invoice_line ail
    where
      invoice_id = '$inv'");
  }

  
}
