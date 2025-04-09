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

  // function cetak_kwitansi($kwi)  {
    // return $this->db->query("SELECT
    //   xk.id,
    //   xk.name as no_kwitansi,
    //   xk.tgl_invoice,
    //   xk.amount_to_text,
    //   xk.invoice_id,
    //   rp.name as customer,
    //   ve.name as faktur,
    //   sp.name as no_sjk,
    //   ai.date_invoice,
    //   ai.amount_untaxed,
    //   rp.street
    // from
    //   x_kuitansi xk
    // left join account_invoice ai on
    //   ai.id = xk.invoice_id
    // left join res_partner rp on
    //   rp.id = ai.partner_id
    // left join vit_efaktur ve on
    //   ve.id = ai.efaktur_id
    // left join stock_picking sp on
    //   sp.id = ai.x_no_sjk
    // where
    //   xk.id = '$kwi'");
  // }

  function cetak_kwitansi($kwi)  {
    return $this->db->query("SELECT
        xk.id,
        xk.name AS no_kwitansi,
        xk.tgl_invoice,
        xk.amount_to_text,
        rp.name AS customer,
        ve.name AS faktur,
        rp.street,
        STRING_AGG(CONCAT('(', TO_CHAR(ai.date_invoice, 'DD-MM-YYYY'), ')'), ', ') AS list_date_invoice,
        STRING_AGG(sp.name || ' (' || TO_CHAR(ai.date_invoice, 'DD-MM-YYYY') || ')', ', ') AS no_sjk,
        SUM(ai.amount_untaxed) AS total_untaxed
    FROM
        x_kuitansi xk
    JOIN
        x_kuitansi_line xkl ON xkl.kuitansi_id = xk.id
    LEFT JOIN
        account_invoice ai ON ai.id = xkl.x_invoice 
    LEFT JOIN
        res_partner rp ON rp.id = ai.partner_id
    LEFT JOIN
        vit_efaktur ve ON ve.id = ai.efaktur_id
    LEFT JOIN
        stock_picking sp ON sp.id = ai.x_no_sjk
    WHERE
        xk.id = '$kwi'
    GROUP BY
        xk.id, xk.name, xk.tgl_invoice, xk.amount_to_text,
        rp.name, rp.street, ve.name;");
  }

  function det_kwitansi($kwi) {
    return $this->db->query("SELECT
      xkl.kuitansi_id,
      xkl.x_invoice,
      ai.number as no_inv,
      ai.x_no_sjk as no_sjk,
      ai.amount_untaxed as bruto,
      ai.date_invoice,
      sp.name as no_sjk
    from
      x_kuitansi_line xkl
    join account_invoice ai on ai.id = xkl.x_invoice 
    join stock_picking sp on sp.id = ai.x_no_sjk 
    where
      xkl.kuitansi_id = '$kwi'");
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
