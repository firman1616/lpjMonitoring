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
      xk.id,
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

  function cetak_kwitansi($kwi)  {
    return $this->db->query("SELECT
      xk.id,
      xk.name as no_kwitansi,
      xk.tgl_invoice,
      xk.amount_to_text,
      xk.invoice_id,
      rp.name as customer,
      ve.name as faktur,
      sp.name as no_sjk,
      ai.date_invoice,
      ai.amount_untaxed,
      rp.street
    from
      x_kuitansi xk
    left join account_invoice ai on
      ai.id = xk.invoice_id
    left join res_partner rp on
      rp.id = ai.partner_id
    left join vit_efaktur ve on
      ve.id = ai.efaktur_id
    left join stock_picking sp on
      sp.id = ai.x_no_sjk
    where
      xk.id = '$kwi'");
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
