<?php
class M_Kwitansi extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  function getKwitansi()
  {
    return $this->db->query("SELECT
      xk.name as no_kwitansi,
      xk.tgl_invoice,
      rp.name as customer
    from
      x_kuitansi xk
    left join account_invoice ai on ai.id = xk.invoice_id
    left join res_partner rp on rp.id = ai.partner_id 
    where
      xk.create_date BETWEEN NOW() - INTERVAL '12 months' AND NOW() order by xk.name desc");
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
      ve.name as faktur
    from
      account_invoice ai
    left join res_partner rp on rp.id = ai.partner_id
    left join account_payment_term apt on apt.id = ai.payment_term_id
    left join stock_picking sp on sp.id = ai.x_no_sjk 
    left join sale_order so on so.name = ai.origin
    left join vit_efaktur ve on ve.id = ai.efaktur_id 
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
