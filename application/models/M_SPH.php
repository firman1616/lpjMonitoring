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

  function cetak_inv($inv)
  {
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

  function det_inv($inv)
  {
    return $this->db->query("SELECT
      name,
      quantity,
      price_unit,
      price_subtotal,
      discount as diskon
    from
      account_invoice_line ail
    where
      invoice_id = '$inv'");
  }
}
